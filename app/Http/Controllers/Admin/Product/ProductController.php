<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\AddRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function add(AddRequest $request)
    {
        $inputs = $request->only([
            'name',
            'price',
            'customOption',
        ]);

        $product =  Product::create([
            'name' => $inputs['name'],
            'price' => $inputs['price'],
            'custom_option' => $inputs['customOption'],
        ]);
        return [
            'status' => 200,
            'data' => $product,
        ];
    }
}
