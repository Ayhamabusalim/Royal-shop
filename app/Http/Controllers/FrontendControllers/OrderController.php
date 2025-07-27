<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShoppingCart;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'zip' => 'required|string|max:10',
            'state' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'locality' => 'required|string|max:255',
            'landmark' => 'required|string|max:255',
            'payment_method' => 'required|string',
        ]);

        $user = Auth::user();

        // Get cart from DB
        $cart = ShoppingCart::with('product')->where('user_id', $user->id)->get();

        if ($cart->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // Calculate subtotal
        $subtotal = $cart->sum(fn($item) => $item->price * $item->quantity);

        $tax = 19.00;
        $shipping = 0.00;
        $discount = 0.00;
        $total = $subtotal + $tax + $shipping - $discount;

        // Create Order
        $order = new Order();
        $order->user_id = $user->id;
        $order->order_number = strtoupper(Str::random(10));
        $order->status = 'pending';
        $order->total_amount = $total;
        $order->tax_amount = $tax;
        $order->shipping_amount = $shipping;
        $order->discount_amount = $discount;
        $order->currency = 'USD';
        $order->payment_status = 'pending';
        $order->payment_method = $request->payment_method;
        $order->notes = json_encode([
            'name' => $request->name,
            'phone' => $request->phone,
            'zip' => $request->zip,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'locality' => $request->locality,
            'landmark' => $request->landmark,
        ]);
        $order->save();

        // Create OrderItems from Cart
        foreach ($cart as $item) {
            $product = $item->product;

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->product_id;
            $orderItem->product_name = $product->name ?? 'N/A';
            $orderItem->product_sku = $product->sku ?? 'N/A';
            $orderItem->quantity = $item->quantity;
            $orderItem->price = $item->price;
            $orderItem->total = $item->price * $item->quantity;
            $orderItem->save();
        }

        // Clear the cart
        ShoppingCart::where('user_id', $user->id)->delete();

        // Store order in session to show on confirmation page
        session()->put('order', $order);

        return redirect()->route('confirmation_order')->with('success', 'Order placed successfully!');
    }
}
