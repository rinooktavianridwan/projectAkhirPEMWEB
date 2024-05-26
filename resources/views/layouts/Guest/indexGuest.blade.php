<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <title>Car Rental</title>


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
        <form class="search-box">
            <div class="cari-mobil">
                <button type="submit"><a href="{{ route('cars') }}">Mulai Pencarian Mobil</a></button>
            </div>
        </form>

    </section>
    <section class="find-us">
            <h1>Find Us!</h1>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15805.652756996475!2d112.62040951781648!3d-7.956181488593555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827f2d620975%3A0xf19b7459bbee5ed5!2sUniversitas%20Brawijaya!5e0!3m2!1sid!2sid!4v1716731788629!5m2!1sid!2sid"
                width="80%" height="400" style="border:1;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
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
