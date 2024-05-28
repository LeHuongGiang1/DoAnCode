@php
$categories = App\Models\category::all();
$id = App\Models\devicedetail::all();
$devices = App\Models\device::all();
@endphp

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('admin.home.index') }}">
            <img src="/template/vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
            <img src="/template/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi "><i class="icon-copy bi bi-list-nested"></i></span>
                        <span class="mtext">Danh mục thiết bị</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.category.index') }}">Danh sách danh mục</a></li>
                        <li><a href="{{ route('admin.category.create') }}">Thêm danh mục mới</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi "><i class="icon-copy fa fa-laptop" aria-hidden="true"></i></span>
                        <span class="mtext">Thiết bị</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.device.index') }}">Tất cả thiết bị</a></li>

                        @foreach ($categories as $category)
                        <li>
                            <a href="{{route('admin.device.index', ['cate' => $category->id])}}">{{ $category->name
                                }}</a>
                        </li>
                        @endforeach
                        <li><a href="{{ route('admin.device.create') }}">Thêm thiết bị mới</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-table"></span><span class="mtext">Phòng ban</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.department.listDepartment') }}">Danh sách phòng ban</a></li>

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi "><i class="icon-copy bi bi-tools"></i></span><span class="mtext">Thiệt bị
                            hỏng </span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{route('admin.devicedetail.listBroken')}}">Danh sách thiết bị hỏng</a>
                        </li>
                        <li><a href="{{route('admin.devicedetail.listFixed')}}">Thiết bị đã sửa chữa</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-command"></span><span class="mtext">Quản lý tác vụ</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.action.department.index') }}">Quản lý thông tin phòng ban</a></li>
                        <li><a href="{{ route('admin.action.depot.index') }}">Quản lý thông tin kho</a></li>
                        <li><a href="{{ route('admin.action.supplier.index') }}">Quản lý thông tin NCC</a></li>

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi "><i class="icon-copy bi bi-person-square"></i></span><span
                            class="mtext">Quản lý người dùng</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.user.index') }}">Danh sách người dùng</a></li>
                        <li><a href="{{ route('admin.user.create') }}">Thêm người dùng mới</a></li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>
</div>
