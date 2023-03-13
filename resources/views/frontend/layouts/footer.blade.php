@php
    if(app()->getLocale() == 'ar') {
        $lang = 'ar';
    }
    if(app()->getLocale() == 'en') {
        $lang = 'en';
    }
@endphp
<footer class="footer">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="widget widget-about">
                        <h4 class="widget-title text-center">@lang('setting.About')</h4><!-- End .widget-title -->
                        <p>
                            {{ $lang == 'ar' ? $settings->about_ar : $settings->about_en }}
                        </p>

                        <div class="social-icons">
                            <a href="{{ $settings->facebook ?? ''}}" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                            <a href="{{ $settings->twitter }}" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                            <a href="{{ $settings->instagram ?? '' }}" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                            <a href="{{ $settings->youtube ?? '' }}" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                        </div><!-- End .soial-icons -->
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-md-4">
                    <div class="widget">
                        <h4 class="widget-title">@lang('frontend.Useful Links')</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{ url('/shop') }}">@lang('frontend.Shop')</a></li>
                            <li><a href="{{ url('/trending') }}">@lang('frontend.Trending')</a></li>
                            <li><a href="{{ url('/featured') }}">@lang('frontend.Featured')</a></li>
                            <li><a href="{{ url('/login') }}">@lang('auth.Login')</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-md-4">
                    <div class="widget">
                        <h4 class="widget-title">@lang('frontend.My Account')</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{ url('/login') }}">@lang('auth.Login')</a></li>
                            <li><a href="{{ url('/cart') }}">@lang('frontend.Cart')</a></li>
                            <li><a href="{{ url('/wishlists') }}">@lang('frontend.Wishlist')</a></li>
                            <li><a href="{{ url('/orders') }}">@lang('frontend.Orders')</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom">
        <div class="container">
            <figure class="footer-payments">
                <img src="{{ asset('assets/frontend/images/payments.png') }}" alt="Payment methods" width="272" height="20">
            </figure><!-- End .footer-payments -->
            <img src="{{ asset('assets/frontend/images/demos/demo-6/logo-footer.png') }}" alt="Molla Logo" width="82" height="25">
            <p class="footer-copyright">Copyright © 2019 Molla Store. All Rights Reserved.</p><!-- End .footer-copyright -->
        </div><!-- End .container -->
    </div><!-- End .footer-bottom -->
</footer>
