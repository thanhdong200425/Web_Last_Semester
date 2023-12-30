<?php

namespace Database\Factories;

use App\Models\Albumn;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
        do {
            $albumn_id = $this->faker->randomElement(Albumn::pluck('albumn_id')->toArray());
            $song_id = $this->faker->randomElement(Song::pluck('song_id')->toArray());
        } while (DB::table('albumn_songs')->where('albumn_id', '=', $albumn_id)->where('song_id', '=', $song_id)->exists());

        return [
            'albumn_id' => $albumn_id,
            'song_id' => $song_id
        ];
    }
}
