@extends('frontend.layouts.main')
@section('title', app()->getLocale() == 'ar' ? 'حقيبة التسوق' : 'Cart')
@section('styles')
    <style>
        th, td {
            text-align: start;
        }
    </style>
@endsection
@section('content')
<livewire:frontend.cart.cart-show/>
@endsection
