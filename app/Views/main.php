<div class="container mt-4">
    <div class="col-md-12">
        <h3>Daftar Stok Barang di WarungKu</h3>

        <a href="<?= base_url('addBarang') ?>" class="btn btn-success mb-2">Tambah Barang</a>

        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Gambar Barang</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $index => $product) : ?>
                <tr>
                    <th scope="row"><?= $index + 1 ?></th>
                    <td><?= $product['id_barang'] ?></td>
                    <td><?= $product['nama_barang'] ?></td>
                    <td><?= $product['quantity'] ?></td>
                    <td><?= $product['gambar_barang'] ?></td>
                    <td>
                        <a href="<?= base_url('editBarang/' . $product['id_barang']) ?>"
                            class="btn btn-primary">Edit</a>
                        <a href="<?= base_url('deleteBarang/' . $product['id_barang']) ?>"
                            class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>