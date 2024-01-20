<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServicesSeeder extends Seeder
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

        for($i=0; $i<3;$i++) {
            $service=new Service();
            $service->hotel_id = $hotel_id[$i];
            $service->restaurant_id = $restaurant_id[$i];
            $service->name_en = $name_en[$i];
            $service->name_ar = $name_ar[$i];
            $service->save();
        }
    }
}
