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
            <span>{{__('User Manager')}}</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                    <a class="dropdown-item" href="{{route('add_user')}}"><i class="fa fa-btn fa-plus"></i> {{__('Create')}}</a>
                <a class="dropdown-item" href="{{route('home')}}"><i class="fa fa-btn fa-list-alt" ></i> {{__('List')}}</a>

            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="nav-icon fas fa-tree"></i>
            <span>{{__('Import Export File')}}</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="dropdown-item" href="{{route('importForm')}}"><i class="fa fa-btn fa-plus"></i> {{__('Import File')}}</a>
                <a class="dropdown-item" href="{{route('export')}}"><i class="fa fa-btn fa-plus"></i> {{__('Export File')}}</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtill" aria-expanded="true" aria-controls="collapseUtill">
            <i class="nav-icon fas fa-tree"></i>
            <span>{{__('Role && Permission')}}</span>
        </a>
        <div id="collapseUtill" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="dropdown-item" href="{{route('role')}}"><i class="fa fa-btn fa-list-alt" ></i> {{__('Role')}}</a>
                <a class="dropdown-item" href="{{route('permission')}}"><i class="fa fa-btn fa-list-alt" ></i> {{__('Permission')}}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtill2" aria-expanded="true" aria-controls="collapseUtill2">
            <i class="nav-icon fas fa-tree"></i>
            <span>{{__('Category Manager')}}</span>
        </a>
        <div id="collapseUtill2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="dropdown-item" href="{{route('create_category')}}"><i class="fa fa-btn fa-list-alt" ></i> {{__('Create')}}</a>
                <a class="dropdown-item" href="{{route('list_category')}}"><i class="fa fa-btn fa-list-alt" ></i> {{__('List')}}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtill3" aria-expanded="true" aria-controls="collapseUtill3">
            <i class="nav-icon fas fa-tree"></i>
            <span>{{__('Post Manager')}}</span>
        </a>
        <div id="collapseUtill3" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="dropdown-item" href="{{route('add_post')}}"><i class="fa fa-btn fa-list-alt" ></i> {{__('Create')}}</a>
                <a class="dropdown-item" href="{{route('list_posts')}}"><i class="fa fa-btn fa-list-alt" ></i> {{__('List')}}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtill4" aria-expanded="true" aria-controls="collapseUtill4">
            <i class="nav-icon fas fa-tree"></i>
            <span>{{__('Comment Manager')}}</span>
        </a>
        <div id="collapseUtill4" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="dropdown-item" href="{{route('list_comments')}}"><i class="fa fa-btn fa-list-alt" ></i> {{__('List')}}</a>
            </div>
        </div>
    </li>
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
            <span>{{__('Pages')}}</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('blog_home')}}">Blog</a>
            </div>
        </div>
    </li>
<!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
