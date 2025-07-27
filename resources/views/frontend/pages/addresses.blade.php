@extends('frontend.layout.master')

@section('main')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">Addresses</h2>
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.layout.myaccount-sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="page-content my-account__address">
                        <div class="row">
                            <div class="col-6">
                                <p class="notice">The following addresses will be used on the checkout page by default.</p>
                            </div>
                           
                        </div>

                        <div class="my-account__address-list row">
                            <h5>Shipping Address</h5>

                            @if($shippingAddress)
                                <div class="my-account__address-item col-md-6">
                                    <div class="my-account__address-item__title">
                                        <h5>{{ $shippingAddress->first_name }} {{ $shippingAddress->last_name }} <i
                                                class="fa fa-check-circle text-success"></i></h5>
                                    </div>
                                    <div class="my-account__address-item__detail">
                                        @if($shippingAddress->company)
                                            <p>{{ $shippingAddress->company }}</p>
                                        @endif
                                        <p>{{ $shippingAddress->address_line_1 }}</p>
                                        @if($shippingAddress->address_line_2)
                                            <p>{{ $shippingAddress->address_line_2 }}</p>
                                        @endif
                                        <p>{{ $shippingAddress->city }}, {{ $shippingAddress->state }}</p>
                                        <p>{{ $shippingAddress->postal_code }}, {{ $shippingAddress->country }}</p>
                                        <br>
                                        <p>Mobile : {{ $shippingAddress->phone ?? '-' }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <div class="alert alert-warning text-center mt-4">
                                        You do not have a shipping address yet.
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection