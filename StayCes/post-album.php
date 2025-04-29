<?php
require ('config/Database.php');
require ('helpers/PreventInjectionSQL.php');

$connect = openConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tahun = $_POST['tahun'];
    $nama_penyanyi = $_POST['nama_penyanyi'];
    $nama_album = $_POST['nama_album'];
    $jumlah = $_POST['jumlah_penjualan'];

    // Validasi dan sanitasi data jika perlu

    $query = "INSERT INTO album (tahun_penjualan, nama_penyanyi, nama_album, jumlah_penjualan) 
              VALUES ('$tahun', '$nama_penyanyi', '$nama_album', '$jumlah')";

    if (mysqli_query($connect, $query)) {
        header('Location: create-album.php'); // Redirect ke halaman dashboard setelah berhasil menyimpan data
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}

closeConnection($connect);
?>
