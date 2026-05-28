<?php

use App\Http\Controllers\DiscountController;
use Illuminate\Support\Facades\Route;

Route::resource('discounts', DiscountController::class);

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return redirect('/customers');
});
});

Route::resource('managers', ManagerController::class);
Route::resource('products', ProductController::class);
Route::resource('customers', CustomerController::class);