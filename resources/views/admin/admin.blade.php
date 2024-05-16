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
            <li class="active">
                <a href="#admin-main">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-car'></i>
                    <span class="text">Cars</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-group'></i>
                    <span class="text">Profile</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

    <section id="content">
        <nav></nav>
        <main class="main-pad">
            <div class="head-title">
                <div class="left">
                    <h1 id="admin-main">Welcome to the admin page</h1>
                </div>
            </div>
            <ul class="box-info">
                <li>
                    <i class='bx bxs-dollar-circle'></i>
                    <span class="text">
                        <h3>$2543</h3>
                        <p>Total Sales</p>
                    </span>
                </li>
            </ul>
            <div class="admin-section">
                <h1 id="">Cars Section</h1>
            </div>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Cars Information</h3>
                        <button id="addCars" class="button-add" data-toggle="modal" data-target="#exampleModal"
                            data-title="Add Car" data-action="add">Add Car</button>
                    </div>
                    <table id="CarsTabel">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mobil</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th>Kota</th>
                                <th>Status</th>
                                <th>Nama Pemesan</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mobil A</td>
                                <td>Kategori A</td>
                                <td>png</td>
                                <td>Jakarta</td>
                                <td><span class="status tersedia">Tersedia</span></td>
                                <td>Hallo</td>
                                <td>120000</td>
                                <td>
                                    <a href="#" id="view" class="view" title="View"
                                        data-index="${index}"><i class="material-icons" data-toggle="modal"
                                            data-target="#exampleModal" data-action="view">&#xE417;</i></a>
                                    <a href="#" id="edit" class="edit" title="Edit" data-index="${index}"
                                        data-toggle="modal" data-target="#exampleModal" data-action="edit"><i
                                            class="material-icons">&#xE254;</i></a>
                                    <a href="#" class="delete" title="Delete" data-toggle="modal"
                                        data-target="#confirmationModal" data-action="delete"><i
                                            class="material-icons">&#xE872;</i></a>

                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Mobil B</td>
                                <td>Kategori B</td>
                                <td>jpg</td>
                                <td>Malang</td>
                                <td><span class="status tidak-tersedia">Tidak Tersedia</span></td>
                                <td>-</td>
                                <td>150000</td>
                                <td>
                                    <a href="#" class="view" title="View" data-index="${index}"><i
                                            class="material-icons">&#xE417;</i></a>
                                    <a href="#" class="edit" title="Edit" data-index="${index}"><i
                                            class="material-icons">&#xE254;</i></a>
                                    <a href="#" class="delete" title="Delete" data-index="${index}"><i
                                            class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="mahasiswaForm">
                        <input type="hidden" id="mahasiswaId" />
                        <div class="form-group">
                            <label for="name">Nama Mobil</label>
                            <input type="text" class="form-control" id="name" required />
                        </div>
                        <div class="form-group">
                            <label for="alamat">Kategori</label>
                            <input type="text" class="form-control" id="alamat" required />
                        </div>
                        <div class="form-group">
                            <label for="asal">Gambar</label>
                            <input type="text" class="form-control" id="asal" required />
                        </div>
                        <div class="form-group">
                            <label for="tahun">Kota</label>
                            <input type="text" class="form-control" id="tahun" required />
                        </div>
                        <div class="form-group>
                            <label for="status">Status</label>
                            <select class="form-control" id="status" required>
                                <option type="text" class="form-control" value="tersedia">Tersedia</option>
                                <option type="text" class="form-control" value="tidak-tersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                        <div class="form-group>
                            <label for="nama_pemesan">Nama Pemesan</label>
                            <input type="text" class="form-control" id="nama_pemesan" required />
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveButton"
                        style="display: none;">Save</button>
                    <!-- Update button for Edit action -->
                    <button type="button" class="btn btn-primary" id="updateButton"
                        style="display: none;">Update</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this car?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="deleteCar">Yes</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="assets/js/admin.js"></script>
    <script>
        $(document).ready(function() {
            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var title = button.data('title');
                var action = button.data('action');
                var modal = $(this);
                modal.find('.modal-title').text(title);
                if (action === 'add') {
                    // Show Save button for Add action
                    $('#saveButton').show();
                    // Hide Update button
                    $('#updateButton').hide();
                } else if (action === 'edit') {
                    // Show Update button for Edit action
                    $('#updateButton').show();
                    // Hide Save button
                    $('#saveButton').hide();
                } else if (action === 'view') {
                    // Show Update button for Edit action
                    $('#updateButton').hide();
                    // Hide Save button
                    $('#saveButton').hide();
                }
            });

            // Handle delete action
            $('#deleteCar').on('click', function() {
                // Add code to handle deletion here
                $('#confirmationModal').modal('hide');
            });

            // Handle action button click
            $('#actionButton').on('click', function() {
                var action = $(this).data('action');
                if (action === 'add') {
                    // Add code to handle add action here
                } else if (action === 'edit') {
                    // Add code to handle edit action here
                }
                $('#exampleModal').modal('hide');
            });
        });
    </script>

</body>

</html>
