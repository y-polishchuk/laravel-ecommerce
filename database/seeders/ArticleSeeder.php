<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::truncate();

        $faker = \Faker\Factory::create();

        $data = [];
        
        for($i = 0; $i < 7; $i++) {
            $item = [
                'title' => ucfirst($faker->words(9, true)),
                'entry_content' => $faker->sentences(7, true),
                'entry_img' => $faker->imageUrl(),
                'main_content' => $faker->paragraphs(7, true),
                'category_id' => $faker->numberBetween(1,10),
                'author_id' => $faker->numberBetween(1,4),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            $data[] = $item;
        }

        Article::insert($data);
    }
}
