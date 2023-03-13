@extends('admin.layouts.main')
@section('title', 'Orders')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- Alert --}}
                        @if (session('success_msg'))
                            <div class="alert alert-success text-center">{{ session('success_msg') }}</div>
                        @endif

                        @if (session('error_msg'))
                            <div class="alert alert-warning text-center">{{ session('error_msg') }}</div>
                        @endif
                        {{-- End Alert --}}
                        <p class="card-description"> @lang('order.All Orders') </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> @lang('order.Tracking No') </th>
                                    <th> @lang('user.User Name') </th>
                                    <th> @lang('order.Payment Mode') </th>
                                    <th> @lang('order.Status Message') </th>
                                    <th> @lang('order.View') </th>
                                    <th> @lang('common.Delete') </th>
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
                                        <td> <a href="{{ route('orders.show', $order->id) }}" class="btn btn-gradient-primary"> @lang('order.View') </a> </td>
                                        <td>
                                            <form style="display: inline-block" action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                                    <i class="mdi mdi-trash-can-outline"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <h5> @lang('common.No Data Found') </h5>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
