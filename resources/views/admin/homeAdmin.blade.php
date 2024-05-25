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
                <a href="{{ route('admin') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kendaraan') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Cars</span>
                </a>
            </li>
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
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                </div>
            </div>

            <ul class="box-info">
                <li class="column-sales">
                    <div class="detail-sales">
                        <i class='bx bxs-calendar-check'></i>
                        <span class="text">
                            <h3 id="total-orders">0</h3>
                            <p>Total Orders</p>
                        </span>
                    </div>
                    <div class="detail-sales">
                        <span class="text">
                            <h3>Detail Orders</h3>
                            <h6>Booked: <span id="booked-orders">0</span></h6>
                            <h6>Ongoing: <span id="ongoing-orders">0</span></h6>
                            <h6>Done: <span id="done-orders">0</span></h6>
                        </span>
                    </div>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>2834</h3>
                        <p>Visitors</p>
                    </span>
                </li>
                <li class="column-sales">
                    <div class="detail-sales">
                        <i class='bx bxs-dollar-circle'></i>
                        <span class="text">
                            <h3 id="total-sales">Rp0</h3>
                            <p>Total Sales</p>
                        </span>
                    </div>
                    <div class="detail-sales">
                        <span class="text">
                            <h3>Detail Sales</h3>
                            <h6>Booked: <span id="booked-sales">Rp0</span></h6>
                            <h6>Ongoing: <span id="ongoing-sales">Rp0</span></h6>
                            <h6>Done: <span id="done-sales">Rp0</span></h6>
                        </span>
                    </div>
                </li>
            </ul>

            <div class="transaction-filter">
                <div>
                    <button class="btn btn-primary" onclick="loadTransactions('all')">All Orders</button>
                    <button class="btn btn-primary" onclick="loadTransactions('booked')">Booked Orders</button>
                    <button class="btn btn-primary" onclick="loadTransactions('ongoing')">Ongoing Orders</button>
                    <button class="btn btn-primary" onclick="loadTransactions('done')">Completed Orders</button>
                </div>
                <div class="search">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search for cars">
                </div>
            </div>

            <div class="table-data" id="transaction-table">
                <!-- Tabel transaksi akan dimuat di sini menggunakan AJAX -->
            </div>
        </main>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        let filterStatus = 'all'; // Variabel global untuk menyimpan status filter

        function loadSummary() {
            $.ajax({
                url: '/admin/summary',
                method: 'GET',
                success: function(summary) {
                    $('#total-orders').text(summary.total_orders);
                    $('#total-sales').text('Rp' + Number(summary.total_sales).toLocaleString());

                    $('#booked-orders').text(summary.booked.count);
                    $('#booked-sales').text('Rp' + Number(summary.booked.sales).toLocaleString());

                    $('#ongoing-orders').text(summary.ongoing.count);
                    $('#ongoing-sales').text('Rp' + Number(summary.ongoing.sales).toLocaleString());

                    $('#done-orders').text(summary.done.count);
                    $('#done-sales').text('Rp' + Number(summary.done.sales).toLocaleString());
                },
                error: function() {
                    alert('Failed to fetch summary');
                }
            });
        }

        function loadTransactions(status) {
            filterStatus = status; // Update variabel global dengan status yang dipilih
            $.ajax({
                url: `/admin/transactions/${status}`,
                method: 'GET',
                success: function(data) {
                    renderTransactionTable(data);
                },
                error: function() {
                    alert('Failed to fetch transactions');
                }
            });
        }

        function renderTransactionTable(transactions) {
            let tableContent = `
            
                <div class="order">
                    <div class="head">
                        <h3>${filterStatus.charAt(0).toUpperCase() + filterStatus.slice(1)} Orders</h3>
                    </div>
                    <table>
                        <thead>
                            <th>Transaction</th>
                            <th>Date Order</th>
                            <th>Start Date</th>
                            <th>Duration</th>
                            <th>Biaya</th>
                            <th>Status</th>
                        </thead>
                        <tbody>`;
            transactions.forEach(transaction => {
                let status;
                let now = moment(); // Menambahkan deklarasi variabel now di sini
                if (now.isBefore(moment(transaction.pickup_date))) {
                    status = 'Booked';
                } else if (now.isAfter(moment(transaction.return_date))) {
                    status = 'Done';
                } else {
                    status = 'Ongoing';
                }
                let duration = moment(transaction.return_date).diff(moment(transaction.pickup_date), 'days');
                let formattedDate = moment(transaction.updated_at).format('YYYY-MM-DD HH:mm:ss');
                let formattedPickup = moment(transaction.pickup_date).format('YYYY-MM-DD');
                tableContent += `
                    <tr>
                        <td>
                            <img class="img-car-admin" src="/storage/${transaction.car.image}" alt="car" />
                            <p>Kategori Mobil : ${transaction.car.category}</p>
                            <p>Kota : ${transaction.car.city}</p>
                            <p>Nama Pemesan : ${transaction.user.name}</p>
                            <p>No Telepon : ${transaction.user.phone}</p>
                        </td>
                        <td>${formattedDate}</td>
                        <td>${formattedPickup}</td>
                        <td>${duration} days</td>
                        <td>Rp${Number(transaction.transaction_value).toLocaleString()}</td>
                        <td>${status.charAt(0).toUpperCase() + status.slice(1)}</td>
                    </tr>`;
            });
            tableContent += `
                        </tbody>
                    </table>
                </div>`;
            $('#transaction-table').html(tableContent);
        }

        function filterTransactions(searchKeyword) {
            $.ajax({
                url: `/admin/transactions/${filterStatus}`,
                method: 'GET',
                success: function(data) {
                    let filteredTransactions = data.filter(transaction => {
                        return transaction.car.category.toLowerCase().includes(searchKeyword) ||
                            transaction.car.city.toLowerCase().includes(searchKeyword) ||
                            transaction.user.name.toLowerCase().includes(searchKeyword) ||
                            (transaction.user.phone && transaction.user.phone.toLowerCase().includes(
                                searchKeyword)) ||
                            transaction.updated_at.toLowerCase().includes(searchKeyword)||
                            transaction.pickup_date.toLowerCase().includes(searchKeyword);
                    });
                    renderTransactionTable(filteredTransactions,
                    filterStatus); // Hapus parameter yang tidak diperlukan
                },
                error: function() {
                    alert('Failed to fetch transactions');
                }
            });
        }

        $(document).ready(function() {
            loadSummary();
            loadTransactions(filterStatus);

            $('#searchInput').on('input', function() {
                let searchKeyword = $(this).val().toLowerCase();
                filterTransactions(searchKeyword);
            });

            $('#searchInput').on('keypress', function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>

</html>
