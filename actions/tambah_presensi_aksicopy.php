<?php
include '../koneksi.php';

$nisn = $_POST['nisn'];
$status_kehadiran = $_POST['status_kehadiran'];
$keterangan = $_POST['keterangan'];

// Lakukan query insert dengan CURDATE() untuk tanggal dan NOW() untuk waktu
$query = "INSERT INTO presensi (nisn, status_kehadiran, keterangan, tanggal, waktu) 
          VALUES ('$nisn', '$status_kehadiran', '$keterangan', CURDATE(), NOW())";

$result = mysqli_query($koneksi, $query);

// Redirect kembali ke halaman presensi
if ($result) {
    header("Location: ../view_admin/presensi.php");
    exit();
} else {
    echo "Gagal menyimpan data!";
}
?>
