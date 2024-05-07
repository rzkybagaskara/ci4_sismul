<?php

namespace App\Models;

use CodeIgniter\Model;


class M_Home extends Model {
    protected $table = 'products';
    protected $primaryKey = 'id_barang';

    protected $allowedFields = ['id_barang', 'nama_barang', 'quantity', 'gambar_barang'];

    public function getProduct($id) {
        return $this->find($id);
    }

    public function getAllProducts() {
        return $this->findAll();
    }

    public function deleteProduct($id) {
        return $this->where('id_barang', $id)->delete();
    }

    public function insertProduct($data) {
        return $this->insert($data);
    }

    public function updateProduct($id, $data) {
        return $this->where('id_barang', $id)->set($data)->update();
    }


    // public function create($id, $filename) {


    //     $data = array(
    //         'id_barang' => $id,
    //         'nama_barang' => $this->input->post('nama_barang', TRUE),
    //         'quantity' => $this->input->post('quantity', TRUE),
    //         'gambar_barang' => $filename
    //     );
    //     $this->db->insert('post', $data);
    // }
}
