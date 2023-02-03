<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::truncate();

        $faker = \Faker\Factory::create();

        $data = [];
        $skills = ['HTML', 'CSS', 'JavaScript', 'PHP', 'WordPress/CMS', 'Photoshop'];
        $values = [100, 90, 75, 80, 90, 55];
        
        for($i = 0; $i < 6; $i++) {
            $item = [
                'skill_name' => $skills[$i],
                'value' => $values[$i],
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            $data[] = $item;
        }

        Skill::insert($data);
    }
}
