<?php

use App\Http\Controllers\DiscountController;

s
Route::resource('discounts', DiscountController::class);

Route::get('/', function () {
    return redirect('/managers');
});

Route::resource('managers', ManagerController::class);
