<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Singer>
 */
class SingerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'singer_name' => $this->faker->name(),
            'stage_name' => $this->faker->lastName(),
            'dob' => $this->faker->date(),
            'short_description' => $this->faker->text(200),
            'country' => $this->faker->country(),
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Other'])
        ];
    }
}
