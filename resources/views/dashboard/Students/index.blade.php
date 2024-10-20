<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student list</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Import Students Form -->
                    <div class="d-flex justify-content-between mb-4">
                        <form action="{{ url('students_import') }}" method="POST" enctype="multipart/form-data"
                            class="mr-2">
                            @csrf
                            <input type="file" class="form-control mb-3" name="file" required>
                            <button type="submit" name="submit" class="btn btn-primary">Import Students</button>
                        </form>

                        <!-- Search Form -->
                        <form action="{{ url('students') }}" method="GET">
                            <input type="text" class="form-control mr-2 mb-3" name="search"
                                placeholder="Search by Name or Qalam ID" required>
                            <button type="submit" class="btn btn-primary ">Search</button>
                        </form>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div style="overflow-x:auto;">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="thead-dark">
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
                                                <!-- Check if usertype is not 'user' -->
                                                <th>Actions</th>
                                            @endif

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->qalam_id }}</td>
                                                <td>{{ $student->name_of_student }}</td>
                                                <td>{{ $student->father_profession }}</td>
                                                <td>{{ $student->institutions }}</td>
                                                <td>{{ $student->city }}</td>
                                                <td>{{ $student->semester_1 }}</td>
                                                <td>{{ $student->semester_2 }}</td>
                                                <td>{{ $student->semester_3 }}</td>
                                                <td>{{ $student->program }}</td>
                                                <td>{{ $student->nust_trust_fund_donor_name }}</td>
                                                <td>{{ $student->degree }}</td>
                                                <td>{{ $student->year_of_admission }}</td>
                                                <td>{{ $student->remarks_status }}</td>
                                                <td>
                                                    @if ($student->images)
                                                        <img src="{{ asset('student_images/' . $student->images) }}"
                                                            alt="Student Image"
                                                            style="max-width: 80px; max-height: 80px; border-radius:2   0%;">
                                                    @else
                                                        <img src="{{ asset('student_images/abc/dummy.png') }}"
                                                            alt="Default Photo"
                                                            class="img-fluid rounded-circle border border-secondary"
                                                            style="width: 200px; height: 200px; border-radius:50%; ">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (Auth::user()->usertype != 'user')
                                                        <!-- Check if usertype is not 'user' -->
                                                        <a href="{{ url('students_edit', $student->id) }}"
                                                            class="btn btn-sm btn-warning" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endif

                                                </td>
                                                <td>

                                                    @if (Auth::user()->usertype != 'user')
                                                        <!-- Check if usertype is not 'user' -->
                                                        <a href="{{ url('students_delete', $student->id) }}"
                                                            class="btn btn-sm btn-danger" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <!-- Bootstrap Pagination -->
                                {{ $students->appends(request()->query())->links('pagination::bootstrap-4') }}
                            </div>

</body>

</html>
