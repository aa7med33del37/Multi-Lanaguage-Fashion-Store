@extends('admin.layouts.main')
@section('title', 'Add Size')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('sizes.index') }}"> @lang('common.Back') </a></h4>
                        </h4>
                        <form class="forms-sample" method="POST" action="{{ route('sizes.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="size"> Size </label>
                                <input type="text" class="form-control" id="size" placeholder="Required *" name="size">
                                @error('size')
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
