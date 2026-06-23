<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with([
            'product',
            'paymentMethod'
        ])->get();

        return view(
            'transactions.index',
            compact('transactions')
        );
    }

    public function create()
    {
        $products = Product::all();
        $paymentMethods = PaymentMethod::all();

        return view(
            'transactions.create',
            compact('products', 'paymentMethods')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        Transaction::create([
            'product_id' => $request->product_id,
            'payment_method_id' => $request->payment_method_id,
            'quantity' => $request->quantity,
            'total_price' => $product->harga * $request->quantity,
        ]);

    $transaction = Transaction::create([
        'product_id' => request('product_id'),
        'payment_method_id' => request('payment_method_id'),
        'quantity' => request('quantity'),
        'total_price' => $product->harga * request('quantity'),
    ]);

    return redirect()->route(
        'transactions.receipt',
    $transaction->id
    );
    }
        public function receipt(Transaction $transaction)
{
        $transaction->load([
            'product',
            'paymentMethod'
    ]);

    return view(
        'transactions.receipt',
        compact('transaction')
    );
    }
}