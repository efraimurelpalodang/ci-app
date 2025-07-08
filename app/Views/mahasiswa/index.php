<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-6">
      <a href="<?= base_url('/tambah'); ?>" class="btn btn-primary mb-3">Tambah Data Mahasiswa</a>
    </div>
  </div>
  <?php if(session()->has('pesan')) : ?>
    <div class="row">
      <div class="col-6">
        <div class="alert alert-primary py-2" role="alert">
          <?= session('pesan'); ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <div class="row">
    <div class="col-6">
      <h3 class="text-capitalize">daftar mahasiswa</h3>
      <ul class="list-group">
        <?php foreach($mahasiswa as $mhs) : ?>
          <li class="list-group-item"><?= $mhs['nama']; ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>