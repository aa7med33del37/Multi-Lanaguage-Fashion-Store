@php
    if (app()->getLocale() == 'ar') {
        $lang = 'ar';
    }

    if (app()->getLocale() == 'en') {
        $lang = 'en';
    }
@endphp
<header class="header header-2 header-intro-clearance">
    <div class="header-top">
        <div class="container d-flex justify-content-center">
            <ul class="top-menu">
                <li>
                    <a href="#">Links</a>
                    <ul>
                        <li class="ml-5">
                            <div class="header-dropdown">
                                <a href="javascript:void(0)">{{ $lang == 'ar' ? 'العربيه' : 'English' }}</a>
                                <div class="header-menu">
                                    <ul>
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li>
                                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div><!-- End .header-menu -->
                            </div>
                        </li>
                        @if(Auth::check())
                        <li>
                            <div class="header-dropdown">
                                <a href="javascript:void(0)">{{ Auth::user()->name }}</a>
                                <div class="header-menu">
                                    <ul>
                                        <li><a href="{{ url('/profile') }}"> @lang('frontend.Porfile') </a></li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                            {{ __('frontend.Logout') }}
                                        </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                    </ul>
                                </div><!-- End .header-menu -->
                            </div>
                        </li>
                        @else
                            <li><a href="#signin-modal" data-toggle="modal">{{ __('frontend.signin_signup') }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>

        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('assets/frontend/images/demos/demo-6/logo.png') }}" alt="Molla Logo" width="105" height="25">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">
                <div class="account">
                    <a href="{{ url('/orders') }}" title=" @lang('frontend.Orders') ">
                        <div class="icon">
                            <i class="icon-user"></i>
                        </div>
                        <p>@lang('frontend.Orders')</p>
                    </a>
                </div><!-- End .compare-dropdown -->

                <div class="wishlist">
                    <a href="{{ url('wishlists') }}" title=" @lang('frontend.Wishlist') ">
                        <div class="icon">
                            <i class="icon-heart-o"></i>
                            <span class="wishlist-count badge" style="background-color: #c96;">
                                @if (Auth::check())
                                {{ Auth::user()->wishlist()->count() ?? '0' }}
                                @else
                                0
                                @endif
                        </div>
                        <p>@lang('frontend.Wishlist')</p>
                    </a>
                </div><!-- End .compare-dropdown -->

                @if (Auth::check())
                    <div class="dropdown cart-dropdown">
                        <a href="#" title=" @lang('frontend.Cart') " class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <div class="icon">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count">{{ Auth::check() ? Auth::user()->cart->count() : '' }}</span>
                            </div>
                            <p>@lang('frontend.Cart')</p>
                        </a>

                        @if (Auth::user()->cart->count() > 0)
                            <div class="dropdown-menu {{ $lang == 'en' ? 'dropdown-menu-right' : 'dropdown-menu-left' }}">
                                <div class="dropdown-cart-products">
                                    @if(Auth::check())
                                        @php
                                            $totalAmount = 0;
                                        @endphp
                                        @foreach (Auth::user()->cart as $cartItem)
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a href="product.html">{{ $lang == 'ar' ? $cartItem->product->title_ar : $cartItem->product->title_en }}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{ $cartItem->quantity }}</span>
                                                    x {{ number_format($cartItem->price, 2, '.', ',') }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}
                                                </span>
                                            </div><!-- End .product-cart-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="{{ asset($cartItem->product->productImages[0]->image ?? '') }}" alt="product">
                                                </a>
                                            </figure>
                                        </div>
                                        @php
                                            $totalAmount += $cartItem->quantity * $cartItem->price;
                                        @endphp
                                        @endforeach
                                    @endif
                                </div><!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span> @lang('order.Total') </span>

                                    <span class="cart-total-price">{{ number_format($totalAmount, 2, '.', ',') }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }}</span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="{{ url('/cart') }}" class="btn btn-primary"> @lang('frontend.View Cart') </a>
                                    <a href="{{ url('/checkout') }}" class="btn btn-outline-primary-2"><span> @lang('frontend.Proceed to checkout') </span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        @endif
                    </div><!-- End .cart-dropdown -->
                @else
                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">0</span>
                        </div>
                        <p>@lang('frontend.Cart')</p>
                    </a>
                </div><!-- End .cart-dropdown -->
                @endif

            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <div class="dropdown category-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                        @lang('frontend.Browse Categories')
                    </a>

                    <div class="dropdown-menu">
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">
                                @forelse ($categories as $category)
                                    <li class="item-lead"><a href="{{ url('shop/' . $category->slug) }}"> {{ $lang == 'ar' ? $category->name_ar : $category->name_en }} </a></li>
                                    @foreach ($category->childs as $child_category)
                                        <li><a href="{{ url('shop/' . $child_category->slug) }}">{{ $lang == 'ar' ? $child_category->name_ar : $child_category->name_en }}</a></li>
                                    @endforeach
                                @empty
                                @endforelse
                            </ul><!-- End .menu-vertical -->
                        </nav><!-- End .side-nav -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .category-dropdown -->
            </div><!-- End .header-left -->

            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active"><a href="{{ url('/') }}" class="">@lang('frontend.Home')</a></li>
                        <li> <a href="{{ url('/shop') }}" class="">@lang('frontend.Shop')</a></li>
                        <li> <a href="{{ url('/trending') }}" class="">@lang('frontend.Trending')</a></li>
                        <li> <a href="{{ url('/featured') }}" class="">@lang('frontend.Featured')</a></li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-center -->
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header>
