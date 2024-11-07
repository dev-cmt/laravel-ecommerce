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
        // Validate incoming data
        // $request->validate([
        //     'method_name' => 'required|string|max:255',
        //     'cost' => 'required|numeric',
        //     'description' => 'nullable|string',
        //     'zone_name.*' => 'required|string|max:255',
        //     'zone_cost.*' => 'required|numeric',
        // ]);

        // Ensure 'is_active' is a boolean value, default to false if not set
        $isActive = $request->has('is_active') ? true : false;

        // Create or update the shipping method
        $shippingMethod = ShippingMethod::updateOrCreate(
            ['id' => $request->id],
            $request->only(['method_name', 'cost', 'description']) + ['is_active' => $isActive]
        );

        // Create or update shipping zones
        if ($request->has('zone_name')) {
            foreach ($request->zone_name as $index => $zoneName) {
                ShippingZone::updateOrCreate(
                    ['shipping_method_id' => $shippingMethod->id, 'zone_name' => $zoneName],
                    ['zone_cost' => $request->zone_cost[$index]]
                );
            }
        }

        return response()->json(['success' => 'Shipping method created/updated successfully']);
    }


    public function edit($id)
    {
        $method = ShippingMethod::with('shippingZones')->findOrFail($id); // Fetch method with zones
        return response()->json($method); // Return as JSON
    }

    // Remove the specified shipping method from storage
    public function destroy($id)
    {
        $shippingMethod = ShippingMethod::findOrFail($id);
        $shippingMethod->zones()->delete(); // Remove related zones
        $shippingMethod->delete(); // Delete the shipping method

        return redirect()->route('shipping.methods.index')->with('success', 'Shipping method deleted successfully.');
    }

    public function destroyZone($id)
    {
        // Find the zone by ID (use appropriate model)
        $zone = ShippingZone::findOrFail($id);

        // Delete the zone
        $zone->delete();

        // Return a response, maybe a success message
        return response()->json(['message' => 'Zone deleted successfully.']);
    }
}
