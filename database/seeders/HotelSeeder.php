<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city_id = [8 ,8,8];
        $street_en = ['Bab Toma main Road', 'Blue Beach Road', 'Umayyad Square'];
        $street_ar = ['طريق باب توما الرئيسي', 'الشاطئ الأزرق', 'ساحة الامويين'];
        $city_en = ['Damascus', 'lattakia', 'Damascus'];
        $city_ar = ['دمشق', 'اللاذقية','دمشق'];
        $photo_cover = [
        'hotel_images/cover_images_16974493221.png',
        'hotel_images/cover_images_16974493221.png',
        'hotel_images/cover_images_16974493221.png'
        ];
        $photo_logo = [
            'hotel_images/logo_images_16974493221.png',
            'hotel_images/logo_images_16974493221.png',
            'hotel_images/logo_images_16974493221.png'
        ];
        $title_en = ['Beit Alwali Hotel', 'Blue Beach' ,'Dama Rose'];
        $title_ar = ['بيت الوالي', 'بلو بيتش' ,'داماروز'];
        $Hotel_rating = [4,4,3];
        $description_en = [
            'It is distinguished by its luxurious interior design and its unique location near tourist and historical landmarks. It consists of 40 rooms and suites',
            'Characterized by its pristine sand and clear blue waters, it is considered one of the most world-famous areas.It has 300 rooms and suites',
            'It features 150 rooms and suites, as well as a variety of restaurants, cafes and leisure facilities.',
        ];
        $description_ar = [
            'يتميز بتصميمه الداخلي الفخم وموقعه المميز بالقرب من المعالم السياحية والتاريخية.ويصم 40 غرفة وجناحاً',
            'ييتميز برماله النقية ومياهه الزرقاء الصافية، ويُعتبر أحد أكثر المناطق المشهورة عالميا.ويضم 300 غرفة وجناحاً ',
            ' يضم 150غرفة وجناحًا، بالإضافة إلى مجموعة متنوعة من المطاعم والمقاهي والمرافق الترفيهية. ',
        ];
        $phone_number = ['+(963) 0987654321', '+(963) 0987654321', '+(963) 0987654321'];
        $email = ['Beit_Alwali_Hotel@gmail.com', 'bluebeach@gmail.com', 'DamaRoze@gmail.com'];
        $facebook = ['Beit_Alwali_Hotel@outlook.com', 'bluebeach@outlook.com', 'DamaRoze@outlook.com'];
        $instagram = ['Beit_Alwali_Hotel@outlook.com', 'bluebeach@outlook.com', 'DamaRoze@outlook.com'];
        $youtube = ['Beit_Alwali_Hotel@outlook.com', 'bluebeach@outlook.com', 'DamaRoze@outlook.com'];
        $twitter = ['Beit_Alwali_Hotel@outlook.com', 'bluebeach@outlook.com', 'DamaRoze@outlook.com'];
        $website = ['www.Beit_Alwali_Hotel.com', 'www.bluebeach.com', 'www.DamaRoze.com'];
        $working_time = ['16/24', '16/24', '24/24'];

        for($i=0; $i<3;$i++) {
            $hotel=new Hotel();
            //governorates
            $hotel->city_id = $city_id[$i];
            $hotel->street_en =  $street_en[$i];
            $hotel->street_ar =  $street_ar[$i];
            $hotel->city_en =  $city_en[$i];
            $hotel->city_ar =  $city_ar[$i];
            $hotel->photo_cover = $photo_cover[$i];
            $hotel->photo_logo = $photo_logo[$i];
            $hotel->title_en = $title_en[$i];
            $hotel->title_ar = $title_ar[$i];
            $hotel->Hotel_rating = $Hotel_rating[$i];
            $hotel->description_en = $description_en[$i];
            $hotel->description_ar = $description_ar[$i];
            $hotel->phone_number = $phone_number[$i];
            $hotel->email = $email[$i];
            $hotel->facebook = $facebook[$i];
            $hotel->instagram = $instagram[$i];
            $hotel->youtube = $youtube[$i];
            $hotel->twitter = $twitter[$i];
            $hotel->website = $website[$i];
            $hotel->working_time = $working_time[$i];
            $hotel->save();
        }
    }
}
