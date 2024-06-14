<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogCategory::factory()
            ->count(10)
            ->has(Post::factory()->count(10))
            ->create();
    }
}