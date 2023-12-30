<?php

namespace Database\Factories;

use App\Models\Albumn;
use App\Models\Singer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AlbumnSinger>
 */
class AlbumnSingerFactory extends Factory
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
            $singer_id = $this->faker->randomElement(Singer::pluck('singer_id')->toArray());
        } while (DB::table('albumn_singers')->where('albumn_id', '=', $albumn_id)->where('singer_id', '=', $singer_id)->exists());

        return [
            'albumn_id' => $albumn_id,
            'singer_id' => $singer_id
        ];
    }
}
