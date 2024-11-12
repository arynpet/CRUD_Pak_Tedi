<?php
include '../koneksi.php';

$nisn = $_POST['NISN'];
$nama = $_POST['Nama'];
$kelas = $_POST['Kelas'];
$jurusan = $_POST['Jurusan'];

mysqli_query($koneksi, "INSERT INTO siswa (nisn, nama_lengkap, kelas, jurusan) VALUES ('$nisn', '$nama', '$kelas', '$jurusan')");


header("location:../siswa.php")
?>