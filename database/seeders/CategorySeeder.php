<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $faker = \Faker\Factory::create();

        $data = [];
        $categories = ['General', 'Lifestyle', 'Travel', 'Design', 'Creative', 'Education', 'Business', 'News', 'Sport', 'Internet'];
        
        for($i = 0; $i < 10; $i++) {
            $item = [
                'user_id' => 1,
                'category_name' => $categories[$i],
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            $data[] = $item;
        }

        Category::insert($data);
    }
}
