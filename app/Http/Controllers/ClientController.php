<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients =  Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('clients.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'products' => 'nullable|array',
            'products.*' => 'exists:products,id',
            'harga' => 'nullable|array',
            'harga.*' => 'nullable|integer|min:0',
        ]);

        $client = Client::create($request->only('nama'));

        $syncData = [];
        foreach ($request->input('products', []) as $productId) {
            $syncData[$productId] = ['harga' => (int) $request->input("harga.$productId")];
        }
        $client->products()->sync($syncData);

        return redirect()->route('clients.index')->with('success', 'Klien berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        $products = Product::all();
        return view('clients.edit', compact('client', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'products' => 'nullable|array',
            'products.*' => 'exists:products,id',
            'harga' => 'nullable|array',
            'harga.*' => 'nullable|integer|min:0',
        ]);

        $client->update($request->only('nama'));

        $syncData = [];
        foreach ($request->input('products', []) as $productId) {
            $syncData[$productId] = ['harga' => $request->input("harga.$productId", 0)];
        }
        $client->products()->sync($syncData);

        return redirect()->route('clients.index')->with('success', 'Klien berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->products()->detach();
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Klien berhasil dihapus.');
    }
}
