<?php include('header.php') ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-xs-6">
            <h2>Update Barang</h2>

            <form action="<?= base_url('updateBarang/' . $data['id_barang']) ?>" method="post"
                enctype="multipart/form-data" data-update-form>
                <input type="hidden" name="_method" value="POST">

                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang"
                        value="<?= isset($data['nama_barang']) ? $data['nama_barang'] : '' ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="text" class="form-control" name="quantity"
                        value="<?= isset($data['quantity']) ? $data['quantity'] : '' ?>" required>
                </div>

                <div class="mb-3">
                    <label for="gambar_barang" class="form-label">Upload Gambar</label>
                    <input type="file" class="form-control" id="gambar_barang" name="gambar_barang">
                </div>

                <button type="submit" class="btn btn-success" id="updateButton">Update Barang</button>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const updateData = document.querySelectorAll('form[data-update-form]');

    updateData.forEach(form => {
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            Swal.fire({
                title: "Update berhasil",
                text: "Data berhasil di-update!",
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