<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotel_id      = [1, 2, 3];
        $restaurant_id = [1, 2, 3];
        $name_en       = ['WiFi', 'room_services', 'Tv'];
        $name_ar       = ['انترنت', 'خدمة الغرف', 'تلفزيون'];
        $value         = [2.76, 2.7, 3.8];
        $rating_count  = [9, 9, 8];

        for($i=0; $i<3;$i++) {
            $rate=new Rating();
            $rate->hotel_id = $hotel_id[$i];
            $rate->restaurant_id = $restaurant_id[$i];
            $rate->name_en = $name_en[$i];
            $rate->name_ar = $name_ar[$i];
            $rate->value = $value[$i];
            $rate->rating_count = $rating_count[$i];
            $rate->save();
        }
    }
}
