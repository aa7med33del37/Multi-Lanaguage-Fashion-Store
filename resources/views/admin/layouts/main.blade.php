<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('assets/admin/vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.base.css') }}">
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}"> --}}
        <!-- Dropify Css -->
        <link rel="stylesheet" href="{{ asset('assets/admin/css/dropify.min.css') }}">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}" />
        @yield('styles')
        <style>
            a { text-decoration: none; color: inherit }
            a:hover { color: inherit }
            .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .dropdown-menu.navbar-dropdown .dropdown-item
            {
                color: #000;
                font-weight: 500;
            }

            .sidebar .nav .nav-item .nav-profile { font-size: 15px !important }
            .sidebar .nav .nav-item .nav-link { font-size: 18px; }
            .sidebar .nav .nav-item .nav-link .mdi { color: #000 }

            .form-check-label { float: left; }
        </style>
    </head>
    <body style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            @include('admin.layouts.navbar')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                @include('admin.layouts.sidebar')
                <!-- partial -->
                @yield('content')
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{ asset('assets/admin/vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('assets/admin/vendors/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/jquery.cookie.js') }}" type="text/javascript"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('assets/admin/js/off-canvas.js') }}"></script>
        <script src="{{ asset('assets/admin/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('assets/admin/js/misc.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
        <script src="{{ asset('assets/admin/js/todolist.js') }}"></script>
        <!-- End custom js for this page -->
        <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>

        <!-- Dropify Js -->
        <script src="{{ asset('assets/admin/js/dropify.min.js') }}"></script>
        <script>
            $('.dropify').dropify();
        </script>
        <!-- End Dropify Js -->
        @yield('scripts')
    </body>
</html>
