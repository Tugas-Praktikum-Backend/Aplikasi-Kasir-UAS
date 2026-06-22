<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Product;
use App\Models\Client;
use App\Models\Inventory;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::with(['product', 'client'])->latest()->get();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        $products = Product::all();
        $clients = Client::all();
        return view('suppliers.create', compact('products', 'clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'client_id' => 'required',
            'jumlah' => 'required|integer|min:1',
            'modal' => 'required|integer|min:0',
            'harga' => 'required|integer|min:0',
        ]);

        Supplier::create($request->only('product_id', 'client_id', 'jumlah', 'modal', 'harga'));

        $inventory = Inventory::where('product_id', $request->product_id)->first();
        if ($inventory) {
            $inventory->increment('stock', $request->jumlah);
        } else {
            $inventory = new Inventory();
            $inventory->product_id = $request->product_id;
            $inventory->merek = '-';
            $inventory->stock = $request->jumlah;
            $inventory->save();
        }

        return redirect()->route('suppliers.index')->with('success', 'Restock berhasil! Stok produk bertambah.');
    }
}
