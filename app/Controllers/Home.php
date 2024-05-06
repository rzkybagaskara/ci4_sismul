<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(){
        echo view('header');
        
        echo view('main');

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