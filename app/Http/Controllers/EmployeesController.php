<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use function compact;
use function password_verify;
use function redirect;
use function var_dump;
use function view;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private bool $hasLogin = false;
    private string $username = "";
    private string $email = "";
    private int $joined = 0;

    public function show()
    {
        if(!$this->hasLogin){
            $loginFailed = false;
            return view('employees.login', compact('loginFailed'));
        }
        $username = $this->username;
        $joined = $this->joined;
        return view('employees.index', compact('username', 'joined'));
    }

    public function login(Request $request) {
        if($this->hasLogin) {
            $username = $this->username;
            $joined = $this->joined;
            return view('employees.index', compact('username', 'joined'));
        }
        $data = $request->only('email', 'password');
        $employees = Employees::all();
        foreach ($employees as $e){
            if($e->email === $data['email'] && password_verify($data['password'], $e->password)){
                $this->username = $e->username;
                $this->email = $e->email;
                $this->joined = $e->created_at;
                $this->hasLogin = true;
                return $this->show();
            }
        }
        $loginFailed = true;
        return view('employees.login', compact('loginFailed'));
    }
}
