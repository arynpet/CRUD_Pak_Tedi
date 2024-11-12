<?php
include '../koneksi.php';

$nisn = $_POST['NISN'];
$status = $_POST['Status'];
$waktu = $_POST['Waktu'];
$tanggal = $_POST['Tanggal'];
$keterangan = $_POST['Keterangan'];

mysqli_query($koneksi, "INSERT INTO presensi (nisn, status_kehadiran, waktu, keterangan) VALUES ('$nisn', '$status', '$tanggal', '$keterangan')");


header("location:../presensi.php")
?>