<?php

use App\Http\Controllers\DiscountController;
use Illuminate\Support\Facades\Route;

Route::resource('discounts', DiscountController::class);

use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect('/managers');
});
});

Route::resource('managers', ManagerController::class);
Route::resource('products', ProductController::class);
