<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Car Rental Portal</title>
    <link rel="stylesheet" href="assets/css/header.css" type="text/css">
    <link rel="stylesheet" href="assets/css/homePage.css" type="text/css">
    <link rel="stylesheet" href="assets/css/all.css" type="text/css">
    
</head>

<body>
    <!--Header-->
    @include('layouts/Guest/headerGuest')
    <!-- /Header -->

    <!-- Banners -->
    <section class="banner-section">
        <div class="container-home">
            <h1>Renting a car has never been this easy, Start your own journey now!</h1>
            <div class = "search">
                <form action="/search" method="GET">
                    <button  type="submit"><a href="{{ route('cars') }}">Mulai Pencarian Mobil</a></button>
                </form>
            </div>
        </div>
    </section>
    <!-- /Banners -->
    <!--Footer -->
    @include('includes/footer')
    <!-- /Footer-->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a>
    </div>
    <!--/Back to top-->

    <script>
    </script>

</body>
</html>
