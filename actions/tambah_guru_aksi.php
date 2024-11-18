<?php
include '../koneksi.php';

$nip = $_POST['NIP'];
$nama = $_POST['Nama'];
$jabatan = $_POST['jabatan'];

mysqli_query($koneksi, "INSERT INTO guru (nip, nama, jabatan) VALUES ('$nip', '$nama', '$jabatan')");


header("location:../guru.php")
?>