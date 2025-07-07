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
    $data = [
      'judul' => 'Daftar Mahasiswa',
      'mahasiswa' => $this->MahasiswaModel->getAllMahasiswa()
    ];
    return view('mahasiswa/index',$data);
  }
}