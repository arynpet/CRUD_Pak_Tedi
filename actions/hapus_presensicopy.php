<?php 
include '../koneksi.php';
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"DELETE from presensi where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:../view_admin/presensi.php");
 
?>