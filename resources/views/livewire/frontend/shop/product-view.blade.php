@php
    if (app()->getLocale() == 'en') {
        $lang = 'en';
    }
    if (app()->getLocale() == 'ar') {
        $lang = 'ar';
    }
@endphp
<main class="main mt-3">

    <div class="page-content">
        <div class="container">
            <div class="product-details-top mb-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="{{ asset($product->productImages[0]->image ?? '') }}" data-zoom-image="{{ asset($product->productImages[0]->image ?? '') }}" alt="product image">

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->

                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    <a class="product-gallery-item active" href="#" data-image="{{ asset($product->productImages[0]->image ?? '') }}" data-zoom-image="{{ asset($product->productImages[0]->image ?? '') }}">
                                        <img src="{{ asset($product->productImages[0]->image ?? '') }}" alt="product side">
                                    </a>

                                    @if ($product->productImages->count() > 0)
                                        @foreach ($product->productImages as $key => $imageItem)
                                            @if ($key != 0)
                                            <a class="product-gallery-item" href="#" data-image="{{ asset($imageItem->image ?? '') }}" data-zoom-image="{{ asset($imageItem->image ?? '') }}">
                                                <img src="{{ asset($imageItem->image ?? '') }}" alt="product cross">
                                            </a>
                                            @endif
                                        @endforeach
                                    @endif
                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title text-uppercase font-weight-bold" style="text-align: start"> {{ $lang == 'ar' ? $product->title_ar : $product->title_en }} </h1><!-- End .product-title -->

                            <div class="ratings-container">
                                @if ($product->productColors->count() == 0)
                                @if ($product->quantity > 0)
                                    <h6 class="font-weight-bold text-success text-uppercase"> @lang('frontend.In Stock') </h6>
                                @else
                                    <h6 class="font-weight-bold text-danger text-uppercase"> @lang('frontend.Out Of Stock') </h6>
                                @endif
                                @endif
                            </div><!-- End .rating-container -->

                            <div class="product-price">
                                @if ($product->original_price)
                                    <small class="ml-2 mr-2"><s> {{ $product->original_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }} </s></small>
                                @endif
                                <b> {{ $product->selling_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }} </b>
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p> {{ $lang == 'ar' ? $product->small_desc_ar : $product->small_desc_en }} </p>
                            </div><!-- End .product-content -->

                            <div class="details-filter-row details-row-size">
                                <label>@lang('color.Color') {{ $this->colorSelected }}</label>

                                <div class="product-nav product-nav-dots">
                                    @if ($product->productColors)
                                        @foreach ($product->productColors as $colorItem)
                                            <a href="javascript:void(0)" wire:click="selectedColor({{ $colorItem->id }})" class="active" style="background: {{ $colorItem->color->code }};"><span class="sr-only">Color name</span></a>
                                        @endforeach
                                    @endif
                                </div><!-- End .product-nav -->
                                <div class="mr-3 ml-3">
                                    @if ($productColorQtyStatus == 'In Stock')
                                    <b class="text-success"> @lang('frontend.In Stock') </b>
                                @endif
                                @if ($productColorQtyStatus == 'Out Of Stock')
                                    <b class="text-danger"> @lang('frontend.Out Of Stock') </b>
                                @endif
                                </div>
                            </div>

                            <div class="product-details-action">
                                <div class="details-action-col">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group  input-spinner">
                                                <div class="input-group-prepend">
                                                    <button style="min-width: 26px" wire:click="decrementQty" class="btn btn-decrement btn-spinner" type="button">
                                                        <i class="icon-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="text" style="text-align: center" class="form-control" value="{{ $this->quantityCount }}">
                                                <div class="input-group-append">
                                                    <button style="min-width: 26px" wire:click="incrementQty" class="btn btn-increment btn-spinner" type="button">
                                                        <i class="icon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <button wire:click="addToCart({{ $product->id }})" class="btn-product btn-cart"><span>@lang('frontend.Add To Cart')</span></button>
                                        </div>
                                    </div>


                                </div>

                                <div class="details-action-wrapper">
                                    <a href="javascript:void(0)" wire:click="AddToWishlist({{ $product->id }})" class="btn btn-outline-primary btn-rounded">
                                        <span>@lang('frontend.Add To Wishlist')</span>
                                        <i class="icon-heart-o"></i>
                                    </a>
                                </div>
                            </div>

                            @if (session('success_msg'))
                                <div class="alert alert-success">{{ session('success_msg') }}</div>
                            @endif

                            @if (session('error_msg'))
                                <div class="alert alert-danger">{{ session('error_msg') }}</div>
                            @endif
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">@lang('frontend.Description')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">@lang('frontend.Reviews') ({{ $reviews->count() ?? '0' }})</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3> @lang('common.Info') </h3>
                            <p> {{ $lang == 'ar' ? $product->long_desc_ar : $product->long_desc_en }} </p>
                        </div><!-- End .product-desc-content -->
                    </div>
                    <div class="tab-pane fade show active" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        <div class="contact-form mb-2">

                            <div class="rate">
                                <input wire:model="rate" type="radio" id="star5" name="rate" value="5" />
                                <label for="star5">5 stars</label>
                                <input wire:model="rate" type="radio" id="star4" name="rate" value="4" />
                                <label for="star4">4 stars</label>
                                <input wire:model="rate" type="radio" id="star3" name="rate" value="3" />
                                <label for="star3">3 stars</label>
                                <input wire:model="rate" type="radio" id="star2" name="rate" value="2" />
                                <label for="star2">2 stars</label>
                                <input wire:model="rate" type="radio" id="star1" name="rate" value="1" />
                                <label for="star1">1 star</label>
                            </div>
                            <label for="revi" class="sr-only">@lang('frontend.Review')</label>
                            <input wire:model="review" class="form-control" id="revi" required placeholder="@lang('frontend.Write Review')" />

                            <label for="cmessage" class="sr-only">@lang('frontend.Review')</label>
                            <textarea wire:model="comment" class="form-control" cols="30" rows="4" id="cmessage" placeholder="@lang('frontend.Write Description')"></textarea>

                            <div class="text-center">
                                <button wire:click="addReveiw({{ $product->id }})" type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                    <span> @lang('common.Submit') </span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </div><!-- End .text-center -->
                        </div>
                        <div class="reviews">
                            <h3>@lang('frontend.Reviews') ({{ $reviews->count() ?? '0' }})</h3>
                            @forelse ($reviews as $review)
                            @php
                                if ($review->rating == 1) { $ratio = '20%';}
                                if ($review->rating == 2) { $ratio = '40%'; }
                                if ($review->rating == 3) { $ratio = '60%'; }
                                if ($review->rating == 4) { $ratio = '80%'; }
                                if ($review->rating == 5) { $ratio = '100%'; }
                                if ($review->rating == NULL) { $ratio = '0%'; }
                            @endphp
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="javascript:void">{{ $review->user->name }}</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: {{ $ratio }};"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">
                                            @if ($review->created_at->isToday())
                                            {{ $review->created_at->diffForHumans() }}
                                            @elseif ($review->created_at->isYesterday())
                                            @lang('common.Yesterday')
                                            @else
                                            {{ $review->created_at->diffForHumans() }} @lang('common.Days Ago') </span>
                                            @endif
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h3> {{ $review->review }} </h3>

                                        <div class="review-content">
                                            <p> {{ $review->comment ?? '' }} </p>
                                        </div><!-- End .review-content -->

                                        <div class="review-action">
                                            <div class="row">
                                                <div class="col-3">
                                                    <a href="javascript:void(0)" wire:click="like({{ $review->id }})" class="{{ $this->bold }}"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                </div>
                                                <div class="col-3">
                                                    <a href="javascript:void(0)" wire:click="unlike({{ $review->id }})"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <h5>No Reviews</h5>
                            @endforelse

                        </div><!-- End .reviews -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

            <h2 class="title text-center mb-4"> @lang('frontend.You May Also Like') </h2><!-- End .title text-center -->
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                data-owl-options='{
                    "nav": false,
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
                @php
                    $category = $product->category;
                    $p_category = $category->parent;
                @endphp
                @forelse ($p_category->products as $item)
                @if ($item->id != $product->id)
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        <span class="product-label label-new">@lang('common.New')</span>
                        <a href="{{ url('shop/view/' . $item->slug) }}">
                            <img src="{{ asset($item->productImages[0]->image) }}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="{{ route('add_to_wishlist', $item->id) }}" class="btn-product-icon btn-wishlist btn-expandable"><span>@lang('frontend.Add To Wishlist')</span></a>
                        </div><!-- End .product-action-vertical -->
                    </figure><!-- End .product-media -->
                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">{{ $lang == 'ar' ? $category->name_ar : $category->name_en }}</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="{{ url('shop/view/'.$item->slug) }}">{{ $lang == 'ar' ? $item->title_ar : $item->title_en }}</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <small><s>{{ $item->original_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}</s></small>
                            <b>{{ $item->selling_price }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}</b>
                        </div>

                        <div class="product-nav product-nav-dots">
                            @if ($item->productColors)
                            @foreach ($item->productColors as $colorItem)
                            <a href="#" style="background: {{ $colorItem->color->code }}; border: 0.5px solid #000;" title="{{ $lang == 'ar' ? $colorItem->color->color_ar : $colorItem->color->color_en }}"><span class="sr-only">Color name</span></a>
                            @endforeach
                            @endif
                        </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
                @endif
                @empty
                @endforelse

            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main>
