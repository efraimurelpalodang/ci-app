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
    $data = $this->request->getPost();
    $validation = service('validation');
    if(!$validation->run($data, 'mahasiswaValidate')) {
      return redirect()->back()->withInput();
    } else {
      $this->MahasiswaModel->tambahData($data);
      return redirect()->to('/mahasiswa')->with('pesan','data berhasil ditambahkan');
    };
  }

  public function detailMahasiswa($id)
  {
    $data = [
      'judul' => 'Detail Mahasiswa',
      'mahasiswa' => $this->MahasiswaModel->find($id),
    ];
    return view('mahasiswa/detail', $data);
  }

  public function ubah($id)
  {
    $data = [
      'judul' => 'Form Ubah Data',
      'mhs' => $this->MahasiswaModel->find($id),
    ];
    helper('form');
    return view('mahasiswa/ubah', $data);
  }

  public function cekUbahData($id)
  {
    $validation = service('validation');
    $data = $this->request->getPost();
    if(!$validation->run($data, 'mahasiswaValidate')) {
      return redirect()->back()->withInput();
    } else {
      $this->MahasiswaModel->UbahData($data, $id);
      return redirect()->to('mahasiswa')->with('pesan','data berhasil diubah');
    }
  }

  public function hapusData($id)
  {
    $this->MahasiswaModel->delete($id);
    return redirect()->back()->with('pesan','data mahasiswa berhasil dihapus');
  }


}