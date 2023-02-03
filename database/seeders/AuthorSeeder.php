<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::truncate();

        $faker = \Faker\Factory::create();

        $data = [];
        $authors = ['Lucy Smith', 'John McClane', 'Dan Brown', 'Joanne Rowling'];
        
        for($i = 0; $i < 4; $i++) {
            $item = [
                'full_name' => $authors[$i],
                'photo' => $faker->imageUrl(),
                'about' => $faker->sentences(4, true),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            $data[] = $item;
        }

        Author::insert($data);
    }
}
