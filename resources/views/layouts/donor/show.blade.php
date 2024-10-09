<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donor Profile Record</title>
    @include('layouts.head')
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    @include('layouts.header')  

    <div class="container mb-4">
        <div class="text-center mt-4">
            <img src="{{ asset('template/assets/logo.png') }}" alt="Logo" class="text-center" style="width: 200px; height: 100px">
            <h4 class="text-center mt-2 text-primary">DONOR REPORT</h4>
            <h6 class="reduced-line-space">
                Registered under Trust Act 1882, vide Registration No. 1289 & 
            </h6>
            <h6>
                Exempted under Section 2(36) of Income Tax Ordinance, 2001
            </h6>
        </div>

        <div class="container mt-5">
            <h2 class="text-center bg-primary text-light p-2">{{ $donor->donor_name }}</h2>
            <div class="row">
               

                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ $donor->fund_name }}</h5>
                            <p class="card-text"><strong>Year of Establishment:</strong> {{ $donor->year_of_establishment }}</p>
                            <p class="card-text"><strong>Amount Received:</strong> {{ number_format($donor->amount_received, 2) }} PKR</p>
                            <p class="card-text"><strong>Number of Beneficiaries:</strong> {{ $donor->number_of_beneficiaries }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Students Section -->
        <div class="container">
            <h2 class="my-4 text-center bg-primary text-light">Students Sponsored</h2>
            @if ($donor->students->isEmpty())
                <div class="alert alert-info">No students found for this donor.</div>
            @else
                <div class="row">
                    @foreach ($donor->students as $student)
                        <div class="col-lg-12 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Student Photo -->
                                        <div class="col-md-4 text-center">
                                            @if($student->images) <!-- Changed from 'photo' to 'images' based on your previous code -->
                                            <img src="{{ asset('student_images/' . $student->images) }}" alt="{{ $student->name_of_student }}" class="img-fluid rounded" style="max-height: 150px;">
                                        @else
                                            <img src="{{ asset('student_images/dummy.png') }}" alt="Default Photo" class="img-fluid rounded" style="max-height: 150px;">
                                        @endif
                                        
                                        </div>
                                        <!-- Student Info -->
                                        <div class="col-md-8">
                                            <h5 class="card-title font-weight-bold">{{ $student->qalam_id }}</h5>
                                            <h5 class="card-title font-weight-bold">{{ $student->name_of_student }}</h5>
                                            <p class="card-text"><strong>Institution:</strong> {{ $student->institutions }}</p>
                                            <p class="card-text"><strong>City:</strong> {{ $student->city }}</p>
                                            <p class="card-text"><strong>Father/Guardian Profession:</strong> {{ $student->father_profession }}</p>
                                            <p class="card-text"><strong>Intake Year:</strong> {{ $student->year_of_admission }}</p>
                                        </div>
                                    </div>
        
                                    <!-- CGPA Bar Chart -->
                                    <div class="col-md-8 mb-3">
                                        <canvas id="cgpaChart{{ $student->id }}"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
        <br><br>



    <!-- JavaScript for rendering all students' charts -->
    <script>
        @foreach ($donor->students as $student)
        var ctx{{ $student->id }} = document.getElementById('cgpaChart{{ $student->id }}').getContext('2d');
        new Chart(ctx{{ $student->id }}, {
            type: 'bar',
            data: {
                labels: ['1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th'],
                datasets: [{
                    label: 'CGPA',
                    data: [
                        {{ $student->semester_1 }},
                        {{ $student->semester_2 }},
                        {{ $student->semester_3 }},
                        {{ $student->semester_4 }},
                        {{ $student->semester_5 }},
                        {{ $student->semester_6 }},
                        {{ $student->semester_7 }},
                        {{ $student->semester_8 }}
                    ],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        @endforeach
    </script>
    @include('layouts.footer')
</body>

</html>
