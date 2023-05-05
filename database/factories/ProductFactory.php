<?php

namespace Database\Factories;

use App\Models\Option;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
   
    public function definition(): array
    {
        return [
            'user_id' =>  User::all(['id'])->random(),
            'product_id' =>  Product::all(['id'])->random(),
            'option_id' =>  Option::all(['id'])->random(), //TODO::
            'price' => fake()->rand(100000,200000),
        ];
    }

   
}
