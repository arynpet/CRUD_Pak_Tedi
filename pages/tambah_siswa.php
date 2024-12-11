<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Data Siswa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="p-5 bg-light">
    <div class="container">
        <h1 class="mb-5 text-center">Tambah Data Siswa</h1>

        <form action="../actions/tambah_siswa_aksi.php" method="post" class="shadow p-4 bg-white rounded needs-validation" novalidate>
            <!-- Input NISN -->
            <div class="mb-3">
                <label for="NISN" class="form-label">NISN</label>
                <input type="number" id="NISN" name="NISN" class="form-control" placeholder="Masukkan NISN" maxlength="10" required>
                <div class="invalid-feedback">Silakan masukkan NISN yang valid.</div>
            </div>

            <!-- Input Nama -->
            <div class="mb-3">
                <label for="Nama" class="form-label">Nama Lengkap</label>
                <input type="text" id="Nama" name="Nama" class="form-control" placeholder="Masukkan nama lengkap" maxlength="100" required>
                <div class="invalid-feedback">Silakan masukkan nama lengkap.</div>
            </div>

            <!-- Input Kelas -->
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <select id="kelas" name="kelas" class="form-select" required>
                    <option value="" disabled selected>Pilih kelas...</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
                <div class="invalid-feedback">Silakan pilih kelas.</div>
            </div>

            <!-- Input Jurusan -->
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select id="jurusan" name="jurusan" class="form-select" required>
                    <option value="" disabled selected>Pilih jurusan...</option>
                    <option value="TKJ">TKJ</option>
                    <option value="TEI">TEI</option>
                    <option value="RPL">RPL</option>
                </select>
                <div class="invalid-feedback">Silakan pilih jurusan.</div>
            </div>

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-between">
                <a href="../view_guru/siswa.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validasi Form Bootstrap
        (function () {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })();
    </script>

    <?php
    session_start();
    if (isset($_SESSION['status'])) {
        $message = $_SESSION['message'] ?? 'Aksi berhasil dilakukan!';
        $icon = $_SESSION['status'] === 'success' ? 'success' : 'error';
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
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
    ?>
</body>
</html>
