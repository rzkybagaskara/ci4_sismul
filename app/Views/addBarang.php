<?php include('header.php') ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-xs-6">
            <h2>Form Tambah Barang</h2>

            <!-- Fix input type, name, and id to it's respective label name -->
            <form action="/create" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">ID Barang</label>
                    <input type="text" class="form-control" id="idBarang" name="id_barang" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="namaBarang" name="nama_barang">
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="qty" name="quantity">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Gambar</label>
                    <input class="form-control" type="file" id="uploadGambar" name="gambar_barang">
                </div>
                <button type="submit" class="btn btn-success">Tambah Barang</button>
            </form>

        </div>
    </div>
</div>