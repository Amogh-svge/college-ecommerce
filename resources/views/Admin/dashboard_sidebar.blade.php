<ul class="navbar-nav  sidebar sidebar-dark accordion" style="background-color: #272726" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href={{ route('dashboard') }}>
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-fw fa-tachometer-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href={{ route('dashboard') }}>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin Interface
    </div>

    <!-- Nav Item - Products Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-laptop-code"></i>
            <span>Products</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Products Manager</h6>

                <a class="collapse-item" href="{{ route('products.create') }}"> <i
                        class="fas fa-plus mr-2"></i>Add-Products</a>
                <a class="collapse-item" href="{{ route('products.index') }}"><i
                        class="fas fa-list mr-2"></i>Products-List</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Orders Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-truck"></i>
            <span>Orders</span>
        </a>
        <div id="collapseOrder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Orders Manager</h6>

                <a class="collapse-item" href="{{ route('order.index') }}"> <i class="fas fa-plus mr-2"></i>Order
                    Status</a>
                <a class="collapse-item" href="{{ route('order.create') }}"><i
                        class="fas fa-clipboard-list mr-2"></i>Order History</a>
            </div>
        </div>
    </li>

    <!--Super Admin-->
    @if (Auth::user()->role_id == 3)
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Super Admin
        </div>

        <!-- Nav Item - Utilities Collapse Menu -->

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Roles</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Roles Manager:</h6>
                    <a class="collapse-item" href={{ route('roles.create') }}><i
                            class="fas fa-plus mr-2"></i>Add-Roles</a>
                    <a class="collapse-item" href={{ route('roles.index') }}><i
                            class="fas fa-list mr-2"></i>Roles-List</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-list"></i>
                <span>Categories</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Categories Manager:</h6>
                    <a class="collapse-item" href={{ route('categories.create') }}><i
                            class="fas fa-plus mr-2"></i>Add-Categories</a>
                    <a class="collapse-item" href={{ route('categories.index') }}><i
                            class="fas fa-list mr-2"></i>Categories-List</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard_roles') }}">
                <i class="fas fa-users"></i>
                <span>Assign Roles</span></a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
