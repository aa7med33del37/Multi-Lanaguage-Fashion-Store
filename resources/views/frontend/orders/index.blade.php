@extends('frontend.layouts.main')
@php
    if (app()->getLocale() == 'en') {
        $lang = 'en';
    }
    if (app()->getLocale() == 'ar') {
        $lang = 'ar';
    }
@endphp
@section('title', $lang == 'ar' ? 'الطلبات' : 'Your Orders')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-12 table-responsive-sm">
                        <table class="bg-white table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> @lang('order.Tracking No') </th>
                                    <th> @lang('user.User Name') </th>
                                    <th> @lang('order.Payment Mode') </th>
                                    <th> @lang('order.Status Message') </th>
                                    <th> @lang('order.View') </th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td> {{ $order->id }} </td>
                                        <td> {{ $order->tracking_no }} </td>
                                        <td> {{ $order->name }} </td>
                                        <td>
                                            @if($order->payment_mode == 'cash on delivery')
                                                @lang('order.COD')
                                            @else
                                                Paypal
                                            @endif
                                        </td>
                                        <td>
                                            @if($order->status_message == 'in progress')
                                                @lang('order.In Process')
                                            @elseif($order->status_message == 'out for delivery')
                                                @lang('order.Out For Delivery')
                                            @elseif($order->status_message == 'completed')
                                                @lang('order.Delivered')
                                            @elseif($order->status_message == 'pending')
                                                @lang('order.Pending')
                                            @elseif($order->status_message == 'cancelled')
                                                @lang('order.Cancelled')
                                            @endif
                                        </td>
                                        <td> <a href="{{ url('orders/' . $order->id) }}" class="btn btn-info"> @lang('order.View') </a> </td>
                                    </tr>
                                @empty
                                    <h5> @lang('order.Empty Orders') </h5>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main>
@endsection
