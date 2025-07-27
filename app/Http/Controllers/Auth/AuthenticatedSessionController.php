<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // ✅ Rebuild cart session from database
        $user = Auth::user();
        $cartItems = \App\Models\ShoppingCart::where('user_id', $user->id)->get();

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

        // Redirect based on role
        if ($user->roles->contains('name', 'admin')) {
            return redirect()->intended(RouteServiceProvider::DASH);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
