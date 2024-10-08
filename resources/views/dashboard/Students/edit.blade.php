<!DOCTYPE html>
<html lang="en">

<head>
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
                        <h1 class="h3 mb-0 text-gray-800">Update Student Information</h1>
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
                                <!-- Update Form -->
                                <form action="{{ url('update_student', $students->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- First Row with Two Input Fields -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="qalam_id">Qalam ID</label>
                                            <input type="text" class="form-control" id="qalam_id" name="qalam_id" value="{{ $students->qalam_id }}" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="name_of_student">Student Name</label>
                                            <input type="text" class="form-control" id="name_of_student" name="name_of_student" value="{{ $students->name_of_student }}" required>
                                        </div>
                                    </div>
                                    
                                    <!-- Second Row with Two Input Fields -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="father_profession">Father's Profession</label>
                                            <input type="text" class="form-control" id="father_profession" name="father_profession" value="{{ $students->father_profession }}" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="institutions">Institutions</label>
                                            <input type="text" class="form-control" id="institutions" name="institutions" value="{{ $students->institutions }}" required>
                                        </div>
                                    </div>

                                    <!-- Display Current Image if Exists -->
                                    @if ($students->image)
                                    <div class="form-group">
                                        <label>Current Image:</label>
                                        <br>
                                        <img src="{{ asset($students->image) }}" alt="Current Image" style="max-width: 200px; height: auto;">
                                    </div>
                                    @endif

                                    <!-- Third Row with Two Input Fields -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city" value="{{ $students->city }}" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="program">Program</label>
                                            <input type="text" class="form-control" id="program" name="program" value="{{ $students->program }}" required>
                                        </div>
                                    </div>

                                    <!-- Semesters in a loop (one per row) -->
                                    @for ($i = 1; $i <= 8; $i++)
                                    <div class="form-group">
                                        <label for="semester_{{ $i }}">Semester {{ $i }}</label>
                                        <input type="text" class="form-control" id="semester_{{ $i }}" name="semester_{{ $i }}" value="{{ $students->{'semester_' . $i} }}" required>
                                    </div>
                                    @endfor

                                    <!-- Fourth Row with Two Input Fields -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nust_trust_fund_donor_name">NUST Trust Fund Donor Name</label>
                                            <input type="text" class="form-control" id="nust_trust_fund_donor_name" name="nust_trust_fund_donor_name" value="{{ $students->nust_trust_fund_donor_name }}" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="degree">Degree</label>
                                            <input type="text" class="form-control" id="degree" name="degree" value="{{ $students->degree }}" required>
                                        </div>
                                    </div>

                                    <!-- Fifth Row with Two Input Fields -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="year_of_admission">Year of Admission</label>
                                            <input type="number" class="form-control" id="year_of_admission" name="year_of_admission" value="{{ $students->year_of_admission }}" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="remarks_status">Remarks Status</label>
                                            <input type="text" class="form-control" id="remarks_status" name="remarks_status" value="{{ $students->remarks_status }}" required>
                                        </div>
                                    </div>

                                    <!-- Sixth Row with Donor ID and Images Input -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="donor_id">Donor ID</label>
                                            <input type="number" class="form-control" id="donor_id" name="donor_id" value="{{ $students->donor_id }}" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="images">Upload New Image</label>
                                            <input type="file" class="form-control" id="images" name="images" accept="image/*" onchange="previewImage(event)">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Student</button>
                                </form>
                                <!-- End of Update Form -->
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('dashboard.footer')
</body>

</html>
