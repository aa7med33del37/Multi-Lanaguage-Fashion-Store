@extends('admin.layouts.main')
@section('title', __('dashboard.Brands'))
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
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('brands.create') }}"> @lang('common.Add') </a></h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> @lang('common.Image') </th>
                                    <th> @lang('common.Name')</th>
                                    <th> @lang('common.Status') </th>
                                    <th> @lang('common.Meta Title') </th>
                                    <th> @lang('common.Action') </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $brandItem)
                                <tr>
                                    <td class="py-1">{{ $brandItem->id }}</td>
                                    <td>
                                        @if ($brandItem->image)
                                        <img src="{{ asset($brandItem->image) }}" alt="image" title="{{ $brandItem->name }}"/>
                                        @endif
                                    </td>
                                    <td><b> {{ $brandItem->name }} </b><small>({{ $brandItem->slug }})</small> </td>
                                    <td>
                                         @if($brandItem->status == '1')
                                         <span class="badge badge-success"> @lang('common.Visible') </span>
                                         @else
                                         <span class="badge badge-danger"> @lang('common.Hidden') </span>
                                         @endif
                                    </td>
                                    <td> {{ $brandItem->meta_title ?? '' }} </td>
                                    <td>
                                        <form style="display: inline-block" action="{{ route('brands.destroy', $brandItem->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                        </form>

                                        <a href="{{ route('brands.edit', $brandItem->id) }}">
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
