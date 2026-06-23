<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Market;
use App\Models\Employees;
use App\Models\PaymentMethod;
use App\Utils\RoleUtils;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index()
    {
        $market = Market::first();

        return view('manager.index', compact('market'));
    }

    public function addinvestment()
    {
        return view('manager.addinvestment');
    }

    public function storeinvestment(Request $request)
    {
        $request->validate([
            'balance' => 'required|numeric|min:1',
        ]);
        $market = Market::first();
        if ($market) {
            $market->modal_toko += $request->balance;
            
            $market->save();
        }
        return redirect()->route('managers.index')->with('success', 'Modal berhasil ditambahkan!');
    }

    public function manageemployee()
    {
        $employees = Employees::all();

        return view('manager.manageemployee', compact('employees'));
    }

    public function addemployee()
    {
        $roles = RoleUtils::getRoles(); 
    
        return view('manager.addemployee', compact('roles'));
    }

    public function storeemployee(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|email|unique:employees,email',
            'password' => 'required|string|min:6',
            'role'     => 'required|string'
        ]);

        Employees::create([
            'username' => $request->username, 
            'email'    => $request->email,
            'password' => Hash::make($request->password), 
            'role'     => $request->role,
            'monthly_revenue'  => 0
        ]);

        return redirect()->route('managers.manageemployee')->with('success', 'Employee berhasil ditambahkan!');
    }

    public function removeemployee(Employees $employee)
    {
        $employee->delete();

        return redirect()->route('managers.manageemployee')->with('success', 'Employee berhasil dihapus!');
    }

    public function givesalary(Employees $employee)
    {
        return view('manager.givesalary', compact('employee'));
    }

    public function transfersalary(Request $request, Employees $employee)
    {
        $request->validate([
            'salary' => 'required|numeric|min:1'
        ]);
        
        $employee->monthly_revenue += $request->salary;
        
        $employee->save();

        return redirect()->route('managers.manageemployee')->with('success', 'Gaji berhasil ditambahkan!');
    }

    public function editemployee(Employees $employee)
    {
        return view('manager.editemployee', compact('employee'));
    }

    public function updateemployee(Request $request, Employees $employee)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:6', 
        ]);

        $employee->username = $request->username;

        if ($request->filled('password')) {
            $employee->password = Hash::make($request->password);
        }
        
        $employee->save();

        return redirect()->route('managers.manageemployee')->with('success', 'Data berhasil diperbarui!');
    }

    public function addpaymentmethod()
    {
        return view('manager.addpaymentmethod');
    }

    public function storepaymentmethod(Request $request)
    {
        $request->validate([
            'method_id'   => 'required|unique:payment_methods,method_id',
            'method_name' => 'required|string|max:255',
            'admin_fee'   => 'required|numeric|min:0',
        ], [
            'method_id.unique' => 'Metode pembayaran dengan ID tersebut sudah terdaftar!',
            'method_id.required' => 'ID Metode pembayaran wajib diisi.',
        ]);

        PaymentMethod::create([
            'method_id'   => $request->method_id,
            'method_name' => $request->method_name,
            'admin_fee'   => $request->admin_fee,
        ]);

        return redirect()->route('managers.index')->with('success', 'Metode berhasil ditambahkan!');
    }

    public function managepaymentmethod()
    {
        $paymentmethod = PaymentMethod::all();

        return view('manager.managepaymentmethod', compact('paymentmethod'));
    }

    public function editadminfee(PaymentMethod $paymentmethod)
    {
        return view('manager.editadminfee', compact('paymentmethod'));
    }

    public function updateadminfee(Request $request, PaymentMethod $paymentmethod)
    {
        $request->validate([
            'admin_fee' => 'required|numeric|min:0',
        ]);

        $paymentmethod->admin_fee = $request->admin_fee;
        $paymentmethod->save();

        return redirect()->route('managers.managepaymentmethod')->with('success', 'Biaya admin berhasil diubah');
    }

    public function deletepaymentmethod(PaymentMethod $paymentmethod)
    {
        $paymentmethod->delete();

        return redirect()->route('managers.managepaymentmethod')->with('success', 'Metode pembayaran berhasil dihapus!');
    }
}
