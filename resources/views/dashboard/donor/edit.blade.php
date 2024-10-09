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
                                <form action="{{ url('update_donor', $donors->id) }}" method="POST">
                                    @csrf <!-- Laravel CSRF token -->
                                    
                                    <div class="form-group">
                                        <label for="donor_name">Donor Name</label>
                                        <input type="text" name="donor_name" class="form-control"
                                            value="{{ $donors->donor_name }}" id="donor_name"
                                            placeholder="Enter Donor Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="fund_name">Fund Name</label>
                                        <input type="text" name="fund_name" class="form-control"
                                            value="{{ $donors->fund_name }}" id="fund_name"
                                            placeholder="Enter Fund Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="donor_email">Donor Email</label>
                                        <input type="email" name="donor_email" class="form-control"
                                            value="{{ $donors->donor_email }}" id="donor_email"
                                            placeholder="Enter Donor Email">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="donor_email">Donor password</label>
                                        <input type="password" name="password" class="form-control"
                                            value="{{ $donors->password }}" id="password"
                                            placeholder="Enter Donor Email">
                                    </div>

                                    <div class="form-group">
                                        <label for="year_of_establishment">Year of Establishment</label>
                                        <input type="number" name="year_of_establishment" class="form-control"
                                            value="{{ $donors->year_of_establishment }}" id="year_of_establishment"
                                            placeholder="Enter Year of Establishment">
                                    </div>

                                    <div class="form-group">
                                        <label for="amount_received">Amount Received</label>
                                        <input type="number" name="amount_received" class="form-control"
                                            value="{{ $donors->amount_received }}" id="amount_received"
                                            placeholder="Enter Amount Received">
                                    </div>

                                    <div class="form-group">
                                        <label for="number_of_beneficiaries">Number of Beneficiaries</label>
                                        <input type="number" name="number_of_beneficiaries" class="form-control"
                                            value="{{ $donors->number_of_beneficiaries }}" id="number_of_beneficiaries"
                                            placeholder="Enter Number of Beneficiaries">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
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
</body>

</html>
