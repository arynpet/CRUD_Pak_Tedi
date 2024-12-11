<?php
session_start();
require_once "../koneksi.php"; // Pastikan koneksi ke database

// Cek apakah pengguna sudah login
if ($_SESSION["role"] != "siswa") {
    header("Location: ../index.php");
    exit;
}

$nisn = $_SESSION["nisn"]; // Ambil NISN dari session

// Cek apakah form presensi telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status_kehadiran = $_POST["status_kehadiran"];
    $keterangan = $_POST["keterangan"]; // Ambil keterangan jika ada

    // Insert data presensi ke database
    $query = "INSERT INTO presensi (nisn, status_kehadiran, keterangan) VALUES (?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("sss", $nisn, $status_kehadiran, $keterangan);
    
    if ($stmt->execute()) {
        $success_message = "Presensi berhasil!";
    } else {
        $error_message = "Gagal melakukan presensi.";
    }
    $stmt->close();
}

// Ambil data presensi sebelumnya untuk menampilkan status
$query = "SELECT * FROM presensi WHERE nisn = ? ORDER BY tanggal DESC LIMIT 1";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("s", $nisn);
$stmt->execute();
$result = $stmt->get_result();
$last_presensi = $result->fetch_assoc();
$stmt->close();
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa - Presensi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .dashboard-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
        }
        .card {
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Dashboard Header -->
        <div class="dashboard-header text-center">
        <h2>Selamat Datang, <?php echo htmlspecialchars($_SESSION["nama"]); ?>!</h2>
            <p>Ini adalah dashboard kamu, tempat untuk melihat presensi dan informasi lainnya.</p>
        </div>

        <!-- Success or Error Message -->
        <?php if (isset($success_message)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php elseif (isset($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <!-- Last Presensi -->
        <div class="card">
            <div class="card-body">
                <h3>Presensi Hari Ini</h3>
                <?php if ($last_presensi): ?>
                    <p>Status presensi terakhir: <strong><?php echo $last_presensi['status_kehadiran']; ?></strong> pada <?php echo $last_presensi['tanggal']; ?> jam <?php echo $last_presensi['waktu']; ?></p>
                <?php else: ?>
                    <p>Anda belum melakukan presensi sebelumnya.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Presensi Form -->
        <div class="card">
            <div class="card-body">
                <h3>Lakukan Presensi</h3>
                <form method="post" action="siswa_dashboard.php">
                    <div class="form-group">
                        <label for="status_kehadiran">Status Kehadiran:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="hadir" name="status_kehadiran" value="Hadir" required>
                            <label class="form-check-label" for="hadir">Hadir</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="alfa" name="status_kehadiran" value="Alfa" required>
                            <label class="form-check-label" for="alfa">Alfa</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="sakit" name="status_kehadiran" value="Sakit" required>
                            <label class="form-check-label" for="sakit">Sakit</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="ijin" name="status_kehadiran" value="Izin" required>
                            <label class="form-check-label" for="ijin">Izin</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan (opsional):</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="4"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Presensi</button>
                </form>
            </div>
        </div>

        <br>
        <a href="../logout.php" class="btn btn-danger">Logout</a>
    </div>

    <!-- Menambahkan JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
