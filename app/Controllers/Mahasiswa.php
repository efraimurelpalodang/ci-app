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

  public function tambahDataMahasiswa()
  {
    $data = [
      'judul' => 'Form Tambah Data'
    ];
    helper('form');
    return view('mahasiswa/tambah', $data);
  }

  public function cekData()
  {
    if(!$this->validate([
      'nama' => [
        'rules' => 'required|alpha',
        'errors' => [
          'required' => '{field} harus di isi',
          'alpha' => '{field} tidak boleh mengandung simbol',
        ]
      ],
      'npm' => [
        'rules' => 'required|numeric',
        'errors' => [
          'required' => '{field} harus di isi',
          'numeric' => '{field} tidak boleh mengandung simbol atau huruf',
        ]
      ],
      'email' => [
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => '{field} harus di isi',
          'valid_email' => '{field} tidak sesuai format',
        ]
      ],
      'jurusan' => [
        'rules' => 'in_list[Teknik Informatika,Sistem Informasi,Hukum,Kesehatan Masyarakat]',
        'errors' => [
          'in_list' => '{field} harus di pilih',
        ]
      ],
    ])) {
      return redirect()->back()->withInput();
    };

    
  }
}