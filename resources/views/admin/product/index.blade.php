@extends('admin.layouts.main')
@section('title', __('product.Products'))
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
                        <h4 class="card-title">
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('products.create') }}"> @lang('product.Add New Product') </a>
                        </h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> @lang('common.Image') </th>
                                    <th> @lang('product.Title') </th>
                                    <th> @lang('product.Category') </th>
                                    <th> @lang('product.Brand') </th>
                                    <th> @lang('product.Price') </th>
                                    <th> @lang('product.Quantity') </th>
                                    <th> @lang('common.Status') </th>
                                    <th> @lang('common.Action') </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $item)
                                <tr>
                                    <td class="py-1">{{ $item->id }}</td>
                                    <td>
                                        @if ($item->productImages())
                                        <img src="{{ asset($item->productImages[0]->image ?? '') }}" alt="image" title="{{ $item->name }}"/>
                                        @endif
                                    </td>
                                    <td><b> {{ app()->getLocale() == 'ar' ? $item->title_ar : $item->title_en }} </b> </td>
                                    <td> {{ app()->getLocale() == 'ar' ? $item->category->name_ar : $item->category->name_ar}} </td>
                                    <td> {{ $item->brand }} </td>
                                    <td><b> {{ number_format($item->selling_price, 2, ',', '.') }} {{ app()->getLocale() == 'ar' ? 'ج.م' : 'EGP' }} </b></td>
                                    <td> {{ $item->quantity }} </td>
                                    <td>
                                        @if($item->status == '1')
                                        <span class="badge badge-success"> @lang('common.Visible') </span>
                                        @else
                                        <span class="badge badge-danger"> @lang('common.Hidden') </span>
                                        @endif
                                    </td>
                                    <td>
                                        <form style="display: inline-block" action="{{ route('products.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                        </form>

                                        <a href="{{ route('products.edit', $item->id) }}">
                                            <button type="button" class="btn btn-info btn-rounded btn-icon">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </button>
                                        </a>
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
