<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Transaction;
use App\Models\PaymentMethod;
use App\Models\Customer;
use App\Models\Product;
use App\Models\CustomerPaymentMethod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function show(Request $request)
    {
        $uid = Auth::user()->id;

        $tid = session('tid') ?? $request->only(['tid'])['tid'];

        $receipt = Transaction::query()
            ->where('transaction_id', $tid)
            ->where('customer_id', $uid)
            ->first();
            
        $data = json_decode(
            Customer::query()->where('id', $uid)->first()->bills, true
        )[$tid];

        $products = [];
        foreach($data as $item => $amount){
            $productData = Product::query()->where('id', (int)$item)->first();
            $products[] = [$item, $productData->nama, $amount, $productData->harga];
        }

        return view('transactions.receipt', compact('receipt', 'products', 'tid'));
    }
}