<?php
session_start();
include '../koneksi.php';

// Flash Message Handler
if (isset($_SESSION['status'])) {
    $message = $_SESSION['message'] ?? 'Aksi berhasil dilakukan!';
    $icon = $_SESSION['status'] == 'success' ? 'success' : 'error';
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({ 
                title: 'Notifikasi',
                text: '$message',
                icon: '$icon',
                confirmButtonText: 'OK'
            });
        });
    </script>";
    unset($_SESSION['status'], $_SESSION['message']);
}

// Fetch Data from Database
$query = "SELECT * FROM siswa";
$data = $koneksi->query($query);
if (!$data) {
    die("Query gagal: " . $koneksi->error);
}
?>

<?php
$query = "SELECT COUNT(*) as total FROM siswa";
$result = $koneksi->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $jumlah_data = $row['total'];
} else {
    $jumlah_data = 0;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Web Presensi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="p-5">
    <h1 class="mb-4">Tabel Siswa</h1>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="./guru.php">Tabel Guru</a></li>
                    <li class="nav-item"><a class="nav-link active" href="./siswa.php">Tabel Siswa</a></li>
                    <li class="nav-item"><a class="nav-link" href="./presensi.php">Tabel Presensi</a></li>
                </ul>
            </div>
            <ul>
                <li class="nav-item">Total Data: <?php echo $jumlah_data; ?></li>
            </ul>
        </div>
    </nav>
    <div class= "justify-content-end d-flex">
        
    <a class="btn btn-primary mb-3" href="../pages/tambah_siswacopy.php">Tambah data</a>
    <a class="btn btn-danger mb-3" href="../logout.php">Logout</a>
    </div>
    <div class="container">
        <div class="row">
            <?php while ($d = $data->fetch_assoc()) : ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">#<?= htmlspecialchars($d['nisn'], ENT_QUOTES, 'UTF-8'); ?></h5>
                            <p class="card-text">Nama: <?= htmlspecialchars($d['nama_lengkap'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="card-text">Kelas: <?= htmlspecialchars($d['kelas'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="card-text">Jurusan: <?= htmlspecialchars($d['jurusan'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <a class="btn btn-success" href="../pages/edit_siswacopy.php?NISN=<?= urlencode($d['nisn']); ?>">Edit</a>
                            <button class="btn btn-danger" onclick="confirmDelete('<?= htmlspecialchars($d['nisn'], ENT_QUOTES, 'UTF-8'); ?>')">Hapus</button>
                            <a class="btn btn-secondary" href="../pages/tambah_presensicopy.php?nisn=<?= urlencode($d['nisn']); ?>">Catat Kehadiran</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(nisn) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data ini akan dihapus secara permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../actions/hapus_siswa.php?NISN=' + encodeURIComponent(nisn);
                }
            });
        }
    </script>
</body>
</html>
