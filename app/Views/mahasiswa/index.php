<div class="container mt-4">
  <div class="row">
    <div class="col-md-12">
      <h3 class="mb-2">Daftar Mahasiswa</h3>
      <ul class="list-group">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">NPM</th>
              <th scope="col">Nama Mahasiswa</th>
              <th scope="col">Email</th>
              <th scope="col">Jurusan</th>
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
              <td><?= $mhs["email"]; ?></td>
              <td><?= $mhs["jurusan"]; ?></td>
              <td>
                <a href="#" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                <a href="#" class="btn btn-danger"><i class="bi bi-person-dash"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </ul>
    </div>
  </div>
</div>