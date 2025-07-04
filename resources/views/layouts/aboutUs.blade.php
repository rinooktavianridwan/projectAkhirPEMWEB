<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <link rel="stylesheet" href="assets/css/aboutUs.css" type="text/css">
    <link rel="stylesheet" href="assets/css/footer.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('layouts.navigation')
</head>

<body>
    <div class="container">
        <h1>Our Company Profile</h1>
        <div class="cards">
            <div class="card">
                <h2>Why Choose Us?</h2>
                <p>Speedy is your trusted choice for affordable car rentals. We connect travelers with car owners,
                    making exploration easy on your wallet. We prioritize quality and reliability, ensuring you get a
                    dependable ride every time.</p>
                <p>Our user-friendly platform lets you effortlessly list your car or find the perfect vehicle for your
                    trip. With a dedicated support team by your side, Speedy  is your go-to for budget-friendly,
                    convenient car rentals. Join us today and experience travel the Speedy  way.</p>
            </div>
            <div class="card">
                <h2>Our Priority</h2>
                <p><strong>Economical & Easy Car Rental:</strong> Speedy  makes car rentals easy and budget-friendly. We
                    bring together car owners and travelers, creating a convenient marketplace for economical
                    exploration. Owners can earn by sharing their vehicles, while renters find reliable and affordable
                    transportation.</p>
                <p><strong>User-Friendly Platform:</strong> Speedy  streamlines the rental process with a user-friendly
                    platform. List your car for rent or discover the ideal vehicle for your trip effortlessly. It's a
                    win-win for car owners and travelers.</p>
            </div>
        </div>
        <div class="reach-out">
            <h2>Reach Us Out!</h2>
            <p>For any inquiries, feedback, or assistance, please don't hesitate to reach out to our customer support
                team. We are here to serve you and make your car rental experience memorable.</p>
        </div>
    </div>
    <div class="container-ourteam">
        <h1>Our Team</h1>
        <div class="row-ourteam">
            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <img src="/images/rakha.jpg" alt="">
                    <div class="team-content-ourteam">
                        <h3 class="title-ourteam">Rakha</h3>
                        <span class="post-ourteam">web developer</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <img src="/images/karan.jfif" alt="">
                    <div class="team-content-ourteam">
                        <h3 class="title-ourteam">Karan</h3>
                        <span class="post-ourteam">web developer</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <img src="/images/rino.jpg" alt="">
                    <div class="team-content-ourteam">
                        <h3 class="title-ourteam">Rino</h3>
                        <span class="post-ourteam">web developer</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <img src="/images/nizar.jpg" alt="">
                    <div class="team-content-ourteam">
                        <h3 class="title-ourteam">Nizar</h3>
                        <span class="post-ourteam">web developer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>

</html>
