@extends('admin.layouts.main')
@section('title', 'Add Home Banners')
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
                        <form class="forms-sample" method="POST" action="{{ route('banners.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title_en"> @lang('product.Title en') </label>
                                <input type="text" class="form-control" id="title_en" placeholder="@lang('common.Optional')" name="title_en">
                                @error('title_en')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title_ar"> @lang('product.Title ar') </label>
                                <input type="text" class="form-control" id="title_ar" placeholder="@lang('common.Optional')" name="title_ar">
                                @error('title_ar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> @lang('common.Image') </label>
                                <input type="file" class="dropify" name="image" required />
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description_en"> @lang('product.Long Desc en') </label>
                                <input type="text" class="form-control" id="description_en" placeholder="@lang('common.Optional')" name="description_en">
                            </div>

                            <div class="form-group">
                                <label for="description_ar"> @lang('product.Long Desc ar') </label>
                                <input type="text" class="form-control" id="description_ar" placeholder="@lang('common.Optional')" name="description_ar">
                            </div>

                            <div class="form-check form-check-flat form-check-info">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" checked value="1" name="status"> @lang('common.Status')
                                </label>
                            </div>
                            <button type="submit" class="btn btn-gradient-info me-2"> @lang('common.Add') </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
