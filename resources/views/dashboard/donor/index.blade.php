<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donors List</title>
    @include('dashboard.head')
    <style>
        /* Smaller table size and text */
        .table {
            font-size: 0.85rem;
        }

        .table td, .table th {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 150px;
        }

        /* Full text display on hover */
        .table td:hover {
            overflow: visible;
            white-space: normal;
            position: relative;
            z-index: 1;
            background-color: #f8f9fa; /* Optional: to highlight hovered cell */
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
                        <h1 class="h3 mb-0 text-gray-800">Donor List</h1>
                        <!-- Search Form -->
                        <form action="{{ url('donor_list') }}" method="GET" class="form-inline">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search Donors..."
                                    value="{{ request()->query('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Alerts -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div style="overflow-x:auto;">
                                <table class="table text-dark table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Id</th>
                                            <th>Donor Name</th>
                                            <th>Donor Email</th>
                                            <th>Establish Year</th>
                                            <th>Amount</th>
                                            <th>No of Beneficiaries</th>
                                            @if (Auth::user()->usertype != 'user')
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($donors as $donor)
                                            <tr>
                                                <td>{{ $donor->id }}</td>
                                                <td>{{ $donor->donor_name }}</td>
                                                <td>{{ $donor->donor_email }}</td>
                                                <td>{{ $donor->year_of_establishment }}</td>
                                                <td>{{ number_format($donor->amount_received, 2) }} PKR</td>
                                                <td>{{ $donor->number_of_beneficiaries }}</td>
                                                @if (Auth::user()->usertype != 'user')
                                                    <td>
                                                        <a href="{{ url('donors_edit', $donor->id) }}"
                                                            class="btn btn-sm btn-warning mb-3" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('donors_delete', $donor->id) }}"
                                                            class="btn btn-sm btn-danger" title="Delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination Links -->
                            <div class="d-flex justify-content-center mt-4">
                                {{ $donors->appends(request()->query())->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Container Fluid -->
            </div>
            <!-- End of Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Wrapper -->
</body>

</html>
