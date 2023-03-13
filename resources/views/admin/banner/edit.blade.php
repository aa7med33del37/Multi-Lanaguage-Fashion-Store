@extends('admin.layouts.main')
@section('title', 'Edit Home Banners')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('banners.index') }}"> @lang('common.Back') </a></h4>
                        </h4>
                        <form class="forms-sample" method="POST" action="{{ route('banners.update', $banner->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title_en"> @lang('product.Title en') </label>
                                <input type="text" class="form-control" id="title_en" placeholder="@lang('common.Optional')" name="title_en" value="{{ $banner->title_en ?? '' }}">
                                @error('title_en')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title_ar"> @lang('product.Title ar') </label>
                                <input type="text" class="form-control" id="title_ar" placeholder="@lang('common.Optional')" name="title_ar" value="{{ $banner->title_ar ?? '' }}">
                                @error('title_ar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> @lang('common.Image') </label>
                                <input type="file" class="dropify" name="image" data-default-file="{{ asset($banner->image) }}" value="{{ $banner->image }}" />
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description_en"> @lang('product.Long Desc en') </label>
                                <textarea class="form-control" id="description_en" placeholder="@lang('common.Optional')" name="description_en">{{ $banner->description_en ?? '' }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="description_ar"> @lang('product.Long Desc en') </label>
                                <textarea class="form-control" id="description_ar" placeholder="@lang('common.Optional')" name="description_ar">{{ $banner->description_ar ?? '' }}</textarea>
                            </div>

                            <div class="form-check form-check-flat form-check-info">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="1" name="status" {{ $banner->status == '1' ? 'checked' : '' }}> @lang('common.Status')
                                </label>
                            </div>
                            <button type="submit" class="btn btn-gradient-info me-2"> @lang('common.Update') </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
