<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="/images/exam.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Provincial Gazette</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/images/profile-icon.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">

                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent " data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/companies" class="nav-link {{ $page['name'] == 'Companies' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i> <p class="text">Companies</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/employees" class="nav-link {{ $page['name'] == 'Employees' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i> <p class="text">Employees</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</aside>