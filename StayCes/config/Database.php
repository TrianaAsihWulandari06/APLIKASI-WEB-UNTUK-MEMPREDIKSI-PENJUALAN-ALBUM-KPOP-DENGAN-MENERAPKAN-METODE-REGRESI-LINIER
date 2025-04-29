<?php
function openConnection()
{
  // Konfigurasi koneksi database
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'regresi-linier';

  // Membuat koneksi ke database
  $conn = new mysqli($host, $user, $password, $database);

  // Cek koneksi
  if ($conn->connect_error) {
    die("Connect failed: " . $conn->connect_error);
  }

  return $conn;
}
function closeConnection($conn)
{
  // Menutup koneksi
  $conn->close();
}
?>
