<?php 
include '../koneksi.php';
$nisn = $_GET['NISN'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"DELETE from siswa where nisn='$nisn'");
 
// mengalihkan halaman kembali ke index.php
header("location:../siswa.php");
 
?>