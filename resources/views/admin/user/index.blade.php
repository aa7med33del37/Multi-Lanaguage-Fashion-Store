@extends('admin.layouts.main')
@section('title', 'Users')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            {{-- Alert --}}
            @if (session('success_msg'))
                <div class="alert alert-success text-center">{{ session('success_msg') }}</div>
            @endif

            @if (session('error_msg'))
                <div class="alert alert-warning text-center">{{ session('error_msg') }}</div>
            @endif
            {{-- End Alert --}}
            <h5><a href="{{ url('admin/users/create') }}" class="btn btn-gradient-info btn-rounded btn-fw">@lang('user.Add User')</a></h5>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h5> @lang('user.Admins') </h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> @lang('user.Name') </th>
                                    <th> @lang('user.Email') </th>
                                    <th> Google ID </th>
                                    <th> Facebook ID </th>
                                    <th> @lang('common.Date') </th>
                                    <th> @lang('common.Action') </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($admins as $admin)
                                <tr>
                                    <td class="py-1">{{ $admin->id }}</td>
                                    <td> {{ $admin->name }} </td>
                                    <td> {{ $admin->email }} </td>
                                    <td> {{ $admin->google_id }} </td>
                                    <td> {{ $admin->facebook_id }} </td>
                                    <td> {{ date('d-m-y h:i A', strtotime($admin->created_at)) }} </td>
                                    <td>
                                        <form style="display: inline-block" action="{{ url('admin/users/'.$admin->id.'/delete') }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h5> @lang('user.Customers') </h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> @lang('user.Name') </th>
                                    <th> @lang('user.Email') </th>
                                    <th> Google ID </th>
                                    <th> Facebook ID </th>
                                    <th> @lang('common.Date') </th>
                                    <th> @lang('common.Action') </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td class="py-1">{{ $user->id }}</td>
                                    <td> {{ $user->name }} </td>
                                    <td> {{ $user->email }} </td>
                                    <td> {{ $user->google_id }} </td>
                                    <td> {{ $user->facebook_id }} </td>
                                    <td> {{ date('d-m-y h:i A', strtotime($user->created_at)) }} </td>
                                    <td>
                                        <form style="display: inline-block" action="{{ url('admin/users/' . $user->id . '/delete') }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
