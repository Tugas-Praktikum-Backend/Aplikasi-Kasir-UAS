<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Product;
use App\Utils\RoleUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use function array_diff;
use function array_key_exists;
use function array_map;
use function array_merge;
use function array_values;
use function array_walk;
use function auth;
use function back;
use function compact;
use function dd;
use function json_decode;
use function redirect;
use function session;
use function view;

class CashierController extends Controller
{

    public function index() {
        $user = auth('employee')->user();
        if($user->role !== RoleUtils::ROLE_CASHIER)return back();

        return view('cashier.index');
    }

    public function create(Request $request) {
        $user = auth('employee')->user();
        if($user->role !== RoleUtils::ROLE_CASHIER)return back();

        $products = [];
        $categories = [];
        foreach(Category::all() as $cat){
            $products[$cat->id] = [];
            $categories[$cat->id] = $cat->nama;
        }
        $invs = Inventory::all();
        foreach(Product::all() as $prod) {
            $invData = $invs->where('product_id', $prod->id)->first();
            if($invData){
                $products[$prod->category_id][$prod->id] = [$prod->nama, $invData->stock, $prod->harga];
            }
        }

        return view('cashier.create', [
            'data' => session('data') ?? [],
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function add(Request $request) {
        $data = $request->input('data');
        if(!$data)return back();

        $data = Crypt::decrypt($data);
        $inputData = array_values($request->only('id', 'amount', 'category'));

        $id = $inputData[0];
        $amount = $inputData[1];
        $cat = $inputData[2];
        $data[$id] = [($data[$id] ?? [0])[0] + $amount, $cat];

        return redirect()->route('employees.cashier_create')->with('data', $data);
    }

    public function delete(Request $request) {
        $data = $request->input('data');
        if(!$data)return back();

        $data = Crypt::decrypt($data);
        unset($data[$request->input('id')]);

        return redirect()->route('employees.cashier_create')->with('data', $data);
    }

    public function process(Request $request) {
        $raw = $request->input('data');
        if(!$raw)return back();

        $raw = Crypt::decrypt($raw);
        $data = $raw;
        array_walk($data, function(&$v, $k){
            $v = $v[0];
        });

        $cid = $request->input('customer_id');
        $customer = Customer::query()->where('username', $cid)->first();
        if(!$customer){
            return back()->withErrors(['cid_notfound' => 'Customer Username not found'])->with('data', $raw);
        }

        $bills = array_merge(json_decode($customer->bills, true), [$data]);
        Customer::query()->where('username', $cid)->update(['bills' => json_encode($bills)]);

        return back()->withErrors(['success' => 'Successfully added bills']);
    }
}
