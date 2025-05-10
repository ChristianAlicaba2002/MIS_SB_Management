<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    protected $model = Products::class;

    public function definition()
    {
        return [
            'Itemcode' => $this->faker->unique()->randomNumber(6),
            'Item_Name' => $this->faker->word(),
            'Description' => $this->faker->sentence(),
            'Category' => $this->faker->randomElement(['Electronics', 'Clothing', 'Accessories']),
            'Unit_Price' => $this->faker->randomFloat(2, 10, 500),
            'Quantity' => $this->faker->numberBetween(1, 100),
            'Image' => 'default.jpg',
        ];
    }
}

