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
        <div class="alert alert-primary py-3" role="alert">
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
          <li class="list-group-item pb-0 d-flex align-items-center justify-content-between">
            <p class="fw-semibold text-capitalize"><?= $mhs['nama']; ?></p>
            <div class="d-flex align-items-center gap-2">
              <a href="/detail/<?= $mhs['id']; ?>" class="btn btn-primary badge align-self-start" >Detail</a>
              <a href="/mahasiswa/<?= $mhs['id']; ?>" class="btn btn-danger badge align-self-start" onclick="return confirm('Apakah anda yakin ingin menghapus mahasiswa <?= $mhs['nama']; ?>')">Hapus</a>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>