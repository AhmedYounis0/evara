<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 1, 9999.99),
            'offer' => $this->faker->randomFloat(2, 10),
            'short_description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'category_id' => Category::factory(),
            'brand_id' => Brand::factory(),
            'sku' => strtoupper(Str::random(8)),
            'stock' => $this->faker->randomFloat(2, 10),
        ];
    }
}
