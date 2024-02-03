<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\StaticInformation;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\BlogResource;
use App\Http\Resources\Api\WallpaperResource;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{


    public function index(BlogRequest $request){
        
       $type = $request->validated();
        
       if ($type['category']=='Archaeologic') {

            $wallpaper = StaticInformation::where(['layout'=>'blogs_Natural','is_wallpaper'=>true])->first();
            
            $blogs = Blog::where('category','Archaeologic')->paginate(5);

            if (count($blogs)>0)  {
                $blogs = BlogResource::collection($blogs);

                $data=[
                    'Wallpaper' =>new WallpaperResource($wallpaper),
                    'Blogs' => $blogs,
                    ];
                return ApiResponse::sendResponse(200,'ok',$data);
            }
            else {
                return ApiResponse::sendResponse(200,'There is no records',new WallpaperResource($wallpaper));
            }
        }


        elseif ($type['category']=='Natural') {

            $wallpaper = StaticInformation::where(['layout'=>'blogs_Archaeology','is_wallpaper'=>true])->first();

            $blogs = Blog::where('category','Natural')->paginate(5);

            if (count($blogs)>0)  {

                $blogs = BlogResource::collection($blogs);

                $data=[
                    'Wallpaper' =>new WallpaperResource($wallpaper),
                    'Blogs' => $blogs,
                ];
                return ApiResponse::sendResponse(200,'ok',$data);
            }
            else {
                return ApiResponse::sendResponse(200,'There is no records',new WallpaperResource($wallpaper));
            }
        }
       
    
    }
       
    public function Article($article_id){

        $validator = Validator::make(['article_id' => $article_id], [
            'article_id' => 'required|numeric|exists:ratings,id',
        ]);
        
        if ($validator->fails()) {
            return ApiResponse::sendResponse(200,'Validation errors',$validator->errors()->all());
        }

        $article = Blog::find($article_id);
        if($article){
           
            $suggestions = Blog::where('id', '!=', $article->id)
                                ->where('city_id', $article->city_id)
                                ->take(2)
                                ->get();

            $data = [
                "Article" =>new BlogResource($article),
                "Suggestion" =>BlogResource::collection($suggestions),
            ];

            return ApiResponse::sendResponse(200,'ok',$data);
        }else{

            return ApiResponse::sendResponse(404,'There is no record matches this ID ',[]);
        }
        
        


    }
}

