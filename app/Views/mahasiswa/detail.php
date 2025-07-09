<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-6">
      <div class="card">
        <div class="card-header text-center">
          <h4>Detail Data Mahasiswa</h4>
        </div>
        <div class="card-body text-capitalize">
          <p class="card-text pb-0 mb-0">Nama Lengkap : <strong><?= $mahasiswa['nama']; ?></strong></p>
          <p class="card-text pt-0 mb-0">Npm : <?= $mahasiswa['npm']; ?></p>
          <p class="card-text pt-0">Jurusan : <?= $mahasiswa['jurusan']; ?></p>
          <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-primary">kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>