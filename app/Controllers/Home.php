<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data["tittle"] = 'Home';
        return  view('layouts/navbar', $data) .
                view('home/index', $data);   
    }
}
