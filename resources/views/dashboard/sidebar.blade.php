<style>
    /* Truncate text with ellipsis if it overflows */
/* Allow text to wrap to the next line within dropdown items */
.dropdown-menu .dropdown-item {
    white-space: normal;
    overflow: visible;
    max-width: 250px;
    word-wrap: break-word;
}

/* Optional: Adjust dropdown width */
.dropdown-menu {
    min-width: 270px;
}


/* Adjust the dropdown position to align with the sidebar */
.nav-item.dropdown .dropdown-menu {
    position: absolute;
    left: 100%;           /* Position it to the right of the sidebar */
    top: 0;
    min-width: 220px;     /* Set a width that fits within the sidebar */
    max-width: 250px;
    white-space: normal;  /* Allow text to wrap */
    overflow-wrap: break-word; /* Break long words if necessary */
    z-index: 1000;        /* Ensure it stays above other content */
}


</style>

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

    @if (Auth::user()->usertype != 'user')
        <!-- Only show if usertype is not 'user' -->
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


    @if (Auth::user()->usertype != 'user')
        <!-- Only show if usertype is not 'user' -->
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

    @if (Auth::user()->usertype != 'user')
    <!-- Dropdown Menu for Transaction Reports -->
    <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="transactionDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span>Transaction Reports</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="transactionDropdown">
            <a class="dropdown-item" href="{{ url('annual_zakat_trasnaction_history') }}">
                Annual/Endowment/Zakat Transaction Report
            </a>
            <a class="dropdown-item" href="{{ url('add_trasnaction_report') }}">
                Add Transaction Report
            </a>
        </div>
    </li>
    
@endif



</ul>
