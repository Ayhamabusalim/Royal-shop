<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingCart;

class CheckoutController extends Controller
{
    public function showCheckoutForm()
    {
        $user = Auth::user();

        // Get cart items with related product data
        $cart = ShoppingCart::with('product')
            ->where('user_id', $user->id)
            ->get();

        if ($cart->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // Calculate subtotal
        $subtotal = $cart->sum(fn($item) => $item->price * $item->quantity);

        $vat = 19.00; // Fixed VAT
        $shipping = 0.00; // Free shipping
        $total = $subtotal + $vat + $shipping;

        return view('frontend.pages.checkout', compact('cart', 'subtotal', 'vat', 'shipping', 'total'));
    }
}
