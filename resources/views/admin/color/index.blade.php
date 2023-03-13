@extends('admin.layouts.main')
@section('title', __('color.Colors'))
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
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('colors.create') }}"> @lang('color.Add New Color') </a></h4>
                        <p class="card-description"> @lang('color.Colors') </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> @lang('color.Color') </th>
                                    <th> @lang('color.Color ar') </th>
                                    <th> @lang('color.Code') </th>
                                    <th> @lang('common.Action') </th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($colors as $colorItem)
                                <tr>
                                    <td class="py-1">{{ $colorItem->id }}</td>
                                    <td><b> {{ $colorItem->color }} </b> </td>
                                    <td><b> {{ $colorItem->color_ar }} </b> </td>
                                    <td> {{ $colorItem->code }} </td>
                                    <td>
                                        <form style="display: inline-block" action="{{ route('colors.destroy', $colorItem->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                        </form>

                                        <a href="{{ route('colors.edit', $colorItem->id) }}">
                                            <button type="button" class="btn btn-info btn-rounded btn-icon">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                    <h5>No Colors Found</h5>
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
