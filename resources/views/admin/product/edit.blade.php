@extends('admin.layouts.main')
@section('title', __('product.Edit Product'))
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    @if($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    @endif
                    {{-- Alert --}}
                    @if (session('success_msg'))
                        <div class="alert alert-success text-center">{{ session('success_msg') }}</div>
                    @endif

                    @if (session('error_msg'))
                        <div class="alert alert-warning text-center">{{ session('error_msg') }}</div>
                    @endif
                    {{-- End Alert --}}
                    <div class="card-body">
                        <h4 class="card-title">
                            <a class="btn btn-gradient-info btn-rounded btn-fw" href="{{ route('products.index') }}"> @lang('common.Back') </a></h4>
                        </h4>
                        <form class="forms-sample" method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-info-tab" data-bs-toggle="pill" data-bs-target="#pills-info" type="button" role="tab" aria-controls="pills-info" aria-selected="true"> @lang('common.Info') </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-seo-tab" data-bs-toggle="pill" data-bs-target="#pills-seo" type="button" role="tab" aria-controls="pills-seo" aria-selected="false">SEO</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details" aria-selected="false"> @lang('common.Details') </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-images-tab" data-bs-toggle="pill" data-bs-target="#pills-images" type="button" role="tab" aria-controls="pills-images" aria-selected="false"> @lang('common.Images') </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-color-tab" data-bs-toggle="pill" data-bs-target="#pills-color" type="button" role="tab" aria-controls="pills-color" aria-selected="false"> @lang('common.Colors') </button>
                                </li>
                              </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab" tabindex="0">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label for="title_en"> @lang('product.Title en') </label>
                                                <input type="text" class="form-control" id="title_en" placeholder="@lang('common.Required')" required name="title_en" value="{{ $product->title_en }}">
                                                @error('title_en')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group col-12">
                                                <label for="title_ar"> @lang('product.Title en') </label>
                                                <input type="text" class="form-control" id="title_ar" placeholder="@lang('common.Required')" required name="title_ar" value="{{ $product->title_ar }}">
                                                @error('title_ar')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group col-12 col-md-6">
                                                <label for="category_id"> @lang('product.Category') </label>
                                                <select class="form-control form-control-sm" id="category_id" name="category_id">
                                                    <option value=""> @lang('product.Select Category') </option>
                                                    @if($parentCategories)
                                                        @foreach ($parentCategories as $category)
                                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name }}</option>
                                                            @foreach ($category->childs as $child)
                                                                <option value="{{ $child->id }}" {{ $child->id == $product->category_id ? 'selected' : '' }}> -- > {{ app()->getLocale() == 'ar' ? $child->name_ar : $child->name_en }}</option>
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                    @error('category_id')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </select>
                                            </div>

                                            <div class="form-group col-12 col-md-6">
                                                <label for="category_id"> @lang('product.Brand') </label>
                                                <select class="form-control form-control-sm" id="brand" name="brand">
                                                    <option value=""> @lang('product.Select Brand') </option>
                                                    @if($brands)
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                        @endforeach
                                                    @endif
                                                    @error('brand')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </select>
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="meta_title"> @lang('common.Meta Title') </label>
                                                <input type="text" class="form-control" id="meta_title" placeholder="@lang('common.Optional')" name="meta_title" value="{{ $product->meta_title ?? '' }}">
                                                @error('meta_title')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-seo" role="tabpanel" aria-labelledby="pills-seo-tab" tabindex="0">
                                        <div class="row">
                                            <div class="form-group col-12 col-md-6">
                                                <label for="original_price"> @lang('product.Original Price') </label>
                                                <input type="text" class="form-control" id="original_price" value="{{ $product->original_price }}" placeholder="@lang('common.Required')" required name="original_price">
                                                @error('original_price')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group col-12 col-md-6">
                                                <label for="selling_price"> @lang('product.Selling Price') </label>
                                                <input type="text" class="form-control" id="selling_price" value="{{ $product->selling_price}}" placeholder="@lang('common.Required')" required name="selling_price">
                                                @error('selling_price')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="quantity"> @lang('product.Quantity') </label>
                                                <input type="number" class="form-control" id="quantity" value="{{ $product->quantity ?? '' }}" placeholder="" name="quantity">
                                                @error('quantity')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab" tabindex="0">
                                        <div class="form-group">
                                            <label for="small_desc_en"> @lang('product.Small Desc en') </label>
                                            <textarea name="small_desc_en" id="small_desc_en" class="form-control" placeholder="@lang('common.Required')" required>{{ $product->small_desc_en }}</textarea>
                                            @error('small_desc_en')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="small_desc_ar"> @lang('product.Small Desc ar') </label>
                                            <textarea name="small_desc_ar" id="small_desc_ar" class="form-control" placeholder="@lang('common.Required')" required>{{ $product->small_desc_ar }}</textarea>
                                            @error('small_desc_ar')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="long_desc_en"> @lang('product.Long Desc en') </label>
                                            <textarea name="long_desc_en" id="long_desc_en" class="form-control" cols="30" rows="10" placeholder="@lang('common.Optional')">{{ $product->long_desc_en ?? '' }}</textarea>
                                            @error('long_desc_en')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="long_desc_ar"> @lang('product.Long Desc ar') </label>
                                            <textarea name="long_desc_ar" id="long_desc_ar" class="form-control" cols="30" rows="10" placeholder="@lang('common.Optional')">{{ $product->long_desc_ar ?? '' }}</textarea>
                                            @error('long_desc_ar')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-4 col-md-4">
                                                <div class="form-check form-check-success">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" checked value="1" name="status" {{ $product->status == '1' ? 'checked' : '' }}> @lang('common.Status') <i class="input-helper"></i>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group col-4 col-md-4">
                                                <div class="form-check form-check-success">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" value="1" name="trending" {{ $product->trending == '1' ? 'checked' : '' }}> @lang('product.Is trending') <i class="input-helper"></i>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group col-4 col-md-4">
                                                <div class="form-check form-check-success">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" value="1" name="featured" {{ $product->featured == '1' ? 'checked' : '' }}> @lang('product.Is Featured') <i class="input-helper"></i>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pills-images" role="tabpanel" aria-labelledby="pills-images-tab" tabindex="0">
                                        <div class="form-group">
                                            <label for="quantity"> @lang('common.Image') <small>(@lang('product.Upload More'))</small> </label>
                                            <input type="file" class="dropify" name="image[]" multiple data-height="300" />
                                            @error('image')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            @if ($product->productImages())
                                                @foreach ($product->productImages as $imageItem)
                                                <div class="col-6 col-md-3">
                                                    <figure class="figure">
                                                        <img src="{{ asset($imageItem->image) }}" class="figure-img img-fluid rounded" alt="...">
                                                        <figcaption class="figure-caption">
                                                            <a href="{{ route('products.image.remove', $imageItem->id) }}" class="btn btn-gradient-danger form-control"> Remove </a>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-color" role="tabpanel" aria-labelledby="pills-color-tab" tabindex="0">
                                        <div class="row">
                                            @if($colors)
                                            @foreach ($colors as $color)
                                                <div class="col-6 col-md-3" id="color_card">
                                                    <div class="card" id="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title"> @lang('product.Select Color') </h5>
                                                            <p class="card-text">
                                                                <div class="form-check form-check-success">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" value="{{ $color->id }}" name="colors[{{ $color->id }}]"> {{ $color->color }} ({{ $color->color_ar }})
                                                                    </label>
                                                                    <br>
                                                                    <label for="quantity"> @lang('product.Quantity') </label>
                                                                    <input type="number" class="form-control" id="color_size_quantity" name="color_size_quantity[{{ $color->id }}]">
                                                                </div>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @endif

                                        </div>

                                        @if ($product->productColors()->count() > 0)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th> @lang('color.Color') </th>
                                                            <th> @lang('product.Quantity') </th>
                                                            <th> @lang('common.Remove') </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($product->productColors as $colorItem)
                                                        <tr class="product_color_tr">
                                                            <td>
                                                                <span class="btn btn-rounded btn-icon color-icon" style="background-color: {{ $colorItem->color->code }}; border: 1px solid #000;"></span>
                                                                <span class="">{{ $colorItem->color->color }} | {{ $colorItem->color->color_ar ?? '' }}</span>
                                                            </td>
                                                            <td>
                                                                <div class="input-group mb-2">
                                                                    <input type="number" class="form-control product_color_quantity" value="{{ $colorItem->quantity }}">
                                                                    <button type="button" class="btn btn-gradient-success update_product_color_btn" value="{{ $colorItem->id }}" type="button" id="button-addon2">@lang('common.Update')</button>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-gradient-danger color_remove_btn" value="{{ $colorItem->id }}"> @lang('common.Remove') </button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @endif

                                    </div>
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

@section('scripts')
<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $(document).on('click', '.update_product_color_btn', function () {
            var product_id = "{{$product->id}}";
            var product_color_id = $(this).val();
            var qty = $(this).closest('.product_color_tr').find('.product_color_quantity').val();

            if (qty <= 0) {
                return false;
            }

            var data = {
                'product_id' : product_id,
                'qty' : qty,
            };

            $.ajax({
                type : "POST",
                url : "/admin/product-color/" + product_color_id,
                data : data,

                success: function(response) {
                    alert(response.message);
                }
            });
        });

        $(document).on('click', '.color_remove_btn', function() {
            var product_color_id = $(this).val();

            $.ajax({
                type: "GET",
                url: "admin/product-color/" + product_color_id + "/delete";
            });
        });
    });
</script>
@endsection
