<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FAQ::truncate();

        $faker = \Faker\Factory::create();

        $data = [];
        
        for($i = 1; $i <= 5; $i++) {
            $item = [
                'question' => ucfirst($faker->words($faker->numberBetween(7,10), true)) . '?',
                'answer' => $faker->sentences($faker->numberBetween(3,5), true),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            $data[] = $item;
        }

        FAQ::insert($data);
    }
}
