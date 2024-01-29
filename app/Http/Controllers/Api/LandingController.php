<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\LandingPhotosResource;
use App\Http\Resources\Api\RecommendationResource;
use App\Http\Resources\Api\StaticContentResource;
use App\Http\Resources\Api\WallpaperResource;
use App\Models\Recommendation;
use App\Models\StaticInformation;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){

        $landing_Wallpaper = StaticInformation::where(['page'=>'landing_page','is_wallpaper'=>true])->first();
        $landing_Paginate = StaticInformation::where(['page'=>'landing_page','type'=>'paginate'])->take(4)->get();
        $General_content = StaticInformation::where(['page'=>'landing_page','type'=>'first_paragraph'])->first();
        $recommended = Recommendation::get();
        $blog = StaticInformation::where(['page'=>'landing_page','type'=>'second_paragraph'])->first();

        $data=[

            'wallpaper' => new WallpaperResource($landing_Wallpaper),
            'paginate_photos' =>LandingPhotosResource::collection($landing_Paginate),
            'General' =>new StaticContentResource($General_content),
            'Recommendations' =>RecommendationResource::collection($recommended) ,
            'Blog' =>new StaticContentResource($blog),

        ];
               return ApiResponse::sendResponse(200,'ok',$data);

    }
}
