<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="assets/css/myorder.css">
    <title>My Orders</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('layouts.navigation')
</head>

<body>
    <section id="content">
        <main class="container-order">
            <div class="head-title">
                My Orders Table
            </div>
            <div class="button-myorder">
                <button onclick="loadTransactions('booked')">Booked</button>
                <button onclick="loadTransactions('done')">Done</button>
                <button onclick="loadTransactions('ongoing')">Ongoing</button>
            </div>


            <div class="table-data" id="transaction-table">
                <!-- Tabel transaksi akan dimuat di sini menggunakan AJAX -->
            </div>
        </main>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        function loadTransactions(status) {
            $.ajax({
                url: `/get-transactions-by-user/{{ $user->id }}/${status}`,
                type: 'GET',
                success: function(response) {
                    console.log('Response received:', response);
                    if (Array.isArray(response)) {
                        renderTransactionTable(response);
                    } else {
                        console.error('Data transaksi tidak valid:', response);
                    }
                },
                error: function(xhr) {
                    console.error('Error loading transactions:', xhr.responseText);
                }
            });
        }

        function renderTransactionTable(transactions) {
            const tableHeader = `
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Date Order</th>
                    <th>Duration</th>
                    <th>Cost</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>`;

            const tableRows = transactions.map(transaction => {
                const duration = moment(transaction.return_date).diff(moment(transaction.pickup_date), 'days');
                const formattedDate = moment(transaction.updated_at).format('YYYY-MM-DD HH:mm:ss');
                const now = moment();
                let status;
                if (now.isBefore(moment(transaction.pickup_date))) {
                    status = 'Booked';
                } else if (now.isAfter(moment(transaction.return_date))) {
                    status = 'Done';
                } else {
                    status = 'Ongoing';
                }

                // Pastikan transaction.cost adalah angka, gunakan 0 sebagai nilai default jika tidak valid
                const cost = Number(transaction.transaction_value);
                const formattedCost = !isNaN(cost) ? `Rp${cost.toLocaleString()}` : 'Rp0';

                return `
            <tr>
                <td>${transaction.id}</td>
                <td>${formattedDate}</td>
                <td>${duration} days</td>
                <td>${formattedCost}</td>
                <td>${status}</td>
            </tr>`;
            }).join('');

            const tableFooter = '</tbody></table>';
            $('#transaction-table').html(tableHeader + tableRows + tableFooter);
        }

        $(document).ready(function() {
            loadTransactions('booked'); // Load default transactions on page load
        });
    </script>
</body>

</html>