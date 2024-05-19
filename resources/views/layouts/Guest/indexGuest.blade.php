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
        <form action="{{ url('/cars') }}" method="GET" class="search-box">
            <div class="cari-mobil">
                <select name="kategori" id="kategori">
                    <option value="">Semua Kategori</option>
                </select>
            </div>
            <div class="cari-mobil">
                <select name="kota" id="kota">
                    <option value="">Semua Kota</option>
                </select>
            </div>
            <div class="cari-mobil">
                <button type="submit">Search</button>
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
    <script>
        let uniqueCategories = [];
        let uniqueCities = [];

        $(document).ready(function() {
            // Fetch unique categories from server
            function fetchUniqueCategories() {
                $.ajax({
                    url: '/get-unique-categories',
                    method: 'GET',
                    success: function(data) {
                        uniqueCategories = data;
                        console.log("Categories fetched:", uniqueCategories); // Log data for debugging
                        populateOptions('kategori', uniqueCategories);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching unique categories: ", status, error);
                    }
                });
            }

            // Fetch unique cities from server
            function fetchUniqueCities() {
                $.ajax({
                    url: '/get-unique-cities',
                    method: 'GET',
                    success: function(data) {
                        uniqueCities = data;
                        console.log("Cities fetched:", uniqueCities); // Log data for debugging
                        populateOptions('kota', uniqueCities);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching unique cities: ", status, error);
                    }
                });
            }

            // Populate select options
            function populateOptions(elementId, data) {
                let selectElement = $(`select[name="${elementId}"]`);
                selectElement.empty();
                selectElement.append(`<option value="">Semua ${elementId}</option>`);
                data.forEach(option => {
                    selectElement.append(`<option value="${option}">${option}</option>`);
                });
            }

            fetchUniqueCategories();
            fetchUniqueCities();
        });
    </script>
</body>

</html>
