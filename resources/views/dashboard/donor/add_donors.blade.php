<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Donors</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Update Donor</h1>

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
                        <div class="col-md-8">
                            <div style="overflow-x:auto;">

                                <!-- Form Start -->
                                <form action="{{ url('add_donor') }}" method="POST">
                                    @csrf <!-- CSRF Token for security -->
                                
                                    <!-- Donor Name -->
                                    <div class="form-group">
                                        <label for="donor_name">Donor Name</label>
                                        <input type="text" class="form-control" id="donor_name" name="donor_name" placeholder="Enter Donor Name" required>
                                    </div>
                                
                                    <!-- Fund Name -->
                                    <div class="form-group">
                                        <label for="fund_name">Fund Name</label>
                                        <input type="text" class="form-control" id="fund_name" name="fund_name" placeholder="Enter Fund Name" required>
                                    </div>
                                
                                    <!-- Donor Email -->
                                    <div class="form-group">
                                        <label for="donor_email">Donor Email</label>
                                        <input type="email" class="form-control" id="donor_email" name="donor_email" placeholder="Enter Donor Email" required>
                                    </div>
                                
                                    <!-- Password -->
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                                    </div>
                                
                                    <!-- Year of Establishment -->
                                    <div class="form-group">
                                        <label for="year_of_establishment">Year of Establishment</label>
                                        <input type="number" class="form-control" id="year_of_establishment" name="year_of_establishment" placeholder="Enter Year of Establishment" required>
                                    </div>
                                
                                    <!-- Amount Received -->
                                    <div class="form-group">
                                        <label for="amount_received">Amount Received</label>
                                        <input type="number" class="form-control" id="amount_received" name="amount_received" placeholder="Enter Amount Received" required>
                                    </div>
                                
                                    <!-- Number of Beneficiaries -->
                                    <div class="form-group">
                                        <label for="number_of_beneficiaries">Number of Beneficiaries</label>
                                        <input type="number" class="form-control" id="number_of_beneficiaries" name="number_of_beneficiaries" placeholder="Enter Number of Beneficiaries" required>
                                    </div>
                                
                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('dashboard.footer')

    <!-- Add this script to toggle password visibility -->
    <script>
        document.getElementById('toggle-password').addEventListener('click', function (e) {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            // Toggle the type attribute
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
    
</body>

</html>
