<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;

class ConfirmationController extends Controller
{
    public function index()
    {
        $order = session('order');

        if (!$order) {
            return redirect()->route('index')->with('error', 'No recent order found.');
        }

        // Optionally clear order from session if you want it to be one-time view
        session()->forget('order');

        return view('frontend.pages.confirmation_order', compact('order'));
    }
}
