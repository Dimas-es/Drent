<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->phoneNumber(),
            'password' => Hash::make('password123'), // Password default
            'address' => $this->faker->address(),
            'driver_license_number' => Str::random(10),
            'license_expiry_date' => $this->faker->date(),
            'ktp_photo' => null, // Bisa diganti dengan path gambar jika diperlukan
            'license_photo' => null, // Bisa diganti dengan path gambar jika diperlukan
            'verification_status' => $this->faker->boolean(),
        ];
    }
}
