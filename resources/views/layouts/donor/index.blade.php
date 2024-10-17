<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donor Profile</title>
    @include('layouts.head')
    <style>
        .green-border {
        border: 2px solid green;
    }
    </style>
</head>
<body>
    @include('layouts.header')
    @include('layouts.slider')

    <!-- Centered Search Form -->
    <div class="container center-search-form">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="{{ url('/') }}" method="GET" class="mb-4 text-center">
                    <div class="form-row justify-content-center">
                        <div class="col-md-12 mb-2">
                            <input type="text" name="search" id="search" placeholder="Search Donor" class="form-control mb-3" value="{{ request('search') }}" style="border: 2px solid green;">
                            <input type="submit" name="submit" class="btn btn-primary  mb-2" value="Search">
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="col-md-3 d-flex justify-content-center">
                            {{-- <input type="submit" name="submit" class="btn btn-primary w-100 mb-2" value="Search"> --}}
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
    

    @if($query)
        <div class="container mt-5">
            <div class="row">
                <!-- Show message if no donors are found -->
                @if($donors->isEmpty())
                    <div class="col-md-12 text-center">
                        <p>No donors found matching your search.</p>
                    </div>
                @else
                    <!-- Loop through donors data if available -->
                    @foreach($donors as $donor)
                    <div class="col-md-4 mb-4">
                        <!-- Bootstrap Card for Donor -->
                        <div class="card">
                            <div class="card-body d-flex flex-column align-items-center text-center">
                                <!-- Donor Name with Font Awesome Icon -->
                                <h6 class="card-title">
                                    <i class="fas fa-user"></i> {{ $donor->donor_name }}
                                    <i class="fas fa-envelope"></i> {{ $donor->donor_email }}
                                </h6>

                                <!-- Donor Profile Button -->
                                <a href="{{ url('donorlogin', ['id' => $donor->id]) }}" class="btn btn-primary mt-2">
                                    <i class="fas fa-user-circle"></i> View Donor Profile
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif

    @include('layouts.footer')
</body>
</html>
