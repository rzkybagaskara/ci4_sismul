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
                <?php $image_url = '../upload/post/' ?>
                <tr>
                    <th scope="row"><?= $index + 1 ?></th>
                    <td><?= $product['id_barang'] ?></td>
                    <td><?= $product['nama_barang'] ?></td>
                    <td><?= $product['quantity'] ?></td>
                    <td>
                        <img src="<?= $image_url . $product['gambar_barang'] ?>" alt="Gambar Barang"
                            style="width:150px; height:150px;">
                    </td>
                    <td>
                        <form action="<?= base_url('updateBarang/' . $product['id_barang']) ?>" method="POST"
                            style="display: inline;">
                            <input type="hidden" name="_update" value="PUT">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <form action="<?= base_url('deleteBarang/' . $product['id_barang']) ?>" method="POST"
                            style="display: inline;">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>