<?php
include '../koneksi.php';

$nisn = $_POST['NISN'];
$nama = $_POST['Nama'];
$kelas = $_POST['Kelas'];
$jurusan = $_POST['Jurusan'];

mysqli_query($koneksi, "UPDATE siswa set nama_lengkap = '$nama', kelas = '$kelas', jurusan = '$jurusan' where nisn = '$nisn'");


header("location:../view_admin/siswa.php")
?>