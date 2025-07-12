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
          <p class="card-text pb-0 mb-0 fs-3 fw-semibold"><?= $mahasiswa['nama']; ?></p>
          <p class="card-text pt-0 mb-0"> <?= $mahasiswa['npm']; ?></p>
          <p class="card-text pt-0 mb-0"> <?= $mahasiswa['email']; ?></p>
          <p class="card-text pt-0"><?= $mahasiswa['jurusan']; ?></p>
          <div class="d-flex justify-content-end gap-2">
            <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-primary">kembali</a>
            <a href="<?= base_url('ubah/').$mahasiswa['id']; ?>" class="btn btn-success">Ubah</a>
            <a href="<?= base_url('mahasiswa/').$mahasiswa['id']; ?>" class="btn btn-danger align-self-start" onclick="return confirm('Apakah anda yakin ingin menghapus mahasiswa <?= $mahasiswa['nama']; ?>')">Hapus</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>