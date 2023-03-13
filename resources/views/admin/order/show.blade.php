@extends('admin.layouts.main')
@section('title', 'Order Items')
@section('styles')
    <style>
            tfoot td { font-weight: 700 }
            .track-line {
                height: 2px !important;
                background-color: #488978;
                opacity: 1;
            }

            .dot {
                height: 10px;
                width: 10px;
                margin-left: 3px;
                margin-right: 3px;
                margin-top: 0px;
                background-color: #488978;
                border-radius: 50%;
                display: inline-block
            }

            .big-dot {
                height: 25px;
                width: 25px;
                margin-left: 0px;
                margin-right: 0px;
                margin-top: 0px;
                background-color: #488978;
                border-radius: 50%;
                display: inline-block;
            }

            .big-dot i {
                font-size: 12px;
            }

            .card-stepper {
                z-index: 0
            }
    </style>
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="input-group">
                                    <select class="form-select" name="status_message" id="status_message">
                                        <option selected> @lang('common.Choose') </option>
                                        <option value="in progress" {{ $order->status_message == 'in progress' ? 'selected' : '' }}> @lang('order.In Process') </option>
                                        <option value="out for delivery" {{ $order->status_message == 'out for delivery' ? 'selected' : '' }}> @lang('order.Out For Delivery') </option>
                                        <option value="completed" {{ $order->status_message == 'completed' ? 'selected' : '' }}> @lang('order.Delivered') </option>
                                        <option value="pending" {{ $order->status_message == 'pending' ? 'selected' : '' }}> @lang('order.Pending') </option>
                                        <option value="cancelled" {{ $order->status_message == 'cancelled' ? 'selected' : '' }}> @lang('order.Cancelled') </option>
                                    </select>
                                    <button class="btn btn-gradient-success btn-outline" type="submit"> @lang('common.Update') </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section>
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-stepper" style="border-radius: 10px;">
                            <div class="card-body p-4">
                                {{-- Alert --}}
                                @if (session('success_msg'))
                                    <div class="alert alert-success text-center">{{ session('success_msg') }}</div>
                                @endif

                                @if (session('error_msg'))
                                    <div class="alert alert-warning text-center">{{ session('error_msg') }}</div>
                                @endif
                                {{-- End Alert --}}
                                <h4 class="card-title">
                                    <a class="btn btn-gradient-danger btn-rounded btn-fw" href="{{ route('orders.index') }}"> @lang('common.Back') </a>
                                </h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-column">
                                        <span class="lead fw-normal">
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
                                            {{-- Order has been {{ $order->status_message }} --}}
                                        </span>
                                    </div>
                                    <div>
                                        <a href="{{ url('/admin/invoice/' . $order->id) }}" target="_blank" class="btn btn-outline-info" type="button"> @lang('invoice.View Invocie') </a>
                                        <a href="{{ url('/admin/invoice/' . $order->id . '/generate') }}" class="btn btn-outline-danger" type="button"> @lang('invoice.Download Invoice') </a>
                                        <a href="{{ url('/admin/invoice/' . $order->id . '/mail') }}" class="btn btn-outline-success" type="button"> @lang('invoice.Send Invoice') </a>
                                    </div>
                                </div>
                                <hr class="my-4">

                                <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                                    <span class="dot"></span>
                                    <hr class="flex-fill track-line"><span class="dot"></span>
                                    @if ($order->status_message == 'out for delivery')
                                        <hr class="flex-fill track-line"><span class="dot"></span>
                                    <hr class="flex-fill"><span class=""></span>
                                    @elseif($order->status_message == 'completed')
                                        <hr class="flex-fill track-line"><span class="dot"></span>
                                        <hr class="flex-fill track-line"><span class="dot"></span>
                                    @else
                                    <hr class="flex-fill"><span class=""></span>
                                    <hr class="flex-fill"><span class=""></span>
                                    @endif
                                </div>

                                <div class="d-flex flex-row justify-content-between align-items-center">
                                <div class="d-flex flex-column align-items-start"><span>{{ date('d-m-y h:i A', strtotime($order->created_at)) }}</span><span> @lang('order.Ordered') </span>
                                </div>
                                <div class="d-flex flex-column justify-content-center"><span>{{ date('d-m-y h:i A', strtotime($order->created_at)) }}</span><span> @lang('order.Order Placed')</span></div>
                                <div class="d-flex flex-column justify-content-center align-items-center"><span> {{ date('d-m-y h:i A', strtotime($order->out_for_delivery_date ?? '')) }} </span><span> @lang('order.Out For Delivery') </span></div>
                                <div class="d-flex flex-column align-items-center"><span> {{ date('d-m-y h:i A', strtotime($order->delivered_date ?? '')) }} </span><span> @lang('order.Delivered') </span></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="orders">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center"> @lang('order.Order Info') </h5>
                                <p class="card-text">
                                    <p> <b> @lang('order.Order ID') : </b> <span>{{ $order->id }} </span></p>
                                    <p> <b> @lang('order.Tracking No') : </b>{{ $order->tracking_no }} </p>
                                    <p> <b> @lang('order.Payment Mode') : </b>
                                        @if($order->payment_mode == 'cash on delivery')
                                            @lang('order.COD')
                                        @else
                                            Paypal
                                        @endif
                                    </p>
                                    <p> <b> @lang('order.Status Message') : </b>
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
                                    </p>
                                    <p> <b> @lang('order.Order Date') : </b>{{ $order->created_at }} </p>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center"> @lang('order.User Details') </h5>
                                <p class="card-text">
                                    <p> <b> @lang('user.User Name'): </b> <span>{{ $order->id }} </span></p>
                                    <p> <b> @lang('user.Email'): </b>{{ $order->email }} </p>
                                    <p> <b> @lang('user.Phone'): </b>{{ $order->phone }} </p>
                                    <p> <b> @lang('user.City'): </b>{{ $order->city }} </p>
                                    <p> <b> @lang('user.Address'): </b>{{ $order->address }} </p>
                                    <p> <b> @lang('user.Pincode'): </b>{{ $order->pincode ?? '' }} </p>
                                    <p> <b> @lang('user.Company'): </b>{{ $order->company ?? '' }} </p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="table-responsive order-table">
                            <table class="bg-white table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th> @lang('common.Image')</th>
                                        <th> @lang('product.Title')</th>
                                        <th> @lang('product.Price')</th>
                                        <th> @lang('product.Quantity')</th>
                                        <th> @lang('order.Total')</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $totalAmount = 0;
                                    @endphp
                                    @foreach ($orderItems as $item)
                                        <tr>
                                            <td>
                                                <img style="height: 50px; width: 50px; display:inline" src="{{ asset($item->product->productImages[0]->image ?? '') }}" alt="">
                                            </td>
                                            <td >
                                                <a style="text-decoration: none" href="{{ url('shop/view/' . $item->product->slug) }}">
                                                    <b class="text-dark">{{ app()->getLocale() == 'ar' ? $item->product->title_ar : $item->product->title_en }}</b>
                                                </a>
                                            </td>
                                            <td> {{ number_format($item->price, 2, '.', ',') }} {{ app()->getLocale() == 'ar' ? 'ج.م' : 'EGP' }} </td>
                                            <td> {{ $item->quantity }} </td>
                                            <td> {{ number_format($item->price * $item->quantity, 2, '.', ',') }} {{ app()->getLocale() == 'ar' ? 'ج.م' : 'EGP' }} </td>
                                        </tr>
                                        @php
                                            $totalAmount += $item->price * $item->quantity;
                                        @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" style="text-align: right"> @lang('order.Total') </td>
                                        <td> {{ number_format($totalAmount, 2, '.', ',') }} {{ app()->getLocale() == 'ar' ? 'ج.م' : 'EGP' }} </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
