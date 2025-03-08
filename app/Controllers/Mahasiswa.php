<?php

namespace App\Controllers;
// namespace App\Models\MahasiswaModel;

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
    dd($mhs);

    $data['tittle'] = 'Mahasiswa';
    return view('templates/header', $data)
            . view('mahasiswa/index')
            . view('templates/footer'); 
  }

}