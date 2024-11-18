<?php
include '../koneksi.php';

// Sanitize and validate the input data
$nisn = isset($_POST['nisn']) ? mysqli_real_escape_string($koneksi, $_POST['nisn']) : '';
$status_kehadiran = isset($_POST['status_kehadiran']) ? mysqli_real_escape_string($koneksi, $_POST['status_kehadiran']) : '';
$keterangan = isset($_POST['keterangan']) ? mysqli_real_escape_string($koneksi, $_POST['keterangan']) : '';

// Check if all required fields are provided
if (empty($nisn) || empty($status_kehadiran)) {
    // If required fields are missing, redirect with an error message
    header("Location: ../presensi.php?pesan=gagal");
    exit();
}

// Prepare the SQL query using prepared statements
$query = "INSERT INTO view_presensi (nisn, status_kehadiran, keterangan) VALUES (?, ?, ?)";
$stmt = $koneksi->prepare($query);

// Bind parameters and execute the query
$stmt->bind_param("sss", $nisn, $status_kehadiran, $keterangan);

if ($stmt->execute()) {
    // If the query executes successfully, redirect with a success message
    header("Location: ../presensi.php?pesan=berhasil");
} else {
    // If the query fails, redirect with an error message
    header("Location: ../presensi.php?pesan=gagal");
}

// Close the statement and the connection
$stmt->close();
$koneksi->close();
?>
