<?php include('header.php') ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-xs-6">
            <h2>Form Update Barang</h2>

            <!-- Fix input type, name, and id to it's respective label name -->
            <form action="<?= base_url('updateBarang') ?>" method="put" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">ID Barang</label>
                    <input type="number" class="form-control" name="id_barang" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="text" class="form-control" name="quantity" required>
                </div>
                <div class="mb-3">
                    <label for="gambar_barang" class="form-label">Upload Gambar</label>
                    <input type="file" class="form-control" id="gambar_barang" name="gambar_barang">
                </div>
                <button type="submit" class="btn btn-success">Tambah Barang</button>
            </form>

        </div>
    </div>
</div>