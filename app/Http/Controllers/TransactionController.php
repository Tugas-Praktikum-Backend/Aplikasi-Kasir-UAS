<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\CustomerPaymentMethod;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $transactions = Transaction::with('product')->get();
    return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $products = Product::all();
    $paymentMethods = CustomerPaymentMethod::all();

    return view(
    'transactions.create',
    compact('products', 'paymentMethods')
    );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
    'product_id' => 'required|exists,id',
    'payment_method_id' => 'required|exists,id',
    'quantity' => 'required|integer|min:1',
    ]);

    $product = Product::findOrFail(
    request('product_id')
    );

    Transaction::create([
    'product_id' => request('product_id'),
    'payment_method_id' => request('payment_method_id'),
    'quantity' => request('quantity'),
    'total_price' => $product->harga * request('quantity'),
    ]);

    return redirect()
    ->route('transactions.index')
    ->with('success', 'Transaksi berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
