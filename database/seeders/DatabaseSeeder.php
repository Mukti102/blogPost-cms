<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blogs;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Role;
use App\Models\Settings;
use App\Models\Tag;
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
        \App\Models\User::factory(10)->create();

        Blogs::factory(50)->create();
        Tag::factory(10)->create();
        Category::create([
            'name' => 'general',
            'slug' => 'General'
        ]);
        Category::create([
            'name' => 'programing',
            'slug' => 'Programing'
        ]);
        Category::create([
            'name' => 'education',
            'slug' => 'Education'
        ]);
        Category::create([
            'name' => 'learning language',
            'slug' => 'Learning language'
        ]);

        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'user'
        ]);

        Settings::create([
            'whatsApp' => '081336920647',
        ]);
    }
}
