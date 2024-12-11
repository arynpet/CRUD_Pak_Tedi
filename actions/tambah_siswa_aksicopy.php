<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Koneksi ke database
    include '../koneksi.php';

    // Ambil dan validasi data dari form
    $nisn = filter_input(INPUT_POST, 'NISN', FILTER_VALIDATE_INT);
    $nama = trim($_POST['Nama'] ?? '');
    $kelas = trim($_POST['kelas'] ?? '');
    $jurusan = trim($_POST['jurusan'] ?? '');

    // Pastikan semua data ada dan valid
    if (!$nisn || empty($nama) || empty($kelas) || empty($jurusan)) {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'Data tidak lengkap atau format tidak valid. Silakan periksa kembali.';
        header("Location: ../siswa.php");
        exit();
    }

    try {
        // Gunakan prepared statements untuk keamanan
        $query = $koneksi->prepare("INSERT INTO siswa (nisn, nama_lengkap, kelas, jurusan) VALUES (?, ?, ?, ?)");
        $query->bind_param('isss', $nisn, $nama, $kelas, $jurusan);

        // Eksekusi query
        if ($query->execute()) {
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'Data siswa berhasil ditambahkan.';
        } else {
            throw new Exception('Gagal menambahkan data siswa.');
        }

        // Tutup statement
        $query->close();
    } catch (Exception $e) {
        // Tangani error koneksi atau query
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'Terjadi kesalahan: ' . $e->getMessage();
    }

    // Redirect ke halaman siswa.php
    header("Location: ../view_guru/siswa.php");
    exit();
} else {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Akses tidak valid.';
    header("Location: ../view_admin/siswa.php");
    exit();
}
?>
