<?php

namespace Database\Factories;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        return [
            // 'prod_name' => $this->faker->name(),
            'prod_name' => 'Samsung',
            'prod_desc' => $this->faker->unique()->safeEmail(),
            'price' => '10000',
            'category_id' => '2',
            'image' => '62598b12c810b2215samsung-galaxy-a52.jpg',
            'old_price' => '1000',
            'short_desc' => $this->faker->name()
        ];
    }
}
