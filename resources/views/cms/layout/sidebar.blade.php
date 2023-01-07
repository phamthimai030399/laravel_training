<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="/image/icon-svg/coreui.svg#full"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="/image/icon-svg/coreui.svg#signet"></use>
        </svg>
    </div>
    <ul class="c-sidebar-nav ps ps--active-y">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="index.html">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('image/icon-svg/free.svg#cil-speedometer') }}"></use>
                </svg>Dashboard</a></li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link" href="{{route('category.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('/image/icon-svg/free.svg#cil-library') }}"></use>
                </svg>
                Quản lý danh mục
            </a>

        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link" href="{{route('product.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('/image/icon-svg/free.svg#cil-basket') }}"></use>
                </svg>
                Quản lý sản phẩm
            </a>

        </li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link" href="{{route('user.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('/image/icon-svg/free.svg#cil-lock-locked') }}"></use>
                </svg>
                Quản lý tài khoản
            </a>

        </li>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 575px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 444px;"></div>
        </div>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>
