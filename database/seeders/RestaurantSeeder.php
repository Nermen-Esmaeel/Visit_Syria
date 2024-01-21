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
        $city_id = [2 ,8,1];
        $street_en = ['Ghasan-Harfosh ', 'Doar-Haron', 'Al-Ziraa'];
        $street_ar = ['دوار الشاطئ', 'دوار هارون', 'سيف الدولة'];
        $city_en = ['Damascus', 'lattakia', 'Aleppo'];
        $city_ar = ['دمشق', 'اللاذقية','حلب'];
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
        $title_en = ['Shams rose', 'Beroea' ,'Karma'];
        $title_ar = ['وردة الشام', 'بيرويا' ,'كارما'];
        $Restaurant_rating = [4,4,3];
        $description_en = [
            'It is a restaurant known for its Middle Eastern dishes made with fresh vegetables and cooked with love',
            'The Beroea Restaurant is located direct facing the side of the famous Aleppo Citadel',
            'It is a restaurant known for its Middle Eastern dishes made with fresh vegetables and cooked with love',
        ];
        $description_ar = [
            'إنه مطعم معروف بأطباقه الشرق أوسطية المصنوعة من الخضار الطازجة والمطبوخة بكل حب ',
            'إنه مطعم معروف بأطباقه الشرق أوسطية المصنوعة من الخضار الطازجة والمطبوخة بكل حب ',
            ' إنه مطعم معروف بأطباقه الشرق أوسطية المصنوعة من الخضار الطازجة والمطبوخة بكل حب ',
        ];
        $phone_number = ['+(963) 0987654321', '+(963) 0987654321', '+(963) 0987654321'];
        $email = ['Shams_rose@gmail.com', 'Beroea@gmail.com', 'Karma@gmail.com'];
        $facebook = ['Shams_rose@outlook.com', 'Beroea_resturant@outlook.com', 'Karma_resturant@outlook.com'];
        $instagram = ['Shams_rose@outlook.com', 'Beroea_resturant@outlook.com', 'Karma_resturant@outlook.com'];
        $youtube = ['Shams_rose@outlook.com', 'Beroea_resturant@outlook.com', 'Karma_resturant@outlook.com'];
        $twitter = ['Shams_rose@outlook.com', 'Beroea_resturant@outlook.com', 'Karma_resturant@outlook.com'];
        $website = ['www.Shams_rose.com', 'www.Beroea_resturant.com', 'www.Karma_resturant.com'];
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
