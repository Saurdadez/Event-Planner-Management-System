<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Mendoza Events</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $activePage == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Appointment -->
    <li class="nav-item {{ $activePage == 'appointment' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/appointments') }}">
            <i class="far fa-calendar-plus"></i>
            <span>Appointments</span>
        </a>
    </li>

    <!-- Nav Item - Service Orders -->
    <li class="nav-item {{ $activePage == 'service-order' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/service-orders') }}">
            <i class="fas fa-book"></i>
            <span>Service Orders</span></a>
    </li>

    <!-- Nav Item - Clients -->
    <li class="nav-item {{ $activePage == 'client' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/clients') }}">
            <i class="fas fa-users"></i>
            <span>Clients</span></a>
    </li>



    <!-- Nav Item - Services -->
    <li class="nav-item {{ $activePage == 'service' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/services') }}">
            <i class="fas fa-folder-plus"></i>
            <span>Services</span></a>
    </li>

    <!-- Nav Item - Reports Collapse Menu -->
    <li class="nav-item {{ $activePage == 'report' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-chart-bar"></i>
            <span>Reports</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/income-report') }}">Income Report</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Settings Collapse Menu -->
    <li class="nav-item {{ $activePage == 'setting' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">MODERATION:</h6>
                <a class="collapse-item" href="">User</a>
                <a class="collapse-item" href="{{ url('/employees') }}">Employees</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">DATABASE:</h6>
                <a class="collapse-item" href="">Backup</a>
                <a class="collapse-item" href="">Restore</a>
            </div>
        </div>
    </li>

    <br><br><br><br><br><br>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
