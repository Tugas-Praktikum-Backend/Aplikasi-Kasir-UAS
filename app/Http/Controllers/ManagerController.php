<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Market;

class ManagerController extends Controller
{
    public function index()
    {
        $market = Market::first();

        return view('employees.manager.index', compact('market'));
    }

    public function managecustomer()
    {
        return view('employees.manager.managecustomer');
    }

    public function manageemployee()
    {
        return view('employees.manager.manageemployee');
    }
}
