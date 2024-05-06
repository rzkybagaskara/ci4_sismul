<?php include('header.php') ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-xs-6">
            <h2>Form Tambah Barang</h2>

            <!-- Fix input type, name, and id to it's respective label name -->
            <form action="/" method="post">
                <div class="mb-3">
                    <label class="form-label">ID Barang</label>
                    <input type="number" class="form-control" id="inputNPM" name="npm" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="inputNama" name="nama_lengkap">
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="inputKelas" name="kelas">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Gambar</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <button type="submit" class="btn btn-success">Tambah Barang</button>
            </form>

        </div>
    </div>
</div>