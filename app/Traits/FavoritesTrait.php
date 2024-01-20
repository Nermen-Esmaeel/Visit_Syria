<?php 

namespace App\Traits;

use App\Models\Favorite;

Trait FavoritesTrait{


    public function ToggleFavorites($selected){
      
      
        if ($selected->favorites()->exists()) 
        {
            $selected->favorites()->delete();
            return $selected;
        }

        else {
            
            $favorite = new Favorite();
            $favorite->user_id = $selected['user_id'];
            $favorite->favoritable()->associate($selected);
            $favorite->save();
            return $selected;
        } 
    }


}