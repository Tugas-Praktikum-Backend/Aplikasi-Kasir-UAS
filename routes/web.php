<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ShiftController;
use App\Models\Shift;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\CustomerPaymentMethodController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
Route::resource('discounts', DiscountController::class);
Route::resource('categories', CategoryController::class);

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

Route::get('/inventory', [ProductController::class, 'inventory'])->name('inventory');


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
    Route::redirect('/customers', '/customers/dashboard');
    Route::get('/customers/paymentmethods/{paymentmethod}/topup', [CustomerPaymentMethodController::class, 'topup'])->name('paymentmethods.topup');
    Route::resource('customers/paymentmethods', CustomerPaymentMethodController::class);
});

Route::redirect('/managers', '/managers/dashboard');
Route::get('/managers/dashboard', [ManagerController::class, 'index'])->name('managers.index');
Route::get('/managers/manageemployees', [ManagerController::class, 'manageemployee'])->name('managers.manageemployee');
Route::get('/managers/editemployees', [ManagerController::class, 'editmployee'])->name('managers.editemployee');
Route::get('/managers/addemployees', [ManagerController::class, 'addemployee'])->name('managers.addemployee');
Route::get('/managers/managepaymentmethod', [ManagerController::class, 'managepaymentmethod'])->name('managers.managepaymentmethod');
Route::delete('/managers/deleteemployees', [ManagerController::class, 'deleteemployee'])->name('managers.deleteemployee');
Route::put('/managers/givesalary', [ManagerController::class, 'givesalary'])->name('managers.givesalary');
Route::get('/managers/addpaymentmethod', [ManagerController::class, 'addpaymentmethod'])->name('managers.addpaymentmethod');
Route::get('/managers/editadminfee/{paymentmethod:method_id}', [ManagerController::class, 'editadminfee'])->name('managers.editadminfee');
Route::get('/managers/addinvestment', [ManagerController::class, 'addinvestment'])->name('managers.addinvestment');
Route::post('/managers/storeinvestment', [ManagerController::class, 'storeinvestment'])->name('managers.storeinvestment');
Route::post('/managers/storepaymentmethod', [ManagerController::class, 'storepaymentmethod'])->name('managers.storepaymentmethod');
Route::post('/managers/updateadminfee/{paymentmethod:method_id}', [ManagerController::class, 'updateadminfee'])->name('managers.updateadminfee');
Route::delete('/managers/deletepaymentmethod/{paymentmethod:method_id}', [ManagerController::class, 'deletepaymentmethod'])->name('managers.deletepaymentmethod');