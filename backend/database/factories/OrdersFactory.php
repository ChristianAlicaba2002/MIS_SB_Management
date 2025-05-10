<?php

namespace Database\Factories;

use App\Models\Orders;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersFactory extends Factory
{
    protected $model = Orders::class;

    public function definition()
    {
        return [
            'productID' => $this->faker->randomNumber(6),
            'productName' => $this->faker->word(),
            'productCategory' => $this->faker->randomElement(['Electronics', 'Furniture', 'Clothing']),
            'productPrice' => $this->faker->randomFloat(2, 50, 5000),
            'productDate' => $this->faker->date(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'total_price' => function (array $attributes) {
                return $attributes['productPrice'] * $attributes['quantity'];
            },
            'productImage' => $this->faker->imageUrl(),
        ];
    }
}
