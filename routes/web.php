<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ManagerController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return redirect('/customers');
});

Route::resource('managers', ManagerController::class);
Route::resource('products', ProductController::class);
Route::resource('customers', CustomerController::class);