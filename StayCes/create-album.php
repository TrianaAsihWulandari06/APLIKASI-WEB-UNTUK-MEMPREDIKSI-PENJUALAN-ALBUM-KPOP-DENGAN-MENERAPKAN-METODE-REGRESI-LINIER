<?php

require('config/Database.php');
require('libraries/RegresiLinier.php');

session_start();

if (!isset($_SESSION['username'])) {
  header('Location:index.php');
}

$connect = openConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tahun = $_POST['tahun'];
    $nama_penyanyi = $_POST['nama_penyanyi'];
    $nama_album = $_POST['nama_album'];
    $jumlah = $_POST['jumlah_penjualan'];

    // Validasi dan sanitasi data jika perlu

    $query = "INSERT INTO album (tahun_penjualan, nama_penyanyi, nama_album,  jumlah_penjualan) 
              VALUES ('$tahun', '$nama_penyanyi', '$nama_album', '$jumlah')";

    if (mysqli_query($connect, $query)) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>StayCes</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha512-sJa5KWq3F99QOeijUOm9O+BgDgVtzrWBBagZtjlW7F3I47NO1OaNJvbut+9KOPmjNr4Wb3blU4vQiQdi+Zk6wg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/bootstrap.js" ></script>
  <link rel="stylesheet" type="text/css" href="css/style2.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-success text-dark">
    <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="dashboard.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="create-album.php">Data Album</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="create-data.php">Kelola Data</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="hasil-peramalan.php">Hasil Peramalan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="perbandingan.php">Perbandingan</a>
          </li>
        </ul>
      </div>
      <a class="btn btn-outline-dark" href="logout.php" role="button">Keluar</a>
    </div>
  </nav>

  <div class="jumbotron m-5">
    <h3>Data Album K-pop</h3>
    <hr>

  <div class="container mt-5">
    <div class="col-sm-12 d-flex justify-content-between">
      <h4 class="d-flex">Tambah Data</h4>
      <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
      </div>
    </div>

    <table class="table mt-3">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tahun Penjualan</th>
          <th scope="col">Nama Penyanyi</th>
          <th scope="col">Nama Album</th>
          <th scope="col">Jumlah Penjualan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = mysqli_query($connect, "SELECT * FROM album ORDER BY id ASC");
        $i = 1;
        while ($obj = mysqli_fetch_object($query)) {
        ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $obj->tahun_penjualan; ?></td>
            <td><?php echo $obj->nama_penyanyi; ?></td>
            <td><?php echo $obj->nama_album; ?></td>
            <td><?php echo $obj->jumlah_penjualan; ?></td>
            <td>
              <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal2<?php echo $obj->id; ?>">Ubah</button>
              <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal3<?php echo $obj->id; ?>">Hapus</button>
            </td>
          </tr>

          <!-- Modal (POP UP) untuk ubah data -->
          <div class="modal fade" id="exampleModal2<?php echo $obj->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="edit-album.php" method="post">
                    <input type="hidden" class="form-control mb-2" name="idData" value="<?php echo $obj->id; ?>">
                    <div class="form-group row">
                      <label for="tahun" class="col-sm-5 mb-2 col-form-label">Tahun Penjualan</label>
                      <div class="mb-3">
                        <input type="number" step="1" min="1900" max="2100" value="<?php echo $obj->tahun_penjualan; ?>" class="form-control mb-2" name="tahun" required>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="namaIdol" class="form-label">Nama Penyanyi</label>
                      <input type="text" class="form-control" id="namaPenyanyi" name="nama_penyanyi" value="<?php echo $obj->nama_penyanyi; ?>" required>
                    </div>
                    <div class="mb-3">
                      <label for="namaAlbum" class="form-label">Nama Album</label>
                      <input type="text" class="form-control" id="namaAlbum" name="nama_album" value="<?php echo $obj->nama_album; ?>" required>
                    </div>
                    <div class="form-group row">
                      <label for="jumlah" class="col-sm-5 mb-2 col-form-label">Jumlah Penjualan Album (dalam juta)</label>
                      <div class="col-sm-7 mb-3">
                        <input type="number" step="1" min="0" value="<?php echo $obj->jumlah_penjualan; ?>" class="form-control mb-2" name="jumlah" required>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <input type="submit" value="Submit" class="btn btn-success">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal (POP UP) untuk hapus data -->
          <div class="modal fade" id="exampleModal3<?php echo $obj->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Apakah anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                  <a class="btn btn-danger" href="delete-album.php?id=<?php echo $obj->id; ?>" role="button">Hapus</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <!-- Modal untuk tambah data -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="post-album.php" method="post">
          <div class="modal-body">
            <form action="edit-album.php" method="post">
               <input type="hidden" class="form-control mb-2" name="idData" value="<?php echo $obj->id; ?>">
               <div class="form-group row">
                <label for="tahun" class="col-sm-5 mb-2 col-form-label">Tahun Penjualan</label>
                <div class="mb-3">
                  <input type="number" step="1" min="1900" max="2100" value="<?php echo $obj->tahun_penjualan; ?>" class="form-control mb-2" name="tahun" required>
                </div>
              </div>
              <div class="mb-3">
                 <label for="namaIdol" class="form-label">Nama Penyanyi</label>
                 <input type="text" class="form-control" id="namaPenyanyi" name="nama_penyanyi" value="<?php echo $obj->nama_penyanyi; ?>" required>
                </div>
                <div class="mb-3">
                  <label for="namaAlbum" class="form-label">Nama Album</label>
                  <input type="text" class="form-control" id="namaAlbum" name="nama_album" value="<?php echo $obj->nama_album; ?>" required>
                </div>
                <div class="form-group row">
                  <label for="jumlah" class="col-sm-5 mb-2 col-form-label">Jumlah Penjualan Album (dalam juta)</label>
                  <div class="col-sm-7 mb-3">
                    <input type="number" step="1" min="0" value="<?php echo $obj->jumlah_penjualan_album; ?>" class="form-control mb-2" name="jumlah" required>
                   </div>
                  </div>
                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <input type="submit" value="Submit" class="btn btn-success">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>