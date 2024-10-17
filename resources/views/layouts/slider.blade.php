<!-- Bootstrap CSS (if not included) -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

<style>
  .text-muted {
      color: #6c757d; /* Customize the color */
      font-style: italic; /* Make the tagline more engaging */
  }
  
  /* Set the background image for the carousel */
  .carousel-item {
      background-image: url('template/assets/img/ghi.jpg'); /* Use forward slashes */
      background-size: cover; /* Cover the entire area */
      background-position: center; /* Center the image */
      height: 400px; /* Set a fixed height for the carousel */
      position: relative; /* Allow for absolute positioning of the overlay */
      color: white; /* Change text color for visibility */
  }

  /* Ensure text is readable */
  .carousel-item .container {
      position: relative; /* Positioning context for text */
      z-index: 2; /* Ensure text is above the overlay */
  }

  /* Add an overlay for better text visibility */
  .carousel-item::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
      z-index: 1; /* Below text but above the background */
  }
</style>

<!-- Bootstrap Carousel -->
<div id="donorCarousel" class="carousel slide my-5" data-bs-ride="carousel">
  <!-- Carousel Indicators -->
  <ol class="carousel-indicators">
      <li data-bs-target="#donorCarousel" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#donorCarousel" data-bs-slide-to="1"></li>
  </ol>

  <!-- Carousel Slides -->
  <div class="carousel-inner">
      <!-- Slide 1 -->
      <div class="carousel-item active">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <h1 class="display-3 fw-bold text-light">Donor Reports</h1>
                      <p class="lead text-light">Here you can find detailed reports of all donor contributions and statistics.</p>
                      <p class="h4  text-light mt-3">Your Generosity Changes Lives: Join Us in Making a Difference!</p>
                      {{-- <a href="/donor_profile" class="btn btn-primary btn-lg mt-4">Donor Profiles</a> --}}
                  </div>
              </div>
          </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <h1 class="display-3 fw-bold text-light">Contribute Now</h1>
                      <p class="lead text-light">Become a part of something bigger by contributing to our ongoing projects.</p>
                      <p class="h4 text-light mt-3">Your Support Empowers Students and Drives Innovation.</p>
                      {{-- <a href="/contribute" class="btn btn-success btn-lg mt-4">Contribute Today</a> --}}
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<!-- Bootstrap JS and dependencies (if not included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
