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

    public function viewBarang($id = null) {
        $barang = $this->productModel->getProduct($id);

        if ($barang) {
            return view('viewBarang', ['barang' => $barang]);
        } else {
            return redirect()->to('/');
        }
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

    public function updateBarang($id = null) {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_barang' => 'required|max_length[30]',
            'quantity' => 'required'
        ]);

        $data['products'] = $this->productModel->getProduct($id);

        if (!$validation->withRequest($this->request)->run()) {
            return view('updateBarang', ['data' => $data['products']]) . view('footer', ['validation' => $validation]);
        } else {
            $config['upload_path'] = './upload/post';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 100000;
            $config['file_ext_tolower'] = true;
            $config['file_name'] = str_replace('.', '_', $id);

            $gambar_barang = $this->request->getFile('gambar_barang');

            // Cek kalo ada gambar baru
            if ($gambar_barang->isValid() && !$gambar_barang->hasMoved()) {

                // Hapus gambar seblumyna kalo ada
                $prev_image = $data['products']['gambar_barang'];
                $newName = $gambar_barang->getRandomName();

                if ($prev_image && file_exists(ROOTPATH . 'upload/post/' . $prev_image)) {
                    unlink(ROOTPATH . 'upload/post/' . $prev_image);
                }

                // Simpen ke folder post
                $gambar_barang->move(ROOTPATH . 'upload/post',  $newName);

                // Update db pake nama baru
                $data = [
                    'nama_barang' => $this->request->getVar('nama_barang'),
                    'quantity' => $this->request->getVar('quantity'),
                    'gambar_barang' => $newName
                ];
            } else {
                // Ga ada gambar baru, langsung ambil data dari input field
                $data = [
                    'nama_barang' => $this->request->getVar('nama_barang'),
                    'quantity' => $this->request->getVar('quantity')
                ];
            }

            $this->productModel->updateProduct($id, $data);
            return redirect()->to('/');
        }
    }

    public function deleteBarang($id = null) {
        $post = $this->productModel->getProduct($id);

        if ($post) {
            $this->productModel->deleteProduct($id);
            unlink(ROOTPATH . 'upload/post/' . $post['gambar_barang']);
        }
        return redirect()->to('/');
    }


    public function about() {
        echo view('about');
    }
}
