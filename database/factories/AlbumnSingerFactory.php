<?php

namespace Database\Factories;

use App\Models\Albumn;
use App\Models\Singer;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'albumn_id' => $this->faker->randomElement(Albumn::pluck('albumn_id')->toArray()),
            'singer_id' => $this->faker->randomElement(Singer::pluck('singer_id')->toArray())
        ];
    }
}
