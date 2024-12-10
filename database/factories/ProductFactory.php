<?php

namespace Database\Factories;

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
            'name'=> $this->faker->sentence(3),
            'description' => $this->faker->text(400),
            'price' => $this->faker->randomFloat(2,1,1000),
            'stock' => fake()->randomNumber(3,false),
            'sale' => fake()->randomNumber(2,false),
            'category_id' => fake()->numberBetween(1,9),
            'image' => 'products/defecto.jpg',
            // 'image' => 'products/' . $this->faker->image('public/storage/products', 640, 480 , products, false), //products/1.jpg
        ];
    }
}
