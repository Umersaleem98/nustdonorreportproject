<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin') }}">
        
        <div class="sidebar-brand-text mx-3"> {{ Auth::user()->name ?? 'Guest' }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('students') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Students</span></a>
    </li>
    
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('add_students') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Add New Students</span></a>
    </li>
    
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('donor_list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Donor List</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('adddonor') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Donor List</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">




</ul>
