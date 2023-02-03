<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::truncate();

        $faker = \Faker\Factory::create();

        $data = [];
        $brand_name = $faker->randomElement(['Porsche', 'Ferrari', 'Audi', 'McLaren']);
        
        for($i = 1; $i <= 4; $i++) {
            $item = [
                'brand_name' => $brand_name,
                'brand_image' => $faker->imageUrl(),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            $data[] = $item;
        }

        Brand::insert($data);
    }
}
