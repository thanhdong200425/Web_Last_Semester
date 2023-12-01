<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
        $password = $this->faker->password(8, 25);
        return [
            'username' => $this->faker->userName(),
            'origin_password' => $password,
            'password' => Hash::make($password),
            'email' => $this->faker->safeEmail(),
            'role' => $this->faker->randomElement(['0', '1']),
            'gender' => $this->faker->randomElement(['0', '1']),
            'dob' => $this->faker->date(),
            'cover_photo' => $this->faker->imageUrl(),
            'country' => $this->faker->country(),
            'phone_number' => substr($this->faker->phoneNumber(), 0, 10),
            'is_active' => $this->faker->randomElement(['0', '1']),
            'refresh_token' => $this->faker->password(20, 30),
            'access_token' => $this->faker->password(20, 30),
            'facebook' => $this->faker->url(),
            'instagram' => $this->faker->url(),
            'twitter' => $this->faker->url(),
            'tiktok' => $this->faker->url(),
            'youtube' => $this->faker->url(),
            'remember_token' => $this->faker->password(20, 30),
        ];
    }
}
