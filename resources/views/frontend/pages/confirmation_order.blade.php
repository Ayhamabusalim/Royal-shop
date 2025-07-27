@extends('frontend.layout.master')

@section('main')
<main class="pt-90">
    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body text-center p-5">
                        <div class="mb-4">
                            {{-- Success Icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="none" stroke="#28a745" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="mb-3">
                                <circle cx="36" cy="36" r="34" />
                                <path d="M20 37l12 12 22-22" />
                            </svg>
                        </div>

                        <h2 class="card-title mb-3 text-success">Order Confirmed!</h2>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <p class="lead mb-4">
                            Thank you for your order, <strong>{{ json_decode($order->notes)->name }}</strong>!
                        </p>

                        <ul class="list-group list-group-flush text-start mb-4">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Order Number:</span>
                                <strong>{{ $order->order_number }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Total Amount:</span>
                                <strong>${{ number_format($order->total_amount, 2) }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Status:</span>
                                <strong>{{ ucfirst($order->status) }}</strong>
                            </li>
                        </ul>

                        <a href="{{ route('index') }}" class="btn btn-primary btn-lg mt-3 px-5">
                            Back to Home
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection
