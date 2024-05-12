<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="assets/css/admin.css" type="text/css">

    <title>AdminHub</title>
</head>

<body>
    <!-- SIDEBAR -->
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
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
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
                <h1 id="admin-main">Cars Section</h1>
            </div>
			<!-- Tabel Cars -->
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Cars Information</h3>
                    </div>
                    <table>
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
                                <td>01-10-2021</td>
								<td>Kategori</td>
								<td>png</td>
                                <td>Jakarta</td>
                                <td><span class="status tersedia">Tersedia</span></td>
								<td>Hallo</td>
                                <td>120000</td>
								<td>
									<button>Edit</button>
									<button>Hapus</button>
								</td>
								
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>01-10-2021</td>
								<td>Kategori</td>
								<td>png</td>
                                <td>Malang</td>
                                <td><span class="status tidak-tersedia">Tidak Tersedia</span></td>
								<td>-</td>
                                <td>150000</td>
								<td>
									<button>Edit</button>
									<button>Hapus</button>
								</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="assets/js/admin.js"></script>
</body>

</html>
