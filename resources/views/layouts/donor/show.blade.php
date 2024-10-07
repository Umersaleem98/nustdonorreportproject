<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donor Profile Record</title>
    @include('layouts.head')
</head>
<body>

    @include('layouts.header')

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">{{ $donor->donor_name }}</h1>
                </div>
            </div>
        </div>


    @include('layouts.footer')
</body>
</html>