@extends('admin.layouts.main')
@section('title', 'Admin Profile')
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
                        <form class="forms-sample" method="POST" action="{{ route('admin.profile.update', $data->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="name"> @lang('auth.Name') </label>
                                <input type="text" class="form-control" id="name" placeholder="Required *" required name="name" value="{{ $data->name }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email"> @lang('auth.Email') </label>
                                <input type="email" class="form-control" id="name" placeholder="Required *" required name="email" value="{{ $data->email }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('common.Image')</label>
                                <input type="file" class="dropify" name="image" value="{{ $data->image ?? '' }}" data-default-file="{{ asset($data->image) }}"/>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
