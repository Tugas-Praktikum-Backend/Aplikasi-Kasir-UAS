<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
Route::resource('discounts', DiscountController::class);

Route::get('/', function () {
    return view('index');
});

Route::post('employees/login', [EmployeesController::class, 'login'])->name('employees.login');
Route::post('employees/logout', [EmployeesController::class. 'logout'])->name('employees.logout');
Route::get('employees/login', [EmployeesController::class, 'loginPage']);
Route::get('employees/logout', [EmployeesController::class, 'logout']);


//Customer
Route::get('customers/metodepembayaran', [CustomerController::class, 'metode']);
Route::get('customers/topup', [CustomerController::class, 'topup'])->name('customers.topup');
Route::get('customers/metodepembayaran', [CustomerController::class, 'metode'])->name('customers.metode');
Route::post('customers/login', [CustomerController::class, 'login'])->name('customers.login');
Route::get('/customers/dashboard', [CustomerController::class, 'index'])->name('customers.dashboard');

Route::resource('customers', CustomerController::class);

Route::get('/customers', function () {
    return redirect()->route('customers.dashboard');
});