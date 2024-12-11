<?php
session_start();
if ($_SESSION["role"] != "guru") {
    header("Location: ../index.php");
    exit;
}

require_once "../koneksi.php";

// Ambil nama guru dari session
$nama_guru = isset($_SESSION['nama']) ? $_SESSION['nama'] : "Guru";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dashboard-header {
            background-color: #17a2b8;
            color: white;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
        }
        .card {
            margin: 20px 0;
        }
        .btn-custom {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Dashboard Header -->
        <div class="dashboard-header text-center">
            <h1>Selamat Datang, <?php echo htmlspecialchars($nama_guru); ?>!</h1>
            <p>Data apa yang ingin Anda lihat?</p>
        </div>

        <!-- Options for Data -->
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Data Siswa</h5>
                        <p class="card-text">Lihat data lengkap siswa yang terdaftar.</p>
                        <a href="../view_guru/siswa.php" class="btn btn-primary btn-block">Lihat Data Siswa</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Data Presensi</h5>
                        <p class="card-text">Lihat rekap data presensi siswa.</p>
                        <a href="../view_guru/presensi.php" class="btn btn-success btn-block">Lihat Data Presensi</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="text-center mt-4">
            <a href="../logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
