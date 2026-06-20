<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers.index');
    }

    public function metode()
    {
        return view('metodepembayaran.index');
    }

    public function topup()
    {
        return view('metodepembayaran.topup');
    }

    public function create()
    {
        return view('auth.customerregister');
    }

    public function login()
    {
        return view('auth.customerlogin');
    }
}
