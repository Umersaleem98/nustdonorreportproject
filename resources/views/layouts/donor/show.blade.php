<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donor Profile Record</title>
    @include('layouts.head')
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .float-button {
            position: fixed;
            top: 20px;
            /* Positioning from top */
            right: 20px;
            /* Positioning from right */
            width: 100px;
            /* Fixed width */
            height: 50px;
            /* Fixed height */
            background-color: #0D6EFD;
            /* Bootstrap danger (red) color */
            color: white;
            border-radius: 10px;
            /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Shadow */
            text-align: center;
            line-height: 50px;
            /* Adjusted to match the button's height */
            font-size: 16px;
            /* Adjusted font size for smaller button */
            z-index: 1000;
            /* Keep on top */
            cursor: pointer;
            text-decoration: none;
            /* Remove underline from link */
        }

        /* Optional hover effect */
        .float-button:hover {
            background-color: #238bc8;
            /* Darker red on hover */
        }
    </style>
</head>

<body>

    @include('layouts.header')

    <div class="container mb-4">
        <div class="text-center mt-4">
            <img src="{{ asset('template/assets/logo.png') }}" alt="Logo" class="text-center"
                style="width: auto; height: 100px">
            <h4 class="text-center mt-2 text-primary">DONOR REPORT</h4>
            <h6 class="reduced-line-space">
                Registered under Trust Act 1882, vide Registration No. 1289 &
            </h6>
            <h6>
                Exempted under Section 2(36) of Income Tax Ordinance, 2001
            </h6>
        </div>

        <div class="container mt-5">
            <h2 class="text-center bg-primary text-light p-2">Donor Report: {{ $donor->donor_name }}</h2>
            <div class="row">


                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h6 class="card-title font-weight-bold">{{ $donor->fund_name }}</h6>
                            <h6 class="card-text"><strong>Year of Establishment:</strong>
                                {{ $donor->year_of_establishment }}</h6>
                            <h6 class="card-text"><strong>Amount Received:</strong>
                                {{ number_format($donor->amount_received, 2) }} PKR</h6>
                            <h6 class="card-text"><strong>Number of Beneficiaries:</strong>
                                {{ $donor->number_of_beneficiaries }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Students Section -->
        <div class="container">
            <h2 class="my-4 text-center bg-primary text-light p-2">Students Sponsored</h2>
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
                                            @if ($student->images)
                                                <img src="{{ asset('student_images/' . $student->images) }}"
                                                    alt="{{ $student->name_of_student }}"
                                                    class="img-fluid rounded-circle border border-primary"
                                                    style="width: 200px; height: 200px;">
                                            @else
                                                <img src="{{ asset('student_images/abc/dummy.png') }}"
                                                    alt="Default Photo"
                                                    class="img-fluid rounded-circle border border-secondary"
                                                    style="width: 200px; height: 200px;">
                                            @endif
                                        </div>

                                        <!-- Student Info -->
                                        <div class="col-md-8">
                                            <h6 class="card-text"><strong>Registration No:</strong>
                                                {{ $student->qalam_id }}</h6>
                                            <h6 class="card-text"><strong>Student Name:</strong>
                                                {{ $student->name_of_student }}</h6>
                                            <h6 class="card-text"><strong>Institution:</strong>
                                                {{ $student->institutions }}</h6>
                                            <h6 class="card-text"><strong>Province:</strong> {{ $student->city }}</h6>
                                            <h6 class="card-text"><strong>Father/Guardian Profession:</strong>
                                                {{ $student->father_profession }}</h6>
                                            <h6 class="card-text"><strong>Intake Year:</strong>
                                                {{ $student->year_of_admission }}</h6>
                                            <h6 class="card-text"><strong>Student Status:</strong>
                                                {{ $student->student_status }}</h6>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <!-- CGPA Bar Chart -->
                                        <div class="col-md-5 mb-3">
                                            {{-- <canvas id="cgpaChart{{ $student->id }}"></canvas> --}}
                                            <canvas id="cgpaChart{{ $student->id }}"
                                                style="width: 100%; height: 250px; border: 2px solid rgb(2, 121, 233)"></canvas>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-dark mt-5 text-center">Thank You Note</h4>
                                            <p>
                                                {{-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus in
                                                deserunt cum itaque doloribus deleniti eius eligendi tenetur, vero optio
                                                natus ipsam autem voluptas, at accusamus atque delectus maxime sit. --}}
                                            </p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <!-- Add this new section after the "Students Sponsored" section -->
    <div class="container mt-5 p-3">
        <h2 class="my-4 text-center bg-primary text-light p-1" style="font-size: 2rem;">Note of Thanks</h2>
        <div class="row">
            <!-- Left side (Image) -->
            <div class="col-md-4 text-center">
                <img src="{{ asset('student_images/abc/Arooba_Gillani.png') }}" alt="Thank You" class="img-fluid"
                    style="width: 100%; height: 400px; border-radius: 10%; ">

            </div>

            <!-- Right side (Text) -->
            <div class="col-md-8 position-relative mt-5">
                {{-- <h4 class="text-dark mt-4">Thank You to Our Donors</h4> --}}
                <p class="mt-3">
                    Greeting Donors!
                </p>
                <p class="">
                    I want to humbly share my utmost gratitude to each and everyone of you for making an impact and helping us in transforming student lives through your generous donations. The contributions that you make towards the scholars not only alleviates fee burdens but also creates a ripple affect of change across communities. Thank you for choosing to invest in education – for it has the power to make perpetual impact and turn aspirations of many into reality. 
                </p>
                <p class="">
                    Thank you for helping us build a better nation through transformative education
                </p>
                <p class="">
                    Together, we are truly making a meaningful difference in the lives of our students.
                </p>

                <!-- Name and Designation (Bottom Right) -->
                <div class="position-absolute" style="bottom: auto; right: 10px;">
                    <h4 class="font-weight-bold mb-0">Arooba Gillani</h4>
                    <small class="text-muted">Director Advancement and Head of Global Linkages
                        NUST</small><br>
                    <small class="text-muted">Director.uao@nust.edu.pk</small>
                </div>
            </div>
        </div>
    </div>

    <div class="float-button">

            <a href="{{ url('logout') }}"
                style="background: none; border: none; color: white; font-size: 20px; cursor: pointer;">
                Logout
            </a>
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

</body>

</html>
