<?php

use App\Http\Controllers\DiscountController;
use Illuminate\Support\Facades\Route;

Route::resource('discounts', DiscountController::class);

Route::get('/', function () {
    return redirect('/managers');
});