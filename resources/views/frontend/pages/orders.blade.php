@extends('frontend.layout.master')

@section('main')
    <main class="pt-90" style="padding-top: 0px;">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">Orders</h2>
            <div class="row">
                <div class="col-lg-2">
                    @include('frontend.layout.myaccount-sidebar')
                </div>
                <div class="col-lg-10">
                    <div class="wg-table table-all-user">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 80px">Order No</th>
                                        <th>Name</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Subtotal</th>
                                        <th class="text-center">Tax</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Order Date</th>
                                        <th class="text-center">Items</th>
                                        <th class="text-center">Delivered On</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                        @php $notes = json_decode($order->notes); @endphp
                                        <tr>
                                            <td class="text-center">{{ $order->order_number }}</td>
                                            <td class="text-center">{{ $notes->name ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $notes->phone ?? 'N/A' }}</td>
                                            <td class="text-center">
                                                ${{ number_format($order->total_amount - $order->tax_amount, 2) }}</td>
                                            <td class="text-center">${{ number_format($order->tax_amount, 2) }}</td>
                                            <td class="text-center">${{ number_format($order->total_amount, 2) }}</td>
                                            <td class="text-center">
                                                <span
                                                    class="badge bg-{{ $order->status === 'cancelled' ? 'danger' : ($order->status === 'delivered' ? 'success' : 'warning') }}">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td class="text-center">{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                                            <td class="text-center">{{ $order->items->count() }}</td>
                                            <td class="text-center">
                                                {{ $order->delivered_at ? $order->delivered_at->format('Y-m-d') : '-' }}
                                            </td>
                                           {{--  <td class="text-center">
                                                <a href="{{ route('account.orders.show', $order->id) }}">
                                                    <div class="list-icon-function view-icon">
                                                        <div class="item eye">
                                                            <i class="fa fa-eye"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center">You have no orders.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="pagination-wrapper mt-3">
                                {{ $orders->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                </div>
            </div>
        </section>
    </main>
@endsection