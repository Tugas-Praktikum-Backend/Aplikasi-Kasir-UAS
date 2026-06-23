<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Product;
use App\Models\Client;
use App\Models\Inventory;
use App\Models\Market;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $clients = Client::with('products')->get();
        $market = Market::first();   // ← TAMBAH
        return view('suppliers.index', compact('clients', 'market'));
    }

    public function create()
    {
        $clients = Client::with('products')->get();

        $katalog = $clients->mapWithKeys(function ($client) {
            return [
                $client->id => $client->products->map(function ($product) {
                    return [
                        'id' => $product->id,
                        'nama' => $product->nama,
                        'harga' => $product->pivot->harga,   // ← TAMBAH
                    ];
                })->values(),
            ];
        });

        $market = Market::first();   // ← TAMBAH

        return view('suppliers.create', compact('clients', 'katalog', 'market'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'client_id'  => 'required|exists:clients,id',
            'jumlah'     => 'required|integer|min:1',
        ]);

        // Cek produk ada di katalog klien + ambil harganya
        $client = Client::findOrFail($request->client_id);
        $product = $client->products()->where('products.id', $request->product_id)->first();

        if (! $product) {
            return back()->withInput()
                ->withErrors(['product_id' => 'Klien ini tidak menyediakan produk tersebut.']);
        }

        // 💰 Modal otomatis = harga per produk (dari katalog klien) × jumlah
        $modal = $product->pivot->harga * $request->jumlah;

        // Cek modal ga boleh lebih gede dari modal toko
        $market = Market::first();
        $modalToko = $market ? $market->modal_toko : 0;
        if ($modal > $modalToko) {
            return back()->withInput()->withErrors([
                'jumlah' => 'Modal restock (Rp ' . number_format($modal, 0, ',', '.') . ') melebihi modal toko (Rp ' . number_format($modalToko, 0, ',', '.') . ').',
            ]);
        }

        // Simpan
        Supplier::create([
            'product_id' => $request->product_id,
            'client_id'  => $request->client_id,
            'jumlah'     => $request->jumlah,
            'modal'      => $modal,
        ]);

        // Tambah stok inventory
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

        return redirect()->route('suppliers.history')->with('success', 'Restock berhasil ditambahkan.');
    }

    public function history()
    {
        $suppliers = Supplier::with(['product', 'client'])->latest()->get();
        return view('suppliers.history', compact('suppliers'));
    }
}
