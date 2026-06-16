<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
Route::resource('customers', CustomerController::class);
Route::resource('discounts', DiscountController::class);
Route::resource('employees', EmployeesController::class);

Route::get('/', function () {
    return view('index');
});

Route::post('employees/login', [EmployeesController::class, 'login'])->name('employees.login');
Route::post('customers/login', [CustomersController::class, 'login'])->name('customers.login');