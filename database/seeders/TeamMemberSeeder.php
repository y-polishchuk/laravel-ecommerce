<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeamMember::truncate();

        $faker = \Faker\Factory::create();

        $data = [];
        $names = ['Ross Geller', 'Monica Geller', 'Chandler Bing', 'Rachel Green'];
        $positions = ['Chief Executive Officer', 'Product Manager', 'CTO', 'Accountant'];
        
        for($i = 0; $i < 4; $i++) {
            $item = [
                'name' => $names[$i],
                'position' => $positions[$i],
                'photo' => $faker->imageUrl(),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            if ($i > 3) {
                $item['page_id'] = 'user';
            }
            $data[] = $item;
        }

        TeamMember::insert($data);
    }
}
