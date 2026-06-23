<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['product', 'paymentMethod'])->latest()->get();

        return view('transactions.index', compact('transactions'));
    }

    public function payment($id)
    {
        $transaction = Transaction::with('product')->findOrFail($id);
        $paymentMethods = PaymentMethod::all();

        return view('transactions.payment', compact('transaction', 'paymentMethods'));
    }

    public function pay(Request $request, $id)
    {
        $request->validate([
            'payment_method_id' => 'required|exists:payment_methods,method_id',
        ]);

        $transaction = Transaction::findOrFail($id);

        $transaction->payment_method_id = $request->payment_method_id;
        $transaction->status = 'paid';
        $transaction->save();

        return redirect()->route('receipts.show', $transaction->id)
            ->with('success', 'Pembayaran berhasil');
    }
}