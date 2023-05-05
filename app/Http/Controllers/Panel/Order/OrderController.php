<?php

namespace App\Http\Controllers\Panel\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\ChangeStatusRequest;
use App\Http\Requests\Panel\Order\AddRequest;
use App\Models\Option;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function orderList()
    {
        $orders = [];
        foreach (auth()->user()->orders() as $order) {
            array_push($orders, [
                'product' => $order->product->name,
                'price' => $order->price,
                'status' => $order->status
            ]);
        }

        return [
            'status' => 200,
            'data' => $orders,
        ];
    }

    public function add(AddRequest $request)
    {
        $response = [
            'status' => 400,
            'message' => null,
        ];

        $inputs = $request->only([
            'productID',
            'optionID',
        ]);


        $product = Product::find($inputs['productID']);
        if (empty($product)) {
            $response['message'] = 'PRODUCT_NOT_FOUND';
            return $response;
        }

        // this option user selected we have to in product's custom options
        $option = Option::where('id', $inputs['optionID'])
            ->first();
        if (empty($option) || ($option->custom_option_id != Product::getCustomOptionIdByName($product->custom_option))) {
            $response['message'] = 'OPTION_NOT_FOUND';
            return $response;
        }

        Order::create([
            'user_id' => auth()->id(),
            'product_id' => $inputs['productID'],
            'option_id' => $inputs['optionID'],
            'price' => $product->price,
        ]);

        $response['status'] = 200;
        return $response;
    }

    public function changeWaitingStatus(ChangeStatusRequest $request)
    {
        $response = [
            'status' => 400,
            'message' => null,
        ];

        $inputs = $request->only([
            'orderID',
            'status',
        ]);

        $order = auth()->user()->orders()
            ->where('id', $inputs['orderID'])
            ->first();
        if (empty($order)) {
            $response['message'] = 'ORDER_NOT_FOUND';
            return $response;
        }

        if ($order->status != Order::getStatusIdByName('waiting')) {
            $response['message'] = 'ORDER_STATUS_CAN_NOT_CHANGE';
            return $response;
        }
        $order->update([
            'status' => Order::getStatusIdByName($inputs['status'])
        ]);

        $response['status'] = 200;
        return $response;
    }


    public function cancel($orderID)
    {
        $response = [
            'status' => 400,
            'message' => null,
        ];

        $order = auth()->user()->orders()
            ->where('id', $orderID)
            ->first();
        if (empty($order)) {
            $response['message'] = 'ORDER_NOT_FOUND';
            return $response;
        }

        //  for cancel order i add new status for orders that show how many of orders canceled
        // if we want to delete this order use this code $order->delete()
        $order->update([
            'status' => Order::getStatusIdByName('canceled')
        ]);

        $response['status'] = 200;
        return $response;
    }
}
