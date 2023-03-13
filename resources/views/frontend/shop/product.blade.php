@extends('frontend.layouts.main')
@section("title", app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en . "'s Products")
@section('content')
    <livewire:frontend.shop.products :category="$category" />
@endsection
