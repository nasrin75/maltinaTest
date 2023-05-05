<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\ChangeStatusRequest;
use App\Models\Order;
use App\Notifications\ReportOrderStatusNotification;

class OrderController extends Controller
{
    public function list()
    {
        return [
            'status' => 200,
            'data' => Order::all()
        ];
    }

    public function changeStatus(ChangeStatusRequest $request)
    {
        $response = [
            'status' => 400,
            'message' => 'ORDER_NOT_FOUND',
        ];

        $inputs = $request->only([
            'orderID',
            'status',
        ]);

        $order = Order::find($inputs['orderID']);
        if (empty($order)) {
            return $response;
        }

        $order->update([
            'status' => Order::getStatusIdByName($inputs['status'])
        ]);

        // notify user
        $order->user->notify(new ReportOrderStatusNotification($inputs['status']));

        return [
            'status' => 200,
            'message' =>'SUCCESS'
        ];
    }
}
