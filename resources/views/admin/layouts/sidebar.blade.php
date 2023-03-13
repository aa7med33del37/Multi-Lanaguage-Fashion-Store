<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="{{ route('admin.profile', Auth::user()->id) }}" class="nav-link nav-profile">
                <div class="nav-profile-image">
                    @if (Auth::user()->image)
                    <img src="{{ asset(Auth::user()->image ?? '') }}" alt="profile">
                    @endif
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"> {{ Auth::user()->name }} </span>
                    <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin') }}">
                <span class="page-title-icon">
                <i class="mdi mdi-home menu-icon"></i>
                </span> @lang('dashboard.Dashboard')
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('orders.index') }}">
                <span class="page-title-icon">
                    <i class="mdi mdi-home menu-icon"></i>
                </span> @lang('dashboard.Orders')
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('carts.index') }}">
                <span class="page-title-icon">
                    <i class="mdi mdi-home menu-icon"></i>
                </span> @lang('dashboard.Cart')
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">
                <span class="page-title-icon">
                    <i class="mdi mdi-home menu-icon"></i>
                </span> @lang('dashboard.Categories')
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('brands.index') }}">
                <span class="page-title-icon">
                    <i class="mdi mdi-home menu-icon"></i>
                </span> @lang('dashboard.Brands')
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('products.index') }}">
                <span class="page-title-icon">
                    <i class="mdi mdi-home menu-icon"></i>
                </span> @lang('dashboard.Products')
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('colors.index') }}">
                <span class="page-title-icon">
                    <i class="mdi mdi-home menu-icon"></i>
                </span> @lang('dashboard.Colors')
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('banners.index') }}">
                <span class="page-title-icon">
                    <i class="mdi mdi-home menu-icon"></i>
                </span> @lang('dashboard.Home Banners')
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/users')}}">
                <span class="page-title-icon">
                    <i class="mdi mdi-home menu-icon"></i>
                </span> @lang('dashboard.Users')
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('settings.index') }}">
                <span class="page-title-icon">
                    <i class="mdi mdi-home menu-icon"></i>
                </span> @lang('dashboard.Settings')
            </a>
        </li>
    </ul>
</nav>
