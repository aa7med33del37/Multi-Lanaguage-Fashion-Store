<!DOCTYPE html>
<html>
    @php
        if (app()->getLocale()  == 'ar') {
            $lang = 'ar';
            $direction = 'rtl';
        }
        if (app()->getLocale()  == 'en') {
            $lang = 'en';
            $direction = 'ltr';
        }
    @endphp
    <head>
        <title> {{ $lang == 'ar' ? 'الفاتورة' : 'Invoice' }} </title>
    </head>
    <style type="text/css">
        body{
        font-family: 'Roboto Condensed', sans-serif;
        }
        .m-0{
        margin: 0px;
        }
        .p-0{
        padding: 0px;
        }
        .pt-5{
        padding-top:5px;
        }
        .mt-10{
        margin-top:10px;
        }
        .text-center{
        text-align:center !important;
        }
        .w-100{
        width: 100%;
        }
        .w-50{
        width:50%;
        }
        .w-85{
        width:85%;
        }
        .w-15{
        width:15%;
        }
        .logo img{
        width:200px;
        height:60px;
        }
        .gray-color{
        color:#5D5D5D;
        }
        .text-bold{
        font-weight: bold;
        }
        .border{
        border:1px solid black;
        }
        table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
        }
        table tr th{
        background: #F4F4F4;
        font-size:15px;
        }
        table tr td{
        font-size:13px;
        }
        table{
        border-collapse:collapse;
        }
        .box-text p{
        line-height:10px;
        }
        .float-left{
        float:left;
        }
        .total-part{
        font-size:16px;
        line-height:12px;
        }
        .total-right p{
        padding-right:20px;
        }

        .container {
            max-width: 960px;
            width: 100%;
            width: calc(100% - 1rem);
            margin: 50px auto;
            padding: 50px;
            border: 2px solid #eee;
        }

        tfoot td { font-weight: 700; }
    </style>
    <body style="direction: {{ $direction }}">
        <div class="">
            <div class="row">
                <div class="head-title">
                    <h1 class="text-center m-0 p-0"> @lang('invoice.Invoice') </h1>
                </div>
                <div class="add-detail mt-10">
                    <div class="w-50 float-left mt-10">
                        <p class="m-0 pt-5 text-bold w-100"> @lang('invoice.Invoice ID') - <span class="gray-color">{{ $order->id }}</span></p>
                        <p class="m-0 pt-5 text-bold w-100"> @lang('order.Tracking No') - <span class="gray-color">{{ $order->tracking_no }}</span></p>
                        <p class="m-0 pt-5 text-bold w-100"> @lang('order.Order Date') - <span class="gray-color">{{ date('Y-m-d', strtotime($order->created_at)) }}</span></p>
                    </div>
                    <div class="w-50 float-left logo mt-10">
                        <img src="{{ asset($settings->logo ?? '') }}" alt="Logo">
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="table-section bill-tbl w-100 mt-10">
                    <table class="table w-100 mt-10">
                        <tr>
                            <th class="w-50"> @lang('invoice.From') </th>
                            <th class="w-50"> @lang('invoice.To') </th>
                        </tr>
                        <tr>
                            <td>
                                <div class="box-text">
                                    <p>{{ $lang == 'ar' ? $settings->address_ar : $settings->address_en}}</p>
                                    <p>{{ $lang == 'ar' ? 'مصر' : 'Egypt'}}</p>
                                    <p>@lang('invoice.Contact'): {{ $settings->phone }} - {{ $settings->phone2 ?? '' }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="box-text">
                                    <p> {{ $order->phone }} </p>
                                    <p> {{ $lang == 'ar' ? $order->governorate->gov_ar : $order->governorate->gov_en }} </p>
                                    <p> {{ $lang == 'ar' ? $order->govCity->city_ar : $order->govCity->city_en }} </p>
                                    <p> {{ $order->address }} </p>
                                    <p> {{ $order->pincode ?? '' }} </p>
                                    <p> {{ $order->company ?? '' }} </p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="table-section bill-tbl w-100 mt-10">
                    <table class="table w-100 mt-10">
                        <tr>
                            <th class="w-50"> @lang('order.Payment Mode') </th>
                            <th class="w-50"> @lang('order.Status Message') </th>
                        </tr>
                        <tr>
                            <td style="text-transform: capitalize">
                                @if($order->payment_mode == 'cash on delivery')
                                    @lang('order.COD')
                                @else
                                    Paypal
                                @endif
                            </td>
                            <td style="text-transform: capitalize">
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
                        </tr>
                    </table>
                </div>
                <div class="table-section bill-tbl w-100 mt-10">
                    <table class="table w-100 mt-10">
                        @php
                            $totalAmount = 0;
                        @endphp
                        <tr>
                            <th class="w-25"> @lang('product.Title') </th>
                            <th class="w-25"> @lang('product.Price') </th>
                            <th class="w-25"> @lang('product.Quantity') </th>
                            <th class="w-25"> @lang('order.Total') </th>
                        </tr>
                        @foreach ($order->items as $item)
                            <tr align="center">
                                <td> {{ $lang == 'ar' ? $item->product->title_ar : $item->product->title_en }} </td>
                                <td> {{ number_format($item->price, 2, '.', ',') }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }} </td>
                                <td> {{ $item->quantity }} </td>
                                <td> {{ number_format($item->price * $item->quantity, 2, '.', ',') }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }} </td>
                            </tr>
                            @php
                                $totalAmount += $item->price * $item->quantity;
                            @endphp
                        @endforeach
                        <tfoot>
                            <tr>
                                <td colspan="3" style="text-align: {{ $lang == 'ar' ? 'left' : 'right' }};"> @lang('order.Total') </td>
                                <td> {{ number_format($totalAmount, 2, '.', ',') }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }} </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
