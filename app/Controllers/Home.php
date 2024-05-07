<?php

namespace App\Controllers;

use App\Models\M_Home;

use CodeIgniter\Controller;
use CodeIgniter\Config\Services;
// use CodeIgniter\HTTP\Files\UploadedFile;

class Home extends BaseController {
    protected $productModel;

    public function __construct() {
        $this->productModel = new M_Home();
    }

    public function index() {
        $data['products'] = $this->productModel->getAllProducts();

        return view('header') . view('main', $data) . view('footer');
    }

    public function addBarang() {
        // Check if the request method is POST
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url('/'))->with('error', 'Invalid request method.');
        }

        // Define validation rules for file upload
        $validationRules = [
            'gambar_barang' => [
                'label' => 'Gambar Barang',
                'rules' => 'uploaded[gambar_barang]'
                    . '|is_image[gambar_barang]'
                    . '|mime_in[gambar_barang,image/jpg,image/jpeg,image/png]'
                    . '|max_size[gambar_barang,1000]'
                    . '|max_dims[gambar_barang,4000,4000]',
            ],
        ];

        // Validate the uploaded file based on defined rules
        if ($this->validate($validationRules)) {
            // Retrieve form data
            $idBarang = $this->request->getPost('id_barang');
            $namaBarang = $this->request->getPost('nama_barang');
            $quantity = $this->request->getPost('quantity');

            // Retrieve the uploaded file and generate a unique file name
            $gambarBarang = $this->request->getFile('gambar_barang');
            $filename = $gambarBarang->getRandomName();

            // Move the file to the appropriate location
            $uploadPath = '../upload/post'; // Adjust the upload path
            $gambarBarang->move($uploadPath, $filename);

            // Prepare data for database insertion
            $barangData = [
                'id_barang' => $idBarang,
                'nama_barang' => $namaBarang,
                'quantity' => $quantity,
                'image' => $filename, // Store the file name in the database
            ];

            // Save the data to the model
            $saveResult = $this->model->save($barangData);
            
            if ($saveResult) {
                return redirect()->to(base_url('/'))
                    ->with('success', 'Barang berhasil ditambahkan.');
            } else {
                // Handle errors from model save
                session()->setFlashdata('error', $this->model->errors());
                return redirect()->back();
            }

        } else {
            // Handle validation errors
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back();
        }


        // $config = [
        //     'upload_path' => '../upload/post', // Ensure the path exists and is writable
        //     'allowed_types' => 'jpeg|jpg|png', // Correct allowed types
        //     'max_size' => 100000, // Ensure it's an integer
        //     'file_ext_tolower' => true,
        // ];

        // $upload = Services::upload($config); // Initialize with configuration
        // // check if null
        // // if($upload === null){
        // //     throw new \RuntimeException('Failed to initialize upload service');
        // // }

        // $upload->initialize($config);

        // // Verify 'gambar_barang' is passed to 'doUpload'
        // if (!$upload->doUpload('gambar_barang')) {
        //     session()->setFlashdata('error', $upload->displayErrors());
        //     return redirect()->back(); // Redirect back on error
        // }

        // // Get the uploaded file's data
        // $fileData = $upload->getFileData();
        // $filename = $fileData['file_name']; // Extract the uploaded file name

        // // Save to your model/database (example)
        // $this->model->create(uniqid('item_', true), $filename); // Ensure unique ID

        // return redirect()->to(base_url('/')); // Redirect after success
    }


    public function updateBarang() {
    }

    public function about() {
        echo view('about');
    }
}