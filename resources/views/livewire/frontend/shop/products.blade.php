@php
    if (app()->getLocale() == 'en') {
        $lang = 'en';
    }
    if (app()->getLocale() == 'ar') {
        $lang = 'ar';
    }
@endphp
<main class="main">
    <div class="page-content mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                @lang('frontend.Showing') <span> {{ $products->count() }} </span>
                                @if ($products->count() == 1)
                                    {{ $lang == 'ar' ? 'منتج' : 'Product' }}
                                @else
                                    @lang('product.Products')
                                @endif
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby"> @lang('frontend.Sort By') : </label>
                                <div class="select-custom mr-2">
                                    <select wire:model="dateSelect" name="sortby" id="sortby" class="form-control">
                                        <option value=""> @lang('frontend.Select') </option>
                                        <option value="latest"> @lang('frontend.Latest') </option>
                                        <option value="older"> @lang('frontend.Older') </option>
                                    </select>
                                </div>
                            </div>
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-6 col-md-4 col-lg-4">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <span class="product-label label-new">@lang('common.New')</span>
                                            <a href="{{ url('shop/view/' . $product->slug) }}" class="product-img">
                                                <img class="" src="{{ asset($product->productImages[0]->image ?? '') }}" alt="{{ $lang == 'ar' ? $product->title_ar : $product->title_en }}" title="{{ $lang == 'ar' ? $product->title_ar : $product->title_en }}" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="{{ route('add_to_wishlist', $product->id) }}" class="btn-product-icon btn-wishlist btn-expandable"><span>@lang('frontend.Add To Wishlist')</span></a>
                                            </div><!-- End .product-action-vertical -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="{{ url('shop/view/' . $product->slug) }}">{{ $lang == 'ar' ? $category->name_ar : $category->name_en }}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="{{ url('shop/view/' . $product->slug) }}"> {{ $lang == 'ar' ? $product->title_ar : $product->title_en }} </a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                <small><s>{{ $product->original_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}</s></small>
                                                <b>{{ $product->selling_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}</b>
                                            </div>
                                        </div><!-- End .product-body -->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div><!-- End .products -->

                    {{-- <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item-total">of 6</li>
                            <li class="page-item">
                                <a class="page-link page-link-next" href="#" aria-label="Next">
                                    Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav> --}}
                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                    @lang('frontend.Brand')
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-4">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        @forelse ($brands as $brand)
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input wire:model="brandInput" value="{{ $brand->name }}" type="checkbox" class="custom-control-input" id="{{ $brand->name . '-' . $brand->id }}">
                                                    <label class="custom-control-label" for="{{ $brand->name . '-' . $brand->id }}">{{ $brand->name }}</label>
                                                </div>
                                            </div>
                                        @empty
                                            <h1>No Brands Found</h1>
                                        @endforelse


                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div>

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                    @lang('frontend.Price')
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-4">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        <div class="custom-control">
                                            <input name="priceInput" wire:model="priceInput" value="high-to-low" type="radio" class="custom-control-input" id="high_to_low">
                                            <label class="custom-control-label" for="high_to_low"> @lang('frontend.High To Low') </label>
                                        </div>

                                        <div class="custom-control">
                                            <input name="priceInput" wire:model="priceInput" value="low-to-high" type="radio" class="custom-control-input" id="low_to_high">
                                            <label class="custom-control-label" for="low_to_high"> @lang('frontend.Low To High') </label>
                                        </div>
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div>

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    @lang('category.Category')
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        @forelse ($category->childs as $child)
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" wire:model="subCategory" value="{{ $child->id }}" class="custom-control-input" id="cat-{{ $child->id }}">
                                                    <label class="custom-control-label" for="cat-{{ $child->id }}"> {{ $lang == 'ar' ? $child->name_ar : $child->name_en }} </label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count"> {{ $child->categoryProducts()->count() }} </span>
                                            </div>
                                        @empty
                                            <h5>No Related Category Found</h5>
                                        @endforelse
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div>

                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main>
