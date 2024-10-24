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
            <i class="fas fa-fw fa-tachometer-alt"></i> <!-- Dashboard Icon -->
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Students -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('students') }}">
            <i class="fas fa-user-graduate"></i> <!-- Students Icon -->
            <span>Students</span>
        </a>
    </li>
    
    @if(Auth::user()->usertype != 'user') <!-- Only show if usertype is not 'user' -->
        <!-- Nav Item - Add New Students -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('add_students') }}">
                <i class="fas fa-user-plus"></i> <!-- Add New Students Icon -->
                <span>Add New Students</span>
            </a>
        </li>
    
    
    @endif

    <!-- Nav Item - Donor List -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('donor_list') }}">
            <i class="fas fa-hand-holding-usd"></i> <!-- Donor List Icon -->
            <span>Donor List</span>
        </a>
    </li>


    @if(Auth::user()->usertype != 'user') <!-- Only show if usertype is not 'user' -->
        <!-- Nav Item - Add New Students -->
        <!-- Nav Item - Add Donor -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('adddonor') }}">
                <i class="fas fa-user-tie"></i> <!-- Add Donor Icon -->
                <span>Add Donor</span>
            </a>
        </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider">

    @if(Auth::user()->usertype != 'user') <!-- Only show if usertype is not 'user' -->
    <!-- Nav Item - Add New Students -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('annual_zakat_trasnaction_history') }}">
            <i class="fas fa-user-plus"></i> <!-- Add New Students Icon -->
            <span>Annual and Zakat Traction Report</span>
        </a>
    </li>
@endif
    @if(Auth::user()->usertype != 'user') <!-- Only show if usertype is not 'user' -->
    <!-- Nav Item - Add New Students -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('add_trasnaction_report') }}">
            <i class="fas fa-user-plus"></i> <!-- Add New Students Icon -->
            <span>Add Traction Report</span>
        </a>
    </li>
@endif
</ul>
