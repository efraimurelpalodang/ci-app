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
          <img src="/images/<?= $mhs["gambar"]; ?>" class="img-thumbnail rounded-start" alt="profile">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title fs-3 text-uppercase"><?= $mhs["nama"]; ?></h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">NPM : <?= $mhs["npm"]; ?></li>
              <li class="list-group-item">Jurusan : <?= $mhs["jurusan"]; ?></li>
              <li class="list-group-item">Email : <?= $mhs["email"]; ?></li>
              <p class="card-text list-group-item"><small class="text-body-secondary"><?= $mhs["status"]; ?></small></p>
            </ul>
            <a href="/mahasiswa" class="btn btn-secondary mt-3 btn-sm"><i class="bi bi-box-arrow-left"></i> Kembali</a>
            <a href="" class="btn btn-warning mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#editMhs">Edit <i class="bi bi-pencil"></i></a>
            <a href="delete/<?= $mhs["id"]; ?>" class="btn btn-danger mt-3 btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data mahasiswa <?= $mhs['nama']; ?>')">Hapus <i class="bi bi-eraser"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="editMhs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">FORM UBAH DATA</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?= form_open('edit/'. $mhs["id"], ['enctype' => 'multipart/form-data']); ?>
        <?= csrf_field() ?>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-1">
              <label for="nama" class="form-label">Nama</label> 
              <input type="text" class="form-control <?= (!empty(validation_show_error('nama'))) ? 'is-invalid' : ''; ?>" id="nama" aria-describedby="emailHelp" name="nama" autofocus value="<?= $mhs["nama"]; ?>">
              <div id="validationServer03Feedback" class="invalid-feedback">
                <?= validation_show_error('nama'); ?>
              </div>
            </div>
            <div class="mb-1">
              <label for="npm" class="form-label">Npm</label>
              <input type="text" class="form-control <?= (!empty(validation_show_error('npm'))) ? 'is-invalid' : ''; ?>" id="npm" aria-describedby="emailHelp" name="npm" value="<?= $mhs["npm"]; ?>" >
              <div id="validationServer03Feedback" class="invalid-feedback">
                <?= validation_show_error('npm'); ?>
              </div>
            </div>
            <div class="mb-1">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control <?= (!empty(validation_show_error('email'))) ? 'is-invalid' : ''; ?>" id="email" aria-describedby="emailHelp" name="email" value="<?= $mhs["email"]; ?>">
              <div id="validationServer03Feedback" class="invalid-feedback">
                <?= validation_show_error('email'); ?>
              </div>
            </div>
            <label for="jurusan" class="form-label">Jurusan</label>
            <select class="form-select" aria-label="Default select example" name="jurusan">
              <option value="Perikanan">Perikanan</option>
              <option value="Pertanian">Pertanian</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
            </select>
            <div class="d-flex flex-column">
              <div class="form-check form-check-inline mt-3">
                <input class="form-check-input" type="radio" name="status" id="status1" value="Mahasiswa Aktif">
                <label class="form-check-label" for="status1">Mahasiswa Aktif</label>
              </div>
              <div class="form-check form-check-inline mt-3">
                <input class="form-check-input" type="radio" name="status" id="status2" value="Mahasiswa Cuti">
                <label class="form-check-label" for="status2">Mahasiswa Cuti</label>
              </div>
              <div class="form-check form-check-inline mt-3">
                <input class="form-check-input" type="radio" name="status" id="status3" value="Mahasiswa Tidak Aktif">
                <label class="form-check-label" for="status3">Mahasiswa Tidak Aktif</label>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="gambar">Upload Poto Profile</label>
            <div class="input-group">
              <input type="file" class="form-control <?= (!empty(validation_show_error('gambar'))) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
              <div id="validationServer03Feedback" class="invalid-feedback">
                <?= validation_show_error('gambar'); ?>
              </div>
            </div>
            <div style="max-width: 100%; height: 400px; overflow: hidden;">
              <img src="/images/default.png" alt="preview" class="img-thumbnail mt-3 img-preview" width="100%" height="300px">
            </div>
          </div>
        </div>
        <div class="modal-footer mt-5">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Ubah</button>
        </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<!-- myscript -->
<?php if (!empty(validation_errors())): ?>
  <script>
    $(document).ready(function() {
      $('#editMhs').modal('show');
    });
  </script>
<?php endif; ?>

<script src="/js/script.js"></script>

<?= $this->endSection(); ?>