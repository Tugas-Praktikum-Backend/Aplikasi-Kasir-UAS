<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::all();
        return view('discounts.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('discounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'required|numeric|min:0|max:100',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Discount::create($request->only('name', 'percentage', 'start_date', 'end_date'));

        return redirect()->route('discounts.index')->with('success', 'Discount created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        return view('discounts.show', compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        return view('discounts.edit', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'required|numeric|min:0|max:100',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $discount->update($request->only('name', 'percentage', 'start_date', 'end_date'));

        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully.');
    }
}