<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['product', 'paymentMethod'])->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    // tahap 1: customer pilih barang -> buat tagihan
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $totalPrice = $product->harga * $request->quantity;

        $transaction = Transaction::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'payment_method_id' => null,
            'status' => 'pending',
        ]);

        return redirect()->route('transactions.bill', $transaction->id)
            ->with('success', 'Tagihan berhasil dibuat');
    }

    // tahap 2: tampilkan tagihan + pilihan metode pembayaran
    public function bill($id)
    {
        $transaction = Transaction::with('product')->findOrFail($id);
        $paymentMethods = PaymentMethod::all();

        return view('transactions.bill', compact('transaction', 'paymentMethods'));
    }

    // tahap 3: customer bayar -> update payment method + status paid
    public function pay(Request $request, $id)
    {
        $request->validate([
            'payment_method_id' => 'required|exists:payment_methods,method_id',
        ]);

        $transaction = Transaction::findOrFail($id);

        $transaction->update([
            'payment_method_id' => $request->payment_method_id,
            'status' => 'paid',
        ]);

        return redirect()->route('receipts.show', $transaction->id)
            ->with('success', 'Pembayaran berhasil');
    }
}