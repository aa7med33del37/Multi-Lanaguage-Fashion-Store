@extends('admin.layouts.main')
@section('title', __('category.Edit Category'))
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('categories.index') }}"> @lang('common.Back') </a></h4>
                        </h4>
                        <form class="forms-sample" method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="name_en"> @lang('common.Name en') </label>
                                <input type="text" class="form-control" id="name_en" placeholder="Required *" name="name_en" value="{{ $category->name_en }}">
                                @error('name_en')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name_ar"> @lang('common.Name ar') </label>
                                <input type="text" class="form-control" id="name_ar" placeholder="Required *" name="name_ar" value="{{ $category->name_ar }}">
                                @error('name_ar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="parent_id"> @lang('category.Parent Category') <small> ({{ $text ?? '' }}) </small></label>
                                <select class="form-control form-control-sm" id="parent_id" name="parent_id" {{ $disabled ?? '' }}>
                                    <option value=""> @lang('category.Parent') </option>
                                    @if($parentCategories)
                                        @foreach ($parentCategories as $parentItem)
                                            <option value="{{ $parentItem->id }}" {{ $parentItem->id == $category->parent_id ? 'selected' : '' }}>{{ app()->getLocale() == 'ar' ?  $parentItem->name_ar : $parentItem->name_en }}</option>
                                        @endforeach
                                    @endif
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </select>
                            </div>
                            <div class="form-group">
                                <label> @lang('common.Image') </label>
                                <input type="file" class="dropify" name="image" value="{{ $category->image ?? '' }}" data-default-file="{{ asset($category->image) }}"/>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_title"> @lang('common.Meta Title') </label>
                                <input type="text" class="form-control" value="{{ $category->meta_title }}" id="meta_title" placeholder="(Optional)" name="meta_title">
                            </div>

                            <div class="form-check form-check-flat form-check-info">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="1" {{ $category->status == '1' ? 'checked' : '' }} name="status"> @lang('common.Status')
                                </label>
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
