@extends('frontend.layout.master')

@section('main')
  <main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
    <h2 class="page-title">Cart</h2>

    <div class="checkout-steps">
      <a href="{{ route('cart') }}" class="checkout-steps__item active">
      <span class="checkout-steps__item-number">01</span>
      <span class="checkout-steps__item-title">
        <span>Shopping Bag</span>
        <em>Manage Your Items List</em>
      </span>
      </a>
      <a href="{{ route('checkout.placeOrder') }}" class="checkout-steps__item">
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

    @if($cartItems->count() > 0)
    <div class="shopping-cart">
      <div class="cart-table__wrapper">
      <table class="cart-table">
      <thead>
      <tr>
        <th>Product</th>
        <th></th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
      @foreach($cartItems as $item)
      <tr>
      <td>
      <div class="shopping-cart__product-item">
      <img loading="lazy" src="{{ asset('images/products/' . $item->product->image) }}" width="120"
      height="120" alt="" />
      </div>
      </td>
      <td>
      <div class="shopping-cart__product-item__detail">
      <h4>{{ $item->product->name }}</h4>
      <ul class="shopping-cart__product-item__options">
      {{-- Example for variations if available --}}
      {{-- <li>Color: {{ $item->color }}</li>
      <li>Size: {{ $item->size }}</li> --}}
      </ul>
      </div>
      </td>
      <td>
      <span class="shopping-cart__product-price">${{ number_format($item->price, 2) }}</span>
      </td>
      <td>
      <div class="qty-control position-relative">
      <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
      class="qty-control__number text-center" onchange="updateQuantity({{ $item->id }}, this.value)">
      <div class="qty-control__reduce" onclick="adjustQty(this, -1)">-</div>
      <div class="qty-control__increase" onclick="adjustQty(this, 1)">+</div>
      </div>
      </td>
      <td>
      <span class="shopping-cart__subtotal">${{ number_format($item->total, 2) }}</span>
      </td>
      <td>
      <form method="POST" action="{{ route('cart.remove', $item->id) }}">
      @csrf
      @method('DELETE')
      <button class="remove-cart" type="submit">
      <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
        <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
      </svg>
      </button>
      </form>
      </td>
      </tr>
      @endforeach
      </tbody>
      </table>

      <div class="cart-table-footer mt-4">
      <form action="#" class="position-relative bg-body">
      <input class="form-control" type="text" name="coupon_code" placeholder="Coupon Code">
      <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4" type="submit"
        value="APPLY COUPON">
      </form>
      <button class="btn btn-light mt-3">UPDATE CART</button>
      </div>
      </div>

      <div class="shopping-cart__totals-wrapper">
      <div class="sticky-content">
      <div class="shopping-cart__totals">
      <h3>Cart Totals</h3>
      <table class="cart-totals">
        <tbody>
        <tr>
        <th>Subtotal</th>
        <td>${{ number_format($subtotal, 2) }}</td>
        </tr>
       {{--  <tr>
        <th>Shipping</th>
        <td>
        <div class="form-check">
          <input class="form-check-input form-check-input_fill" type="checkbox" id="free_shipping">
          <label class="form-check-label" for="free_shipping">Free shipping</label>
        </div>
        <div class="form-check">
          <input class="form-check-input form-check-input_fill" type="checkbox" id="flat_rate">
          <label class="form-check-label" for="flat_rate">Flat rate: $49</label>
        </div>
        <div class="form-check">
          <input class="form-check-input form-check-input_fill" type="checkbox" id="local_pickup">
          <label class="form-check-label" for="local_pickup">Local pickup: $8</label>
        </div>
        <div>Shipping to AL.</div>
        <a href="#" class="menu-link menu-link_us-s">CHANGE ADDRESS</a>
        </td>
        </tr> --}}
        <tr>
        <th>VAT</th>
        <td>$19</td>
        </tr>
        <tr>
        <th>Total</th>
        <td>${{ number_format($subtotal + 19, 2) }}</td>
        </tr>
        </tbody>
      </table>
      </div>

      <div class="mobile_fixed-btn_wrapper mt-4">
      <div class="button-wrapper container">
        <a href="{{ route('checkout.placeOrder') }}" class="btn btn-primary btn-checkout">PROCEED TO CHECKOUT</a>
      </div>
      </div>
      </div>
      </div>
    </div>

    @else
    <p>Your cart is empty.</p>
    @endif
    </section>
  </main>

  <script>
    function updateQuantity(id, qty) {
    fetch(`/cart/update/${id}`, {
      method: 'PATCH',
      headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({ quantity: qty })
    })
      .then(res => res.json())
      .then(data => location.reload())
      .catch(err => console.error(err));
    }

    function adjustQty(button, delta) {
    const input = button.parentElement.querySelector('input.qty-control__number');
    let newQty = parseInt(input.value) + delta;
    if (newQty >= 1) {
      input.value = newQty;
      input.dispatchEvent(new Event('change'));
    }
    }
  </script>
@endsection