<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = ShoppingCart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $subtotal = $cartItems->sum('total');

        // Sync session every time cart page is visited
        $this->syncSessionCart();

        return view('frontend.pages.cart', compact('cartItems', 'subtotal'));
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cartItem = ShoppingCart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->total = $cartItem->quantity * $product->price;
            $cartItem->save();
        } else {
            ShoppingCart::create([
                'user_id'    => Auth::id(),
                'product_id' => $product->id,
                'quantity'   => 1,
                'price'      => $product->price,
                'total'      => $product->price,
            ]);
        }

        $this->syncSessionCart();

        $cart = session('cart', []);
        $cartCount = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'status' => 'Product added to cart',
            'count'  => $cartCount,
        ]);
    }

    public function remove($id)
    {
        $item = ShoppingCart::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $item->delete();

        $this->syncSessionCart();

        return redirect()->back()->with('success', 'Item removed.');
    }

    public function updateQuantity(Request $request, $id)
    {
        $cartItem = ShoppingCart::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $cartItem->quantity = $request->quantity;
        $cartItem->total = $cartItem->price * $request->quantity;
        $cartItem->save();

        $this->syncSessionCart();

        return response()->json(['message' => 'Cart updated']);
    }

    /**
     * 🔁 Synchronize session cart with database cart
     */
    private function syncSessionCart()
    {
        $cartItems = ShoppingCart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            session()->forget('cart');
            return;
        }

        $sessionCart = [];

        foreach ($cartItems as $item) {
            $sessionCart[$item->product_id] = [
                'product_id' => $item->product_id,
                'name'       => $item->product->name,
                'price'      => $item->price,
                'image'      => $item->product->image,
                'quantity'   => $item->quantity,
            ];
        }

        session()->put('cart', $sessionCart);
    }
}
