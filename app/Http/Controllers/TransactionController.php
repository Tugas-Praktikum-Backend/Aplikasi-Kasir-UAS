<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Transaction;
use App\Models\PaymentMethod;
use App\Models\Customer;
use App\Models\Product;
use App\Models\CustomerPaymentMethod;
use App\Models\Inventory as Inventories;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use function json_encode;
use function React\Promise\all;
use function time;


class TransactionController extends Controller
{
    public function index()
    {
        $uid = Auth::guard('customer')->user()->id;
        $transactions = Customer::query()->where('id', $uid)->first();
        $list = [];

        foreach(json_decode($transactions->bills, true) as $id => $data){
            $products = [];
            foreach($data as $item => $amount){
                $discounts = Discount::query()
                    ->where('product_id', $item)
                    ->whereDate('start_date', '<=', Carbon::createFromTimestamp(time()))
                    ->whereDate('end_date', '>=', Carbon::createFromTimestamp(time()))
                    ->get();

                $percentage = 0;
                foreach ($discounts as $discount){
                    $percentage += $discount->percentage;
                }
                $percentage /= 100;

                $productData = Product::query()->where('id', (int)$item)->first();
                $products[] = [
                    $item, $productData->nama, $amount,
                    $productData->harga, $percentage,
                    ($productData->harga * $amount) * (1 - $percentage)
                ];
            }

            $hasPaid = false;
            $paid = Transaction::query()->where('customer_id', $uid)->get()->toArray();
            foreach($paid as $paidId => $paidData){
                if($id === $paidId)$hasPaid = true;
            }

            $list[$id] = [$products, $hasPaid];
        }

        $payments = [];
        foreach(CustomerPaymentMethod::query()->where('customer_id', $uid)->get() as $data){
            $payments[] = $data->method_id;
        }

        return view('transactions.index', compact('list', 'payments'));
    }

    public function payment(Request $request)
    {
        $uid = Auth::user()->id;

        $reqData = $request->only('transaction_id', 'transaction', 'prices', 'payment');
        $transaction = json_decode($reqData['transaction']);
        $prices = $reqData['prices'];
        $payment = $reqData['payment'];
        $tid = $reqData['transaction_id'];

        $methods = CustomerPaymentMethod::query()->where('customer_id', $uid)->get();
        $balance = $methods->where('method_id', $payment)->first()['balance'] ?? 0;

        return view('transactions.payment', compact(
            'transaction', 'prices', 'payment', 'tid', 'balance'
        ));
    }

    public function pay(Request $request)
    {
        $uid = Auth::user()->id;

        $reqData = $request->only('transaction_id', 'transaction', 'prices', 'payment');
        $transaction = json_decode($reqData['transaction'], true);
        $prices = $reqData['prices'];
        $payment = $reqData['payment'];
        $tid = $reqData['transaction_id'];

        $methods = CustomerPaymentMethod::query()->where('customer_id', $uid)->get();
        $current = $methods->where('method_id', $payment)->first()['balance'];
        CustomerPaymentMethod::query()->where('customer_id', $uid)->where('method_id', $payment)
            ->update(['balance' => $current - $prices]);

        $discounts = [];
        foreach($transaction as $data){
            $invData = Inventories::query()->where('id', $data[0])->first();
            Inventories::query()->where('id', $data[0])->update(['stock' => $invData->stock - $data[2]]);
            $discounts[$data[0]] = $data[4];
        }

        Transaction::query()->insert([
            'customer_id' => $uid,
            'transaction_id' => $tid,
            'total_price' => $prices,
            'payment_method' => $payment,
            'discounts' => json_encode($discounts)
        ]);

        return redirect()->route('receipts.show')->with(['tid' => $tid]);
    }
}
