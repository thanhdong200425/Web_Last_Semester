<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName(),
            'password' => $this->faker->password(),
            'email' => $this->faker->safeEmail(),
            'role' => $this->faker->randomElement(['0', '1']),
            'gender' => $this->faker->randomElement(['0', '1']),
            'dob' => $this->faker->date(),
            'cover_photo' => $this->faker->imageUrl(),
            'country' => $this->faker->country(),
            'phone_number' => substr($this->faker->phoneNumber(), 0, 10)
        ];
    }
}
