<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Order;

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

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
