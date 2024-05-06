<?php

namespace App\Controllers;

class Home extends BaseController
{
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
        // untuk sementara echo view dlu biar muncul
        echo view('addBarang');
    }

    public function updateBarang(){
        
    }

    public function about(){
        echo view('about');
    }
}