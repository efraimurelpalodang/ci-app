<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController 
{
  protected $MahasiswaModel;
  public $validasi = [
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
      'gambar' => [
        'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'ukuran {field} tidak boleh lebih dari 1mb',
          'is_image' => 'yang anda pilih bukan gambar',
          'mime_in' => 'yang anda pilih bukan gambar',
        ]
      ],
      'status' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} wajib dipilih',
        ]
      ]
  ];

  public function __construct()
  {
    $this->MahasiswaModel = new MahasiswaModel();
  }

  public function index(): string
  {
    helper('form');
    $mhs = $this->MahasiswaModel->getMahasiswa();

    $data = [
      "tittle" => "Mahasiswa",
      "mahasiswa" => $mhs
    ];
    return  view('layouts/navbar', $data) .
            view('mahasiswa/index');

  }

  public function detail($id) 
  {
    helper('form');
    
    $mahasiswa = $this->MahasiswaModel->getMahasiswa($id);    
    $data = [
      "tittle" => "mahasiswa detail",
      "mhs" => $mahasiswa
    ];

    return view('mahasiswa/detail', $data);
  }

  public function simpan() 
  {
    // validasi tambah data
    if(!$this->validate($this->validasi)) {
      return redirect()->to('/mahasiswa')->withInput();
    }

    // ambil gambar
    $profil = $this->request->getFile('gambar');
    // cek apakah tidak ada gambar yang diupload
    if($profil->getError() == 4) {
      $namaPp = 'default.png';
    } else {
      // generate nama sampul random
      $namaPp = $profil->getRandomName();
      // pindahkan file ke folder img
      $profil->move('images', $namaPp);
    }

    $this->MahasiswaModel->save([
      'nama' => $this->request->getVar('nama'),
      'npm' => $this->request->getVar('npm'),
      'email' => $this->request->getVar('email'),
      'jurusan' => $this->request->getVar('jurusan'),
      'status' => $this->request->getVar('status'),
      'gambar' => $namaPp,
    ]);

    session()->setFlashdata('pesan','Data Berhasil Ditambahkan');

    return redirect()->to('/mahasiswa');
  }

  public function edit($id) {
    // data lama
    $datalama = $this->MahasiswaModel->getMahasiswa($id);

    if ( $datalama["npm"] == $this->request->getVar('npm') ) {
      $rule = 'required';
    } else {
      $rule = 'required|is_unique[mahasiswa.npm]|numeric';
    }
    // validasi ubah data
    if(!$this->validate([
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong, harus di isi'
        ]
      ],
      'npm' => [
        'rules' => $rule,
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
      'gambar' => [
        'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'ukuran {field} tidak boleh lebih dari 1mb',
          'is_image' => 'yang anda pilih bukan gambar',
          'mime_in' => 'yang anda pilih bukan gambar',
        ]
      ],
      'status' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} wajib dipilih',
        ]
      ]
    ])) {
      return redirect()->to("detail/{$id}")->withInput();
    }

    // ambil gambar
    $profil = $this->request->getFile('gambar');
    // cek apakah tidak ada gambar yang diupload
    if($profil->getError() == 4) {
      $namaPp = 'default.png';
    } else {
      // generate nama sampul random
      $namaPp = $profil->getRandomName();
      // pindahkan file ke folder img
      $profil->move('images', $namaPp);
    }

    $this->MahasiswaModel->save([
      'id' => $id,
      'nama' => $this->request->getVar('nama'),
      'npm' => $this->request->getVar('npm'),
      'email' => $this->request->getVar('email'),
      'jurusan' => $this->request->getVar('jurusan'),
      'status' => $this->request->getVar('status'),
      'gambar' => $namaPp,
    ]);

    session()->setFlashdata('pesan','Data Berhasil Diubah');

    return redirect()->to('detail/'. $id);
  }

  public function delete($id)
  {
    // cari gambar berdasarkan id
    $mhs = $this->MahasiswaModel->find($id);
    // cek jika file gambarnya default
    if($mhs["gambar"] != 'default.png') {
      // hapus gambar
      unlink('images/' . $mhs["gambar"]);
    }

    $this->MahasiswaModel->delete($id);
    session()->setFlashdata('pesan','Data Berhasil Dihapus');
    return redirect()->to('/mahasiswa');
  }

}