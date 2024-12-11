<?php
include '../koneksi.php';

$nisn = $_POST['NISN'];
$status = $_POST['Status'];
$waktu = $_POST['Waktu'];
$tanggal = $_POST['Tanggal'];
$keterangan = $_POST['Keterangan'];

mysqli_query($koneksi, "UPDATE presensi set nisn = $nisn, status_kehadiran = '$status', waktu = '$waktu', tanggal = '$tanggal', keterangan = '$keterangan' where nisn = '$nisn'");


header("location: ../view_admin/presensi.php")
?>