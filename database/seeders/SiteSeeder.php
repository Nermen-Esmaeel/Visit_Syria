<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use App\Models\{TouristSite,Recommendation};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            $city_id = [2 ,1,6];
            $city_en = ['Damascus', 'Aleppo', 'Damascus'];
            $city_ar = [' دمشق', 'حلب','دمشق'];
            $photo_cover = [
                'site_images/cover_images_16974493221.png',
                'site_images/cover_images_16974493222.png',
                'site_images/cover_images_16974493223.png'
            ];
            $photo_logo = [
                'site_images/logo_images_16974493221.png',
                'site_images/logo_images_16974493222.png',
                'site_images/logo_images_16974493223.png'
            ];
            $title_en = ['Mount Qassioun', 'Aleppo Cetadel' ,'Palmyra'];
            $title_ar = ['جبل قاسيون', 'قلعة حلب' ,'مملكة تدمر'];
            $Site_rating = [4,4,3];
            $description_en = [
                'It is distinguished by its luxurious interior design and its unique location near tourist and historical landmarks. It consists of 40 rooms and suites',
                'Aleppo Citadel is a fortified palace dating back to the Middle Ages. Aleppo Citadel is considered one of the oldest and largest castles',
                'The Kingdom of Palmyra, whose capital is located in the city of Palmyra, was one of the most important ancient kingdoms that flourished in particular during the reign of its queen Zenobia.',
            ];
            $description_ar = [
               'مسرح بصرى أو مدرج بصرى يقع في قلعة بصرى الأثرية في مدينة بصرى الشام في سوريا',
                'قلعة حلب قصر محصن يعود إلى العصور الوسطى. تعتبر قلعة حلب إحدى أقدم وأكبر القلاع في العالم',
                'مملكة تدمر وتقع عاصمتها في مدينة تدمر وقد كانت من أهم الممالك القديمة التي ازدهرت بشكل خاص في عهد ملكتها زنوبيا',
            ];
            $email = ['Busra@gmail.com', 'Aleppo_Cetadel@gmail.com', 'Palmyra@gmail.com'];
            $working_time = ['24/24', '16/24', '24/24'];

            for($i=0; $i<3;$i++) {
                $site=new TouristSite();
                $site->city_id = $city_id[$i];
                $site->city_en =  $city_en[$i];
                $site->city_ar =  $city_ar[$i];
                $site->photo_cover = $photo_cover[$i];
                $site->photo_logo = $photo_logo[$i];
                $site->title_en = $title_en[$i];
                $site->title_ar = $title_ar[$i];
                $site->Site_rating = $Site_rating[$i];
                $site->description_en = $description_en[$i];
                $site->description_ar = $description_ar[$i];
                $site->email = $email[$i];
                $site->working_time = $working_time[$i];
                $site->save();

                Comment::create([
                    'user_id' =>1,
                    'commentable_type' =>TouristSite::class,
                    'commentable_id' =>$site->id,
                    'commentable_id' =>$site->id,
                    'content'        =>'Just a unique Historical site in Syria',
                ]);
            }
            Recommendation::create([
                'recommendatable_type' => TouristSite::class,
                'recommendatable_id' => $site->id,
            ]);
    }
}
