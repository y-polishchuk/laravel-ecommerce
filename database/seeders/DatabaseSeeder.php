<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SliderSeeder::class, 
            BrandSeeder::class, 
            HomeAboutSeeder::class, 
            HomeServiceSeeder::class, 
            MultipicSeeder::class,
            ContactSeeder::class,
            SkillSeeder::class,
            TeamMemberSeeder::class,
            CategorySeeder::class,
            AuthorSeeder::class,
            ArticleSeeder::class,
            FeatureSeeder::class,
            TagSeeder::class,
            PriceSeeder::class,
            FAQSeeder::class,
            TestimonialSeeder::class,
            AdminSeeder::class,
            UserSeeder::class
        ]);
        //\App\Models\Admin::factory()->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
