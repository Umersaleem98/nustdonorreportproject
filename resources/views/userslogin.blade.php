<!DOCTYPE html>
<html lang="en">

<head>
  <title>User Login</title>
  @include('dashboard.head')
</head>

<body class="">
  <!-- Navbar -->

  <!-- End Navbar -->
  <main class="main-content  mt-0">
      <div class="container">
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center mx-auto">
            <h1 class="text-dark mb-2 mt-5">Welcome To Admin Dashboard</h1>
            {{-- <p class="text-lead text-dark">Log in to your account to continue managing your project.</p> --}}
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Login</h5>
            </div>

            <div class="card-body">
              <form role="form" method="POST" action="{{ url('userlogin') }}">
                @csrf
                <div class="mb-3">
                  <input type="email" class="form-control" placeholder="Email" aria-label="Email" name="email" required>
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password" required>
                </div>
               
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Log in</button>
                </div>
                <p class="text-sm mt-3 mb-0">Don't have an account? <a href="{{ url('userregister') }}" class="text-dark font-weight-bolder">Sign up</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  
 <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<!--   Core JS Files   -->
  @include('dashboard.footer')
</body>

</html>
