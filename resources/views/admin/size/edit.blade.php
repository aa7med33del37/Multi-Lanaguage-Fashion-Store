@extends('admin.layouts.main')
@section('title', 'Add Size')
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
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('sizes.index') }}"> @lang('common.Back') </a></h4>
                        </h4>
                        <p class="card-description"> Edit {{ $size->name }} (Size) </p>
                        <form class="forms-sample" method="POST" action="{{ route('sizes.update', $size->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="size"> Size </label>
                                <input type="text" class="form-control" id="size" placeholder="Required *" required name="size" value="{{ $size->size }}">
                                @error('size')
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
