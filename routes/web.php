<?php

use App\Http\Controllers\CashierController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\CustomerPaymentMethodController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PurchaseController;

Route::get('/', fn() => view('index'))->name('home');

Route::middleware(['auth:employee'])->group(function(){
    Route::resource('products', ProductController::class);
    Route::resource('discounts', DiscountController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('suppliers', SupplierController::class);
});

Route::prefix('/transactions')->middleware(['auth:employee'])->group(function(){
    Route::get(
        '/{transaction}/receipt', [TransactionController::class, 'receipt']
    )->name('transactions.receipt');
});

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

Route::prefix('cashier')->middleware(['auth:employee'])->group(function(){
    Route::get('/', [CashierController::class, 'index'])->name('cashier.index');
    Route::get('/create', [CashierController::class, 'create'])->name('cashier.create');
    Route::get('/create/add', [CashierController::class, 'add'])->name('cashier.add');
    Route::get('/create/delete', [CashierController::class, 'delete'])->name('cashier.delete');
    Route::get('/create/process', [CashierController::class, 'process'])->name('cashier.process');
});

Route::prefix('inventory')->middleware(['auth:employee'])->group(function(){
    Route::get('/', [ProductController::class, 'inventory'])->name('inventory');
});

Route::prefix('suppliers')->middleware(['auth:employee'])->group(function(){
    Route::get('/history', [SupplierController::class, 'history'])->name('suppliers.history');
});

// Customer Authenication
Route::get('customers/login', [CustomerAuthController::class, 'showLogin'])->name('customer.login');
Route::post('customers/login', [CustomerAuthController::class, 'login']);
Route::post('customers/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
Route::get('/customers/signup', [CustomerController::class, 'create'])->name('customer.register');
Route::post('/customers/signup', [CustomerAuthController::class, 'signup'])->name('customers.store');
Route::middleware(['auth'])->group(function () {
    Route::get('/customers/dashboard', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/changeusername', [CustomerController::class, 'changeusername'])->name('customers.changeusername');
    Route::get('/customers/changepassword', [CustomerController::class, 'changepassword'])->name('customers.changepassword');
    Route::put('/customers/updateusername', [CustomerController::class, 'updateusername'])->name('customers.updateusername');
    Route::put('/customers/updatepassword', [CustomerController::class, 'updatepassword'])->name('customers.updatepassword');
    Route::delete('/customers/deleteaccount', [CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::get('/customers/paymentmethods/{paymentmethod}/topup', [CustomerPaymentMethodController::class, 'topup'])->name('paymentmethods.topup');
    Route::resource('customers/paymentmethods', CustomerPaymentMethodController::class);
});
Route::redirect('/customers', '/customers/dashboard');
Route::get('login', fn() => redirect()->route('customer.login'))->name('login');

Route::prefix('/managers')->middleware(['auth:employee'])->group(function(){
    Route::get('/dashboard', [ManagerController::class, 'index'])->name('managers.index');
    Route::get('/manageemployees', [ManagerController::class, 'manageemployee'])->name('managers.manageemployee');
    Route::get('/editemployees/{employee}', [ManagerController::class, 'editemployee'])->name('managers.editemployee');
    Route::get('/addemployees', [ManagerController::class, 'addemployee'])->name('managers.addemployee');
    Route::get('/managepaymentmethod', [ManagerController::class, 'managepaymentmethod'])->name('managers.managepaymentmethod');
    Route::delete('/removeemployee/{employee}', [ManagerController::class, 'removeemployee'])->name('managers.removeemployee');
    Route::get('/givesalary/{employee}', [ManagerController::class, 'givesalary'])->name('managers.givesalary');
    Route::put('/transfersalary/{employee}', [ManagerController::class, 'transfersalary'])->name('managers.transfersalary');
    Route::get('/addpaymentmethod', [ManagerController::class, 'addpaymentmethod'])->name('managers.addpaymentmethod');
    Route::get('/editadminfee/{paymentmethod:method_id}', [ManagerController::class, 'editadminfee'])->name('managers.editadminfee');
    Route::get('/addinvestment', [ManagerController::class, 'addinvestment'])->name('managers.addinvestment');
    Route::post('/storeinvestment', [ManagerController::class, 'storeinvestment'])->name('managers.storeinvestment');
    Route::post('/storepaymentmethod', [ManagerController::class, 'storepaymentmethod'])->name('managers.storepaymentmethod');
    Route::post('/updateadminfee/{paymentmethod:method_id}', [ManagerController::class, 'updateadminfee'])->name('managers.updateadminfee');
    Route::delete('/deletepaymentmethod/{paymentmethod:method_id}', [ManagerController::class, 'deletepaymentmethod'])->name('managers.deletepaymentmethod');
    Route::post('/storeemployee', [ManagerController::class, 'storeemployee'])->name('managers.storeemployee');
    Route::put('/updateemployee/{employee}', [ManagerController::class, 'updateemployee'])->name('managers.updateemployee');
});
Route::redirect('/managers', '/managers/dashboard');

Route::fallback(fn() => redirect()->route('home'));
