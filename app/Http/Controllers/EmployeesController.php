<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use function compact;
use function redirect;
use function to_route;
use function view;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct() {}

    public function index()
    {
        if(!Session::get('employeeUsername')){
            return redirect()->route('employees.login');
        }
        $username = Session::get('employeeUsername');
        $joined = Session::get('employeeJoined');
        return view('employees.index', compact('username', 'joined'));
    }

    public function loginPage() {
        if(Session::get('employeeUsername')) {
            return redirect()->route("employees.index");
        }
        $loginFailed = false;
        return view('employees.login', compact('loginFailed'));
    }

    public function login(Request $request) {
        if(Session::get('employeeUsername')) {
            return redirect()->route("employees.index");
        }

        $data = $request->only('email', 'password');
        $employees = Employees::all();
        foreach ($employees as $e){
            if($e->email === $data['email'] && Hash::check($data['password'], $e->password)){
                Session::put('employeeUsername', $e->username);
                Session::put('employeeJoined', $e->created_at);
                Session::save();
                return redirect()->route('employees.index');
            }
        }
        $loginFailed = true;
        return view('employees.login', compact('loginFailed'));
    }

    public function logout() {
        Session::flush();
        return redirect()->route("employees.login");
    }
}
