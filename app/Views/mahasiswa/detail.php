<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="row mt-5">
  <div class="col-sm-8 offset-sm-2">
    <h2 class="text-center"><i class="bi bi-incognito fs-1 m-0"></i> Detail Data Mahasiswa</h2>
  </div>
</div>
<div class="row mt-5 justify-content-center">
  <div class="col-sm-8">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="..." class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title fs-3"><?= $mhs["nama"]; ?></h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">NPM : <?= $mhs["npm"]; ?></li>
              <li class="list-group-item">Jurusan : <?= $mhs["jurusan"]; ?></li>
              <li class="list-group-item">Email : <?= $mhs["email"]; ?></li>
              <p class="card-text list-group-item"><small class="text-body-secondary">Mahasiswa aktif</small></p>
            </ul>
            <a href="/mahasiswa" class="btn btn-secondary mt-3 btn-sm"><i class="bi bi-box-arrow-left"></i> Kembali</a>
            <a href="/mahasiswa" class="btn btn-warning mt-3 btn-sm">Edit <i class="bi bi-pencil"></i></a>
            <a href="delete/<?= $mhs["id"]; ?>" class="btn btn-danger mt-3 btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data mahasiswa <?= $mhs['nama']; ?>')">Hapus <i class="bi bi-eraser"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>