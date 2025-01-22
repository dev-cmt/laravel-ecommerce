<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Ecommerce\Order;
use App\Models\Ecommerce\ShippingAddress;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->paginate(10);
        return view('ecommerce.backend.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('orderItems.product', 'user')->findOrFail($id);
        return view('ecommerce.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validatedData = $request->validate([
            'status' => 'required|in:placed,processing,shipping,delivered',
            'payment_status' => 'required|in:paid,not paid',
        ]);

        $order->update($validatedData);

        return redirect()->route('orders.show', $id)->with('success', 'Order status updated successfully.');
    }


    /**---------------------------------------------------------------------------------
     * FRONTEND => ORDER STORE AND PAYMENT SYSTEM
     * ---------------------------------------------------------------------------------
     */
    public function orderStore(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'building' => 'required|string|max:255',
            'colony' => 'nullable|string|max:255',
            'region_name' => 'required|string|max:255',
            'city_name' => 'required|string|max:255',
            'area_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'order_notes' => 'nullable|string',
            'delivery_label' => 'required|in:Home,Office',
        ]);

        // Create the shipping address
        $shippingAddress = ShippingAddress::create([
            'user_id' => Auth::id(),
            'full_name' => $validatedData['full_name'],
            'phone_number' => $validatedData['phone_number'],
            'building' => $validatedData['building'],
            'colony' => $validatedData['colony'],
            'region_name' => $validatedData['region_name'],
            'city_name' => $validatedData['city_name'],
            'area_name' => $validatedData['area_name'],
            'address' => $validatedData['address'],
            'delivery_label' => $validatedData['delivery_label'],
        ]);

        // Generate a unique order number
        $orderNumber = 'ORD-' . Str::upper(Str::random(8));

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'shipping_address_id' => $shippingAddress->id,
            'order_number' => $orderNumber,
            'total_amount' => $request->input('total_amount'),
            'discount_amount' => $request->input('discount_amount'),
            'gross_amount' => $request->input('gross_amount'),
            'shipping_amount' => $request->input('shipping_amount'),
            'net_amount' => $request->input('net_amount'),
            'order_notes' => $validatedData['order_notes'],
            'status' => 'Placed',  // Default status
            'payment_status' => 'Pending', // Default payment status
        ]);

        // Get cart items from the request
        $cartItems = $request->input('cart_items', []);
        
        // Store the order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'product_variant_id' => $item['product_variant_id'] ?? null,
                'product_name' => $item['product_name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'total_amount' => $item['price'] * $item['quantity'],
            ]);
        }

        // You may want to handle payment gateway integration here, e.g., create a payment record

        // Redirect the user to the success page or order confirmation page
        return redirect()->route('order.payment', ['order' => $order->id])->with('success', 'Order placed successfully!');
    }

}
