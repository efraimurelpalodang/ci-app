<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h5 class="text-capitalize text-center">form ubah data mahasiswa</h5>
        </div>
        <div class="card-body">
          <?= form_open('cekDetail/'.$mhs['id'], 'class="mt-3"'); ?>
            <div class="mb-2">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control <?= validation_show_error('nama')?'is-invalid':''; ?>" id="nama" name="nama" autocomplete="off" value="<?= (old('nama'))? old('nama') : $mhs['nama']; ?>">
              <div id="nama" class="invalid-feedback">
                <?= validation_show_error('nama'); ?>
              </div>
            </div>
            <div class="mb-2">
              <label for="npm" class="form-label">NPM</label>
              <input type="text" class="form-control <?= validation_show_error('npm')?'is-invalid':''; ?>" id="npm" name="npm" autocomplete="off" value="<?= (old('npm'))? old('npm') : $mhs['npm']; ?>">
              <div id="npm" class="invalid-feedback">
                <?= validation_show_error('npm'); ?>
              </div>
            </div>
            <div class="mb-2">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control <?= validation_show_error('email')?'is-invalid':''; ?>" id="email" name="email" autocomplete="off" value="<?= (old('email'))? old('email') : $mhs['email']; ?>">
              <div id="email" class="invalid-feedback">
                <?= validation_show_error('email'); ?>
              </div>
            </div>
            <label for="jurusan" class="form-label">jurusan</label>
            <select class="form-select <?= validation_show_error('jurusan')?'is-invalid':''; ?>" aria-label="Default select example" name="jurusan">
              <option selected disabled>Pilih jurusan</option>
              <option value="Teknik Informatika" <?= ($mhs['jurusan'] == 'Teknik Informatika' ||old('jurusan') == 'Teknik Informatika') ? 'selected' : ''; ?> >Teknik Informatika</option>
              <option value="Sistem Informasi" <?= ($mhs['jurusan'] == 'Sistem Informasi' || old('jurusan') == 'Sistem Informasi') ? 'selected' : ''; ?> >Sistem Informasi</option>
              <option value="Hukum" <?= ($mhs['jurusan'] == 'Hukum' || old('jurusan') == 'Hukum') ? 'selected' : ''; ?> >Hukum</option>
              <option value="Kesehatan Masyarakat" <?= ($mhs['jurusan'] == 'Kesehatan Masyarakat' || old('jurusan') == 'Kesehatan Masyarakat') ? 'selected' : ''; ?> >Kesehatan Masyarakat</option>
            </select>
            <div id="nama" class="invalid-feedback">
              <?= validation_show_error('jurusan'); ?>
            </div>
            <div class="mt-3 d-flex justify-content-end gap-2">
              <a href="<?= base_url('detail').$mhs['id']; ?>" class="btn btn-secondary">Kembali</a>
              <button type="submit" class="btn btn-primary">ubah Data</button>
            </div>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>