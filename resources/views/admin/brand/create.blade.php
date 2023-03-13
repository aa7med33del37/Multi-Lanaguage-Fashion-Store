@extends('admin.layouts.main')
@section('title', __('dashboard.Add Brand'))
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('brands.index') }}"> @lang('common.Back') </a></h4>
                        </h4>
                        <form class="forms-sample" method="POST" action="{{ route('brands.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">@lang('common.Name')</label>
                                <input type="text" class="form-control" id="name" placeholder="Required *" required name="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('common.Image')</label>
                                <input type="file" class="dropify" name="image" required />
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_title">@lang('common.Meta Title')</label>
                                <input type="text" class="form-control" id="meta_title" placeholder="(Optional)" name="meta_title">
                            </div>

                            <div class="form-check form-check-flat form-check-info">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" checked value="1" name="status"> @lang('common.Status')
                                </label>
                            </div>
                            <button type="submit" class="btn btn-gradient-danger me-2"> @lang('common.Add') </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
