<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Tạo 20 bản ghi mẫu cho bảng "banner"
        for ($i = 1; $i <= 10; $i++) {
            DB::table('banners')->insert([
                'name' => 'Banner ' . $i,
                'image' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}