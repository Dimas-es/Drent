<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\User;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        $startDate = Carbon::now()->addDays(rand(1, 10));
        $endDate = (clone $startDate)->addDays(rand(1, 5));

        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'car_id' => Car::inRandomOrder()->first()->id ?? Car::factory(),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'canceled', 'completed']),
        ];
    }
}
