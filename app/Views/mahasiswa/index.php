<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-4">
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