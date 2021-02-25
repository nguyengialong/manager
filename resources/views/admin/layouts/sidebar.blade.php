<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>ADMIN PAGES</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="nav-icon fas fa-tree"></i>
            <span>Quản lý người dùng</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="dropdown-item" href="{{route('add_user')}}"><i class="fa fa-btn fa-plus"></i> Tạo mới</a>
                <a class="dropdown-item" href="{{route('home')}}"><i class="fa fa-btn fa-list-alt" ></i> Danh sách</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->




{{--    @if(Auth::check())--}}
{{--        @if(Auth::user()->role == 1)--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">--}}
{{--                    <i class="nav-icon fas fa-tree"></i>--}}
{{--                    <span>Quản lý người dùng</span>--}}
{{--                </a>--}}
{{--                <div id="collapse" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">--}}
{{--                    <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                        <a class="dropdown-item" href="{{route('add_user')}}"><i class="fa fa-btn fa-plus"></i> Tạo mới</a>--}}
{{--                        <a class="dropdown-item" href="{{route('list_users')}}"><i class="fa fa-btn fa-list-alt" ></i> Danh sách</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--    @endif--}}
{{--@endif--}}

<!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="">Blog</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->


    <!-- Nav Item - Tables -->
{{--       <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> --}}

<!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
