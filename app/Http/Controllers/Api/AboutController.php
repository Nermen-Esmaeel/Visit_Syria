<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\StaticInformation;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\AboutResource;
use App\Http\Resources\Api\WallpaperResource;
use App\Models\About;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function index($section){

        $validator = Validator::make(['section' => $section], [
            'section' => 'required|string|exists:abouts,category',
        ]);
        
        if ($validator->fails()) {
            return ApiResponse::sendResponse(200,'Validation errors',$validator->errors());
        }
        

        $wallpaper = StaticInformation::where('layout', $section)->where('is_wallpaper', true)->first();
        $article = About::where('category', $section)->first();

        $data = [
            
            'Wallpaper' =>$wallpaper,
            'Article' =>$article,
        ];
        
      
       
        if($article){
            
            $data = [
                //Before saving photos to the article, make sure to match the article id with it's own photos in photos table
                "Wallpaper" =>new WallpaperResource($wallpaper),
                "Article" =>new AboutResource($article),
            ];
            
            return ApiResponse::sendResponse(200,'ok',$data);
        }else{

            return ApiResponse::sendResponse(404,'There is no record matches this ID ',[]);
        }
        
        


    }
}
