<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DiscountController;
use Illuminate\Support\Facades\Route;

Route::resource('discounts', DiscountController::class);

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CustomerController;
Route::get('/', function () {
    return redirect('/customers');
});

Route::post('employees/login', [EmployeesController::class, 'login'])->name('employees.login');
Route::post('employees/logout', [EmployeesController::class. 'logout'])->name('employees.logout');

Route::get('employees/login', [EmployeesController::class, 'loginPage']);
Route::get('employees/logout', [EmployeesController::class, 'logout']);

Route::resource('managers', ManagerController::class);

Route::resource('employees', EmployeesController::class);
Route::resource('products', ProductController::class);
Route::resource('customers', CustomerController::class);
Route::resource('discounts', DiscountController::class);
