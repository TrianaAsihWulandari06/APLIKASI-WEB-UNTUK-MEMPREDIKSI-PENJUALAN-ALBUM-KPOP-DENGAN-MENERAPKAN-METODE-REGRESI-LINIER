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
            <a class="nav-link" href="create-data.php">Kelola Data</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="hasil-peramalan.php">Hasil Peramalan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="perbandingan.php">Perbandingan</a>
          </li>
        </ul>
      </div>
      <a class="btn btn-outline-dark" href="logout.php" role="button">Keluar</a>
    </div>
  </nav>

    <div class="container">
        <table class="table caption-top">
            <caption>Tabel Daftar Jumlah Pendengar di Spotify</caption>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Idol</th>
                    <th scope="col">Jumlah Pendengar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>TWICE</td>
                    <td>9,4 juta</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                    <td>STRAYKIDS</td>
                    <td>8,3 juta</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                    <td>(G)I-DLE</td>
                    <td>10,2 juta</td>
                </tr>
                <tr>
                <th scope="row">4</th>
                    <td>SEVENTEEN</td>
                    <td>6,2 juta</td>
                </tr>
                <tr>
                <th scope="row">5</th>
                    <td>WENDY</td>
                    <td>1,3 juta</td>
                </tr>
                <tr>
                <th scope="row">6</th>
                    <td>TXT</td>
                    <td>8,3 juta</td>
                </tr>
                <tr>
                <th scope="row">7</th>
                    <td>NCT DREAM</td>
                    <td>3,6 juta</td>
                </tr>
                <tr>
                <th scope="row">8</th>
                    <td>ILLIT</td>
                    <td>13,2 juta</td>
                </tr>
                <tr>
                <th scope="row">9</th>
                    <td>ZEROBASEONE</td>
                    <td>1,5 juta</td>
                </tr>
                <tr>
                <th scope="row">10</th>
                    <td>WAYV</td>
                    <td>1,8 juta</td>
                </tr>
            </tbody>
        </table>
    </div>

    
  <style>
        
        /* CSS untuk membuat tampilan responsif */
        @media (max-width: 20px) {
            .container {
                max-width: 100%; /* Container penuh lebar pada layar kecil */
            }
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h4>Perhitungan Perbandingan Jumlah Pendengar dengan Penjualan Album</h4>
        <form id="comparisonForm">
          <div class="container">
            <div class="form-group">
              <label for="listeners">Jumlah Pendengar : </label>
              <input type="number" id="listeners" name="listeners" class="form-control" required oninput="convertToMillions()">
            </div>
            <p id="convertedListeners"></p>
          </div>
          <div class="form-group">
            <label for="albumSales">Jumlah Penjualan Album : </label>
            <input type="number" id="albumSales" name="albumSales" class="form-control" required>
          </div>
          <button type="button" onclick="calculateRatio()" class="btn btn-primary" style="margin-top: 20px;">Hitung Perbandingan</button>
        </form>
        <p id="result" style="margin-top: 20px;"></p>
      </div>

    <script>
        function calculateRatio() {
            // Ambil nilai dari input
            var listeners = parseFloat(document.getElementById('listeners').value);
            var albumSales = parseFloat(document.getElementById('albumSales').value);

            // Validasi input
            if (isNaN(listeners) || isNaN(albumSales)) {
                alert('Silakan masukkan nilai untuk kedua input.');
                return;
            }

            // Validasi input tidak boleh nol
            if (albumSales == 0) {
                alert('Jumlah penjualan album tidak boleh nol.');
                return;
            }

            // Hitung perbandingan
            var ratio = (listeners / albumSales) * 100;

            // Membulatkan hasil
            var roundedRatio = Math.floor(ratio);

            // Tampilkan hasil
            document.getElementById('result').innerHTML = 'Perbandingan Jumlah Pendengar dengan Penjualan Album adalah ' + ratio.toFixed(2) + '%';
        }

    </script>
</body>

<div class="mt-5">
  <h5>Kesimpulan</h5>
  <p>Jika Hasil Perbandingan Jumlah Pendengar dengan Jumlah Penjualan diatas 50%, Maka Seller atau Penjual dapat Menambahkan stok penjualan album.</p>
  <p>Tetapi jika Hasil Perbandingan Jumlah Pendengar dengan Jumlah Penjualan dibawah 50%, Maka Seller atau Penjual tidak disarankan menambah stok penjualan album.</p>
</div>
        

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>