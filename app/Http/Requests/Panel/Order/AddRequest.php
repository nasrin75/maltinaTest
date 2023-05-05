<?php

namespace App\Http\Requests\Panel\Order;


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
            'productID' => 'required|integer',
            'optionID' => 'required|integer',
        ];
    }
}
