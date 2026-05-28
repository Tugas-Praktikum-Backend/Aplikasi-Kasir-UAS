<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ManagerController;

use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect('/managers');
});

Route::resource('managers', ManagerController::class);
Route::resource('products', ProductController::class);
