<?php

namespace App\Http\Requests\Admin\Order;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class ChangeStatusRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
      return [
        'orderID'=>'required|integer',
        'status'=>'required|in:' . implode(',', Order::$statusMap),
      ];
    }
}
