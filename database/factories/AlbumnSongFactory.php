<?php

namespace Database\Factories;

use App\Models\Albumn;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AlbumnSong>
 */
class AlbumnSongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'albumn_id' => $this->faker->randomElement(Albumn::pluck('albumn_id')->toArray()),
            'song_id' => $this->faker->randomElement(Song::pluck('song_id')->toArray())
        ];
    }
}
