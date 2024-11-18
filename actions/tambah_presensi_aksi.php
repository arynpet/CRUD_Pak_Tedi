<?php
include '../koneksi.php';

$nisn = $_POST['nisn'];
$status_kehadiran = $_POST['status_kehadiran'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi, "INSERT INTO view_presensi (nisn, status_kehadiran, keterangan) VALUES ('$nisn', '$status_kehadiran', '$keterangan')");

header("Location: ../presensi.php?pesan=berhasil");
?>
