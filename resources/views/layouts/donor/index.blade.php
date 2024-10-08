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

    <<div class="container">
        <div class="row">
            <div class="col-md-8">
                <form action="{{ url('donor_profile') }}" method="GET" class="mb-4">
                    <div class="form-row align-items-center">
                        <div class="col-md-6">
                            <input type="text" name="search" id="search" placeholder="Search Donor" class="form-control mb-2" value="{{ request('search') }}">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="submit" class="btn btn-primary w-100 mb-2" value="Search">
                        </div>
                        <div class="col-md-3">
                            <a href="{{ url('donor_profile') }}" class="btn btn-success w-100 mb-2">Reset</a>
                        </div>
                    </div>
                </form> 
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
                    <div class="card-body d-flex flex-column align-items-center text-center">
                        <!-- Donor Name with Font Awesome Icon -->
                        <h6 class="card-title">
                            <i class="fas fa-user"></i> {{ $donor->donor_name }}
                        </h6>
                        
                        <!-- Donor Email with Font Awesome Icon -->
                        {{-- <p class="card-text">
                            <i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $donor->donor_email }}
                        </p>
                         --}}
                        <!-- Donor Profile Button -->
                        <a href="{{ url('login', ['id' => $donor->id]) }}" class="btn btn-primary mt-2">
                            <i class="fas fa-user-circle"></i> View Donor Profile
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    

    @include('layouts.footer')
</body>
</html>
