@extends('admin.layouts.main')
@section('title', __('category.Add Category'))
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
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('categories.index') }}"> @lang('common.Back') </a></h4>
                        </h4>
                        <form class="forms-sample" method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name_en"> @lang('common.Name en') </label>
                                <input type="text" class="form-control" id="name_en" placeholder="Required *" name="name_en">
                                @error('name_en')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name_ar"> @lang('common.Name ar')</label>
                                <input type="text" class="form-control" id="name_ar" placeholder="Required *" name="name_ar">
                                @error('name_ar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="parent_id"> @lang('category.Parent Category') </label>
                                <select class="form-control form-control-sm" id="parent_id" name="parent_id">
                                    <option value=""> @lang('category.Parent') </option>
                                    @if($parentCategories)
                                        @foreach ($parentCategories as $parentItem)
                                            <option value="{{ $parentItem->id }}">{{ app()->getLocale() == 'ar' ? $parentItem->name_ar : $parentItem->name_en }}</option>
                                        @endforeach
                                    @endif
                                    @error('parent_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </select>
                            </div>
                            <div class="form-group">
                                <label> @lang('common.Image') </label>
                                <input type="file" class="dropify" name="image" />
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_title"> @lang('common.Meta Title') </label>
                                <input type="text" class="form-control" id="meta_title" placeholder="(Optional)" name="meta_title">
                            </div>

                            <div class="form-check form-check-flat form-check-info">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" checked value="1" name="status"> @lang('common.Status')
                                </label>
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
