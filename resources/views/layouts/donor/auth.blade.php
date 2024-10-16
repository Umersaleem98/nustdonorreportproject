<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donor login</title>
    @include('layouts.head')
</head>
<body>
    @include('layouts.header')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mb-4 mt-3">Donor Profiles</h1>
            </div>
        </div>
    </div>

    <!-- Display success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display error message -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Donor Login</div>
    
                    <div class="card-body">
                        <form action="{{ url('login_submit') }}" method="POST">
                            @csrf
    
                            <div class="form-group mb-3">
                                <label for="donor_email">Email</label>
                                <input type="email" name="donor_email" class="form-control" required>
                            </div>
    
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
    
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
