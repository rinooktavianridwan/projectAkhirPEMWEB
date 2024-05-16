<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
            <li>
                <a href="{{ route('siadmin') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Profile</span>
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
                <h1 id="">Cars Section</h1>
                <div>
                    <button id="addButton" class="btn btn-primary">Add New Car</button>
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
                            <th>id pemesan</th>
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
    <div class="modal fade" id="carModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="carModalLabel">Car Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="carForm">
                        <div class="form-group">
                            <label for="name">Nama Mobil</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <input type="text" class="form-control" id="category">
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="text" class="form-control" id="image">
                        </div>
                        <div class="form-group">
                            <label for="city">Kota</label>
                            <input type="text" class="form-control" id="city">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status">
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="orderName">Nama Pemesan</label>
                            <input type="text" class="form-control" id="orderName">
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="text" class="form-control" id="price">
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
            let cars = JSON.parse(sessionStorage.getItem('cars')) || [];

            // Function to update table
            function updateTable() {
                let tableBody = $('#carsTable tbody');
                tableBody.empty();
                $.each(cars, function(index, car) {
                    tableBody.append(`<tr>
                        <td>${index + 1}</td>
                        <td>${car.name}</td>
                        <td>${car.category}</td>
                        <td>${car.image}</td>
                        <td>${car.city}</td>
                        <td>${car.status}</td>
                        <td>${car.orderName}</td>
                        <td>${car.price}</td>
                        <td>
                            <button class="btn btn-info" onclick="viewCar(${index})">View</button>
                            <button class="btn btn-warning" onclick="editCar(${index})">Edit</button>
                            <button class="btn btn-danger" onclick="deleteCar(${index})">Delete</button>
                        </td>
                    </tr>`);
                });
                sessionStorage.setItem('cars', JSON.stringify(cars));
            }

            // Add Car Function
            $('#addButton').click(function() {
                $('#carForm')[0].reset();
                $('#carModal').modal('show');
                $('#saveButton').off('click').on('click', function() {
                    let newCar = {
                        name: $('#name').val(),
                        category: $('#category').val(),
                        image: $('#image').val(),
                        city: $('#city').val(),
                        status: $('#status').val(),
                        orderName: $('#orderName').val(),
                        price: $('#price').val()
                    };
                    cars.push(newCar);
                    updateTable();
                    $('#carModal').modal('hide');
                });
            });

            // Edit Car Function
            window.editCar = function(index) {
                let car = cars[index];
                $('#name').val(car.name);
                $('#category').val(car.category);
                $('#image').val(car.image);
                $('#city').val(car.city);
                $('#status').val(car.status);
                $('#orderName').val(car.orderName);
                $('#price').val(car.price);
                $('#carModal').modal('show');
                $('#saveButton').off('click').on('click', function() {
                    cars[index] = {
                        name: $('#name').val(),
                        category: $('#category').val(),
                        image: $('#image').val(),
                        city: $('#city').val(),
                        status: $('#status').val(),
                        orderName: $('#orderName').val(),
                        price: $('#price').val()
                    };
                    updateTable();
                    $('#carModal').modal('hide');
                });
            };

            // Delete Car Function
            window.deleteCar = function(index) {
                cars.splice(index, 1);
                updateTable();
            };

            updateTable();
        });
    </script>
</body>
</html>
