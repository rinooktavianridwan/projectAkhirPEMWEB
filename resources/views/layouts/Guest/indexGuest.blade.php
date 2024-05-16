<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <title>Car Rental</title>
    <link rel="icon" href="images/logonya.png" type="image/x-icon">

    
    <link rel="stylesheet" href="assets/css/header.css" type="text/css">
    <link rel="stylesheet" href="assets/css/homePage.css" type="text/css">
    <link rel="stylesheet" href="assets/css/all.css" type="text/css">
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
        <div class="header">
            <div class="text-overlay">
                <h1>Renting a car has never been this easy,</h1>
                <h1>Start your own journey now!</h1>
            </div>
        </div>
        <div class="search-box">
            <select>
                <option>Select Your Location</option>
            </select>
            <input type="date" placeholder="Set Renting Date">
            <input type="date" placeholder="Set Return Date">
            <button>Search</button>
        </div>
    </section>
    <!-- /Banners -->
    <!--Footer -->
    @include('layouts\footer')
    <!-- /Footer-->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a>
    </div>
    <script>
        let nav = document.querySelector("nav");
        window.onscroll = function() {
            if (document.documentElement.scrollTop > 20) {
                nav.classList.add("sticky");
            } else {
                nav.classList.remove("sticky");
            }
        }
    </script>

</body>

</html>
