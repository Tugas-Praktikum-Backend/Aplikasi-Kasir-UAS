<?php

namespace App\Http\Controllers;

use App\Models\Receipt;

class ReceiptController extends Controller
{
    public function show($id)
    {
        $receipt = Receipt::with(['product', 'paymentMethod'])->findOrFail($id);

        if ($receipt->status !== 'paid') {
            return redirect()->route('transactions.index')
                ->with('error', 'Transaksi ini belum dibayar');
        }

        return view('transactions.receipt', compact('receipt'));
    }
}