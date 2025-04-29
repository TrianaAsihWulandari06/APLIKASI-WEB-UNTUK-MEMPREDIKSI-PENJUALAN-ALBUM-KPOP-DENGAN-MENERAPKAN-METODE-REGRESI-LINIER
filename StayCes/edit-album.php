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

    $query = "UPDATE album SET 
                tahun_penjualan = '$tahun',
                nama_penyanyi = '$nama_penyanyi',
                nama_album = '$nama_album',
                jumlah_penjualan = '$jumlah'
              WHERE id = $id";

    if (mysqli_query($connect, $query)) {
        header('Location: create-album.php'); // Redirect ke halaman dashboard setelah berhasil mengupdate data
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}



// mysqli_query($connect, "UPDATE pmb INNER JOIN pmb_fakultas ON pmb.tahun_penerimaan = pmb_fakultas.tahun_penerimaan
// SET pmb.jumlah_pendaftar = (pmb.jumlah_pendaftar - pmb_fakultas.jumlah_pendaftar) WHERE pmb_fakultas.id ='$id'");


// $check = mysqli_query($connect,"SELECT * FROM pmb_fakultas WHERE tahun_penerimaan ='$tahun' and fakultas ='$fakultas'");
// $check2 = mysqli_query($connect,"SELECT * FROM pmb_fakultas WHERE id ='$id'");

// while($obj = mysqli_fetch_object($check2)){

//   if($fakultas == $obj->fakultas) {
//     mysqli_query($connect, "UPDATE pmb_fakultas SET tahun_penerimaan ='$tahun', fakultas = '$fakultas', jumlah_pendaftar = '$jumlah' WHERE id = '$id'");  
//     mysqli_query($connect, "UPDATE pmb INNER JOIN pmb_fakultas ON pmb.tahun_penerimaan = pmb_fakultas.tahun_penerimaan SET pmb.jumlah_pendaftar = (pmb.jumlah_pendaftar + pmb_fakultas.jumlah_pendaftar) WHERE pmb_fakultas.id ='$id'");

//     header("Location:create-pmb.php");
//   } else {
//     if(mysqli_num_rows($check) > 0){ 
//       while($obj1 = mysqli_fetch_object($check)){
//         if($fakultas == $obj1->fakultas) {
//           header("Location:create-pmb.php?notify=error");
//         } else {
//           mysqli_query($connect, "UPDATE pmb_fakultas SET tahun_penerimaan ='$tahun', fakultas = '$fakultas', jumlah_pendaftar = '$jumlah' WHERE id = '$id'");  
//           mysqli_query($connect, "UPDATE pmb INNER JOIN pmb_fakultas ON pmb.tahun_penerimaan = pmb_fakultas.tahun_penerimaan SET pmb.jumlah_pendaftar = (pmb.jumlah_pendaftar + pmb_fakultas.jumlah_pendaftar) WHERE pmb_fakultas.id ='$id'");

//           header("Location:create-pmb.php");
//         }
//       }
//     } else {
//       mysqli_query($connect, "UPDATE pmb_fakultas SET tahun_penerimaan ='$tahun', fakultas = '$fakultas', jumlah_pendaftar = '$jumlah' WHERE id = '$id'");  
//       mysqli_query($connect, "UPDATE pmb INNER JOIN pmb_fakultas ON pmb.tahun_penerimaan = pmb_fakultas.tahun_penerimaan SET pmb.jumlah_pendaftar = (pmb.jumlah_pendaftar + pmb_fakultas.jumlah_pendaftar) WHERE pmb_fakultas.id ='$id'");
//       header("Location:create-pmb.php");
//     }
//   }
// }

?>