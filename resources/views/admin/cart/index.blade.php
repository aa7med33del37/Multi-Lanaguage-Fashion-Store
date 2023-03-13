@extends('admin.layouts.main')
@section('title', 'Cart')
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
                        <p class="card-description"> @lang('frontend.Cart') </p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> @lang('user.User Name') </th>
                                    <th> @lang('user.Email') </th>
                                    <th> @lang('product.Product') </th>
                                    <th> @lang('color.Color') </th>
                                    <th> @lang('product.Price') </th>
                                    <th> @lang('product.Quantity') </th>
                                    <th> @lang('common.Action') </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($carts as $item)
                                <tr>
                                    <td class="py-1">{{ $item->id }}</td>
                                    <td><b> {{ $item->user->name }} </b> </td>
                                    <td> {{ $item->email }} </td>
                                    <td> {{ app()->getLocale() == 'ar' ? $item->product->title_ar : $item->product->title_en }} </td>
                                    <td>
                                        @if (app()->getLocale() == 'ar')
                                            {{ $item->productColor->color->color_ar ?? '' }} </td>
                                        @else
                                        {{ $item->productColor->color->color_en ?? '' }} </td>
                                        @endif
                                    <td> {{ number_format($item->price, 2, '.', ',') }} {{ app()->getLocale() == 'ar' ? 'ج.م' : 'EGP' }} </td>
                                    <td> {{ $item->quantity }} </td>
                                    <td>
                                        <form style="display: inline-block" action="{{ route('carts.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <h5>@lang('common.No Data Found')</h5>
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
