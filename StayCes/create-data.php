<?php

require ('config/Database.php');
require ('libraries/RegresiLinier.php');

session_start();

if(!isset($_SESSION['username'])) {
   header('Location:index.php');
}

$connect = openConnection();
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
            <a class="nav-link" href="create-album.php">Data Album</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="create-data.php">Kelola Data</a>
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
    <h3>Kelola Data Penjualan Album K-pop</h3>
    <hr>

    <div class="col-sm-12 d-flex justify-content-between">
      <h4 class="d-flex">Tambah Data</h4>
      <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>   
      </div>
    </div>

    <?php if (isset($_GET['notify'])) {

        if($_GET['notify'] == 'error') {
          echo "<p class='text-danger'>Jumlah Skor Digital dan Jumlah Penjualan Album sudah ada<p>";
        } else if($_GET['notify'] == 'error2'){
          echo "<p class='text-danger'>Jumlah Penjualan Album atau Total Penjualan Album </p>";
        }

    } ?>
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Jumlah Skor Digital</th>
          <th scope="col">Jumlah Penjualan Album</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $query = mysqli_query($connect,"select * from penjualan order by id asc");
            $i = 1;

            while($obj = mysqli_fetch_object($query)) {
              ?>

              <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $obj->jumlah_skor_digital ?></td>
                <td><?php echo $obj->jumlah_penjualan_album ?></td>
                <td>
                  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal2<?php echo $obj->id; ?>">Ubah</button>&nbsp;
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
                      <form action="edit-data.php" method="post">
                      <input type="hidden" class="form-control mb-2" name="idData" value="<?php echo $obj->id; ?>">
                      <div class="form-group row">
              <label for="jumlah" class="col-sm-5 mb-2 col-form-label">Jumlah Skor Digital</label>
              <div class="mb-3">
                <input type="number" step="1" min="0" value="<?php echo $obj->jumlah_skor_digital; ?>" class="form-control mb-2" name="jumlah" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="jumlah" class="col-sm-5 mb-2 col-form-label">Jumlah Penjualan Album</label>
              <div class="col-sm-7 mb-3">
                <input type="number" class="form-control mb-2" name="jumlah" step="1" min="0" value="<?php echo $obj->jumlah_penjualan_album; ?>" required>
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

              <!-- Modal (POP UP) untuk hapus data -->
              <div class="modal fade" id="exampleModal3<?php echo $obj->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                      <p>Apakah anda yakin ingin menghapus data ini?</p>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                      <a class="btn btn-danger" href="delete-data.php?id=<?php echo $obj->id ?>" role="button">Hapus</a>
                    </div>
                </div>
              </div>

        <?php } ?>


        </tr>
      </tbody>
    </table>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form action="post-data.php" method="post">
          <div class="form-group row">
  <label for="jumlah" class="col-sm-5 mb-2 col-form-label">Jumlah Skor Digital (dalam juta)</label>
  <div class="col-sm-7 mb-3">
    <div class="input-group">
      <input type="number" step="0.01" min="0" value="<?php echo $obj->jumlah_skor / 1000000; ?>" class="form-control mb-2" name="jumlah" required>
      <span class="input-group-text">juta</span>
    </div>
  </div>
</div>

            <div class="form-group row">
              <label for="jumlah" class="col-sm-5 mb-2 col-form-label">Jumlah Penjualan Album</label>
              <div class="col-sm-7 mb-3">
                <input type="number" class="form-control mb-2" name="jumlah" step="1" min="0" value="<?php echo $obj->jumlah_penjualan_album; ?>">
               </div>
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

</body>
</html>
