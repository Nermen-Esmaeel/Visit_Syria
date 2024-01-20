<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Room::create([
       'hotel_id' => 1 ,
       'content_en' => 'n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying',
       'content_ar' => 'أسِرّة مفردة متينه ومريحة بقياس  200× 110 سم الغرف المزدوجة بأسِرّة مفردة أو 200× 170 الغرف المزدوجه بسرير واحد بحجم كبير)',
       ]);
    }
}
