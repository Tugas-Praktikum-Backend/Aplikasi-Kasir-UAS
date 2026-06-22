<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use function compact;
use function redirect;
use function view;

class DiscountController extends Controller
{
    public function __construct() {}

    public function index()
    {
        $discounts = Discount::with('product')->get();
        return view('discounts.index', compact('discounts'));
    }

    public function create()
    {
        $products = Product::all();
        return view('discounts.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'percentage' => 'required|numeric|min:0|max:100',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Discount::create($request->only('product_id', 'name', 'percentage', 'start_date', 'end_date'));

        return redirect()->route('discounts.index')->with('success', 'Discount created successfully.');
    }


    public function edit(Discount $discount)
    {
        $products = Product::all();
        return view('discounts.edit', compact('discount', 'products'));
    }

    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'percentage' => 'required|numeric|min:0|max:100',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $discount->update($request->only('product_id', 'name', 'percentage', 'start_date', 'end_date'));

        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully.');
    }
    
    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully.');
    }
}