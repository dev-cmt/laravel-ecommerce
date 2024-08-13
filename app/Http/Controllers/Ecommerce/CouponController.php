<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::paginate(10);
        return view('ecommerce.coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('ecommerce.coupons.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'coupon_code' => 'required|string|max:255|unique:coupons',
            'discount_type' => 'required|in:fixed,rate',
            'discount_value' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'max_usage' => 'nullable|integer',
            'used_count' => 'nullable|integer',
        ]);

        Coupon::create($validatedData);

        return redirect()->route('coupons.index')->with('success', 'Coupon created successfully.');
    }

    public function show($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('ecommerce.coupons.show', compact('coupon'));
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('ecommerce.coupons.edit', compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $validatedData = $request->validate([
            'coupon_code' => 'required|string|max:255|unique:coupons,coupon_code,' . $id,
            'discount_type' => 'required|in:fixed,rate',
            'discount_value' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'max_usage' => 'nullable|integer',
            'used_count' => 'nullable|integer',
        ]);

        $coupon->update($validatedData);

        return redirect()->route('coupons.index')->with('success', 'Coupon updated successfully.');
    }

    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return redirect()->route('coupons.index')->with('success', 'Coupon deleted successfully.');
    }
}
