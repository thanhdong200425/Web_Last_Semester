<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Song;
use App\Models\Singer;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SongSinger>
 */
class SongSingerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        do {
            $song_id = $this->faker->randomElement(Song::pluck('song_id')->toArray());
            $singer_id = $this->faker->randomElement(Singer::pluck('singer_id')->toArray());
        } while (DB::table('song_singers')->where('song_id', '=', $song_id)->where('singer_id', '=', $singer_id)->exists());

        return [
            'song_id' => $song_id,
            'singer_id' => $singer_id
        ];
    }
}
