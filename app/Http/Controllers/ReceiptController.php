<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Receipt;
use App\Models\Transaction;
use App\Models\PaymentMethod;
use App\Models\Customer;
use App\Models\Product;
use App\Models\CustomerPaymentMethod;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use function config;
use function dd;
use function json_decode;
use function time;

class ReceiptController extends Controller
{
    public function show(Request $request)
    {
        $uid = Auth::user()->id;

        $tid = session('tid') ?? $request->only(['tid'])['tid'];

        $receipt = Transaction::query()
            ->where('transaction_id', $tid)
            ->where('customer_id', $uid)
            ->first()->toArray();

        $data = json_decode(
            Customer::query()->where('id', $uid)->first()->bills, true
        )[$tid];

        $discounts = json_decode($receipt['discounts'], true);
        $products = [];
        foreach($data as $item => $amount){
            $percentage = $discounts[$item] ?? 0;

            $productData = Product::query()->where('id', (int)$item)->first();
            $products[] = [$item, $productData->nama, $amount,
                $productData->harga, $percentage,
                ($productData->harga * $amount) * (1 - $percentage)
            ];
        }

        return view('transactions.receipt', compact('receipt', 'products', 'tid'));
    }
}
