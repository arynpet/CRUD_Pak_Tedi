<?php
session_start();
include '../koneksi.php';

// Pastikan ada parameter NISN yang diterima dari GET
if (isset($_GET['NISN']) && !empty($_GET['NISN'])) {
    // Mengamankan nilai NISN dengan filter dan sanitasi
    $nisn = filter_var($_GET['NISN'], FILTER_SANITIZE_NUMBER_INT);

    // Pastikan NISN adalah angka yang valid
    if (filter_var($nisn, FILTER_VALIDATE_INT)) {
        // Query untuk menghapus data
        $query = "DELETE FROM siswa WHERE nisn = ?";
        if ($stmt = $koneksi->prepare($query)) {
            // Bind parameter dan eksekusi
            $stmt->bind_param('i', $nisn);

            // Cek eksekusi query
            if ($stmt->execute()) {
                $_SESSION['status'] = 'success';
                $_SESSION['message'] = 'Data siswa berhasil dihapus.';
            } else {
                $_SESSION['status'] = 'error';
                $_SESSION['message'] = 'Gagal menghapus data siswa. Terjadi kesalahan pada server.';
            }

            // Menutup statement
            $stmt->close();
        } else {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Gagal menyiapkan query untuk menghapus data siswa.';
        }
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'NISN tidak valid.';
    }
} else {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'NISN tidak ditemukan.';
}

// Menutup koneksi
$koneksi->close();

// Redirect kembali ke halaman siswa
header("Location: ../siswa.php");
exit();
?>
