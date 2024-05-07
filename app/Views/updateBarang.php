<?php include('header.php') ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-xs-6">
            <h2>Update Barang</h2>

            <form action="<?= base_url('updateBarang') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">

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
                    <input type="file" class="form-control" id="gambar_barang" name="gambar_barang" required>
                </div>

                <button type="submit" class="btn btn-success">Update Barang</button>
            </form>

        </div>
           
    </div>
</div>