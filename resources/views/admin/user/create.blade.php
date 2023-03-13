@extends('admin.layouts.main')
@section('title', 'Add User')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ url('admin/users') }}"> @lang('common.Back') </a></h4>
                        </h4>
                        <form class="forms-sample" method="POST" action="{{ url('admin/users/store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name"> @lang('user.Name')</label>
                                <input type="text" class="form-control" id="name" placeholder="@lang('common.Required')" required name="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email"> @lang('user.Email')</label>
                                <input type="email" class="form-control" id="email" placeholder="@lang('common.Required')" required name="email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password"> @lang('user.Password')</label>
                                <input type="password" class="form-control" id="password" placeholder="@lang('common.Required')" required name="password">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role"> @lang('user.Role') * </label>
                                <select class="form-control form-control-sm" id="role" name="role" required>
                                    <option value="admin">@lang('user.Admin')</option>
                                    <option value="user">@lang('user.User')</option>
                                </select>
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
