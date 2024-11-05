<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.head')
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

        /* Style for Font Awesome icons to match headings */
        .icon-style {
            font-size: 1.5rem; /* Adjust size as needed */
            color: #4e73df;    /* Match the color used in headings */
            line-height: 1;    /* Adjust line height for alignment */
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">
    <div id="wrapper">

        <!-- Sidebar -->
        @include('dashboard.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('dashboard.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Donors</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $donorCount }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar icon-style"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Students Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Students</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $studentsCount }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-graduate icon-style"></i> <!-- Updated icon -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Qualified Students Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Qualified Students</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $qualifiedStudentsCount }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-check icon-style"></i> <!-- Updated icon -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Transactions Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Transactions</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $transectionCount }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments icon-style"></i> <!-- Updated icon -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        {{-- <span>Copyright &copy; Your Website 2021</span> --}}
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('dashboard.footer')
</body>

</html>
