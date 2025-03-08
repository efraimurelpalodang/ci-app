<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController 
{
  protected $MahasiswaModel;

  public function __construct()
  {
    $this->MahasiswaModel = new MahasiswaModel();
  }

  public function index(): string
  {

    $mhs = $this->MahasiswaModel->findAll();

    $data = [
      "tittle" => "Mahasiswa",
      "mahasiswa" => $mhs
    ];

    return view('templates/header', $data)
            . view('mahasiswa/index', $data)
            . view('templates/footer'); 
  }

}