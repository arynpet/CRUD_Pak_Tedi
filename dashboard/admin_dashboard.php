<?php
session_start();
if ($_SESSION["role"] != "admin") {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dashboard-header {
            background-color: #007bff;
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
            <h1>Selamat Datang, Admin!</h1>
            <p>Data apa yang ingin Anda lihat hari ini?</p>
        </div>

        <!-- Data Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Data Guru</h5>
                        <p class="card-text">Lihat data guru yang telah terdaftar di sistem.</p>
                        <a href="../view_admin/guru.php" class="btn btn-primary btn-custom">Lihat Data Guru</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Data Siswa</h5>
                        <p class="card-text">Kelola data siswa untuk kebutuhan presensi dan lainnya.</p>
                        <a href="../view_admin/siswa.php" class="btn btn-primary btn-custom">Lihat Data Siswa</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Data Presensi</h5>
                        <p class="card-text">Pantau data presensi siswa secara real-time.</p>
                        <a href="../view_admin/presensi.php" class="btn btn-primary btn-custom">Lihat Data Presensi</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="text-center mt-4">
            <a href="../logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
