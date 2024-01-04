<?php

namespace Database\Factories;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlaylistSong>
 */
class PlaylistSongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "playlist_id" => $this->faker->randomElement(Playlist::pluck('playlist_id')->toArray()),
            "song_id" => $this->faker->randomElement(Song::pluck('song_id')->toArray())
        ];
    }
}
