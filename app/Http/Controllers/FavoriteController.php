<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Exception;

class FavoriteController extends Controller
{


    //add favorit,return true if added favorite
    public static function addFavorite($request){
        try {

            $type = $request->input('type');//type is[restaurant or hotel or touristSite]
            $google_user_id = $request->input('google_user_id');//get user id from google

            $favorite = new Favorite();
            $favorite->user_id = $google_user_id;
            $favorite->favoritable_type = $type;


            if($type === 'restaurant'){
                $favorite->favoritable_id = $request->input('restaurant_id');

            }elseif($type ==='hotel'){
                $favorite->favoritable_id = $request->input('hotel_id');

            }elseif($type ==='touristSite'){
                $favorite->favoritable_id = $request->input('touristSite_id');

            }


            }catch(Exception $e){
            $error_message = $e->getMessage();
            return $error_message ;
    }
    $favorite->save();
    return true;
    }

    //return all favorits of auth user
    public static function allFavoriteForUser($user_id){
        try{
            $allfavorits = Favorite::where('user_id',$user_id)->get();
            if($allfavorits){
                return $allfavorits;
            }else{
                return back()->with('message','you dont have any favorite');
            }

        }catch(Exception $e){
            return $e;
        }
    }

    //delete favorite,return success message  If done successfully
    public static function deleteFavorite($id,$favoritable_id){

        $favorite = Favorite::where('user_id',$id)->where('favoritable_id',$favoritable_id)->get();
        if($favorite){
            $favorite->delete();
            return "Deleted successfully";
        }else{
            return "Favorite not found";
        }
    }
}
