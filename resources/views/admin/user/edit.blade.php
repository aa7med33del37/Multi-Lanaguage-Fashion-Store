@extends('admin.layouts.main')
@section('title', 'Add Brand')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
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
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('brands.index') }}"> @lang('common.Back') </a></h4>
                        </h4>
                        <p class="card-description"> Edit {{ $brand->name }} (Brand) </p>
                        <form class="forms-sample" method="POST" action="{{ route('brands.update', $brand->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="name">Brand Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Required *" required name="name" value="{{ $brand->name }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('common.Image')</label>
                                <input type="file" class="dropify" name="image" value="{{ $brand->image ?? '' }}" data-default-file="{{ asset($brand->image) }}"/>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_title">@lang('common.Meta Title')</label>
                                <input type="text" class="form-control" value="{{ $brand->meta_title }}" id="meta_title" placeholder="(Optional)" name="meta_title">
                            </div>

                            <div class="form-check form-check-flat form-check-info">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="1" {{ $brand->status == '1' ? 'checked' : '' }} name="status"> Status
                                </label>
                            </div>
                            <button type="submit" class="btn btn-gradient-info me-2">@lang('common.Update')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
