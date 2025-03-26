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
    return view('mahasiswa/index', $data);

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
        'rules' => 'required|is_unique[mahasiswa.npm]|numeric',
        'errors' => [
          'required' => '{field} tidak boleh kosong, harus di isi',
          'is_unique' => '{field} sudah terdaftar, silahkan gunakan {field} lain',
          'numeric' => '{field} tidak boleh mengandung huruf',
        ]
      ],
      'email' => [
        'rules' => 'required|is_unique[mahasiswa.npm]|valid_email',
        'errors' => [
          'required' => '{field} tidak boleh kosong, harus di isi',
          'is_unique' => '{field} sudah terdaftar, silahkan gunakan {field} lain',
          'valid_email' => 'format {field} yang anda masukkan salah',
        ]
      ],
    ])) {
      return redirect()->to('/mahasiswa')->withInput();
    }

    $this->MahasiswaModel->save([
      'nama' => $this->request->getVar('nama'),
      'npm' => $this->request->getVar('npm'),
      'email' => $this->request->getVar('email'),
      'jurusan' => $this->request->getVar('jurusan'),
    ]);

    session()->setFlashdata('pesan','Data Berhasil Ditambahkan');

    return redirect()->to('/mahasiswa');
  }

}