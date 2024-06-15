<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create root categories
        Category::factory(5)->create()->each(function ($category) {
            // Create subcategories for each root category
            Category::factory(3)->withParent($category)->create();
        });
    }
}
