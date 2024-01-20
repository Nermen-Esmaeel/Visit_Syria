<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city_id = [8 ,8,1];
        $street_en = ['Ghasan-Harfosh ', 'Doar-Haron', 'Al-Ziraa'];
        $street_ar = ['دوار الشاطئ', 'دوار هارون', 'سيف الدولة'];
        $city_en = ['lattakia', 'lattakia', 'Aleppo'];
        $city_ar = ['اللاذقية', 'اللاذقية','حلب'];
        $photo_cover = [
        'restaurant_images/cover_images_16974493221.png',
        'restaurant_images/cover_images_16974493222.png',
        'restaurant_images/cover_images_16974493223.png'
        ];
        $photo_logo = [
            'restaurant_images/logo_images_16974493221.png',
            'restaurant_images/logo_images_16974493222.png',
            'restaurant_images/logo_images_16974493223.png'
        ];
        $title_en = ['Beroea', 'Ninar' ,'Karma'];
        $title_ar = ['بيرويا', 'نينار' ,'كارما'];
        $Restaurant_rating = [4,4,3];
        $description_en = [
            'The Beroea Restaurant is located direct facing the side of the famous Aleppo Citadel',
            'The Beroea Restaurant is located direct facing the side of the famous Aleppo Citadel',
            'The Beroea Restaurant is located direct facing the side of the famous Aleppo Citadel',
        ];
        $description_ar = [
            'إنشاء وتصميم نظام يعمل كوسيط بين الزبون والمطعم لتوفير خدمة طلب الطعام من خلاله بسهولة ودون تكاليف ,  يستطيع الزبون حجز طاولة في المطعم عبر الانترنت حيث يقوم الزبون بتسجيل دخوله بشكل آمن إلى النظام  يستطيع الزبون طلب ',
            'إنشاء وتصميم نظام يعمل كوسيط بين الزبون والمطعم لتوفير خدمة طلب الطعام من خلاله بسهولة ودون تكاليف ,  يستطيع الزبون حجز طاولة في المطعم عبر الانترنت حيث يقوم الزبون بتسجيل دخوله بشكل آمن إلى النظام  يستطيع الزبون طلب ',
            'إنشاء وتصميم نظام يعمل كوسيط بين الزبون والمطعم لتوفير خدمة طلب الطعام من خلاله بسهولة ودون تكاليف ,  يستطيع الزبون حجز طاولة في المطعم عبر الانترنت حيث يقوم الزبون بتسجيل دخوله بشكل آمن إلى النظام  يستطيع الزبون طلب ',
        ];
        $phone_number = ['+(963) 0987654321', '+(963) 0987654321', '+(963) 0987654321'];
        $email = ['Beroea@gmail.com', 'Ninar@gmail.com', 'Karma@gmail.com'];
        $facebook = ['Beroea_resturant@outlook.com', 'Ninar_resturant@outlook.com', 'Karma_resturant@outlook.com'];
        $instagram = ['Beroea_resturant@outlook.com', 'Ninar_resturant@outlook.com', 'Karma_resturant@outlook.com'];
        $youtube = ['Beroea_resturant@outlook.com', 'Ninar_resturant@outlook.com', 'Karma_resturant@outlook.com'];
        $twitter = ['Beroea_resturant@outlook.com', 'Ninar_resturant@outlook.com', 'Karma_resturant@outlook.com'];
        $website = ['www.Beroea_resturant.com', 'www.Ninar_resturant.com', 'www.Karma_resturant.com'];
        $working_time = ['24/24', '16/24', '24/24'];

        for($i=0; $i<3;$i++) {
            $restaurant=new Restaurant();
            $restaurant->city_id = $city_id[$i];
            $restaurant->street_en =  $street_en[$i];
            $restaurant->street_ar =  $street_ar[$i];
            $restaurant->city_en =  $city_en[$i];
            $restaurant->city_ar =  $city_ar[$i];
            $restaurant->photo_cover = $photo_cover[$i];
            $restaurant->photo_logo = $photo_logo[$i];
            $restaurant->title_en = $title_en[$i];
            $restaurant->title_ar = $title_ar[$i];
            $restaurant->Restaurant_rating = $Restaurant_rating[$i];
            $restaurant->description_en = $description_en[$i];
            $restaurant->description_ar = $description_ar[$i];
            $restaurant->phone_number = $phone_number[$i];
            $restaurant->email = $email[$i];
            $restaurant->facebook = $facebook[$i];
            $restaurant->instagram = $instagram[$i];
            $restaurant->youtube = $youtube[$i];
            $restaurant->twitter = $twitter[$i];
            $restaurant->website = $website[$i];
            $restaurant->working_time = $working_time[$i];
            $restaurant->save();
        }
    }
}
