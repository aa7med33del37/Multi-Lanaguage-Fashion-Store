@extends('frontend.layouts.main')
@php
    if (app()->getLocale() == 'ar') {
        $lang = 'ar';
    } else {
        $lang = 'en';
    }
@endphp
@section('title', $lang == 'ar' ? 'المفضلة' : 'Wishlist')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th style="text-align: start"> @lang('product.Product') </th>
                                    <th> @lang('product.Price') </th>
                                    <th> @lang('common.Remove') </th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="{{ url('shop/view/' . $item->product->slug) }}">
                                                        <img src="{{ asset($item->product->productImages[0]->image ?? '') }}" alt="Product image">
                                                    </a>
                                                </figure>

                                                <h3 class="product-title mr-4 ml-4">
                                                    <a class="text-uppercase font-weight-bold" href="{{ url('shop/view/' . $item->product->slug) }}"> {{ $lang == 'ar' ? $item->product->title_ar : $item->product->title_en }} </a>
                                                </h3><!-- End .product-title -->
                                            </div><!-- End .product -->
                                        </td>
                                        <td class="price-col"> {{ number_format($item->product->selling_price, 2, '.', ',') }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }} </td>
                                        <td>
                                            <a href="{{ route('wishlist.remove', $item->id) }}" class="btn btn-danger"> @lang('common.Remove') </a>
                                        </td>
                                    </tr>
                                @empty
                                    <h5> Empty Wishlist </h5>
                                @endforelse

                            </tbody>
                        </table>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main>

@endsection
