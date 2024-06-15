<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'header'    => $this->faker->sentence,
            'title'     => $this->faker->paragraph,
            'content'   =>  $this->faker->text(),
            'url'       => $this->faker->url,
            'image' => $this->faker->imageUrl(800, 600, 'business', true, 'Faker'),
        ];
    }
}
