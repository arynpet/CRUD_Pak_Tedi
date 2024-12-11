<?php
session_start();
require_once "../koneksi.php"; // Pastikan koneksi ke database

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = $_POST["nisn"];
    $password = $_POST["password"];

    // Verifikasi login berdasarkan nisn dan password
    $query = "SELECT loginsiswa.nisn, siswa.nama_lengkap 
              FROM loginsiswa 
              JOIN siswa ON loginsiswa.nisn = siswa.nisn 
              WHERE loginsiswa.nisn = ? AND loginsiswa.password = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ss", $nisn, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login berhasil
        $user = $result->fetch_assoc();
        $_SESSION["nisn"] = $user["nisn"];
        $_SESSION["nama"] = $user["nama_lengkap"]; // Ambil kolom nama_lengkap
        $_SESSION["role"] = "siswa";
        header("Location: ../dashboard/siswa_dashboard.php");
        exit;
    } else {
        // Login gagal
        $error_message = "NISN atau Password salah!";
    }
    $stmt->close();
    $koneksi->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Login Siswa</h2>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="login_siswa.php">
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <br>
                <a href="../index.php">Kembali ke Halaman Pilih Role</a>
            </div>
        </div>
    </div>

    <!-- Menambahkan JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
