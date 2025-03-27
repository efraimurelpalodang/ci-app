<?= $this->extend('layouts/template'); ?>

<?= $this->section('navbar'); ?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="#">
      <i class="bi bi-incognito fs-1 m-0"></i> 
      <span class="fs-3 fw-semibold">CI4 App</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active fs-5" aria-current="page" href="<?= base_url(); ?>">Home</a>
        <a class="nav-link fs-5" href="#">About</a>
        <a class="nav-link fs-5" href="mahasiswa">Mahasiswa</a>
      </div>
    </div>
  </div>
</nav>

<?= $this->endSection(); ?>