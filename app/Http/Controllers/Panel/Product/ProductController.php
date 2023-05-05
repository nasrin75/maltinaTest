<?php

namespace App\Http\Controllers\Panel\Product;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Product;

class ProductController extends Controller
{
    public function allProducts()
    {
        $products = [];
        foreach (Product::all() as $product) {
            array_push($products, [
                'name' => $product->name,
                'option' => Option::where('custom_option_id', Product::getCustomOptionIdByName($product->custom_option))
                    ->pluck('title')
            ]);
        }
        return [
            'status' => 200,
            'data' => $products,
        ];
    }
}
