<?php include('header.php') ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Barang Details
                </div>
                <div class="card-body">
                    <?php $image_url = '../../upload/post/' ?>
                    <h5 class="card-title"><?= $barang['nama_barang'] ?></h5>
                    <p class="card-text">ID Barang: <?= $barang['id_barang'] ?></p>
                    <p class="card-text">Quantity: <?= $barang['quantity'] ?></p>
                    <img src="<?= $image_url . $barang['gambar_barang'] ?>" class="card-img-top" alt=<?= $image_url . $barang['gambar_barang'] ?>>
                </div>
                <div class="card-footer">
                    <form action="<?= base_url('updateBarang/' . $barang['id_barang']) ?>" method="POST" style="display: inline;">
                        <input type="hidden" name="_update" value="POST">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    <form action="<?= base_url('deleteBarang/' . $barang['id_barang']) ?>" method="POST" data-delete-form style="display: inline;">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php') ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const deleteData = document.querySelectorAll('form[data-delete-form]');

        deleteData.forEach(form => {
            form.addEventListener("submit", function(event) {
                event.preventDefault();
                Swal.fire({
                    title: "Apakah anda ingin menghapus data tersebut?",
                    text: "Sekali dihapus maka data akan hilang selamanya!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });

            })
        })
    })
</script>