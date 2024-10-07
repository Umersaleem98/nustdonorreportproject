
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Students List</title>
 @include('dashboard.head')
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('dashboard.sidebar')

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
   @include('dashboard.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">

        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <form action="{{ url('students_import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="file">Choose Excel File:</label>
                                <input type="file" name="file" id="file" class="form-control mb-4" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Import Students</button>
                        </form>
                    </div>
                    <<div class="card-body p-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="overflow-x:auto;">
                                        <table class="table">
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($students as $student)
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
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <!-- Pagination Links -->
                                    <div class="d-flex justify-content-center">
                                        {{ $students->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            
        </div>
       
    </div>
    
  </main>

  
  
@include('dashboard.footer')
</body>

</html>