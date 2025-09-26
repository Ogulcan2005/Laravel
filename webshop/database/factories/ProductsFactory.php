<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'=> fake()->words(nb:3, asText:3),
            'description'=> fake()->sentence(),
            'price'=> fake()->numberBetween(40, 40000)
        ];
    }
}
