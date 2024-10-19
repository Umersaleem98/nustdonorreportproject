<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donors List</title>
    @include('dashboard.head')
  
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
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div style="overflow-x:auto;">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Id</th>
                                            <th>Donor Name</th>
                                            <th>Donor Email</th>
                                            {{-- <th>password</th> --}}
                                            <th>Establish Year</th>
                                            <th>Amount</th>
                                            <th>No of Beneficiaries</th>

                                            @if (Auth::user()->usertype != 'user')
                                                <!-- Check if usertype is not 'user' -->
                                                <th>Edit</th> <!-- New Actions Column -->
                                            @endif
                                            @if (Auth::user()->usertype != 'user')
                                                <!-- Check if usertype is not 'user' -->
                                                <th>Delete</th> <!-- New Actions Column -->
                                            @endif

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($donors as $donor)
                                            <tr>
                                                <td>{{ $donor->id }}</td>
                                                <td>{{ $donor->donor_name }}</td>
                                                <td>{{ $donor->donor_email }}</td>
                                                {{-- <td>{{ $donor->password }}</td> --}}
                                                <td>{{ $donor->year_of_establishment }}</td>
                                                <td>{{ $donor->amount_received }}</td>
                                                <td>{{ $donor->number_of_beneficiaries }}</td>
                                                <td>
                                                    @if (Auth::user()->usertype != 'user')
                                                        <!-- Check if usertype is not 'user' -->
                                                        <a href="{{ url('donors_edit', $donor->id) }}"
                                                            class="btn btn-sm btn-warning mb-3" title="Edit">
                                                            <i class="fas fa-edit"></i> <!-- FontAwesome edit icon -->
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (Auth::user()->usertype != 'user')
                                                        <!-- Check if usertype is not 'user' -->
                                                        <a href="{{ url('donors_delete', $donor->id) }}"
                                                            class="btn btn-sm btn-danger" title="Delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                            <!-- FontAwesome delete icon -->
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination Links -->
                            <div class="d-flex justify-content-center mt-4">
                                <!-- Bootstrap Pagination -->
                                {{ $donors->appends(request()->query())->links('pagination::bootstrap-4') }}
                            </div>

</body>

</html>
