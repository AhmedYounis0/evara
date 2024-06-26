<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4,6),
            'slug'=> fake()->slug,
            'description' => fake()->text(),
            'image'=> fake()->name(),
            'views' => fake()->randomDigit(),
            'user_id' => User::factory(),

        ];
    }
}
