@php
    if (app()->getLocale() == 'ar') {
        $lang = 'ar';
    }

    if (app()->getLocale() == 'en') {
        $lang = 'en';
    }
@endphp
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    @if ($carts->count() > 0)

                        <div class="col-lg-12">
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th> @lang('product.Product') </th>
                                        <th> @lang('product.Price') </th>
                                        <th> @lang('product.Quantity') </th>
                                        <th> @lang('order.Total') </th>
                                        <th> @lang('common.Remove') </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($carts as $cartItem)
                                        <tr>
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="{{ url('shop/view/' . $cartItem->product->slug) }}">
                                                            <img src="{{ asset($cartItem->product->productImages[0]->image ?? '') }}" alt="Product image">
                                                        </a>
                                                    </figure>

                                                    <h3 class="product-title mr-3 ml-3">
                                                        <a class="text-uppercase font-weight-bold" href="{{ url('shop/view/' . $cartItem->product->slug) }}"> {{ $lang == 'ar' ? $cartItem->product->title_ar : $cartItem->product->title_en }} </a>
                                                        <br>
                                                        @if ($cartItem->productColor)
                                                        @lang('color.Color') : <small class="">{{ $lang == 'ar' ? $cartItem->productColor->color->color_ar : $cartItem->productColor->color->color }}</small>
                                                        @endif
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col"> {{ number_format($cartItem->price, 2, '.', ',') }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }} </td>
                                            <td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <div class="input-group  input-spinner">
                                                        <div class="input-group-prepend">
                                                            <button wire:click="decrementQty({{ $cartItem->id }})" style="min-width: 26px" class="btn btn-decrement btn-spinner" type="button">
                                                                <i class="icon-minus"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text" style="text-align: center" class="form-control" value="{{ $cartItem->quantity }}">
                                                        <div class="input-group-append">
                                                            <button wire:click="incrementQty({{ $cartItem->id }})" style="min-width: 26px" class="btn btn-increment btn-spinner" type="button">
                                                                <i class="icon-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
                                            <td class="total-col"> {{ number_format($cartItem->price * $cartItem->quantity, 2, '.', ',') }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }} </td>
                                            <td class="remove-col"><button wire:click="removeCartItem({{ $cartItem->id }})" class="btn-remove"><i class="icon-close"></i></button></td>
                                            @php
                                                $totalAmount += $cartItem->price * $cartItem->quantity;
                                            @endphp
                                        </tr>
                                    @empty
                                        <h5> Empty Cart </h5>
                                    @endforelse

                                </tbody>
                            </table>
                        </div><!-- End .col-lg-9 -->

                        <aside class="col-lg-4">
                            <div class="summary summary-cart">
                                <h3 class="summary-title text-center text-uppercase font-weight-bold"> @lang('frontend.Cart Total') </h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                        <tr class="summary-total">
                                            <td> @lang('order.Total') </td>
                                            <td> {{ number_format($totalAmount, 2, '.', ',') }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }} </td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <a href="{{ url('/checkout') }}" class="btn btn-outline-primary-2 btn-order btn-block text-uppercase font-weight-bold"> @lang('frontend.Proceed to checkout') </a>
                            </div><!-- End .summary -->
                            <a href="{{ url('/shop') }}" class="btn btn-outline-dark-2 btn-block mb-3 text-uppercase font-weight-bold"><span> @lang('frontend.Continue Shopping') </span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    @else
                    <h4 class="text-center"> @lang('order.Empty Cart') </h4>
                    @endif

                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main>
