<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.head')
</head>

<<<<<<< HEAD
<body class="g-sidenav-show bg-gray-100">
=======
<body class="g-sidenav-show   bg-gray-100">
>>>>>>> 16e7b67daf41c455376adb2b8c94c1fd4e3932be
    <div id="wrapper">

        <!-- Sidebar -->
        @include('dashboard.sidebar')
        <!-- End of Sidebar -->
<<<<<<< HEAD

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <form action="{{ url('students_import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" class="form-control mb-3" name="file" required>
                            <button type="submit" name="submit" class="btn btn-primary">Import Students</button>
                        </form>
=======

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

>>>>>>> 16e7b67daf41c455376adb2b8c94c1fd4e3932be
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
<<<<<<< HEAD
                                            <th>Images</th>
                                            <th>Actions</th> <!-- New Actions column -->
=======
>>>>>>> 16e7b67daf41c455376adb2b8c94c1fd4e3932be
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
<<<<<<< HEAD
                                                <td>
                                                    <!-- Display image if available -->
                                                    @if ($student->images)
                                                        <img src="{{ asset('student_images/' . $student->images) }}"
                                                            alt="Student Image"
                                                            style="max-width: 80px; max-height: 80px;">
                                                    @else
                                                        No Image Available
                                                    @endif
                                                </td>
                                                
                                                <td>
                                                    <!-- Edit button -->
                                                    <a href="{{ url('students_edit', $student->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="fas fa-edit"></i> <!-- FontAwesome edit icon -->
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ url('students_delete', $student->id) }}" class="btn btn-sm btn-danger" title="Edit">
                                                        <i class="fas fa-delete"></i> <!-- FontAwesome edit icon -->
                                                    </a>
                                                </td>
=======
>>>>>>> 16e7b67daf41c455376adb2b8c94c1fd4e3932be
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <!-- Pagination Links -->
                            <div class="d-flex justify-content-center">
                                {{ $students->links() }}
                            </div>
                            <!-- Pagination Links -->

                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

<<<<<<< HEAD
   
=======
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>





>>>>>>> 16e7b67daf41c455376adb2b8c94c1fd4e3932be
    @include('dashboard.footer')
</body>

</html>
