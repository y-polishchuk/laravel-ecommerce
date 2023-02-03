<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::truncate();

        $faker = \Faker\Factory::create();

        $data = [];
        $names = ['Saul Goodman', 'Sara Wilsson', 'Jena Karlis', 'Matt Brandon', 'John Larson', 'Emily Harison'];
        $positions = ['Ceo & Founder', 'Designer', 'Store Owner', 'Freelancer', 'Entrepreneur', 'Store Owner'];
        
        for($i = 0; $i < 6; $i++) {
            $item = [
                'name' => $names[$i],
                'position' => $positions[$i],
                'text' => '<p>' .$faker->sentences(3, true) .'</p>',
                'photo' => $faker->imageUrl(),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            $data[] = $item;
        }

        Testimonial::insert($data);
    }
}
