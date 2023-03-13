@extends('admin.layouts.main')
@section('title', 'Banners')
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
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('banners.create') }}"> @lang('common.Add') </a></h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> @lang('common.Image') </th>
                                    <th> @lang('product.Title') </th>
                                    <th> @lang('frontend.Description') </th>
                                    <th> @lang('common.Status') </th>
                                    <th> @lang('common.Action') </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($banners as $bannerItem)
                                <tr>
                                    <td class="py-1">{{ $bannerItem->id }}</td>
                                    <td>
                                        @if ($bannerItem->image)
                                        <img src="{{ asset($bannerItem->image) }}" alt="image" title="{{ $bannerItem->name }}"/>
                                        @endif
                                    </td>
                                    <td><b> {{ app()->getLocale() == 'ar' ? $bannerItem->title_ar : $bannerItem->title_en }} </b></td>
                                    <td> {{ app()->getLocale() == 'ar' ? $bannerItem->description_ar :  $bannerItem->description_en }} </td>
                                    <td>
                                         @if($bannerItem->status == '1')
                                         <span class="badge badge-success"> @lang('common.Visible') </span>
                                         @else
                                         <span class="badge badge-danger"> @lang('common.Hidden') </span>
                                         @endif
                                    </td>
                                    <td>
                                        <form style="display: inline-block" action="{{ route('banners.destroy', $bannerItem->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                        </form>

                                        <a href="{{ route('banners.edit', $bannerItem->id) }}">
                                            <button type="button" class="btn btn-info btn-rounded btn-icon">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                    <h5>No Banners Found</h5>
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
