<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Ecommerce\Order;
use App\Models\Ecommerce\OrderItem;
use App\Models\Ecommerce\ShippingAddress;
use App\Models\Ecommerce\PaymentGateway;
use App\Models\Ecommerce\Cart;
use App\Models\User;

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
        if ($request->shipping_address_id == null) {
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

            $user = User::find(Auth::id());
            $user->shipping_address_id = $shippingAddress->id;
            $user->save();

            $shippingAddress = $shippingAddress->id;
        }else{
            $shippingAddress = $request->shipping_address_id;
        }

        // Generate a unique order number
        $orderNumber = 'ORD-' . Str::upper(Str::random(8));

        // Get the input values from the request, ensuring they're numeric and default to 0 if not set
        $total_amount = floatval($request->input('total_amount', 0)); // Default to 0 if not provided
        $discount_amount = floatval($request->input('discount_amount', 0)); // Default to 0 if not provided
        $shipping_amount = floatval($request->input('shipping_amount', 0)); // Default to 0 if not provided

        // Perform calculations
        $gross_amount = $total_amount - $discount_amount; // (total_amount - discount_amount)
        $net_amount = $gross_amount + $shipping_amount; // (gross_amount + shipping_amount)

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'shipping_address_id' => $shippingAddress,
            'coupon_id' => $request->input('coupon_id'),
            'order_number' => $orderNumber,
            'total_amount' => $total_amount,
            'discount_amount' => $discount_amount,
            'gross_amount' => $gross_amount,
            'shipping_amount' => $shipping_amount,
            'net_amount' => $net_amount,
            'order_notes' => $request->input('order_notes'),
            'status' => 'Placed',
            'payment_status' => 'Pending',
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
                'quantity' => $item['qty'],
                'total_amount' => $item['price'] * $item['qty'],
            ]);
        }

        // Delete all cart items for the user
        Cart::where('user_id', Auth::id())->delete();

        // Redirect page
        return redirect()->route('order-payment', ['order' => $order->id])->with('success', 'Order placed successfully!');
    }

    public function orderPayment($id)
    {
        $paymentGateway = PaymentGateway::orderBy('priority', 'asc')->get(); //where('is_active', true)
        $order = Order::findOrFail($id);
        return view('ecommerce.frontend.order-payment', compact('order', 'paymentGateway'));
    }
    public function orderPaymentStore(Request $request)
    {
        // Find the order by its ID
        $order = Order::findOrFail($request->order_id);
        $order->payment_gateway_id = $request->payment_gateway_id;
        $order->payment_number = $request->payment_number;
        $order->transaction_number = $request->transaction_number;
        $order->payment_status = 'Paid';
        $order->save();

        // Optionally, you can redirect or return a response after saving the order
        return redirect()->route('user-profile')->with('success', 'nav-order');
    }
    public function defaultShippingAddress(Request $request)
    {
        $user = User::find(Auth::user()->id);
        // Make sure the user selects a shipping address
        if ($request->has('shipping_address_id')) {
            $user->shipping_address_id = $request->shipping_address_id;
            $user->save();
        }
        return redirect()->back()->with('success', 'Default Shipping Address updated successfully!');
    }

    public function shippingAddressStore(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'building' => 'required|string|max:255',
            'colony' => 'nullable|string|max:255',
            'region_name' => 'required|string|max:255',
            'city_name' => 'required|string|max:255',
            'area_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'delivery_label' => 'required|in:Home,Office',
        ]);

        // Store the shipping address
        $data = ShippingAddress::create([
            'user_id' => Auth::id(),
            'full_name' => $validatedData['full_name'],
            'phone_number' => $validatedData['phone_number'],
            'building' => $validatedData['building'],
            'colony' => $validatedData['colony'], // Optional
            'region_name' => $validatedData['region_name'],
            'city_name' => $validatedData['city_name'],
            'area_name' => $validatedData['area_name'],
            'address' => $validatedData['address'],
            'delivery_label' => $validatedData['delivery_label'],
        ]);

        $user = User::find(Auth::user()->id);
        $user->shipping_address_id = $data->id;
        $user->save();

        // Redirect or return response
        return redirect()->back()->with('success', 'Shipping address saved successfully!');
    }

    public function shippingAddressDelete(Request $request)
    {
        $data = ShippingAddress::find($request->id);
        $data->is_delete = true;
        $data->save();

        return response()->json(['success' => true, 'message' => 'Address successfully deleted!']);
    }

}
