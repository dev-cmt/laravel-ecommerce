<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ecommerce\ShippingMethod;
use App\Models\Ecommerce\ShippingZone;

class ShippingController extends Controller
{
    // Shipping Methods
    public function indexMethods()
    {
        $methods = ShippingMethod::all();
        return view('ecommerce.backend.shipping.index_methods', compact('methods'));
    }

    public function createMethod()
    {
        return view('ecommerce.backend.shipping.create_method');
    }

    public function storeMethod(Request $request)
    {
        $request->validate([
            'method_name' => 'required|unique:shipping_methods',
            'description' => 'nullable|string',
        ]);

        ShippingMethod::create($request->all());
        return redirect()->route('shipping.methods.index')->with('success', 'Shipping method created successfully.');
    }

    public function editMethod(ShippingMethod $shippingMethod)
    {
        return view('ecommerce.backend.shipping.edit_method', compact('shippingMethod'));
    }

    public function updateMethod(Request $request, ShippingMethod $shippingMethod)
    {
        $request->validate([
            'method_name' => 'required|unique:shipping_methods,method_name,' . $shippingMethod->id,
            'description' => 'nullable|string',
        ]);

        $shippingMethod->update($request->all());
        return redirect()->route('shipping.methods.index')->with('success', 'Shipping method updated successfully.');
    }

    public function destroyMethod(ShippingMethod $shippingMethod)
    {
        $shippingMethod->delete();
        return redirect()->route('shipping.methods.index')->with('success', 'Shipping method deleted successfully.');
    }

    // Shipping Zones
    public function indexZones()
    {
        $zones = ShippingZone::with('shippingMethod')->get();
        return view('ecommerce.backend.shipping.index_zones', compact('zones'));
    }

    public function createZone()
    {
        $methods = ShippingMethod::all();
        return view('ecommerce.backend.shipping.create_zone', compact('methods'));
    }

    public function storeZone(Request $request)
    {
        $request->validate([
            'shipping_method_id' => 'required|exists:shipping_methods,id',
            'zone_name' => 'required|string',
            'cost' => 'required|numeric',
        ]);

        ShippingZone::create($request->all());
        return redirect()->route('shipping.zones.index')->with('success', 'Shipping zone created successfully.');
    }

    public function editZone(ShippingZone $shippingZone)
    {
        $methods = ShippingMethod::all();
        return view('ecommerce.backend.shipping.edit_zone', compact('shippingZone', 'methods'));
    }

    public function updateZone(Request $request, ShippingZone $shippingZone)
    {
        $request->validate([
            'shipping_method_id' => 'required|exists:shipping_methods,id',
            'zone_name' => 'required|string',
            'cost' => 'required|numeric',
        ]);

        $shippingZone->update($request->all());
        return redirect()->route('shipping.zones.index')->with('success', 'Shipping zone updated successfully.');
    }

    public function destroyZone(ShippingZone $shippingZone)
    {
        $shippingZone->delete();
        return redirect()->route('shipping.zones.index')->with('success', 'Shipping zone deleted successfully.');
    }
}
