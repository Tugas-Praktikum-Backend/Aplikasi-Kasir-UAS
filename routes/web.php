<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\ShiftController;
use App\Models\Shift;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
Route::resource('discounts', DiscountController::class);

Route::get('/', function () {
    return view('index');
})->name('home');


Route::get('employees/login', [EmployeesController::class, 'loginPage']);
Route::post('employees/login', [EmployeesController::class, 'login'])->name('employees.login');
Route::prefix('employees')->middleware(['auth:employee'])->group(function(){
    Route::get('/', [EmployeesController::class, 'index'])->name('employees.index');
    Route::get('/logout', [EmployeesController::class, 'logout'])->name('employees.logout');

    Route::get('/salary', [EmployeesController::class, 'salaryPage'])->name('employees.salary');

    Route::get('/shifts', [ShiftController::class, 'index'])->name('employees.shift');
    Route::get('/shifts/start', [ShiftController::class, 'startShift'])->name('employees.start_shift');
    Route::get('/shifts/end', [ShiftController::class, 'endShift'])->name('employees.stop_shift');

    Route::fallback(fn() => redirect()->route('employees.index'));
});


// Customer Authenication
Route::get('customers/login', [CustomerAuthController::class, 'showLogin'])->name('customer.login');
Route::post('customers/login', [CustomerAuthController::class, 'login']);
Route::post('customers/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
Route::get('/customers/signup', [CustomerController::class, 'create'])->name('customer.register');
Route::post('/customers/signup', [CustomerAuthController::class, 'signup'])->name('customers.store');

Route::get('login', function () {
    return redirect()->route('customer.login');
})->name('login');

Route::get('/customers/vulnerable', function () {
    $name = request('name');
    $user = DB::select("SELECT * FROM customers WHERE name = ?", [$name]);
    return $user;
});

// Customer menggunakan middleware agar harus login untuk ke dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/customers/dashboard', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/topup', [CustomerController::class, 'topup'])->name('customers.topup');
    Route::get('/customers/metodepembayaran', [CustomerController::class, 'metode'])->name('customers.metode');
    Route::redirect('/customers', '/customers/dashboard');
});
