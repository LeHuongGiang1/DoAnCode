<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>

    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="{{ route('admin.login.profile') }}"><i class="dw dw-user1"></i>Sửa
                        thông tin người dùng</a>
                    <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i>Đổi mật khẩu</a>
                    <a class="dropdown-item" href="{{ route('admin.login.index') }}"><i class="dw dw-logout"></i>Đăng
                        xuất</a>
                </div>
            </div>
        </div>

    </div>
</div>
