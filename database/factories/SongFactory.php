<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'song_name' => $this->faker->words(3, true),
            'lyric' => $this->faker->text(200),
            'cover_photo' => $this->faker->imageUrl(640, 480),
        ];
    }
}
