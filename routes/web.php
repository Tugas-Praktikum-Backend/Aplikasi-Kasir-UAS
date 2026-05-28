<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ManagerController;

Route::get('/', function () {
    return redirect('/managers');
});

Route::resource('managers', ManagerController::class);
