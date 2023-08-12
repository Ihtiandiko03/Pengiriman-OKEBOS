<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
    public function definition()
    {
        return [
            'nama' => fake()->name(),
            'perusahaan' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'email' => fake()->freeEmail(),
            'alamat' => fake()->address(),
            'kelurahan' => fake()->state(),
            'kecamatan' => fake()->cityPrefix(),
            'kabupatenkota' => fake()->city(),
            'provinsi' => fake()->country(),
            'email_verified_at' => now(),
            'password' => Hash::make('12345'), // password
            'remember_token' => Str::random(10),
            'referrer_id' => 1,
            'no_telephone' => fake()->phoneNumber(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
