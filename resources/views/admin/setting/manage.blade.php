@extends('admin.layouts.main')
@section('title', 'Manage Settings')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('settings.index') }}"> @lang('common.Back') </a></h4>
                        </h4>
                        <form class="forms-sample" method="POST" action="{{ route('settings.store', $setting->id ?? '') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="website_name"> @lang('setting.Website Name') </label>
                                <input type="text" class="form-control" id="website_name" value="{{ $setting->website_name ?? '' }}" placeholder="Required *" required name="website_name">
                                @error('website_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="website_url"> @lang('setting.Website URL') </label>
                                <input type="text" class="form-control" id="website_url" value="{{ $setting->website_url ?? '' }}" placeholder="Required *" required name="website_url">
                                @error('website_url')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('setting.Website Logo')</label>
                                <input type="file" class="dropify" name="logo" data-default-file="{{ asset($setting->logo ?? '') }}" value="{{ asset($setting->logo ?? '') }}" />
                                @error('logo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>@lang('setting.Website Favicon')</label>
                                <input type="file" class="dropify" name="favicon" data-default-file="{{ asset($setting->favicon ?? '') }}" value="{{ asset($setting->favicon ?? '') }}" />
                                @error('favicon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="page_title"> @lang('setting.Page Title') </label>
                                <input type="text" class="form-control" id="page_title" value="{{ $setting->page_title ?? '' }}" name="page_title">
                                @error('page_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="phone"> @lang('setting.Phone') </label>
                                        <input type="text" class="form-control" id="phone" value="{{ $setting->phone ?? '' }}" name="phone">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="phone2"> @lang('setting.Phone 2') </label>
                                        <input type="text" class="form-control" id="phone2" value="{{ $setting->phone2 ?? '' }}" name="phone2">
                                        @error('phone2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="email"> @lang('setting.Email') </label>
                                        <input type="text" class="form-control" id="email" value="{{ $setting->email ?? '' }}" name="email">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="email2"> @lang('setting.Email 2') </label>
                                        <input type="text" class="form-control" id="email2" name="email2" value="{{ $setting->email2 ?? '' }}">
                                        @error('email2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address_en"> @lang('setting.Address en') </label>
                                <textarea class="form-control" id="address_en" name="address_en">{{ $setting->address_en ?? '' }}</textarea>
                                @error('address_en')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address_ar"> @lang('setting.Address ar') </label>
                                <textarea class="form-control" id="address_ar" name="address_ar">{{ $setting->address_ar ?? '' }}</textarea>
                                @error('address_ar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="facebook"> @lang('setting.Facebook') </label>
                                        <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $setting->facebook ?? '' }}">
                                        @error('facebook')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="twitter"> @lang('setting.Twitter') </label>
                                        <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $setting->twitter ?? '' }}">
                                        @error('twitter')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="instagram"> @lang('setting.Instagram') </label>
                                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $setting->instagram ?? '' }}">
                                        @error('instagram')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="youtube"> @lang('setting.Youtube') </label>
                                        <input type="text" class="form-control" id="youtube" name="youtube" value="{{ $setting->youtube ?? '' }}">
                                        @error('youtube')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="about_en"> @lang('setting.About en') </label>
                                <textarea class="form-control" id="about_en" name="about_en"> {{ $setting->about_en ?? '' }} </textarea>
                                @error('about_en')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="about_ar"> @lang('setting.About ar') </label>
                                <textarea class="form-control" id="about_ar" name="about_ar"> {{ $setting->about_ar ?? '' }} </textarea>
                                @error('about_ar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
