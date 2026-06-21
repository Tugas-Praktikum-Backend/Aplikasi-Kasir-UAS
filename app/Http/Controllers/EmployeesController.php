<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function back;
use function compact;
use function redirect;
use function view;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct() {}

    public function index()
    {
        if(!Auth::guard('employee')->check()){
            return redirect()->route('employees.login');
        }

        $employeeUser = Auth::guard('employee')->user();
        return view('employees.index', compact('employeeUser'));
    }

    public function loginPage() {
        if(Auth::guard('employee')->check()) {
            return redirect()->route("employees.index");
        }

        return view('employees.login');
    }

    public function login(Request $request) {
        if(Auth::guard('employee')->check()) {
            return redirect()->route("employees.index");
        }

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        if(Auth::guard('employee')->attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('employees.index');
        }

        return back()->withErrors(['loginFailed' => 'Invalid'])->withInput();
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("employees.login");
    }

    public function salaryPage(Request $request) {
        $employeeUser = Auth::guard('employee')->user();
        return view('employees.salary', compact('employeeUser'));
    }
}
