<?php

use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ManagerController;

Route::get('/', function () {
    return redirect('/managers');
});

Route::post('employees/login', [EmployeesController::class, 'login'])->name('employees.login');
Route::post('employees/logout', [EmployeesController::class. 'logout'])->name('employees.logout');

Route::get('employees/login', [EmployeesController::class, 'loginPage']);
Route::get('employees/logout', [EmployeesController::class, 'logout']);

Route::resource('managers', ManagerController::class);

Route::resource('employees', EmployeesController::class);
