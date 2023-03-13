@extends('admin.layouts.main')
@section('title', __('color.Add Color'))
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('colors.index') }}"> @lang('common.Back') </a></h4>
                        </h4>
                        <p class="card-description"> @lang('color.Add New Color') </p>
                        <form class="forms-sample" method="POST" action="{{ route('colors.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="color"> @lang('color.Color')  </label>
                                <input type="text" class="form-control" id="color" placeholder="@lang('common.Required')" required name="color" autofocus>
                                @error('color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="color_ar"> @lang('color.Color ar')  </label>
                                <input type="text" class="form-control" id="color_ar" placeholder="@lang('common.Optional')" name="color_ar">
                                @error('color_ar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="code"> @lang('color.Code')  </label>
                                <input type="text" class="form-control" id="code" placeholder="@lang('common.Required')" required name="code">
                                @error('code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
