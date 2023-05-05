<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('api::auth')
->get('/order', function (Request $request) {
    return $request->user();
});
