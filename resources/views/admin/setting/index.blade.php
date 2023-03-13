@extends('admin.layouts.main')
@section('title', 'Settings')
@section('styles')
    <style>
        .table thead th { font-weight: 700; font-size: 15px }
    </style>
@endsection
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
                        <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('settings.manage', $setting->id ?? '') }}"> @lang('setting.Manage Your Settings') </a></h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> @lang('setting.Website Name') </th>
                                    <th> @lang('setting.Website URL') </th>
                                    <th> @lang('setting.Page Title') </th>
                                    <th> @lang('setting.Website Logo') </th>
                                    <th> @lang('setting.Website Favicon') </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($setting)
                                <tr>
                                    <td class="py-1">{{ $setting->website_name }}</td>
                                    <td>{{ $setting->website_url }}</td>
                                    <td>{{ $setting->page_title }}</td>
                                    <td>
                                        <img src="{{ asset($setting->logo ?? '') }}" alt="website img">
                                    </td>
                                    <td>
                                        <img src="{{ asset($setting->favicon ?? '') }}" alt="website favicon">
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>

                        <hr>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> @lang('setting.Phone') </th>
                                    <th> @lang('setting.Phone 2') </th>
                                    <th> @lang('setting.Email') </th>
                                    <th> @lang('setting.Email 2') </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($setting)
                                <tr>
                                    <td class="py-1">{{ $setting->phone }}</td>
                                    <td>{{ $setting->phone2 }}</td>
                                    <td>{{ $setting->email }}</td>
                                    <td>{{ $setting->email2 }}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>

                        <hr>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> @lang('setting.Facebook') </th>
                                    <th> @lang('setting.Twitter') </th>
                                    <th> @lang('setting.Instagram') </th>
                                    <th> @lang('setting.Youtube') </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($setting)
                                <tr>
                                    <td class="py-1"><a href="{{ $setting->facebook }}">{{ $setting->facebook }}</a></td>
                                    <td><a href="{{ $setting->twitter }}">{{ $setting->twitter }}</a></td>
                                    <td><a href="{{ $setting->instagram }}">{{ $setting->instagram }}</a></td>
                                    <td><a href="{{ $setting->youtube }}">{{ $setting->youtube }}</a></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>

                        <hr>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> @lang('setting.About en') </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($setting)
                                <tr>
                                    <td>{{ $setting->about_en }}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>

                        <hr>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> @lang('setting.About ar') </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($setting)
                                <tr>
                                    <td>{{ $setting->about_ar }}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
