<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        $faker = \Faker\Factory::create();

        $data = [];
        $tags = ['App', 'IT', 'Business', 'Design', 'Office', 'Creative', 'Studio', 'Smart', 'Tips', 'Marketing', 'Cars', 'Sport'];
        
        for($i = 0; $i < 12; $i++) {
            $item = [
                'name' => $tags[$i],
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            $data[] = $item;
        }

        Tag::insert($data);
    }
}
