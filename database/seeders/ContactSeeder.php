<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::truncate();

        $faker = \Faker\Factory::create();

        $data = [];

            $item = [
                'address' => 'Kyiv, Ukraine',
                'email' => 'yanush.polishchuk@gmail.com',
                'phone' => '+380954841127',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            $data[] = $item;

        Contact::insert($data);
    }
}
