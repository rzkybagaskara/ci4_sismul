<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;
use CodeIgniter\HTTP\Files\UploadedFile;

class Home extends BaseController{
    public function index(){

        $query = $this->db->table('products')->get();

        if ($query->getNumRows() > 0) {
            $data['products'] = $query->getResult();
        } else {
            $data['products'] = [];
        }

        echo view('header');
        
        echo view('main', $data);

        echo view('footer');
    }

    public function addBarang(){
    $config = [
        'upload_path' => './upload/post', // Ensure the path exists and is writable
        'allowed_types' => 'jpeg|jpg|png', // Correct allowed types
        'max_size' => 100000, // Ensure it's an integer
        'file_ext_tolower' => true,
    ];

    $upload = Services::upload($config); // Initialize with configuration

    // Verify 'gambar_barang' is passed to 'doUpload'
    if (!$upload->doUpload('gambar_barang')) { 
        session()->setFlashdata('error', $upload->displayErrors());
        return redirect()->back(); // Redirect back on error
    }

    // Get the uploaded file's data
    $fileData = $upload->getFileData();
    $filename = $fileData['file_name']; // Extract the uploaded file name

    // Save to your model/database (example)
    $this->model->create(uniqid('item_', true), $filename); // Ensure unique ID

    return redirect()->to(base_url('/')); // Redirect after success
}


    public function updateBarang(){
        
    }

    public function about(){
        echo view('about');
    }
}