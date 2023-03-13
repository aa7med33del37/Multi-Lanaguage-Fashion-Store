@extends('admin.layouts.main')
@section('title', app()->getLocale() == 'ar' ? 'لوحة التحكم' : 'Dashboard')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-info text-white me-2">
                <i class="mdi mdi-home"></i>
                </span> @lang('dashboard.Dashboard')
            </h3>
        </div>
        <div class="row">
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{ route('orders.index') }}">
                            <img src="{{ asset('assets/admin/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3"> @lang('dashboard.Total Orders') <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5"> {{ $t_orders }} </h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{ route('orders.index') }}">
                            <img src="{{ asset('assets/admin/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">@lang('dashboard.Today Orders') <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5"> {{ $d_orders }} </h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-primary card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{ route('orders.index') }}">
                            <img src="{{ asset('assets/admin/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3"> @lang('dashboard.Month Orders') <i class="mdi mdi-diamond mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5"> {{ $m_orders }} </h2>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{ route('orders.index') }}">
                            <img src="{{ asset('assets/admin/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3"> @lang('dashboard.Year Orders') <i class="mdi mdi-diamond mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5"> {{ $y_orders }} </h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{ route('products.index') }}">
                            <img src="{{ asset('assets/admin/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3"> @lang('dashboard.Total Products') <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5"> {{ $t_products }} </h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{ route('categories.index') }}">
                            <img src="{{ asset('assets/admin/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">@lang('dashboard.Total Categories') <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5"> {{ $t_categories }} </h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-primary card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{ route('brands.index') }}">
                            <img src="{{ asset('assets/admin/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3"> @lang('dashboard.Total Brands') <i class="mdi mdi-diamond mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5"> {{ $t_brands }} </h2>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{ route('banners.index') }}">
                            <img src="{{ asset('assets/admin/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3"> @lang('dashboard.Total Banners') <i class="mdi mdi-diamond mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5"> {{ $t_banners }} </h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">@lang('user.Recent Users')</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> @lang('user.Name') </th>
                                        <th> @lang('user.Email') </th>
                                        <th> @lang('user.Date') </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                    <tr>
                                        <td> {{ $user->name }} </td>
                                        <td> {{ $user->email }} </td>
                                        <td> {{ date('d-m-y h:i A', strtotime($user->created_at)) }} </td>
                                    </tr>
                                    @empty
                                        <h5> No Users Found </h5>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">@lang('user.Admins')</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> @lang('user.Name') </th>
                                        <th> @lang('user.Email') </th>
                                        <th> @lang('user.Date') </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($admins as $admin)
                                    <tr>
                                        <td> {{ $admin->name }} </td>
                                        <td> {{ $admin->email }} </td>
                                        <td> {{ date('d-m-y h:i A', strtotime($admin->created_at)) }} </td>
                                    </tr>
                                    @empty
                                        <h5> No Admins Found </h5>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
