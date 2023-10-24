<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['pending', 'processed', 'aborted',];
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'amount' => fake()->randomNumber(9),
            'status' => $statuses[rand(0, count($statuses) - 1)],
        ];
    }
}
