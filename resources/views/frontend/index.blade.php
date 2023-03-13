@extends('frontend.layouts.main')
@php
    if (app()->getLocale() == 'en') {
        $lang = 'en';
    }
    if (app()->getLocale() == 'ar') {
        $lang = 'ar';
    }
@endphp
@section('content')
<main class="main">
    <div class="intro-slider-container mb-6">
        <div>
            @foreach ($banners as $banner)
                <div class="intro-slide" style="background-image: url({{ asset($banner->image) }});">
                <div class="container intro-content">
                    <h3 class="intro-subtitle text-white">{{ $lang == 'ar' ? $banner->description_ar : $banner->description_en }}</h3><!-- End .h3 intro-subtitle -->
                    <h1 class="intro-title text-white">{{ $lang == 'ar' ? $banner->title_ar : $banner->title_en }}</h1><!-- End .intro-title -->
                </div><!-- End .intro-content -->
            </div>
            @endforeach
        </div><!-- End .intro-slider owl-carousel owl-simple -->
    </div><!-- End .intro-slider-container -->

    <div class="blog-posts">
        <div class="container">
            <div class="heading text-center">
                <h2 class="title"> @lang('frontend.Shop Now') </h2><!-- End .title -->
            </div><!-- End .heading -->

            <div class="categories-page">
                <div class="container">
                    <div class="row">
                        @forelse ($parentCategories as $p_category)
                            <div class="col-12 col-md-3">
                                <div class="banner banner-cat banner-badge">
                                    <a style="height: 100%" href="{{ url('shop/' . $p_category->slug) }}">
                                        <img style="height: 100%" src="{{ asset($p_category->image ?? '') }}" alt="{{ $p_category->name }}">
                                    </a>

                                    <a class="banner-link" href="{{ url('shop/' . $p_category->slug) }}">
                                        <h3 class="banner-title">{{ $lang == 'ar' ? $p_category->name_ar : $p_category->name_en }}</h3>
                                        <span class="banner-link-text"> @lang('frontend.Shop Now') </span>
                                    </a><!-- End .banner-link -->
                                </div>
                            </div>
                        @empty
                            <h5> @lang('common.No Data Found') </h5>
                        @endforelse

                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div>

            <hr class="mb-3">
        </div><!-- End .container -->
    </div>

    <div class="container">
        <div class="heading heading-center mb-3">
            <h2 class="title"> @lang('frontend.Latest Products')</h2><!-- End .title -->

            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="trendy-all-link" data-toggle="tab" href="#trendy-all-tab" role="tab" aria-controls="trendy-all-tab" aria-selected="true"> @lang('frontend.All') </a>
                </li>
                @forelse ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" id="trendy-{{ $category->slug }}-link" data-toggle="tab" href="#trendy-{{ $category->slug }}-tab" role="tab" aria-controls="trendy-{{ $category->slug }}-tab" aria-selected="false"> {{ $lang == 'ar' ? $category->name_ar : $category->name_en }} </a>
                    </li>
                @empty
                @endforelse
            </ul>
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":4,
                                "nav": true
                            }
                        }
                    }'>

                    @forelse ($products as $product)
                    <div class="product product-2">
                        <figure class="product-media">
                            <a style="height: 100%" href="{{ url('shop/view/' . $product->slug) }}">
                                <img style="height: 100%" src="{{ asset($product->productImages[0]->image ?? '') }}" alt="Product image" class="product-image">
                                @if($product->productImages()->count() > 1)
                                    <img style="height: 100%" src="{{ asset($product->productImages[1]->image ?? '') }}" alt="Product image" class="product-image-hover">
                                @endif
                            </a>

                            <div class="product-action-vertical">
                                <a href="{{ route('add_to_wishlist', $product->id) }}" class="btn-product-icon btn-wishlist btn-expandable" title="@lang('frontend.Add To Wishlist')"><span>@lang('frontend.Add To Wishlist')</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body text-center">
                            <div class="product-cat">
                                <a href="{{ url('shop/' . $product->category->slug) }}"> {{ $lang == 'ar' ? $product->category->name_ar : $product->category->name_en }} </a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="{{ url('shop/view/' . $product->slug) }}" class="font-weight-bold"> {{ $lang == 'ar' ? $product->title_ar : $product->title_en }} </a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <small><s>{{ $product->original_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}</s></small>
                                <b style="margin-left: 3px">{{ $product->selling_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}</b>
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div>
                    @empty
                    <h5>@lang('common.No Data Found')</h5>
                    @endforelse
                </div><!-- End .owl-carousel -->
            </div>

            @foreach ($categories as $category)
            <div class="tab-pane p-0 fade" id="trendy-{{ $category->slug }}-tab" role="tabpanel" aria-labelledby="trendy-{{ $category->slug }}-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":4,
                                "nav": true
                            }
                        }
                    }'>

                    @forelse ($category->products as $product)
                    <div class="product product-2">
                        <figure class="product-media">
                            <a href="{{ url('shop/view/' . $product->slug) }}">
                                <img style="height: 100%" src="{{ asset($product->productImages[0]->image ?? '') }}" alt="Product image" class="product-image">
                                @if($product->productImages()->count() > 1)
                                    <img style="height: 100%" src="{{ asset($product->productImages[1]->image) }}" alt="Product image" class="product-image-hover">
                                @endif
                            </a>

                            <div class="product-action-vertical">
                                <a href="{{ route('add_to_wishlist', $product->id) }}" class="btn-product-icon btn-wishlist btn-expandable" title="@lang('frontend.Add To Wishlist')"><span>@lang('frontend.Add To Wishlist')</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#"> {{ $lang == 'ar' ? $product->category->name_ar : $product->category->name_en }} </a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="{{ url('shop/view/' . $product->slug) }}" class="font-weight-bold"> {{ $lang == 'ar' ? $product->title_ar : $product->title_en }} </a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <small><s>{{ $product->original_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}</s></small>
                                <b style="margin-left: 3px">{{ $product->selling_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}</b>
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div>
                    @empty
                    <h5>@lang('product.No Products Found')</h5>
                    @endforelse
                </div><!-- End .owl-carousel -->
                <div class="text-center">
                <a href="{{ url('shop/' . $category->slug) }}" class="btn btn-outline-primary btn-round"> @lang('common.View More') </a>
                </div>
            </div>
            @endforeach


        </div><!-- End .tab-content -->
    </div>

    <div class="mb-6"></div>
    <hr>

    <div class="container">
        <div class="heading heading-center mb-3">
            <h2 class="title"> @lang('frontend.Our Collections') </h2><!-- End .title -->

            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="trendy-trending-link" data-toggle="tab" href="#trendy-trending-tab" role="tab" aria-controls="trendy-trending-tab" aria-selected="true"> @lang('frontend.Trending') </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="trendy-featured-link" data-toggle="tab" href="#trendy-featured-tab" role="tab" aria-controls="trendy-featured-tab" aria-selected="true"> @lang('frontend.Featured') </a>
                </li>
            </ul>
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel">
            {{-- Trending --}}
            <div class="tab-pane p-0 fade show active" id="trendy-trending-tab" role="tabpanel" aria-labelledby="trendy-trending-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":4,
                                "nav": true
                            }
                        }
                    }'>

                    @forelse ($trendingProducts as $product)
                    <div class="product product-2">
                        <figure class="product-media">
                            <a href="{{ url('shop/view/' . $product->slug) }}">
                                <img style="height: 100%" src="{{ asset($product->productImages[0]->image ?? '') }}" alt="Product image" class="product-image">
                                @if($product->productImages()->count() > 1)
                                    <img style="height: 100%" src="{{ asset($product->productImages[1]->image ?? '') }}" alt="Product image" class="product-image-hover">
                                @endif
                            </a>

                            <div class="product-action-vertical">
                                <a href="{{ route('add_to_wishlist', $product->id) }}" class="btn-product-icon btn-wishlist btn-expandable" title="@lang('frontend.Add To Wishlist')"><span>@lang('frontend.Add To Wishlist')</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#"> {{ $lang == 'ar' ? $product->category->name_ar : $product->category->name_en }} </a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="{{ url('shop/view/' . $product->slug) }}" class="font-weight-bold"> {{ $lang == 'ar' ? $product->title_ar : $product->title_en }} </a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <small><s>{{ $product->original_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}</s></small>
                                <b style="margin-left: 3px">{{ $product->selling_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}</b>
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div>
                    @empty
                    <h5>@lang('common.No Data Found')</h5>
                    @endforelse
                </div><!-- End .owl-carousel -->
            </div>

            {{-- Featured --}}
            <div class="tab-pane p-0 fade show" id="trendy-featured-tab" role="tabpanel" aria-labelledby="trendy-featured-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":4,
                                "nav": true
                            }
                        }
                    }'>

                    @forelse ($featuredProducts as $product)
                    <div class="product product-2">
                        <figure class="product-media">
                            <a href="{{ url('shop/view/' . $product->slug) }}">
                                <img style="height: 100%" src="{{ asset($product->productImages[0]->image ?? '') }}" alt="Product image" class="product-image">
                                @if($product->productImages()->count() > 1)
                                    <img style="height: 100%" src="{{ asset($product->productImages[1]->image ?? '') }}" alt="Product image" class="product-image-hover">
                                @endif
                            </a>

                            <div class="product-action-vertical">
                                <a href="{{ route('add_to_wishlist', $product->id) }}" class="btn-product-icon btn-wishlist btn-expandable" title="@lang('frontend.Add To Wishlist')"><span>@lang('frontend.Add To Wishlist')</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#"> {{ $lang == 'ar' ? $product->category->name_ar : $product->category->name_en }} </a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="{{ url('shop/view/' . $product->slug) }}" class="font-weight-bold"> {{ $lang == 'ar' ? $product->title_ar : $product->title_en }} </a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <small><s>{{ $product->original_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}</s></small>
                                <b style="margin-left: 3px">{{ $product->selling_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}</b>
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div>
                    @empty
                    <h5>No Products Found</h5>
                    @endforelse
                </div><!-- End .owl-carousel -->
            </div>

        </div><!-- End .tab-content -->
    </div>
</main>
@endsection
