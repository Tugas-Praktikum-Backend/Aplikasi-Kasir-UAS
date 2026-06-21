<?php

namespace App\Http\Controllers;

use App\Models\CustomerPaymentMethod;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CustomerPaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $methods = CustomerPaymentMethod::where('customer_id', auth()->id())->get();

        return view('customers.paymentmethod.index', compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $methods = PaymentMethod::all();

        return view('customers.paymentmethod.create', compact('methods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'method_id' => [
                'required', 'string', 
                Rule::unique('customer_payment_methods')->where(function ($query) {
                    return $query->where('customer_id', auth()->id());
                }),
            ],
            'balance' => 'nullable|decimal:0,2|min:0',
        ], [
            'method_id.unique' => 'Anda sudah menambahkan metode pembayaran ini sebelumnya.',
        ]);

        CustomerPaymentMethod::create([
            'customer_id' => Auth::id(),
            'method_id' => $request->method_id,
            'balance' => $request->balance ?? 0,
        ]);

        return redirect()->route('paymentmethods.index')->with('success', 'Berhasil menambahkan metode pembayaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerPaymentMethod $paymentmethod)
    {
        $request->validate([
            'balance' => 'nullable|decimal:0,2|min:1',
        ]);

        $paymentmethod->update(['balance' => $paymentmethod->balance + $request->balance,]);
        
        return redirect()->route('paymentmethods.index')->with('success', 'Berhasil melakukan topup');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerPaymentMethod $paymentmethod)
    {
        $paymentmethod->delete();

        return redirect()->route('paymentmethods.index')->with('success', 'Berhasil menghapus metode pembayaran');
    }

    public function topup(CustomerPaymentMethod $paymentmethod) {
        return view('customers.paymentmethod.topup', compact('paymentmethod'));
    }
}
