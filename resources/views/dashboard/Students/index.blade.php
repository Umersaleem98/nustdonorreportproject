<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student List</title>
    @include('dashboard.head')
    <style>
        .table-sm td, .table-sm th {
            padding: 0.3rem;
            font-size: 12px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 150px; /* Set a max width for cells */
        }

        /* Tooltip styling */
        .table-sm td:hover, .table-sm th:hover {
            overflow: visible;
            white-space: normal;
            position: relative;
            z-index: 1;
            max-width: unset;
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
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Import and Search Forms -->
                    <div class="d-flex justify-content-between mb-4">
                        <form action="{{ url('students_import') }}" method="POST" enctype="multipart/form-data" class="mr-2">
                            @csrf
                            <input type="file" class="form-control mb-3" name="file" required>
                            <button type="submit" name="submit" class="btn btn-primary">Import Students</button>
                        </form>

                        <form action="{{ url('students') }}" method="GET">
                            <input type="text" class="form-control mr-2 mb-3" name="search" placeholder="Search by Name or Qalam ID" required>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>

                    <!-- Students Table -->
                    <div class="row">
                        <div class="col-md-12">
                            <div style="overflow-x: auto;">
                                <table class="table table-bordered table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>Qalam Id</th>
                                            <th>Name</th>
                                            <th>Father Profession</th>
                                            <th>Institutions</th>
                                            <th>City</th>
                                            <th>Semester 1</th>
                                            <th>Semester 2</th>
                                            <th>Semester 3</th>
                                            <th>Program</th>
                                            <th>Donor Name</th>
                                            <th>Degree</th>
                                            <th>Year of Admission</th>
                                            <th>Remarks Status</th>
                                            <th>Images</th>
                                            @if (Auth::user()->usertype != 'user')
                                                <th>Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td title="{{ $student->qalam_id }}">{{ $student->qalam_id }}</td>
                                                <td title="{{ $student->name_of_student }}">{{ $student->name_of_student }}</td>
                                                <td title="{{ $student->father_profession }}">{{ $student->father_profession }}</td>
                                                <td title="{{ $student->institutions }}">{{ $student->institutions }}</td>
                                                <td title="{{ $student->city }}">{{ $student->city }}</td>
                                                <td title="{{ $student->semester_1 }}">{{ $student->semester_1 }}</td>
                                                <td title="{{ $student->semester_2 }}">{{ $student->semester_2 }}</td>
                                                <td title="{{ $student->semester_3 }}">{{ $student->semester_3 }}</td>
                                                <td title="{{ $student->program }}">{{ $student->program }}</td>
                                                <td title="{{ $student->nust_trust_fund_donor_name }}">{{ $student->nust_trust_fund_donor_name }}</td>
                                                <td title="{{ $student->degree }}">{{ $student->degree }}</td>
                                                <td title="{{ $student->year_of_admission }}">{{ $student->year_of_admission }}</td>
                                                <td title="{{ $student->remarks_status }}">{{ $student->remarks_status }}</td>
                                                <td>
                                                    @if ($student->images)
                                                        <img src="{{ asset('student_images/' . $student->images) }}" alt="Student Image" style="max-width: 50px; max-height: 50px; border-radius: 20%;">
                                                    @else
                                                        <img src="{{ asset('student_images/abc/dummy.png') }}" alt="Default Photo" class="img-fluid rounded-circle border border-secondary" style="width: 50px; height: 50px;">
                                                    @endif
                                                </td>
                                                @if (Auth::user()->usertype != 'user')
                                                    <td>
                                                        <a href="{{ url('students_edit', $student->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ url('students_delete', $student->id) }}" class="btn btn-sm btn-danger" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $students->appends(request()->query())->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
