<?php

namespace App\Http\Requests\Admin\Product;


use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }


    public function rules()
    {
      return [
        'name'=>'required|string',
        'price'=>'required|numeric',
        'customOption'=>'nullable|in:' . implode(',', Product::$customOptionMap),
      ];
    }
}
