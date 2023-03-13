@extends('frontend.layouts.main')
@php
    if (app()->getLocale() == 'en') {
        $lang = 'en';
    }
    if (app()->getLocale() == 'ar') {
        $lang = 'ar';
    }
@endphp
@section('title', $lang == 'ar' ? 'تسوق الاقسام' : 'Shop By Category')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav breadcrumb-with-filter">
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="categories-page">
            <div class="container">
                <div class="row">
                    @forelse ($parentCategories as $p_category)
                        <div class="col-12 col-md-3">
                            <div class="banner banner-cat banner-badge">
                                <a href="{{ url('shop/' . $p_category->slug) }}">
                                    <img src="{{ asset($p_category->image ?? '') }}" alt="{{ $lang == 'ar' ? $p_category->name_ar : $p_category->name_en }}">
                                </a>

                                <a class="banner-link" href="{{ url('shop/' . $p_category->slug) }}">
                                    <h3 class="banner-title">{{ $lang == 'ar' ? $p_category->name_ar : $p_category->name_en }}</h3>
                                    <span class="banner-link-text"> @lang('frontend.Shop Now') </span>
                                </a><!-- End .banner-link -->
                            </div>
                        </div>
                    @empty
                        <h5> No Category Found </h5>
                    @endforelse

                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .categories-page -->
    </div><!-- End .page-content -->
</main>
@endsection
