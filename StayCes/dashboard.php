<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>StayCes</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" integrity="sha512-HCG6Vbdg4S+6MkKlMJAm5EHJDeTZskUdUMTb8zNcUKoYNDteUQ0Zig30fvD9IXnRv7Y0X4/grKCnNoQ21nF2Qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success text-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">Beranda</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="create-album.php">Data Album</a>
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
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/img/k-pop.svg" alt="Logo" width="50" height="50">
                StayCes
            </a>
        </div>
    </nav>

    <div class="container content">
        <img src="img/59.png" class="figure-img img-fluid rounded" alt="...">
        <p class="fw-bold">Halo, Kenalan Yukkk</p>
        <p class="lh-sm">Website Peramalam Penjualan Album K-pop adalah website yang digunakan untuk melakukan peramalan mengenai penjualan album kpop.
        Website ini dapat digunakan oleh seller atau penjual, karena dengan adanya website ini sekiranya dapat membantu para seller 
        atau penjual album kpop dalam mengetahui perkiraan album yang akan terjual dibulan selanjutnya, sehingga seller atau penjual
        dapat menentukan strategi penjualan untuk bulan selanjutnya.</p>
        <p class="lh-sm">Dalam peramalan ini, menggunakan perhitungan regresi linier. Regresi Linier adalah teknik analisis data yang memprediksi 
        nilai data yang tidak diketahui dengan menggunakan nilai data lain yang terkait dan diketahui. Alasan penggunaan regresi
        linier dalam melakukan peramalan ini adalah karena regresi linier ini mudah untuk digunakan dalam hal menghitung peramalan
        dan sangat pas digunakan untuk meramalkan penjualan.</p>
    </div>
    <div class="container">
        <table class="table caption-top">
            <caption>Tabel Daftar Idol yang akan comeback di bulan juli</caption>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Bulan Rilis</th>
                    <th scope="col">Nama Idol</th>
                    <th scope="col">Nama Agensi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Juli</td>
                    <td>StayC</td>
                    <td>High Up Entertaiment</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Juli</td>
                    <td>BabyMonster</td>
                    <td>YG Entertaiment</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Juli</td>
                    <td>Chorong Apink</td>
                    <td>Choi Creative Lab</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Juli</td>
                    <td>Lee Chae Yeong</td>
                    <td>WM Entertaiment</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Juli</td>
                    <td>VVUP</td>
                    <td>Ego Entertaiment</td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Juli</td>
                    <td>(G)I-IDLE</td>
                    <td>Cube Entertaiment</td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>Juli</td>
                    <td>Weekly</td>
                    <td>IST Entertaiment</td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>Juli</td>
                    <td>Enhypen</td>
                    <td>Hype Entertaiment</td>
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td>Juli</td>
                    <td>Jimin BTS</td>
                    <td>Hype Entertaiment</td>
                </tr>
                <tr>
                    <th scope="row">10</th>
                    <td>Juli</td>
                    <td>Straykids</td>
                    <td>JYP Entertaiment</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
