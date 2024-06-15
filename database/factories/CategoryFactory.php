<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'category_id' => null,
        ];
    }
    public function withParent(Category $parent)
    {
        return $this->state(function (array $attributes) use ($parent) {
            return [
                'category_id' => $parent->id,
            ];
        });
    }
}
