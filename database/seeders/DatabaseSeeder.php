<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
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
        User::factory(10)->create();
        Article::factory(10)->create();
        Category::create([
            'name' => 'Programming',
            'slug' => Str::slug('programming'),
            'user_id' => mt_rand(1,10),
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => Str::slug('web-design'),
            'user_id' => mt_rand(1,10),
        ]);
        Category::create([
            'name' => 'Web Programming',
            'slug' => Str::slug('web-programming'),
            'user_id' => mt_rand(1,10),
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
