@extends('frontend.layouts.main')
@section('title', app()->getLocale() == 'ar' ? 'الدفع' : 'Checkout')
@section('styles')
    <style>
        .selecotr-item{
    position:relative;
    flex-basis:calc(70% / 3);
    height:100%;
    display:flex;
    justify-content:center;
    align-items:center;
}
.selector-item_radio{
    appearance:none;
    display:none;
}
.selector-item_label{
    position:relative;
    height:80%;
    width:100%;
    text-align:center;
    border-radius:9999px;
    line-height:400%;
    font-weight:900;
    transition-duration:.5s;
    transition-property:transform, color, box-shadow;
    transform:none;
}
.selector-item_radio:checked + .selector-item_label{
    background-color:var(--blue);
    color:var(--white);
    box-shadow:0 0 4px rgba(0,0,0,.5),0 2px 4px rgba(0,0,0,.5);
    transform:translateY(-2px);
}
@media (max-width:480px) {
	.selector{
		width: 90%;
	}
}
    </style>
@endsection
@section('content')
<livewire:frontend.checkout.checkout-view/>
@endsection
