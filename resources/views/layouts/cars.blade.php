<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cars.css" type="text/css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100" style="background-color: #ead196;">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="container-dashboard">
            <div class="py-12 ">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="searching-cars">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 width-car">
                                <div class="cars-container" id="car-loop">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="carModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header judul-modal">
                    <h5 class="modal-title" id="carModalLabel">Car Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body isi-modal">
                    <div class="text-center isi-modal">
                        <img id="carImage" src="" alt="Car Image">
                    </div>
                    <p><strong>Nama:</strong> <span id="carName"></span></p>
                    <p><strong>Kategori:</strong> <span id="carCategory"></span></p>
                    <p><strong>Kota:</strong> <span id="carCity"></span></p>
                    <p><strong>Status:</strong> <span id="carStatus"></span></p>
                    <p><strong>Harga:</strong> <span id="carPrice"></span></p>
                </div>
                <div class="modal-footer modal-bawah">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Pesan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            let cars = []; // Store car data globally

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Function to update car list
            function updateCarList(cars) {
                let carList = $('#car-loop');
                carList.empty();
                $.each(cars, function(index, car) {
                    carList.append(`
                        <div class="shell">
                            <div class="wsk-cp-product">
                                <div class="wsk-cp-img">
                                    <img src="/storage/${car.image}" alt="${car.name}" class="img-responsive" />
                                </div>
                                <div class="wsk-cp-text">
                                    <div class="category">
                                        <span><button class="" onclick="viewCar(${index})">More</button></span>
                                    </div>
                                    <div class="title-product">
                                        <h3>${car.city}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="wcf-left"><span class="price">Rp${car.price}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                });
            }

            // Fetch cars from server
            $.ajax({
                url: '/get-cars',
                method: 'GET',
                success: function(data) {
                    cars = data;
                    updateCarList(cars);
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching cars: ", status, error);
                }
            });

            // View Car Function
            window.viewCar = function(index) {
                let car = cars[index];
                $('#carName').text(car.name);
                $('#carCategory').text(car.category);
                $('#carImage').attr('src', '/storage/' + car.image);
                $('#carCity').text(car.city);
                $('#carStatus').text(car.status);
                $('#carPrice').text(car.price);
                $('#carModal').modal('show');
            };
        });
    </script>
</body>

</html>
