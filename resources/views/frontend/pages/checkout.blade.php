@extends('frontend.layout.master')

@section('main')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
        <h2 class="page-title">Shipping and Checkout</h2>

        <div class="checkout-steps">
            <a href="{{ route('cart') }}" class="checkout-steps__item active">
                <span class="checkout-steps__item-number">01</span>
                <span class="checkout-steps__item-title">
                    <span>Shopping Bag</span>
                    <em>Manage Your Items List</em>
                </span>
            </a>
            <a href="{{ route('checkout') }}" class="checkout-steps__item active">
                <span class="checkout-steps__item-number">02</span>
                <span class="checkout-steps__item-title">
                    <span>Shipping and Checkout</span>
                    <em>Checkout Your Items List</em>
                </span>
            </a>
            <a href="{{ route('confirmation_order') }}" class="checkout-steps__item">
                <span class="checkout-steps__item-number">03</span>
                <span class="checkout-steps__item-title">
                    <span>Confirmation</span>
                    <em>Review And Submit Your Order</em>
                </span>
            </a>
        </div>

        <form method="POST" action="{{ route('checkout.placeOrder') }}">
            @csrf
            <div class="checkout-form">
                <div class="billing-info__wrapper mb-5">
                    <div class="row">
                        <div class="col-6">
                            <h4>SHIPPING DETAILS</h4>
                        </div>
                        <div class="col-6"></div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="form-floating my-3">
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                >
                                <label for="name">Full Name *</label>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating my-3">
                                <input
                                    id="phone"
                                    type="text"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    required
                                >
                                <label for="phone">Phone Number *</label>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input
                                    id="zip"
                                    type="text"
                                    class="form-control @error('zip') is-invalid @enderror"
                                    name="zip"
                                    value="{{ old('zip') }}"
                                    required
                                >
                                <label for="zip">Pincode *</label>
                                @error('zip')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input
                                    id="state"
                                    type="text"
                                    class="form-control @error('state') is-invalid @enderror"
                                    name="state"
                                    value="{{ old('state') }}"
                                    required
                                >
                                <label for="state">State *</label>
                                @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input
                                    id="city"
                                    type="text"
                                    class="form-control @error('city') is-invalid @enderror"
                                    name="city"
                                    value="{{ old('city') }}"
                                    required
                                >
                                <label for="city">Town / City *</label>
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating my-3">
                                <input
                                    id="address"
                                    type="text"
                                    class="form-control @error('address') is-invalid @enderror"
                                    name="address"
                                    value="{{ old('address') }}"
                                    required
                                >
                                <label for="address">House no, Building Name *</label>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating my-3">
                                <input
                                    id="locality"
                                    type="text"
                                    class="form-control @error('locality') is-invalid @enderror"
                                    name="locality"
                                    value="{{ old('locality') }}"
                                    required
                                >
                                <label for="locality">Road Name, Area, Colony *</label>
                                @error('locality')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating my-3">
                                <input
                                    id="landmark"
                                    type="text"
                                    class="form-control @error('landmark') is-invalid @enderror"
                                    name="landmark"
                                    value="{{ old('landmark') }}"
                                    required
                                >
                                <label for="landmark">Landmark *</label>
                                @error('landmark')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="checkout__totals">
                    <h3>Your Order</h3>

                    <table class="checkout-cart-items w-100 mb-4">
                        <thead>
                            <tr>
                                <th>PRODUCT</th>
                                <th class="text-end">SUBTOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                                <tr>
                                    <td>{{ $item->product->name ?? 'Unnamed Product' }} x {{ $item->quantity }}</td>
                                    <td class="text-end">
                                        ${{ number_format($item->price * $item->quantity, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="checkout-totals w-100 mb-4">
                        <tbody>
                            <tr>
                                <th>SUBTOTAL</th>
                                <td class="text-end">${{ number_format($subtotal, 2) }}</td>
                            </tr>
                            {{-- Uncomment if shipping applies
                            <tr>
                                <th>SHIPPING</th>
                                <td class="text-end">Free shipping</td>
                            </tr> --}}
                            <tr>
                                <th>VAT</th>
                                <td class="text-end">${{ number_format($vat, 2) }}</td>
                            </tr>
                            <tr>
                                <th>TOTAL</th>
                                <td class="text-end fw-bold">${{ number_format($total, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Payment Method inside Order Summary -->
                    <div class="payment-method mt-4">
                        <h4 class="mb-3">Payment Method *</h4>
                        <div class="d-flex gap-3 flex-wrap">

                            <label class="payment-card form-check-label p-3 border rounded shadow-sm flex-fill cursor-pointer"
                                for="payment_cod"
                                tabindex="0"
                                role="radio"
                                aria-checked="{{ old('payment_method', 'cash_on_delivery') == 'cash_on_delivery' ? 'true' : 'false' }}"
                                >
                                <input
                                    class="form-check-input d-none"
                                    type="radio"
                                    name="payment_method"
                                    id="payment_cod"
                                    value="cash_on_delivery"
                                    {{ old('payment_method', 'cash_on_delivery') == 'cash_on_delivery' ? 'checked' : '' }}
                                    required
                                >
                                <div class="d-flex align-items-center">
                                    <span class="me-3 fs-4">💵</span>
                                    <div>
                                        <div class="fw-bold fs-5">Cash on Delivery</div>
                                        <small class="text-muted">Pay when you receive your order</small>
                                    </div>
                                </div>
                            </label>

                            {{-- Add more payment methods here if needed --}}
                        </div>
                        @error('payment_method')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Place Order Button -->
                    <button type="submit" class="btn btn-primary btn-checkout mt-4 w-100">PLACE ORDER</button>
                </div>
            </div>
        </form>
    </section>
</main>

<style>
.payment-card {
    transition: border-color 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
    user-select: none;
}
.payment-card:hover,
.payment-card:focus-visible {
    border-color: #0d6efd;
    box-shadow: 0 0 12px rgba(13, 110, 253, 0.4);
    outline: none;
    background-color: #f0f8ff;
}
.payment-card input:checked + div,
.payment-card input:checked ~ div {
    border-color: #0d6efd;
    box-shadow: 0 0 12px rgba(13, 110, 253, 0.7);
    background-color: #e7f1ff;
}
.cursor-pointer {
    cursor: pointer;
}
</style>
@endsection
