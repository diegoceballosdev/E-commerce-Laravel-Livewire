<?php

namespace Database\Factories;

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
        return [
            'user_id'=> 1,
            'buyer_name'=> fake()->name(),
            'buyer_surname'=> fake()->name(),
            'buyer_dni'=> fake()->numberBetween(10000000,40000000),
            'buyer_tel'=> fake()->numberBetween(4232208,5555555),

            'products' => [1,1,1,2],

            'shipping_address' => [$this->faker->sentence(3),"capital","salta",4400],
            'shipping_status' => "PENDIENTE",

            'payment_method' => "Tarjeta",
            'payment_total' => $this->faker->randomFloat(2,1,1000),

            'order_status' => "PENDIENTE",
        ];
    }
}
