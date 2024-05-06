<?php

namespace App\Models;

class M_home extends BaseController
{
    public function create($id, $filename){
        $data = array(
            'id_barang'=>$id,
            'nama_barang'=>$this->input->post('nama_barang', TRUE),
            'quantity'=>$this->input->post('quantity', TRUE),
            'gambar_barang'=>$filename
        );
        $this->db->insert('post', $data);
    }
}