<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Resources\Api\{RestaurantResource, HotelResource,Tourist_sitesResource};
use App\Models\{Recommendation,StaticInformation};
use App\Http\Resources\Api\{WallpaperResource,LandingPhotosResource, StaticContentResource, RecommendationResource};

class LandingController extends Controller
{
    public function index(){

        $landing_Wallpaper = StaticInformation::where(['layout'=>'landing_page','is_wallpaper'=>true])->first();
        $landing_Paginate = StaticInformation::where(['layout'=>'landing_page','type'=>'paginate'])->take(4)->get();
        $General_content = StaticInformation::where(['layout'=>'landing_page','type'=>'first_paragraph'])->first();

        //get recomendation with recommendatable; recommendatable:get data related specific model
        $recommended = Recommendation::with('recommendatable')->paginate(3);

        //
        $transformedrecommended = $recommended->through(function ($rec) {
            if ($rec->recommendatable_type === 'App\Models\Hotel') {
                return new HotelResource($rec->recommendatable);
            }
            elseif ($rec->recommendatable_type === 'App\Models\Restaurant') {
                return new RestaurantResource($rec->recommendatable);
            }
            elseif($rec->recommendatable_type === 'App\Models\TouristSite') {
                return new Tourist_sitesResource($rec->recommendatable);
            }
        });

        $blog = StaticInformation::where(['layout'=>'landing_page','type'=>'second_paragraph'])->first();

        $data=[

            'wallpaper' => new WallpaperResource($landing_Wallpaper),
            'paginate_photos' =>LandingPhotosResource::collection($landing_Paginate),
            'General' =>new StaticContentResource($General_content),
            'Recommendations' => $transformedrecommended,
            'Blog' =>new StaticContentResource($blog),

        ];
               return ApiResponse::sendResponse(200,'ok',$data);

    }
}
