<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'user',
            'firstname' => 'User',
            'lastname' => 'User',
            'email' => 'admin@argon.com',
            'password' => bcrypt('secret'),
            'photo'    => 'User_images/user_image_2333.jpg',
        ]);

        DB::table('admins')->insert([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret'),
        ]);

        $this->call([
            CitySeeder::class,
            HotelSeeder::class,
            RestaurantSeeder::class,
            SiteSeeder::class,
            ServicesSeeder::class,
            RatingSeeder::class,
            RoomSeeder::class,
            OfferSeeder::class,
            LandingPageSeeder::class,

        ]);
    }
}
