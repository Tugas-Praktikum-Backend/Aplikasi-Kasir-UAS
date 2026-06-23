<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\PaymentMethod;
use App\Models\Customer;
use App\Models\Product;
use App\Models\CustomerPaymentMethod;
use App\Models\Inventory as Inventories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    public function index()
    {
        $uid = Auth::user()->id;
        $transactions = Customer::query()->where('id', $uid)->first();
        $list = [];
        foreach(json_decode($transactions->bills, true) as $id => $data){
            $products = [];
            foreach($data as $item => $amount){
                $productData = Product::query()->where('id', (int)$item)->first();
                $products[] = [$item, $productData->nama, $amount, $productData->harga];
            }
            $hasPaid = false;
            $paid = Transaction::query()->where('customer_id', $uid)->get()->toArray();
            foreach($paid as $paidId => $data){
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
        $transactions = Customer::query()->where('id', $uid)->first();
        $list = [];
        $reqData = $request->only('transaction_id', 'transaction', 'prices', 'payment');
        $transaction = json_decode($reqData['transaction']);
        $prices = $reqData['prices'];
        $payment = $reqData['payment'];
        $tid = $reqData['transaction_id'];
        $data = $transactions->bills[$tid];
        return view('transactions.payment', compact('transaction', 'prices', 'payment', 'tid'));
    }

    public function pay(Request $request)
    {
        $uid = Auth::user()->id;
        $transactions = Customer::query()->where('id', $uid)->first();
        $list = [];
        $reqData = $request->only('transaction_id', 'transaction', 'prices', 'payment');
        $transaction = json_decode($reqData['transaction'], true);
        $prices = $reqData['prices'];
        $payment = $reqData['payment'];
        $tid = $reqData['transaction_id'];
        $data = $transactions->bills[$tid];

        $methods = CustomerPaymentMethod::where('customer_id', $uid)->get();
        $current = $methods->where('method_id', $payment)->first()['balance'];
        CustomerPaymentMethod::where('customer_id', $uid)->where('method_id', $payment)
            ->update(['balance' => max(0, $current - $prices)]);

        foreach($transaction as $data){
            $invData = Inventories::query()->where('id', $data[0])->first();
            Inventories::query()->where('id', $data[0])->update(['stock' => $invData->stock - $data[2]]);
        }

        Transaction::query()->insert([
            'customer_id' => $uid,
            'transaction_id' => $tid,
            'total_price' => $prices,
            'payment_method' => $payment
        ]);

        return redirect()->route('receipts.show')->with(['tid' => $tid]);
    }
}