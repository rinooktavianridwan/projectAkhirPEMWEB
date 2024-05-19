<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <title>Car Rental</title>
    <link class = "logo" rel="icon" href="images/logonya.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/css/homePage.css" type="text/css">
    <link rel="stylesheet" href="assets/css/login.css" type="text/css">
    <link rel="stylesheet" href="assets/css/footer.css" type="text/css">

</head>

<body>
    <!--Header-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('layouts.navigation')
    <!-- /Header -->

    <!-- Banners -->
    <section class="banner-section">
        <div class="banner-header">
            <div class="text-overlay">
                <h1>Renting a car has never been this easy,</h1>
                <h1>Start your own journey now!</h1>
            </div>
        </div>
        <form  class="search-box">
            <div class="cari-mobil">
                <button  type="submit"><a href="{{ route('cars') }}">Mulai Pencarian Mobil</a></button>
            </div>
        </form>
    </section>
    <!-- /Banners -->
    <!--Footer -->
    @include('layouts.footer')
    <!-- /Footer-->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a></div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>

</html>
