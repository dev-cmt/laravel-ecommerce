<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ecommerce\ShippingMethod;
use App\Models\Ecommerce\ShippingZone;

class ShippingController extends Controller
{
    // Shipping Methods
    public function index()
    {
        $methods = ShippingMethod::all();
        return view('ecommerce.backend.shipping.index', compact('methods'));
    }

    public function create()
    {
        return view('ecommerce.backend.shipping.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'method_name' => 'required|unique:shipping_methods',
            'description' => 'nullable|string',
        ]);

        ShippingMethod::create($request->all());
        return redirect()->route('shipping_methods.index')->with('success', 'Shipping method created successfully.');
    }

    public function show(ShippingMethod $shippingMethod)
    {
        return view('ecommerce.backend.shipping.edit', compact('shippingMethod'));
    }
    public function edit(ShippingMethod $shippingMethod)
    {
        return view('ecommerce.backend.shipping.show', compact('shippingMethod'));
    }

    public function update(Request $request, ShippingMethod $shippingMethod)
    {
        $request->validate([
            'method_name' => 'required|unique:shipping_methods,method_name,' . $shippingMethod->id,
            'description' => 'nullable|string',
        ]);

        $shippingMethod->update($request->all());
        return redirect()->route('shipping_methods.index')->with('success', 'Shipping method updated successfully.');
    }

    public function destroy(ShippingMethod $shippingMethod)
    {
        $shippingMethod->delete();
        return redirect()->route('shipping_methods.index')->with('success', 'Shipping method deleted successfully.');
    }
}
