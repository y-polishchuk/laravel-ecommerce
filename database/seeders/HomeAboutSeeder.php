<?php

namespace Database\Seeders;

use App\Models\HomeAbout;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeAbout::truncate();

        $faker = \Faker\Factory::create();

        $data = [];
        
            $item = [
                'title' => 'LORUM IPSUM LABORUM DELENITI VELITENA',
                'short_des' => '<p>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave</p>',
                'long_des' => '<p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                <ul class="tox-checklist">
                <li>- Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
                <li>- Duis aute irure dolor in reprehenderit in voluptate velit</li>
                <li>- Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            $data[] = $item;


            HomeAbout::insert($data);
    }
}
