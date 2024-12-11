<?php 
include '../koneksi.php';
$nip = $_GET['nip'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"DELETE from guru where nip='$nip'");
 
// mengalihkan halaman kembali ke index.php
header("location:../view_admin/guru.php");
 
?>