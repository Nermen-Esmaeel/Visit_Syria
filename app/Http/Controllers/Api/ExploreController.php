<?php

namespace App\Http\Controllers\Api;

use App\Models\Hotel;
use App\Traits\Favorites;
use App\Models\Restaurant;
use App\Models\TouristSite;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Traits\CommentsTrait;
use App\Traits\FavoritesTrait;
use Database\Seeders\HotelSeeder;
use App\Http\Controllers\Controller;
use App\Http\Requests\RatingRequest;
use App\Http\Requests\CommentRequest;
use function PHPUnit\Framework\isEmpty;
use App\Http\Resources\Api\HotelResource;

use App\Http\Resources\Api\RestaurantResource;
use App\Http\Resources\Api\Tourist_sitesResource;
use App\Models\Rating;

class ExploreController extends Controller
{   use FavoritesTrait,CommentsTrait;
    #########################/Search SECTION /#########################


    public function Search(Request $request){

        $data = $request->validate([
            'content' => "string | required"
        ]);

        $hotels = Hotel::search($request->input('content'))->get(2);
        $restaurants = Restaurant::search($request->input('content'))->get(2);

        if(count($hotels)==0 && count($restaurants)==0){

            return ApiResponse::sendResponse(200,'There is no record matches !',[]);
        }
        else{
            $hotels = HotelResource::collection($hotels);
            $restaurants = RestaurantResource::collection($restaurants);
            $results = [
                'Hotels' => $hotels,
                'Restaurants' => $restaurants
            ];

            return ApiResponse::sendResponse(200,'ok',$results);
        }

    }
    #########################/Rating SECTION /#########################

    public function Rating(Request $request){

        if ($request->header('lan')=="en") {

            $request->validate([
                'Service_name'=>'required|exists:ratings,name_en',
                'Rating_value'=>'required|between:0,5',

            ]);

        }

        elseif($request->header('lan')=="ar")
        {
            $request->validate([
                'Service_name'=>'required|exists:ratings,name_ar',
                'Rating_value'=>'required|between:0,5',

            ]);
        }

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
    public function HotelsIndex(){

        $hotels = Hotel::paginate(9);

        if (count($hotels)>0) {

            $hotels = HotelResource::collection($hotels);
            return ApiResponse::sendResponse(200,'ok',$hotels);

        } else {

            return ApiResponse::sendResponse(200,'There is no hotels available',[]);

        }

    }

    public function ShowHotel(String $id){

        $hotel = Hotel::find($id);

        if ($hotel) {

            $hotel = new HotelResource($hotel);

            return ApiResponse::sendResponse(200,'ok',$hotel);

        }
        else {

            return ApiResponse::sendResponse(200,'There is no record matches this ID ',[]);

        }

    }

    public function iLikeThisHotel(Request $request){

        $hotel_id = $request->input('hotel_id');

        $hotel = Hotel::find($hotel_id);

        $hotel['user_id'] = $request->user()->id;


        if ($hotel) {

            $hotel = $this->ToggleFavorites($hotel);

            if($hotel->favorites()->exists()){

                $hotel = new HotelResource($hotel);

                return ApiResponse::sendResponse(201,'Hotel added to favorites',$hotel);
            }

            return ApiResponse::sendResponse(200,'Hotel deleted from favorites',[]);

        }
        else {

            return ApiResponse::sendResponse(200,'There is no record matches this ID ',[]);

        }


    }


    public function AddCommentToHotel(CommentRequest $request)

    {        $data = $request->validated();
        $hotel_id = $request->input('hotel_id');

        $hotel = Hotel::find($hotel_id);

        if ($hotel) {

            $hotel['user_id'] =  $request->user()->id;
            $hotel['content'] = $request->content;

            $hotel = $this->AddComment($hotel);
            return ApiResponse::sendResponse(201,'Comment saved',[]);
        }

    }
    #########################/Restaurant SECTION /#########################

    public function ShowRestaurant(String $id){

        $restaurant = Restaurant::find($id);

        if ($restaurant) {

            $restaurant = new RestaurantResource($restaurant);

            return ApiResponse::sendResponse(200,'ok',$restaurant);

        }
        else {

            return ApiResponse::sendResponse(200,'There is no record matches this ID ',[]);

        }

    }

    public function RestaurantsIndex(){

        $restaurants = Restaurant::paginate(9);

        if (count($restaurants)>0) {

            $restaurants = RestaurantResource::collection($restaurants);
            return ApiResponse::sendResponse(200,'ok',$restaurants);

        } else {

            return ApiResponse::sendResponse(200,'There is no restaurants available',[]);

        }

    }

    public function iLikeThisRestaurant(Request $request){

        $restaurant_id = $request->input('restaurant_id');

        $restaurant = Restaurant::find($restaurant_id);

        $restaurant['user_id'] =  $request->user()->id;


        if ($restaurant) {

            $restaurant = $this->ToggleFavorites($restaurant);

            if($restaurant->favorites()->exists()){

                $restaurant = new RestaurantResource($restaurant);

                return ApiResponse::sendResponse(201,'Restaurant added to favorites',$restaurant);
            }

            return ApiResponse::sendResponse(200,'Restaurant deleted from favorites',[]);

        }
        else {

            return ApiResponse::sendResponse(200,'There is no record matches this ID ',[]);

        }

    }

    public function AddCommentToRestaurant(CommentRequest $request)
    {
        $data = $request->validated();
        $restaurant_id = $request->input('restaurant_id');

        $restaurant = Restaurant::find($restaurant_id);
        if ($restaurant) {

            $restaurant['user_id'] =  $request->user()->id;
            $restaurant['content'] =  $data['content'];
            $restaurant = $this->AddComment($restaurant);
            return ApiResponse::sendResponse(201,'Comment saved',[]);

        }
    }
    #########################/TouristSite SECTION /#########################

    public function SitesIndex(){

        $sites = TouristSite::paginate(9);

        if (count($sites)>0) {

            $sites = Tourist_sitesResource::collection($sites);
            return ApiResponse::sendResponse(200,'ok',$sites);

        } else {

            return ApiResponse::sendResponse(200,'There is no sites available',[]);

        }

    }


    public function ShowSite(String $id){

       // $site_id = $request->input('site_id');

        $site = TouristSite::find($id);

        if ($site) {

            $site = new Tourist_sitesResource($site);

            return ApiResponse::sendResponse(200,'ok',$site);

        }
        else {

            return ApiResponse::sendResponse(200,'There is no record matches this ID ',[]);

        }

    }


    public function iLikeThisSite(Request $request){

        $site_id = $request->input('site_id');

        $site = TouristSite::find($site_id);

        $site['user_id'] =  $request->user()->id;


        if ($site) {

            $site = $this->ToggleFavorites($site);

            if($site->favorites()->exists()){

                $site = new Tourist_sitesResource($site);

                return ApiResponse::sendResponse(201,'Site added to favorites',$site);
            }

            return ApiResponse::sendResponse(200,'Site deleted from favorites',[]);

        }
        else {

            return ApiResponse::sendResponse(200,'There is no record matches this ID ',[]);

        }

    }


    public function AddCommentToSite(CommentRequest $request)

    {        $data = $request->validated();

        $site_id = $request->input('site_id');

        $site = TouristSite::find($site_id);
        if ($site) {

            $site['user_id'] =  $request->user()->id;
            $site['content'] = $request->content;
            $site = $this->AddComment($site);
            return ApiResponse::sendResponse(201,'Comment saved',[]);

        }
    }




}
