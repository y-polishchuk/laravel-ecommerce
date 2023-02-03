<?php

namespace Database\Seeders;

use App\Models\Multipic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MultipicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Multipic::truncate();

        $faker = \Faker\Factory::create();

        $data = [];
        
        for($i = 1; $i <= 12; $i++) {
            $item = [
                'image' => $faker->imageUrl(),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            $data[] = $item;
        }

        Multipic::insert($data);
    }
}
