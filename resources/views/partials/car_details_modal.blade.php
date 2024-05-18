<div class="modal fade" id="carModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header judul-modal">
                <h5 class="modal-title" id="carModalLabel">Detail Mobil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body isi-modal">
                <div class="text-center isi-modal">
                    <img id="carImage" src="" alt="Gambar Mobil">
                </div>
                <p><strong>Nama:</strong> <span id="carName"></span></p>
                <p><strong>Kategori:</strong> <span id="carCategory"></span></p>
                <p><strong>Kota:</strong> <span id="carCity"></span></p>
                <p><strong>Status:</strong> <span id="carStatus"></span></p>
                <p><strong>Harga:</strong> <span id="carPrice"></span></p>
            </div>
            <div class="modal-footer modal-bawah">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="openTransactionModal()">Pesan</button>
            </div>
        </div>
    </div>
</div>
