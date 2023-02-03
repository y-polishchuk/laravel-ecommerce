<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::truncate();

        $faker = \Faker\Factory::create();

        $data = [];
        
        for($i = 1; $i <= 6; $i++) {
            $item = [
                'title' => $faker->sentence(3),
                'page_id' => 'home',
                'description' => $faker->sentences(4, true),
                'image' => $faker->imageUrl(),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            if ($i > 3) {
                $item['page_id'] = 'user';
            }
            $data[] = $item;
        }

        Slider::insert($data);
    }
}
