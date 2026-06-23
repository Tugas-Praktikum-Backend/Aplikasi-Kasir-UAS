<?php

use App\Http\Middleware\CheckActiveShift;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo(function(Request $request){
            $customerAccess = ['customer', 'customers', 'transactions', 'products'];
            foreach ($customerAccess as $access) {
                if($request->is($access) || $request->is("$access/*")){
                    return route('customer.login');
                }
            }
            return route('employees.login');
        });
        $middleware->alias([
            'check.shift' => CheckActiveShift::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
