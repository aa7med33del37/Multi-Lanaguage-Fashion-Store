@extends('frontend.layouts.main')
@php
    if (app()->getLocale() == 'en') {
        $lang = 'en';
    }
    if (app()->getLocale() == 'ar') {
        $lang = 'ar';
    }
@endphp
@section("title", $lang == 'ar' ? 'الرائج الآن' : "Trending Products")
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                @lang('frontend.Showing') <span> {{ $products->count() }} </span>
                                @if ($products->count() == 1)
                                    {{ $lang == 'ar' ? 'منتج' : 'Product' }}
                                @else
                                    @lang('product.Products')
                                @endif
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-6 col-md-3 col-lg-3">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <span class="product-label label-new">@lang('New')</span>
                                            <a href="{{ url('shop/view/' . $product->slug) }}" class="product-img">
                                                <img class="" src="{{ asset($product->productImages[0]->image ?? '') }}" alt="{{ $lang == 'ar' ? $product->title_ar : $product->title_en }}" title="{{ $lang == 'ar' ? $product->title_ar : $product->title_en }}" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                            </div>
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="{{ url('shop/view/' . $product->slug) }}">{{ $lang == 'ar' ? $product->category->name_ar : $product->category->name_en }}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="{{ url('shop/view/' . $product->slug) }}"> {{ $lang == 'ar' ? $product->title_ar : $product->title_en }} </a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                <small><s>{{ $product->original_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}</s></small>
                                                <b>{{ $product->selling_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}</b>
                                            </div>
                                        </div><!-- End .product-body -->
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- End .row -->
                    </div>
                </div>
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main>

@endsection
