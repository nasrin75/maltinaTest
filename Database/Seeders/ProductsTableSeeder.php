<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Latte',
                'custom_option' => 2,
                'price' => 30000,
            ],
            [
                'id' => 2,
                'name' => 'Cappuccino',
                'custom_option' => 1,
                'price' => 30000,
            ],
            [
                'id' => 3,
                'name' => 'Espresso',
                'custom_option' => 3,
                'price' => 30000,
            ],
            [
                'id' => 4,
                'name' => 'Hot chocolate',
                'custom_option' => 1,
                'price' => 30000,
            ],
            [
                'id' => 5,
                'name' => 'Cookie',
                'custom_option' => 4,
                'price' => 30000,
            ],
            [
                'id' => 6,
                'name' => 'Tea',
                'custom_option' => 6,
                'price' => 30000,
            ],
            [
                'id' => 7,
                'name' => 'All',
                'custom_option' => 5,
                'price' => 30000,
            ],

        ];

        foreach ($products as $key => $product) {
            Product::create([
                'id' => $product['id'],
                'name' => $product['name'],
                'custom_option' => $product['custom_option'],
                'price' => $product['price'],
            ]);
        }
    }
}
