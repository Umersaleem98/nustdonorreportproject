<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donor Profile</title>
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

    <div class="container">
        <div class="row">
            <!-- Loop through donors data if available -->
            @foreach($donors as $donor)
            <div class="col-md-4 mb-4">
                <!-- Bootstrap Card for Donor -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $donor->donor_name }}</h5>
                        <p class="card-text"><strong>Email:</strong> {{ $donor->donor_email }}</p>
                        <a href="{{ url('donor_show', $donor->id) }}" class="btn btn-primary">View Donor Profile</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
