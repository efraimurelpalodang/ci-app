<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data["tittle"] = 'Home';
        return view('templates/header', $data)
            . view('home/index')
            . view('templates/footer');    
    }
}
