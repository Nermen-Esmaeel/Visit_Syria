<?php

namespace Database\Seeders;

use App\Models\Recommendation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recommendatable_type    =    [
        'App\Models\Hotel','App\Models\Hotel','App\Models\Hotel'
        ,'App\Models\Restaurant','App\Models\Restaurant','App\Models\Restaurant'
        ,'App\Models\TouristSite','App\Models\TouristSite','App\Models\TouristSite'];

        $recommendatable_id      =    [1,2,3,1,2,3,1,2,3];

    

       

        for($i=0; $i<9;$i++) {
        $recommended=new Recommendation();
        $recommended->recommendatable_type = $recommendatable_type[$i];
        $recommended->recommendatable_id = $recommendatable_id[$i];

        $recommended->save();
        }
    }
}
