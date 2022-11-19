@php
    $uri = request()->segment(1);
@endphp

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
        
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Indo Palm <sup>2</sup></div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item  {{ $uri == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manage Data
    </div>

    
    <li class="nav-item {{ $uri == 'category-coa' ? 'active' : '' }}">
        <a class="nav-link" href="/category-coa"><i class="mr-1 fas fa-fw fa-window-restore"></i><span>Category COA</span></a>
    </li>
    {{-- <li class="nav-item {{ $uri == 'about' || $uri == 'our-lab' || $uri == 'packaging' || $uri == 'certificate' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Tabs</span>
        </a>
        <div id="collapsePages" class="collapse {{ $uri == 'about' || $uri == 'our-lab' || $uri == 'packaging' || $uri == 'certificate' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Features:</h6>
                <a class="collapse-item {{ $uri == 'about' ? 'active' : '' }}" href="/about">About Us</a>
                <a class="collapse-item {{ $uri == 'our-lab' ? 'active' : '' }}" href="/our-lab">Our Lab</a>
                <a class="collapse-item {{ $uri == 'packaging' ? 'active' : '' }}" href="/packaging">Packaging</a>
                <a class="collapse-item {{ $uri == 'certificate' ? 'active' : '' }}" href="/certificate">Certificate</a>
            </div>
        </div>
    </li> --}}
    

    {{-- <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Account
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="ogin.html">Login</a>
                <a class="collapse-item" href="egister.html">Register</a>
                <a class="collapse-item" href="orgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="04.html">404 Page</a>
                <a class="collapse-item" href="lank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="harts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->