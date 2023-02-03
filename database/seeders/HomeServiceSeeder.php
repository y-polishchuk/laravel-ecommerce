<?php

namespace Database\Seeders;

use App\Models\HomeService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeService::truncate();

        $faker = \Faker\Factory::create();

        $data = [];
        $icon_colors = ['blue', 'orange', 'pink', 'yellow', 'red', 'teal'];
        $icon_forms = ['globe', 'file', 'tachometer', 'layer', 'slideshow', 'arch'];


        for($i = 0; $i < 6; $i++) {
            $item = [
                'title' => ucwords($faker->words(2, true)),
                'description' => $faker->sentence(10),
                'icon_color' => $icon_colors[$i],
                'icon_form' => $icon_forms[$i],
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            $data[] = $item;
        }

        HomeService::insert($data);
    }
}
