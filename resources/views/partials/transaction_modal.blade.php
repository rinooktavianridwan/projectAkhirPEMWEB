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
                <form id="transactionForm">
                    <div class="form-group">
                        <label for="pickupDate">Tanggal Pengambilan:</label>
                        <input type="date" id="pickupDate" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="returnDate">Tanggal Pengembalian:</label>
                        <input type="date" id="returnDate" class="form-control" required>
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
