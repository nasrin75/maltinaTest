<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Panel')->group(function () {
Route::namespace('Order')->prefix('order')->group(function () {
    Route::get('/', 'OrderController@orderList');
    Route::post('/add', 'OrderController@add');
    Route::put('/changeStatus', 'OrderController@changeWaitingStatus');
    Route::put('/cancel', 'OrderController@cancel');
});
    Route::get('/product', 'product\ProductController@allProducts');
});

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::put('/order/changeStatus', 'Order\OrderController@changeStatus');
    Route::post('/product/add', 'product\ProductController@add');
});
