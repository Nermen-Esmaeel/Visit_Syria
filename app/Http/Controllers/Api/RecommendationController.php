<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Rating;
use App\Models\TouristSite;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\Recommendation;
use App\Models\StaticInformation;
use App\Http\Controllers\Controller;
use App\Http\Requests\RatingRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\Api\HotelResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Api\WallpaperResource;
use App\Http\Resources\Api\RestaurantResource;
use App\Traits\{CommentsTrait,FavoritesTrait};
use App\Http\Resources\Api\Tourist_sitesResource;

class RecommendationController extends Controller
{
    use FavoritesTrait,CommentsTrait;

    #########################/Rating SECTION /#########################

    public function Rating(RatingRequest $request){

        $request->validated();

        $Service_rating_id = $request->input('Service_rating_id');
        $Service_rating = Rating::find($Service_rating_id);
        $new_service_rating = ((($Service_rating->value * $Service_rating->rating_count)+$request->input('Rating_value'))/($Service_rating->rating_count+1));
        $rating_count = $Service_rating->rating_count+1;
        $value = $new_service_rating;
        $Service_rating->update([
            'value' =>$new_service_rating,
            'rating_count' =>$rating_count,
        ]);

        return ApiResponse::sendResponse(200,'Your rating has been saved !',[]);


    }

    #########################/Hotel SECTION /#########################
    ##################################################################

    public function RecommendedHotels(){

        $hotels = Recommendation::where('recommendatable_type','App\Models\Hotel')->with('recommendatable')->paginate(9);
        $wallpaper = StaticInformation::where(['is_wallpaper'=>true,'layout'=>'recommendations_hotels'])->first();
        
        
        if (count($hotels)>0) {

           $hotels= $hotels->through(function ($rec) 
           {
               return new HotelResource($rec->recommendatable);
            });
            
            
            $data=[
                'Wallpaper' =>new WallpaperResource($wallpaper),
                'Hotels'    =>$hotels,
            ];
            return ApiResponse::sendResponse(200,'ok',$data);

        } else {

            return ApiResponse::sendResponse(200,'There is no hotels available',new WallpaperResource($wallpaper));

        }

    }

    public function ShowRecommendedHotel(String $id){

        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric|exists:recommendations,recommendatable_id',
        ]);
        
        if ($validator->fails()) {
            return ApiResponse::sendResponse(200,'Validation errors',$validator->errors()->all());
        }

        $hotel = Recommendation::where(['recommendatable_type'=>'App\Models\Hotel','recommendatable_id'=>$id])->with('recommendatable')->first();
        

        
        if ($hotel) {
            
            return ApiResponse::sendResponse(200,'ok',new HotelResource($hotel->recommendatable));

        }

        else {
            return ApiResponse::sendResponse(404,'There is no record matches this ID ',[]);

        }

    }

    public function iLikeThisHotel(Request $request){

        $hotel_id = $request->input('hotel_id');

        $validator = Validator::make(['hotel_id' => $hotel_id], [
            'hotel_id' => 'required|numeric|exists:recommendations,recommendatable_id',
        ]);
        
        if ($validator->fails()) {
            return ApiResponse::sendResponse(200,'Validation errors',$validator->errors()->all());
        }

        $hotel = Recommendation::where(['recommendatable_type'=>'App\Models\Hotel','recommendatable_id'=>$hotel_id])->with('recommendatable')->first();

        $hotel = $hotel->recommendatable;

        if ($hotel) {

            $hotel['user_id'] = $request->user()->id;

            $hotel = $this->ToggleFavorites($hotel);

            if($hotel->favorites()->exists()){

                $hotel = new HotelResource($hotel);

                return ApiResponse::sendResponse(201,'Hotel added to favorites',$hotel);
            }

            return ApiResponse::sendResponse(200,'Hotel deleted from favorites',[]);

        }
        else {

            return ApiResponse::sendResponse(404,'There is no record matches this ID ',[]);

        }


    }

    public function AddCommentToHotel(CommentRequest $request)

    {
        $data = $request->validated();
        

        $hotel_id = $request->input('hotel_id');

        $validator = Validator::make(['hotel_id' => $hotel_id], [
            'hotel_id' => 'required|numeric|exists:recommendations,recommendatable_id',
        ]);
        
        if ($validator->fails()) {
            return ApiResponse::sendResponse(200,'Validation errors',$validator->errors()->all());
        }

        $hotel = Recommendation::where(['recommendatable_type'=>'App\Models\Hotel','recommendatable_id'=>$hotel_id])->with('recommendatable')->first();

        $hotel = $hotel->recommendatable;

        if ($hotel) {

            $hotel['user_id'] =  $request->user()->id;
            $hotel['content'] = $request->content;

            $hotel = $this->AddComment($hotel);
            return ApiResponse::sendResponse(201,'Comment saved',[]);
        }else {

            return ApiResponse::sendResponse(404,'There is no record matches this ID ',[]);

        }

    }
        #########################/Restaurant SECTION /#########################
        #######################################################################

        public function RecommendedRestaurants(){

            $restaurants = Recommendation::where('recommendatable_type','App\Models\Restaurant')->with('recommendatable')->paginate(9);
            $wallpaper = StaticInformation::where(['is_wallpaper'=>true,'layout'=>'recommendations_restaurants'])->first();

           
    
    
            if (count($restaurants)>0) {

                $restaurants= $restaurants->through(function ($rec) 
                {
                    return new RestaurantResource($rec->recommendatable);
                });
                $data=[
                    'Wallpaper' =>new WallpaperResource($wallpaper),
                    'Restaurants'    =>$restaurants,
                ];

                return ApiResponse::sendResponse(200,'ok',$data);
    
            } else {
    
                return ApiResponse::sendResponse(200,'There is no restaurants available',new WallpaperResource($wallpaper));
    
            }
    
        }

        public function ShowRecommendedRestaurant(String $id){

            $validator = Validator::make(['id' => $id], [
                'id' => 'required|numeric|exists:recommendations,recommendatable_id',
            ]);
            
            if ($validator->fails()) {
                return ApiResponse::sendResponse(200,'Validation errors',$validator->errors()->all());
            }
    
            $restaurant = Recommendation::where(['recommendatable_type'=>'App\Models\Restaurant','recommendatable_id'=>$id])->with('recommendatable')->first();
            
    
           
    
    
            if ($restaurant) {
    
    
                return ApiResponse::sendResponse(200,'ok',new RestaurantResource($restaurant->recommendatable));
    
            }
            else {
    
                return ApiResponse::sendResponse(404,'There is no record matches this ID ',[]);
    
            }
    
        }

        public function iLikeThisRestaurant(Request $request){

            $restaurant_id = $request->input('restaurant_id');
            $validator = Validator::make(['restaurant_id' => $restaurant_id], [
                'restaurant_id' => 'required|numeric|exists:recommendations,recommendatable_id',
            ]);
            
            if ($validator->fails()) {
                return ApiResponse::sendResponse(200,'Validation errors',$validator->errors()->all());
            }
    
            $restaurant = Recommendation::where(['recommendatable_type'=>'App\Models\Restaurant','recommendatable_id'=>$restaurant_id])->with('recommendatable')->first();
            $restaurant = $restaurant->recommendatable;
    
    
            if ($restaurant) {
    
                $restaurant['user_id'] =  $request->user()->id;
    
                $restaurant = $this->ToggleFavorites($restaurant);
    
                if($restaurant->favorites()->exists()){
    
                    $restaurant = new RestaurantResource($restaurant);
    
                    return ApiResponse::sendResponse(201,'Restaurant added to favorites',$restaurant);
                }
    
                return ApiResponse::sendResponse(200,'Restaurant deleted from favorites',[]);
    
            }
            else {
    
                return ApiResponse::sendResponse(404,'There is no record matches this ID ',[]);
    
            }
    
        }

        public function AddCommentToRestaurant(CommentRequest $request)
    {
        $data = $request->validated();

        $restaurant_id = $request->input('restaurant_id');

        $validator = Validator::make(['restaurant_id' => $restaurant_id], [
            'restaurant_id' => 'required|numeric|exists:recommendations,recommendatable_id',
        ]);
        
        if ($validator->fails()) {
            return ApiResponse::sendResponse(200,'Validation errors',$validator->errors()->all());
        }

        $restaurant = Recommendation::where(['recommendatable_type'=>'App\Models\Restaurant','recommendatable_id'=>$restaurant_id])->with('recommendatable')->first();
        $restaurant = $restaurant->recommendatable;

        if ($restaurant) {

            $restaurant['user_id'] =  $request->user()->id;
            $restaurant['content'] =  $data['content'];
            $restaurant = $this->AddComment($restaurant);
            return ApiResponse::sendResponse(201,'Comment saved',[]);

        }
        else {

            return ApiResponse::sendResponse(404,'There is no record matches this ID ',[]);

        }
    }


    
    #########################/TouristSite SECTION /#########################
    ##################################################################


    public function RecommendedSites(Request $request){

        $validator = Validator::make(['type' => $request->input('type')], [
              'type' =>'required|string|in:Natural,Archeological',
        ]);
        
        if ($validator->fails()) {
            return ApiResponse::sendResponse(200,'Validation errors',$validator->errors()->all());
        }

        $sites = Recommendation::where('recommendatable_type','App\Models\TouristSite')
                                ->with('recommendatable')
                                ->paginate(9)
                                ->through(function ($rec)  {return $rec->recommendatable;});

        if ($request->input('type')=='Natural') {
            $sites = $sites->where('type','Natural');
            $wallpaper = StaticInformation::where(['is_wallpaper'=>true,'layout'=>'recommendations_natural_sites'])->first();
        } else {
            $sites = $sites->where('type','Archeological');
            $wallpaper = StaticInformation::where(['is_wallpaper'=>true,'layout'=>'recommendations_historical_sites'])->first();

        }
        

       

        $sites = Tourist_sitesResource::collection($sites);
                                     

        if (count($sites)>0) {


            $data=[
                'Wallpaper' =>new WallpaperResource($wallpaper),
                'Sites'    =>$sites,
            ];
            
            return ApiResponse::sendResponse(200,'ok',$data);

        } else {

            return ApiResponse::sendResponse(200,'There is no sites available',new WallpaperResource($wallpaper));

        }

    }

    public function ShowRecommendedSite(String $id){

        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric|exists:recommendations,recommendatable_id',
        ]);
        
        if ($validator->fails()) {
            return ApiResponse::sendResponse(200,'Validation errors',$validator->errors()->all());
        }
        $site = Recommendation::where(['recommendatable_type'=>'App\Models\TouristSite','recommendatable_id'=>$id])->with('recommendatable')->first();

        
        if ($site) {
    
    
            return ApiResponse::sendResponse(200,'ok',new Tourist_sitesResource($site->recommendatable));

        }
        else {

            return ApiResponse::sendResponse(404,'There is no record matches this ID ',[]);

        }
 
        
 
     }

     public function iLikeThisSite(Request $request){

        $site_id = $request->input('site_id');

        $site = TouristSite::find($site_id);


        if ($site) {

            $site['user_id'] =  $request->user()->id;

            $site = $this->ToggleFavorites($site);

            if($site->favorites()->exists()){

                $site = new Tourist_sitesResource($site);

                return ApiResponse::sendResponse(201,'Site added to favorites',$site);
            }

            return ApiResponse::sendResponse(200,'Site deleted from favorites',[]);

        }
        else {

            return ApiResponse::sendResponse(404,'There is no record matches this ID ',[]);

        }

    }

    public function AddCommentToSite(CommentRequest $request)
    {
        $data = $request->validated();

        $site_id = $request->input('site_id');

        $validator = Validator::make(['site_id' => $site_id], [
            'site_id' => 'required|numeric|exists:recommendations,recommendatable_id',
        ]);
        
        if ($validator->fails()) {
            return ApiResponse::sendResponse(200,'Validation errors',$validator->errors()->all());
        }

        $site = Recommendation::where(['recommendatable_type'=>'App\Models\TouristSite','recommendatable_id'=>$site_id])->with('recommendatable')->first();
        $site = $site->recommendatable;

        if ($site) {

            $site['user_id'] =  $request->user()->id;
            $site['content'] =  $data['content'];
            $site = $this->AddComment($site);
            return ApiResponse::sendResponse(201,'Comment saved',[]);

        }
        else {

            return ApiResponse::sendResponse(404,'There is no record matches this ID ',[]);

        }
    }



}
