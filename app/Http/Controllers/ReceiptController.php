<?php

namespace App\Http\Controllers;

use App\Models\Receipt;

class ReceiptController extends Controller
{
    public function show($id)
    {
        $receipt = Receipt::with(['product', 'paymentMethod'])->findOrFail($id);

        return view('transactions.receipt', compact('receipt'));
    }
}