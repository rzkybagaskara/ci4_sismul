<?php

namespace App\Controllers;

use App\Models\M_Home;

class Home extends BaseController {
    protected $productModel;

    public function __construct() {
        $this->productModel = new M_Home();
    }

    public function index() {
        $data['products'] = $this->productModel->getAllProducts();

        return view('header') . view('main', $data) . view('footer');
    }

    public function addBarang($id = null) {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_barang' => 'required|max_length[30]',
            'quantity' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('addBarang') . view('footer', ['validation' => $validation]);
        } else {
            $id = uniqid('item', TRUE);

            $file = $this->request->getFile('gambar_barang');
            $newName = $file->getRandomName();

            $config['upload_path'] = './upload/post';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 100000;
            $config['file_ext_tolower'] = true;
            $config['file_name'] = str_replace('.', '_', $id);

            $file->move(ROOTPATH . 'upload/post', $newName);

            $data = [
                'id_barang' => $id,
                'nama_barang' => $this->request->getVar('nama_barang'),
                'quantity' => $this->request->getVar('quantity'),
                'gambar_barang' => $newName
            ];

            $this->productModel->insertProduct($data);

            return redirect()->to('/');
        }
    }


    public function updateBarang() {
    }

    public function deleteBarang($id = null) {
        $post = $this->productModel->getProduct($id);

        if ($post) {
            $this->productModel->deleteProduct($id);
            unlink('./upload/post/' . $post->gambar_barang);
        }
        // return redirect()->to('/');
    }


    public function about() {
        echo view('about');
    }
}
