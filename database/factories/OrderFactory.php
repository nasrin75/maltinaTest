<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
   
    public function definition(): array
    {
        return [
            'name' => fake()->title(),
            'status' => 'waiting',
            'price' => fake()->rand(100000,200000),
        ];
    }

   
}
