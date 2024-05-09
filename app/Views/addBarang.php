<?php include('header.php') ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-xs-6">
            <h2>Form Tambah Barang</h2>

            <form action="<?= base_url('addBarang') ?>" method="post" enctype="multipart/form-data" data-insert-form>
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
                <button type="submit" class="btn btn-success">Tambah Barang</button>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const insertData = document.querySelectorAll('form[data-insert-form]');

    insertData.forEach(form => {
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            Swal.fire({
                title: "Tambah data berhasil",
                text: "Klik OK untuk menampilkan data",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        })
    })
})
</script>