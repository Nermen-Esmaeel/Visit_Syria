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
        $street_en = ['Ghasan-Harfosh ', 'Doar-Haron', 'Al-Ziraa'];
        $street_ar = ['غسان حرفوش', 'دوار هارون', 'الزراعة'];
        $city_en = ['lattakia', 'lattakia', 'lattakia'];
        $city_ar = ['اللاذقية', 'اللاذقية','اللاذقية'];
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
        $title_en = ['mermar', 'Haron' ,'Zanobia'];
        $title_ar = ['ميرامار', 'هارون' ,'زنوبيا'];
        $Hotel_rating = [4,4,3];
        $description_en = [
            'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
            'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
            'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
        ];
        $description_ar = [
            'إنشاء وتصميم نظام يعمل كوسيط بين الزبون والمطعم لتوفير خدمة طلب الطعام من خلاله بسهولة ودون تكاليف ,  يستطيع الزبون حجز طاولة في المطعم عبر الانترنت حيث يقوم الزبون بتسجيل دخوله بشكل آمن إلى النظام  يستطيع الزبون طلب ',
            'إنشاء وتصميم نظام يعمل كوسيط بين الزبون والمطعم لتوفير خدمة طلب الطعام من خلاله بسهولة ودون تكاليف ,  يستطيع الزبون حجز طاولة في المطعم عبر الانترنت حيث يقوم الزبون بتسجيل دخوله بشكل آمن إلى النظام  يستطيع الزبون طلب ',
            'إنشاء وتصميم نظام يعمل كوسيط بين الزبون والمطعم لتوفير خدمة طلب الطعام من خلاله بسهولة ودون تكاليف ,  يستطيع الزبون حجز طاولة في المطعم عبر الانترنت حيث يقوم الزبون بتسجيل دخوله بشكل آمن إلى النظام  يستطيع الزبون طلب ',
        ];
        $phone_number = ['+(963) 0987654321', '+(963) 0987654321', '+(963) 0987654321'];
        $email = ['meramar@gmail.com', 'haron@gmail.com', 'zanobia@gmail.com'];
        $facebook = ['Mermar_Hotel@outlook.com', 'Haron_Hotel@outlook.com', 'Zanobia_Hotel@outlook.com'];
        $instagram = ['Mermar_Hotel@outlook.com', 'Haron_Hotel@outlook.com', 'Zanobia_Hotel@outlook.com'];
        $youtube = ['Mermar_Hotel@outlook.com', 'Haron_Hotel@outlook.com', 'Zanobia_Hotel@outlook.com'];
        $twitter = ['Mermar_Hotel@outlook.com', 'Haron_Hotel@outlook.com', 'Zanobia_Hotel@outlook.com'];
        $website = ['www.meramarhotel.com', 'www.haronhotel.com', 'www.zanobiahotel.com'];
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
