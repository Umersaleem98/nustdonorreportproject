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
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-center font-weight-bold">View Report</h3>
                            <div class="d-flex justify-content-center">
                                <!-- View Button: Opens the file in a new tab -->
                                <a href="{{ asset($donor->donor_report_file) }}" target="_blank"
                                    class="btn btn-warning me-2">View Report</a>

                                <!-- Download Button: Downloads the file directly -->
                                <a href="{{ asset($donor->donor_report_file) }}" download
                                    class="btn btn-success">Download Report</a>

                                <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal"
                                    data-bs-target="#alertModal">
                                    Show Form
                                </button>
                            </div>
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
                                            <h6 class="card-text">
                                                <strong>Remarks Status:</strong>
                                                <span
                                                    style="{{ $student->remarks_status == 'Qualified' ? 'color: red;' : 'color: black;' }}">
                                                    {{ $student->remarks_status }}
                                                </span>
                                            </h6>
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
                                            <p class="text-dark">
                                               {{ $student->note_of_thanks }}"
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

    <div class="container">
        <h2 class="my-4 text-center bg-primary text-light p-1">Transaction History</h2>
        @if ($donor->transactions->isEmpty())
            <div class="alert alert-info">No transaction history found for this donor.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Transaction Date</th>
                            <th scope="col">Mode of Transaction</th>
                            <th scope="col">Amount Received (PKR)</th>
                            <th scope="col">Receipt Acknowledgement</th>
                            <th scope="col">Fund Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donor->transactions as $transaction)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}</td>
                                <td>{{ $transaction->mode_of_transaction }}</td>
                                <td>{{ number_format($transaction->amount_received, 2) }}</td>
                                <td>{{ $transaction->receipt_acknowledgement }}</td>
                                <td>{{ $transaction->fund_type }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>


    <!-- Add this new section after the "Students Sponsored" section -->
    <div class="container mt-5 p-3">
        <h2 class="my-4 text-center bg-primary text-light p-1" style="font-size: 2rem;">Note of Thanks</h2>
        <div class="row">

            <div class="col-md-12 position-relative mt-5 mb-5">
                <p class="mt-3">
                    Greeting Donors!
                </p>
                <p class="">
                    I want to express my heartfelt gratitude for your generosity in supporting our scholars. Your
                    donation has a profound impact, alleviating financial burdens and transforming lives.
                    Your investment in education creates a ripple effect of change, empowering students to achieve their
                    dreams and uplift their communities. Your contribution is a legacy that will shape the futures of
                    deserving students.
                </p>
                <p class="">
                    Thank you for helping us build a better nation through transformative education
                    Together, we are truly making a meaningful difference in the lives of our students.
                </p>
                {{-- <p class="">
                    Together, we are truly making a meaningful difference in the lives of our students.
                </p> --}}

                <div class="position-absolute" style="bottom: auto; right: 10px;">
                    <h4 class="font-weight-bold mb-0">Arooba Gillani</h4>
                    <small class="text-muted">Director Advancement and</small><br>
                    <small class="text-muted">Head of Global Linkages
                        NUST</small>
                    <br>
                    <small class="text-dark"><a href="" class="text-primary">Director.uao@nust.edu.pk</a></small>
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

    <!-- Button to Trigger Alert Modal -->


    <!-- Alert Modal -->
    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel">Update Donor Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="alertModalBody">

                    <form action="{{ url('update_donor_profile', $donor->id) }}" method="POST">
                        @csrf
                        <!-- Donor Email Field -->
                        <div class="mb-3">
                            <label for="donorEmail" class="form-label">Donor Email</label>
                            <input type="email" class="form-control" id="donorEmail" name="donor_email"
                                value="{{ $donor->donor_email }}" required readonly>
                        </div>

                        <!-- Password Field -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <!-- Update Button -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




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
    <script>
        function showAlert(message) {
            // Set the alert message
            document.getElementById("alertModalBody").innerText = message;

            // Show the modal using Bootstrap's modal function
            const alertModal = new bootstrap.Modal(document.getElementById("alertModal"));
            alertModal.show();
        }
    </script>


    <!-- Include Bootstrap JS (necessary for modal) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

    <script>
        // Function to show the custom alert
        function showAlert(message) {
            // Set the message in the modal body
            document.getElementById('alertModalBody').innerText = message;

            // Show the alert modal
            var alertModal = new bootstrap.Modal(document.getElementById('alertModal'));
            alertModal.show();
        }
    </script>

</body>

</html>
