<?php
include '../koneksi.php';

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];

mysqli_query($koneksi, "UPDATE guru set nama = '$nama', nip = '$nip', jabatan = '$jabatan' WHERE nip = '$nip'");


header("location:../view_admin/guru.php")
?>