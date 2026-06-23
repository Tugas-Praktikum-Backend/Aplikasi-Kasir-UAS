<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class CustomerAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.customerlogin');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $customer = Customer::where('email', $credentials['email'])->first();

        if ($customer && Hash::check($credentials['password'], $customer->password)) {
            Auth::login($customer);

            $request->session()->regenerate();
            return redirect()->route('customers.index');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|min:8|max:255|unique:customers,username',
            'email'    => 'required|string|email|max:255|unique:customers,email',
            'password' => 'required|string|min:8',
        ]);

        $validatedData['password'] = Hash::make($request->password);

        Customer::create($validatedData);

        return redirect()->route('customer.login')->with('success', 'Customer created successfully.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended('/');
    }
}
