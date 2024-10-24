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
                        <h1 class="h3 mb-0 text-gray-800">Transaction History</h1>
                    </div>

                    <!-- Search Form -->
                   <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="GET" action="{{ url('annual_zakat_trasnaction_history') }}"> <!-- Replace with your route name -->
                                <div class="form-group mb-4">
                                    <input type="text" class="form-control" name="search" placeholder="Search Fund Type" value="{{ request()->search }}">
                                </div>
                            </form>
                        </div>
                    </div>
                   </div>

                    <!-- Content Row -->
                    <div class="col-md-12">
                        <div style="overflow-x:auto;">
                            <table class="table table-bordered table-hover table-sm">
                                
                                    <tr>
                                        <th>SR. #</th>
                                        <th>DATE</th>
                                        <th>MODE OF TRANSACTION</th>
                                        <th>AMOUNT RECEIVED</th>
                                        <th>RECEIPT ACKNOWLEDGEMENT</th>
                                        <th>FUND TYPE</th>
                                        <th>DONOR ID</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                               
                             
                                    @foreach($transection_history as $key => $transaction)
                                        <tr>
                                            <td>{{ $key + 1 }}</td> <!-- SR. # -->
                                            <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}</td> <!-- DATE -->
                                            <td>{{ $transaction->mode_of_transaction }}</td> <!-- MODE OF TRANSACTION -->
                                            <td>{{ number_format($transaction->amount_received, 2) }} PKR</td> <!-- AMOUNT RECEIVED -->
                                            <td>{{ $transaction->receipt_acknowledgement }}</td> <!-- RECEIPT ACKNOWLEDGEMENT -->
                                            <td>{{ $transaction->fund_type }}</td> <!-- FUND TYPE -->
                                            <td>{{ $transaction->donor_id }}</td> <!-- DONOR ID -->
                                            <td>
                                                <!-- Edit Button -->
                                                <a href="{{ url('transactions_edit', $transaction->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <!-- Delete Button -->
                                                
                                            </td>
                                            <td>
                                                <a href="{{ url('transactions_delete', $transaction->id) }}" class="btn btn-danger btn-sm">Delete</a>                                                
                                            </td>
                                        </tr>
                                    @endforeach
                               
                            </table>
                        </div>

                        <!-- Pagination Links -->
                        <div class="d-flex justify-content-center mt-4">
                            <!-- Bootstrap Pagination -->
                            {{ $transection_history->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>

                </div> <!-- End of Container Fluid -->
            </div> <!-- End of Content -->
        </div> <!-- End of Content Wrapper -->
    </div> <!-- End of Wrapper -->
</body>

</html>
