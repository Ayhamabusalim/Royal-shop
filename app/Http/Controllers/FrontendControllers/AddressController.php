<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function addressPage()
{
    $user = Auth::user();

    $orderWithAddress = Order::with('shippingAddress')
        ->where('user_id', $user->id)
        ->whereHas('shippingAddress')
        ->latest()
        ->first();

    $shippingAddress = $orderWithAddress?->shippingAddress;

    return view('frontend.pages.addresses', compact('shippingAddress'));
}
}
