<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
  protected $table = 'mahasiswa';
  protected $allowedFields = ['nama','npm','email','jurusan','status','gambar'];

  public function getAllMahasiswa()
  {
    return $this->findAll();
  }

  public function tambahData($data)
  {
    $this->insert([
      'nama' => htmlspecialchars($data['nama']),
      'npm' => htmlspecialchars($data['npm']),
      'email' => htmlspecialchars($data['email']),
      'jurusan' => htmlspecialchars($data['jurusan']),
      'status' => 'Mahasiswa Aktif',
      'gambar' => 'default.png',
    ]);
  }
  
  public function UbahData($data, $id)
  {
    $this->update($id,[
      'nama' => htmlspecialchars($data['nama']),
      'npm' => htmlspecialchars($data['npm']),
      'email' => htmlspecialchars($data['email']),
      'jurusan' => htmlspecialchars($data['jurusan']),
    ]);
  }

}