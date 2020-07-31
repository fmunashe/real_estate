<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="/libs/admin-lte/img/AdminLTELogo.png" alt="MS Resource" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">MS Resource</span>
  </a>

  <!-- sidebar: style can be found in sidebar.less -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/libs/admin-lte/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="/profile" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Optionally, you can add icons to the links -->
        <li class="nav-item"><a href="/" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
        <li class="nav-item"><a href="/clients" class="nav-link"><i class="nav-icon fas fa-users"></i> <span>Clients</span></a></li>
        <li class="nav-item"><a href="/locations" class="nav-link"><i class="nav-icon fas fa-map-marked-alt"></i> <span>Locations</span></a></li>
        <li class="nav-item"><a href="/stands" class="nav-link"><i class="nav-icon fas fa-map"></i> <span>Stands</span></a></li>
        <li class="nav-item"><a href="/payments" class="nav-link"><i class="nav-icon fas fa-map"></i> <span>Payments</span></a></li>
        {{-- <li class="nav-item"><a href="/user/roles" class="nav-link"><i class="nav-icon fas fa-user-cog"></i> <span>User Roles</span></a></li> --}}
        <li class="nav-item"><a href="/reports" class="nav-link"><i class="nav-icon fas fa-chart-bar"></i> <span>Reports</span></a></li>
        @if (Auth::user()->user_type_id == 1)
        <li class="nav-item"><a href="/user/types" class="nav-link"><i class="nav-icon fas fa-user-tag"></i> <span>User Types</span></a></li>
        @endif
        @if (Auth::user()->user_type_id == 1)
        <li class="nav-item"><a href="/users" class="nav-link"><i class="nav-icon fas fa-users"></i> <span>Users</span></a></li>
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

