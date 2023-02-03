<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::truncate();

        $faker = \Faker\Factory::create();

        $data = [];
        $colors = ['#ffbb2c', '#5578ff', '#e80368', '#e361ff', '#47aeff', '#ffa76e', '#11dbcf', '#4233ff', '#b2904f', '#b20969', '#ff5828', '#29cc61'];
        $forms = ['store', 'bar-chart-box', 'calendar-todo', 'paint-brush', 'database-2', 'gradienter', 'file-list-3', 'price-tag-2', 'anchor', 'disc', 'base-station', 'fingerprint'];
        
        for($i = 0; $i < 12; $i++) {
            $item = [
                'title' => ucwords($faker->words(2, true)),
                'color' => $colors[$i],
                'form' => $forms[$i],
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            $data[] = $item;
        }

        Feature::insert($data);
    }
}
