<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href=""><img src="{{ asset('assets/admin/img/logo.png') }}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a href="{{ url('admin') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Dashboard</span>
            </a>
        </li>

        <li class>
            <a href="{{ url('admin/categories') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/4.svg') }}" alt>
                </div>
                <span>Quản lý danh mục</span>
            </a>
        </li>

        <li class>
            <a href="{{ url('admin/products') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/18.svg') }}" alt>
                </div>
                <span>Quản lý sản phẩm</span>
            </a>
        </li>

        <li class>
            <a href="{{ url('admin/users') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/17.svg') }}" alt>
                </div>
                <span>Quản lý người dùng</span>
            </a>
        </li>

        <li class>
            <a href="{{ url('') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/19.svg') }}" alt>
                </div>
                <span>Trở về trang web</span>
            </a>
        </li>
    </ul>
</nav>
