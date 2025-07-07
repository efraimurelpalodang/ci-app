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
}