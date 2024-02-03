<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $photoable_type    =    ['App\Models\Blog','App\Models\Blog','App\Models\Blog','App\Models\Blog','App\Models\Blog','App\Models\Blog','App\Models\Blog','App\Models\Blog','App\Models\Blog','App\Models\Blog','App\Models\Blog','App\Models\Blog'
                                ,'App\Models\Hotel','App\Models\Hotel','App\Models\Hotel','App\Models\Hotel','App\Models\Hotel','App\Models\Hotel','App\Models\Hotel','App\Models\Hotel','App\Models\Hotel','App\Models\Hotel','App\Models\Hotel','App\Models\Hotel'
                                ,'App\Models\Restaurant','App\Models\Restaurant','App\Models\Restaurant','App\Models\Restaurant','App\Models\Restaurant','App\Models\Restaurant','App\Models\Restaurant','App\Models\Restaurant','App\Models\Restaurant','App\Models\Restaurant','App\Models\Restaurant','App\Models\Restaurant'
                                ,'App\Models\TouristSite','App\Models\TouristSite','App\Models\TouristSite','App\Models\TouristSite','App\Models\TouristSite','App\Models\TouristSite','App\Models\TouristSite','App\Models\TouristSite','App\Models\TouristSite'
                                ,'App\Models\About','App\Models\About','App\Models\About','App\Models\About','App\Models\About','App\Models\About','App\Models\About','App\Models\About','App\Models\About','App\Models\About',];

        $photoable_id      =    [1,1,1,1,2,2,2,2,3,3,3,3
                                ,1,1,1,1,2,2,2,2,3,3,3,3
                                ,1,1,1,1,2,2,2,2,3,3,3,3
                                ,1,1,1,2,2,2,3,3,3
                                ,1,1,2,2,3,3,4,4,5,5];

        $type              =    [1,2,2,2,1,2,2,2,1,2,2,2
                                ,1,2,2,3,1,2,2,3,1,2,2,3
                                ,1,2,2,4,1,2,2,4,1,2,2,4
                                ,1,2,2,1,2,2,1,2,2
                                ,2,2,2,2,2,2,2,2,2,2];

        $photo_path        =    ['Pagination_Picture path','Picture path','Picture path','Picture path','Pagination_Picture path','Picture path','Picture path','Picture path','Pagination_Picture path','Picture path','Picture path','Picture path'
                                ,'Pagination_Picture path','Picture path','Picture path','Reservation_Picture','Pagination_Picture path','Picture path','Picture path','Reservation_Picture','Pagination_Picture path','Picture path','Picture path','Reservation_Picture'
                                ,'Pagination_Picture path','Picture path','Picture path','Menu','Pagination_Picture path','Picture path','Picture path','Menu','Pagination_Picture path','Picture path','Picture path','Menu'
                                ,'Pagination_Picture path','Picture path','Picture path','Pagination_Picture path','Picture path','Picture path','Pagination_Picture path','Picture path','Picture path'
                                ,'Picture path','Picture path','Picture path','Picture path','Picture path','Picture path','Picture path','Picture path','Picture path','Picture path',];
      
        for($i=0; $i<55;$i++) {
            $rate=new Photo();
            $rate->photoable_type = $photoable_type[$i];
            $rate->photoable_id = $photoable_id[$i];
            $rate->type = $type[$i];
            $rate->photo_path = $photo_path[$i];
           
            $rate->save();
        }
    }
}
