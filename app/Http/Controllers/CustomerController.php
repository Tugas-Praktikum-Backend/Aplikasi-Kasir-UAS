<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customers.index');
    }

    public function metode()
    {
        return view('customers.metode');
    }

    public function topup()
    {
        return view('customers.topup');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        Customer::create($request->only('username', 'email', 'password'));

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('customers.login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $post->update($request->only('username', 'email', 'password'));

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $post->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
