<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('inventory')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'stock' => 'required|integer',
            'harga' => 'required|integer',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $Product = Product::create([
            'nama' => request('nama'), 
            'harga' => request('harga'),
            'category_id' => request('category_id'),
        ]);

        $Product -> inventory() -> create([
            'merek' => request('merek'), 
            'stock' => request('stock'),
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'merek' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'stock' => 'required|integer',
            'harga' => 'required|integer',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $product->update($request->only('nama', 'harga', 'category_id'));

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function inventory()
    {
        $products = Product::with('inventory')->get();
        
        return view('products.inventory', compact('products')); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
