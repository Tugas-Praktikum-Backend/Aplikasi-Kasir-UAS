<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
Route::resource('customers', CustomerController::class);
Route::resource('discounts', DiscountController::class);

Route::get('/', function () {
    return view('index');
});

Route::post('employees/login', [EmployeesController::class, 'login'])->name('employees.login');
Route::post('employees/logout', [EmployeesController::class. 'logout'])->name('employees.logout');
Route::get('employees/login', [EmployeesController::class, 'loginPage']);
Route::get('employees/logout', [EmployeesController::class, 'logout']);
Route::post('customers/login', [CustomersController::class, 'login'])->name('customers.login');

// Manager
Route::post('manager/dashboard', [ManagerController::class, 'index'])->name('manager.home');