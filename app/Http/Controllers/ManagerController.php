<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Market;
use App\Models\Employees;
use App\Models\PaymentMethod;

class ManagerController extends Controller
{
    public function index()
    {
        $market = Market::first();

        return view('employees.manager.index', compact('market'));
    }

    public function addinvestment()
    {
        return view('employees.manager.addinvestment');
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

        return view('employees.manager.manageemployee', compact('employees'));
    }

    public function addemployee()
    {
        return view('employees.manager.addemployee');
    }

    public function storeemployee(Request $request)
    {

    }

    public function removeemployee(Employee $employee)
    {
        return view('employees.manager.index', compact('employees'));
    }

    public function givesalary(Employee $employee)
    {

    }

    public function editemployee(Employee $employee)
    {
        return view('employees.manager.manageemployee');
    }

    public function updateemployee(Request $request, Employee $employee)
    {

    }

    public function addpaymentmethod()
    {
        return view('employees.manager.addpaymentmethod');
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

        return view('employees.manager.managepaymentmethod', compact('paymentmethod'));
    }

    public function editadminfee(PaymentMethod $paymentmethod)
    {
        return view('employees.manager.editadminfee', compact('paymentmethod'));
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
