<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4">

  <div class="row mb-5">
    <div class="col-md-10">
      <!-- Button modal -->
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalMhs">
        TAMBAH DATA MAHASISWA
      </button>
    </div>
  </div>

  <div class="row">
    <div class="col-md-10">
      <h3 class="mb-2">Daftar Mahasiswa</h3>
      <ul class="list-group">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">NPM</th>
              <th scope="col">Nama Mahasiswa</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $nomor = 1; ?>
            <?php foreach ($mahasiswa as $mhs) : ?>
            <tr>
              <th scope="row"><?= $nomor++; ?></th>
              <td><?= $mhs["npm"]; ?></td>
              <td><?= $mhs["nama"]; ?></td>
              <td>
                <a href="#" class="btn btn-success text-capitalize">Detail <i class="bi bi-box-arrow-in-right fs-5"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </ul>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalMhs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">FORM TAMBAH DATA</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?= form_open('/simpan'); ?>
        <?= csrf_field() ?>
        <div class="mb-1">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control <?= (!empty(validation_show_error('nama'))) ? 'is-invalid' : ''; ?>" id="nama" aria-describedby="emailHelp" name="nama" autofocus value="<?= old('nama'); ?>">
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= validation_show_error('nama'); ?>
          </div>
        </div>
        <div class="mb-1">
          <label for="npm" class="form-label">Npm</label>
          <input type="text" class="form-control <?= (!empty(validation_show_error('npm'))) ? 'is-invalid' : ''; ?>" id="npm" aria-describedby="emailHelp" name="npm" value="<?= old('npm'); ?>" >
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= validation_show_error('npm'); ?>
          </div>
        </div>
        <div class="mb-1">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control <?= (!empty(validation_show_error('email'))) ? 'is-invalid' : ''; ?>" id="email" aria-describedby="emailHelp" name="email" value="<?= old('email'); ?>">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Tambah</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<!-- myscript -->
<?php if (!empty(validation_errors())): ?>
  <script>
    $(document).ready(function() {
      $('#modalMhs').modal('show');
    });
  </script>
<?php endif; ?>

<?= $this->endSection(); ?>