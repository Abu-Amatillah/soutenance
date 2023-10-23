<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->sentence(),
            'description'=> fake()->sentences(3, true),
            'information'=> fake()->paragraph(4, true),
            'quantity'=> fake()->randomNumber(4),
            'price'=> fake()->randomNumber(6),
            'weight'=> fake()->randomFloat(2, 0, 100),
            'category_id'=> Category::inRandomOrder()->first()->id,
        ];
    }
}
