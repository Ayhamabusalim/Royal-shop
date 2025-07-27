<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class AccountOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('frontend.pages.orders', compact('orders'));
    }

   /*  public function show($id)
    {
        $order = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('frontend.pages.order_details', compact('order'));
    } */
}
