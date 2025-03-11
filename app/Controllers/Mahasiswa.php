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
    helper('form');
    $mhs = $this->MahasiswaModel->findAll();

    $data = [
      "tittle" => "Mahasiswa",
      "mahasiswa" => $mhs
    ];
    return view('templates/header', $data)
            . view('mahasiswa/index', $data)
            . view('templates/footer'); 

  }

  public function simpan() 
  {
    // validasi tambah dasta
    if(!$this->validate([
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong, harus di isi'
        ]
      ],
      'npm' => [
        'rules' => 'required|is_unique[mahasiswa.npm]',
        'errors' => [
          'required' => '{field} tidak boleh kosong, harus di isi',
          'is_unique' => '{field} sudah terdaftar, silahkan gunakan {field} lain'
        ]
        ]
    ])) {
      return redirect()->to('/mahasiswa')->withInput();
    }
  }

}