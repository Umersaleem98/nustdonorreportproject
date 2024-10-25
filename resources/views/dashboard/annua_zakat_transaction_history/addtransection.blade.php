<!DOCTYPE html>
<html lang="en">

<head>
    <title>Transaction History</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Add Transaction Report</h1>
                    </div>

                    <!-- Search Form -->
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

                    <!-- Content Row -->
                    <div class="col-md-8">

                        <form method="POST" action="{{ url('transactions_store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="transaction_date">Date</label>
                                <input type="date" class="form-control" name="transaction_date" required>
                            </div>
                            <div class="form-group">
                                <label for="mode_of_transaction">Mode of Transaction</label>
                                <input type="text" class="form-control" name="mode_of_transaction" required>
                            </div>
                            <div class="form-group">
                                <label for="amount_received">Amount Received</label>
                                <input type="number" class="form-control" name="amount_received" required>
                            </div>
                            <div class="form-group">
                                <label for="receipt_acknowledgement">Receipt Acknowledgement</label>
                                <select class="form-control" name="receipt_acknowledgement" required>
                                    <option value="" disabled selected>Select Acknowledgement Method</option>
                                    <option value="email">Email</option>
                                    <option value="letter">Letter</option>
                                    <option value="phone_call">Phone Call</option>
                                    <option value="whatsapp">WhatsApp</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fund_type">Fund Type</label>
                                <select class="form-control" name="fund_type" required>
                                    <option value="" disabled selected>Select Fund Type</option>
                                    <option value="annual_fund">Annual Fund</option>
                                    <option value="zakat_fund">Zakat Fund</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="donor_id">Donor ID</label>
                                <input type="text" class="form-control" name="donor_id" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Transaction</button>
                        </form>


                    </div>

                </div> <!-- End of Container Fluid -->
            </div> <!-- End of Content -->
        </div> <!-- End of Content Wrapper -->
    </div> <!-- End of Wrapper -->
</body>

</html>
