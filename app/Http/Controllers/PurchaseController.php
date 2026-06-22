<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with('product')->get();
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $products = Product::all();
        return view('purchases.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
        ]);

        Purchase::create($request->only('product_id', 'jumlah', 'harga'));

        return redirect()->route('purchases.index')->with('success', 'Data pembelian berhasil dicatat.');
    }
}