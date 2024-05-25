<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/cars.css" type="text/css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('layouts.navigation')
    <title>Document</title>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100" style="background-color: #ead196;">


        <!-- Page Content -->
        <main class="container-dashboard">
            <div class="py-12 ">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="search">
                            <div class="cari-mobil">
                                <h1>Kategori</h1>
                                <select name="kategori" id="kategori">
                                    <option value="">Semua Kategori</option>
                                    <!-- Opsi kategori akan diisi dengan data dari database -->
                                </select>
                            </div>
                            <div class="cari-mobil">
                                <h1>Kota</h1>
                                <select name="kota" id="kota">
                                    <option value="">Semua Kota</option>
                                    <!-- Opsi kota akan diisi dengan data dari database -->
                                </select>
                            </div>
                            <div class="cari-mobil">
                                <h1>Status</h1>
                                <select name="status" id="status">
                                    <option value="">Semua Status</option>
                                    <!-- Opsi kategori akan diisi dengan data dari database -->
                                </select>
                            </div>
                        </div>
                        <div class="searching-cars">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 width-car">
                                <div class="cars-container" id="car-loop">
                                    <!-- Loopan mobil akan diisi oleh JavaScript -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="carModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" aria-hidden="true">
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
                    <!-- biarin id sembunyi  JANGAN DI HAPUS-->
                    <p style="display: none;"><strong>id:</strong> <span id="id"></span></p>
                    <p><strong>Nama:</strong> <span id="carName"></span></p>
                    <p><strong>Kategori:</strong> <span id="carCategory"></span></p>
                    <p><strong>Kota:</strong> <span id="carCity"></span></p>
                    <p><strong>Status:</strong> <span id="carStatus"></span></p>
                    <p><strong>Harga:</strong> <span id="carPrice"></span></p>
                </div>
                <div class="modal-footer modal-bawah">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="openTransactionModal()">Pesan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transactionModalLabel">Pemesanan Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <script>
                        $(document).ready(function() {
                            // Inisialisasi DatePicker
                            function initDatePicker(unavailableDates) {
                                $("#datepicker").datepicker({
                                    beforeShowDay: function(date) {
                                        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                                        return [unavailableDates.indexOf(string) === -1];
                                    }
                                });
                            }

                            // Fungsi untuk memuat tanggal yang tidak tersedia berdasarkan car_id yang dipilih
                            function fetchUnavailableDates(carId) {
                                $.ajax({
                                    url: '/calendar-data/' + carId, // Sesuaikan endpoint jika perlu
                                    method: 'GET',
                                    success: function(data) {
                                        initDatePicker(data);
                                    },
                                    error: function() {
                                        alert('Data tanggal tidak dapat dimuat.');
                                    }
                                });
                            }

                            // Handler untuk perubahan pilihan mobil
                            $('#carSelect').change(function() {
                                var selectedCarId = $(this).val();
                                fetchUnavailableDates(selectedCarId);
                            });

                            // Populate car options
                            $.ajax({
                                url: '/get-cars', // Sesuaikan dengan endpoint yang mengembalikan daftar mobil
                                method: 'GET',
                                success: function(data) {
                                    var carSelect = $('#carSelect');
                                    carSelect.empty();
                                    $.each(data, function(index, car) {
                                        carSelect.append(`<option value="${car.id}">${car.name}</option>`);
                                    });
                                    if (data.length > 0) {
                                        fetchUnavailableDates(data[0].id); // Fetch untuk mobil pertama
                                    }
                                },
                                error: function() {
                                    console.error("Error fetching cars");
                                }
                            });
                        });
                    </script>

                    <form id="transactionForm">
                        <div class="form-group">
                            <label for="pickupDate">Tanggal Pengambilan:</label>
                            <input type="text" id="pickupDate" class="form-control" required>


                        </div>
                        <div class="form-group">
                            <label for="returnDate">Tanggal Pengembalian:</label>
                            <input type="text" id="returnDate" class="form-control" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="calculateCost()">Hitung Biaya</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Notification --}}
    <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Notifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Mobil ini tidak tersedia untuk pemesanan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup

                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .ui-datepicker {
            width: 300px;
            /* Set a fixed width */
            height: auto;
            /* Allow the height to adjust based on content */
            padding: 10px;
        }

        .red {
            background-color: #FF6347 !important;
            /* Tomato */
            color: white;
            /* Change text color to white for better visibility */
        }
    </style>

    <script>
        $(document).ready(function() {
            let cars = [];
            let uniqueCategories = [];
            let uniqueCities = [];


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function getCars() {
                return cars;
            }
            // Function to update car list
            function updateCarList(cars) {
                let carList = $('#car-loop');
                carList.empty();
                $.each(cars, function(index, car) {
                    let statusColor = car.status === 'Tersedia' ? 'green' :
                        'red'; // Tentukan warna berdasarkan status
                    carList.append(`
                        <div class="shell">
                            <div class="wsk-cp-product">
                                <div class="wsk-cp-img">
                                    <img src="/storage/${car.image}" alt="${car.name}" class="img-responsive" />
                                </div>
                                <div class="wsk-cp-text">
                                    <div class="category">
                                        <span><button class="" onclick="viewCar(this)" data-car-id="${car.id}">More</button></span>
                                    </div>
                                    <div class="title-product">
                                        <h3>${car.city}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="status-footer" style="background-color: ${statusColor};">S</div>
                                        <div class="wcf-left"><span class="price">Rp${car.price}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                });
            }


            // Fetch cars from server
            function fetchCars() {
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
            }

            // Fetch unique categories from server
            function fetchUniqueCategories() {
                $.ajax({
                    url: '/get-unique-categories',
                    method: 'GET',
                    success: function(data) {
                        uniqueCategories = data;
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
                        populateOptions('kota', uniqueCities);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching unique cities: ", status, error);
                    }
                });
            }

            function fetchUniqueStatus() {
                $.ajax({
                    url: '/get-unique-statuses',
                    method: 'GET',
                    success: function(data) {
                        populateOptions('status', data);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching unique statuses: ", status, error);
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

            // Fetch initial data   
            fetchCars();
            fetchUniqueCategories();
            fetchUniqueCities();
            fetchUniqueStatus();

            // Event handler for category and city select
            $('select[name="kategori"], select[name="kota"], select[name="status"]').on('change', function() {
                let selectedCategory = $('select[name="kategori"]').val();
                let selectedCity = $('select[name="kota"]').val();
                let selectedStatus = $('select[name="status"]').val();

                let filteredCars = cars.filter(car => {
                    return (selectedCategory === '' || car.category === selectedCategory) &&
                        (selectedCity === '' || car.city === selectedCity) &&
                        (selectedStatus === '' || car.status ===
                            selectedStatus); // Tambahkan filter berdasarkan status
                });

                updateCarList(filteredCars);
            });

            // View Car Function
            window.viewCar = function(button) {
                let carId = $(button).data('car-id');
                let car = cars.find(car => car.id === carId);
                $('#id').text(car.id);
                $('#carName').text(car.name);
                $('#carCategory').text(car.category);
                $('#carImage').attr('src', '/storage/' + car.image);
                $('#carCity').text(car.city);
                $('#carStatus').text(car.status);
                $('#carPrice').text('Rp' + car.price.toLocaleString('id-ID'));
                $('#carModal').modal('show');
            };

        });

        function kelengkapanData() {
            let user = '{{ $user->id }}';
            // ambil kolong phone dari database user
            let phone = '{{ $user->phone }}';
            if (phone === '') {
                alert("Anda harus mengisi data terlebih dahulu.");
                // ketike tombol allert di klik maka akan diarahkan ke halaman profile
                window.location.href = '/profile';

                return;
            }
            let carStatus = $('#carStatus').text();
            if (carStatus === 'Tidak Tersedia') {
                $('#notificationModal').modal('show');
                return;
            }
            return true;
        }


        function openTransactionModal() {
            // Pastikan pengguna sudah login
            var carId = document.getElementById('id').innerText;
            $.ajax({
                url: '/calendar-data/' + carId, // Sesuaikan endpoint jika perlu
                method: 'GET',
                success: function(data) {
                    var specialDates = data;
                    $("#pickupDate").datepicker({
                        beforeShowDay: function(date) {
                            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                            if (specialDates[string]) {
                                return [false, specialDates[string], 'Tidak Tersedia']; // Ubah nilai pertama menjadi false
                            } else {
                                return [true, '', ''];
                            }
                        },
                        onSelect: function(dateText) {
                            if (specialDates[dateText]) {
                                alert('Tanggal tidak tersedia.');
                            }
                        }
                    });
                    $("#returnDate").datepicker({
                        beforeShowDay: function(date) {
                            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                            if (specialDates[string]) {
                                return [false, specialDates[string], 'Tidak Tersedia']; // Ubah nilai pertama menjadi false
                            } else {
                                return [true, '', ''];
                            }
                        },
                        onSelect: function(dateText) {
                            if (specialDates[dateText]) {
                                alert('Tanggal tidak tersedia.');
                            }
                        }
                    });
                },
                error: function() {
                    alert('Data tanggal tidak dapat dimuat.');
                }
            });
            if (!userLoggedIn()) {
                alert("Anda harus login terlebih dahulu untuk melakukan pemesanan.");
                return;
            }
            if (kelengkapanData()) {
                $('#transactionModal').modal('show');
            }


        }

        function calculateCost() {
            const carId = document.getElementById('id').innerText; // Make sure this is getting the correct ID
            const pickupDate = document.getElementById('pickupDate').value;
            const returnDate = document.getElementById('returnDate').value;
            const today = new Date();
            today.setHours(0, 0, 0, 0); // Set to midnight today

            // Checks for date logic before the AJAX call
            if (!pickupDate || !returnDate || new Date(pickupDate) >= new Date(returnDate)) {
                alert("Tanggal pengembalian harus setelah tanggal pengambilan.");
                return;
            }

            if (new Date(pickupDate) < today) {
                alert("Tanggal pengambilan harus setelah tanggal hari ini.");
                return;
            }

            // Fetch the disabled dates then proceed with the cost calculation
            $.get('/calendar-data/' + carId, function(data) {
                var disabledDates = data;


                // Continue with your cost calculation here
                const msPerDay = 86400000;
                const start = new Date(pickupDate);
                const end = new Date(returnDate);
                const duration = Math.ceil((end - start) / msPerDay);
                const costPerDay = parseFloat(document.getElementById('carPrice').innerText.replace('Rp', '').replace('.', ''));
                const totalCost = duration * costPerDay;

                if (confirm(`Biaya total pemesanan adalah Rp${totalCost.toLocaleString('id-ID')}. Lanjutkan transaksi?`)) {
                    performTransaction(carId, pickupDate, returnDate, totalCost);
                } else {
                    alert("Transaksi dibatalkan.");
                }
            });
        }

        function performTransaction(carId, pickupDate, returnDate, totalCost) {
            let formData = new FormData();
            formData.append('user_id', '{{ $user->id }}');
            formData.append('car_id', carId);
            formData.append('pickup_date', pickupDate);
            formData.append('return_date', returnDate);
            formData.append('transaction_value', totalCost);

            formData.append('_token', '{{ csrf_token() }}'); // CSRF token addition

            $.ajax({
                url: '/transactions',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    alert("Pemesanan berhasil!");
                    $('#transactionModal').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("Error submitting transaction: ", status, error);
                    alert("Terjadi kesalahan saat melakukan pemesanan.");
                }
            });
        }


        function userLoggedIn() {
            return '{{ $user->id }}' !== '';
        }
    </script>
</body>

</html>