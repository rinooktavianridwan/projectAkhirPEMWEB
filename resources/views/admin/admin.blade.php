<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/admin.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <title>AdminHub</title>
</head>

<body>
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">Speedy Admin</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="{{ route('admin') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('kendaraan') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Cars</span>
                </a>
            </li>
            <!-- balik ek main page -->
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </li>
        </ul>
    </section>

    <section id="content">
        <main class="main-pad">
            <div class="admin-section">
                <h1>Cars Section</h1>
                <div class="header-tabel-admin">
                    <button id="addButton" class="btn btn-primary">Add New Car</button>
                    <div class="search">
                        <input type="text" class="form-control" id="searchInput" placeholder="Search for cars">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="carsTable">
                    <thead>
                        <tr>
                            <th>No id</th>
                            <th>Nama Mobil</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Kota</th>
                            <th>Status</th>
                            <th>Harga</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be inserted here -->
                    </tbody>
                </table>
            </div>
        </main>
    </section>

    <!-- Modal for Add/Edit Car -->
    <div class="modal fade" id="carModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="carModalLabel">Car Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="carForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nama Mobil</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <input type="text" class="form-control" id="category" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" class="form-control" id="image" accept="image/png, image/jpeg">
                            <img id="imagePreview" src="#" alt="Image Preview"
                                style="display: none; width: 100px; height: auto; margin-top: 10px;">
                        </div>
                        <div class="form-group">
                            <label for="city">Kota</label>
                            <input type="text" class="form-control" id="city" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="text" class="form-control" id="price" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveButton">Save</button>
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

            // Function to update table
            function updateTable(cars) {
                let tableBody = $('#carsTable tbody');
                tableBody.empty();
                $.each(cars, function(index, car) {
                    tableBody.append(`<tr>
                    <td>${index + 1}</td>
                    <td>${car.name}</td>
                    <td>${car.category}</td>
                    <td><img src="/storage/${car.image}" alt="${car.name}" style="width: 100px; height: auto;"></td>
                    <td>${car.city}</td>
                    <td>${car.status}</td>
                    <td>${car.price}</td>
                    <td>
                        <button class="btn btn-info" onclick="viewCar(${index})">View</button>
                        <button class="btn btn-warning" onclick="editCar(${index})">Edit</button>
                        <button class="btn btn-danger" onclick="deleteCar(${index})">Delete</button>
                    </td>
                </tr>`);
                });
            }

            // Fetch cars from server
            $.ajax({
                url: '/get-cars',
                method: 'GET',
                success: function(data) {
                    cars = data;
                    updateTable(cars);
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching cars: ", status, error);
                }
            });

            // Reset form fields
            function resetForm() {
                $('#carForm')[0].reset();
                $('#imagePreview').hide();
            }

            // Add Car Function
            $('#addButton').click(function() {
                resetForm(); // Reset form fields before showing the modal
                $('#carModal').modal('show');
                $('#saveButton').off('click').on('click', function() {
                    let formData = new FormData();
                    formData.append('name', $('#name').val());
                    formData.append('category', $('#category').val());
                    formData.append('image', $('#image')[0].files[0]);
                    formData.append('city', $('#city').val());
                    formData.append('price', $('#price').val());

                    $.ajax({
                        url: '/add-car',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            cars.push(data);
                            updateTable(cars);
                            $('#carModal').modal('hide');
                        },
                        error: function(xhr, status, error) {
                            console.error("Error adding car: ", status, error);
                        }
                    });
                });
            });

            // Edit Car Function
            // Edit Car Function
            window.editCar = function(index) {
                resetForm(); // Reset form fields before showing the modal
                let car = cars[index];
                $('#name').val(car.name);
                $('#category').val(car.category);
                $('#city').val(car.city);
                $('#imagePreview').attr('src', '/storage/' + car.image);
                $('#price').val(car.price);
                $('#carModal').modal('show');
                $('#saveButton').off('click').on('click', function() {
                    let formData = new FormData();
                    formData.append('name', $('#name').val());
                    formData.append('category', $('#category').val());
                    if ($('#image')[0].files[0]) {
                        formData.append('image', $('#image')[0].files[0]);
                    }
                    formData.append('city', $('#city').val());
                    formData.append('price', $('#price').val());


                    $.ajax({

                        url: '/edit-car/' + car.id,
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            cars[index] = data;
                            updateTable(cars);
                            $('#carModal').modal('hide');
                        },
                        error: function(xhr, status, error) {
                            // Log error response for debugging
                            console.error("Error updating car: ", xhr.responseText);
                            console.error("Status: ", status);
                            console.error("Error: ", error);
                        }
                    });
                });
            };

            // Delete Car Function
            window.deleteCar = function(index) {
                var imagePath = cars[index].image;
                $.ajax({
                    url: '/delete-car/' + cars[index].id,
                    method: 'DELETE',
                    success: function(data) {
                        // Hapus gambar dari penyimpanan
                        $.ajax({
                            url: '/delete-image',
                            method: 'POST',
                            data: {
                                image: imagePath
                            },
                            success: function(response) {
                                console.log("Image deleted successfully");
                                // Hapus entri mobil dari tabel
                                cars.splice(index, 1);
                                updateTable(cars);
                            },
                            error: function(xhr, status, error) {
                                console.error("Error deleting image: ", status, error);
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting car: ", status, error);
                    }
                });
            };

            // View Car Function
            window.viewCar = function(index) {
                let car = cars[index];
                alert(
                    `Name: ${car.name}\nCategory: ${car.category}\nImage: ${car.image}\nCity: ${car.city}\nStatus: ${car.status}\nPrice: ${car.price}`
                );
            };

            // Image preview function
            $('#image').change(function() {
                let file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result);
                        $('#imagePreview').show();
                    }
                    reader.readAsDataURL(file);
                } else {
                    $('#imagePreview').hide();
                }
            });

            // Tambahkan event listener untuk input pencarian
            $('#searchInput').on('input', function() {
                let searchKeyword = $(this).val()
            .toLowerCase(); // Ambil nilai input pencarian dan ubah menjadi huruf kecil
                let filteredCars = cars.filter(function(car) {
                    // Lakukan filter terhadap data mobil berdasarkan kata kunci pencarian
                    return car.name.toLowerCase().includes(searchKeyword) ||
                        car.category.toLowerCase().includes(searchKeyword) ||
                        car.city.toLowerCase().includes(searchKeyword) ||
                        car.price.toString().includes(searchKeyword);
                });
                updateTable(filteredCars); // Update tabel dengan data mobil yang telah difilter
            });

        });
    </script>

</body>

</html>
