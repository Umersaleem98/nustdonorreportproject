
<!DOCTYPE html>
<html lang="en">

<head>
 @include('dashboard.head')
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('dashboard.sidebar')

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
   @include('dashboard.navbar')
    <!-- End Navbar -->
   @include('dashboard.content')
  </main>

  
  
@include('dashboard.footer')
</body>

</html>