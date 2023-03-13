@extends('frontend.layouts.main')
@php
    if (app()->getLocale() == 'ar') {
        $lang = 'ar';
    } else {
        $lang = 'en';
    }
@endphp
@section('title', $lang == 'ar' ? 'شكرا' : 'Thank You')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}"> @lang('frontend.Home') </a></li>
                <li class="breadcrumb-item"><a href="{{ url('/orders') }}"> @lang('frontend.Orders') </a></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="error-content text-center" style="background-image: url({{ asset('assets/frontend/images/backgrounds/error-bg.jpg') }})">
        <div class="container">
            <h1 class="error-title text-uppercase"> {{ $lang == 'ar' ? 'شكرا' : 'Thank You' }} </h1><!-- End .error-title -->
            <p class="text-success"> {{ $lang == 'ar' ? 'تم تأكيد طلبك' : 'Your Order Has Been Ordered' }} </p>
            <a href="{{ url('/shop') }}" class="btn btn-outline-primary-2 btn-minwidth-lg">
                <span> @lang('frontend.Continue Shopping') </span>
                <i class="icon-long-arrow-right"></i>
            </a>
        </div><!-- End .container -->
    </div><!-- End .error-content text-center -->
</main>
@endsection
