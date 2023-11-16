<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Albumn>
 */
class AlbumnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'albumn_name' => $this->faker->sentence(5),
            'number_songs' => $this->faker->numberBetween(1, 20),
            'cover_photo' => $this->faker->imageUrl(640,480, 'songs'),
            'short_description' => $this->faker->text(200)
        ];
    }
}
