@extends('admin.layouts.main')
@section('title', __('category.All Categories'))
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
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('categories.create') }}"> @lang('category.Add Category')</a></h4>
                        <p class="card-description"> @lang('category.All Categories') </p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> @lang('common.Image') </th>
                                    <th> @lang('common.Name') </th>
                                    <th> @lang('category.Parent Category') </th>
                                    <th> @lang('common.Status') </th>
                                    <th> @lang('common.Meta Title') </th>
                                    <th> @lang('common.Action') </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($parentCategories as $parentItem)
                                <tr style="background-color: #f2f2f2">
                                    <td class="py-1">{{ $parentItem->id }}</td>
                                    <td>
                                        @if ($parentItem->image)
                                        <img src="{{ asset($parentItem->image) }}" alt="image" title="{{ $parentItem->name_en }}"/>
                                        @endif
                                    </td>
                                    <td><b> {{ app()->getLocale() == 'ar' ? $parentItem->name_ar : $parentItem->name_en }} </b><small>({{ $parentItem->slug }})</small> </td>
                                    <td></td>
                                    <td>
                                         @if($parentItem->status == '1')
                                         <span class="badge badge-success"> @lang('common.Visible') </span>
                                         @else
                                         <span class="badge badge-danger"> @lang('common.Hidden') </span>
                                         @endif
                                    </td>
                                    <td> {{ $parentItem->meta_title ?? '' }} </td>
                                    <td>
                                        <form style="display: inline-block" action="{{ route('categories.destroy', $parentItem->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                        </form>

                                        <a href="{{ route('categories.edit', $parentItem->id) }}">
                                            <button type="button" class="btn btn-info btn-rounded btn-icon">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @if ($parentItem->childs)
                                    @foreach ($parentItem->childs as $childItem)
                                    <tr>
                                    <td class="py-1">{{ $childItem->id }}</td>
                                    <td>
                                        @if ($childItem->image)
                                        <img src="{{ asset($childItem->image) }}" alt="image" title="{{ $childItem->name_en }}"/>
                                        @endif
                                    </td>
                                    <td><b> {{ app()->getLocale() == 'ar' ? $childItem->name_ar : $childItem->name_en }} </b><small>({{ $childItem->slug }})</small> </td>
                                    <td>{{ app()->getLocale() == 'ar' ? $childItem->parent->name_ar : $childItem->parent->name_en }}</td>
                                    <td>
                                         @if($childItem->status == '1')
                                         <span class="badge badge-success"> @lang('common.Visible') </span>
                                         @else
                                         <span class="badge badge-danger"> @lang('common.Hidden') </span>
                                         @endif
                                    </td>
                                    <td> {{ $childItem->meta_title ?? '' }} </td>
                                    <td>
                                        <form style="display: inline-block" action="{{ route('categories.destroy', $childItem->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                        </form>

                                        <a href="{{ route('categories.edit', $childItem->id) }}">
                                            <button type="button" class="btn btn-info btn-rounded btn-icon">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                    @endforeach
                                @endif
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
