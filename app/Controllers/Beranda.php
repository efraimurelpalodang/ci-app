<?php

namespace App\Controllers;

class Beranda extends BaseController
{
  public function index(): string
  {
    $data = [
      'judul' => 'Beranda'
    ];
    return view('beranda/index',$data);
  }
}