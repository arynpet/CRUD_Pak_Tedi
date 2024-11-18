<!DOCTYPE html>
<html lang="id">

<head>
    <title>Tambah Data Presensi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>

<body class="p-5">
    <h1 class="mb-5">Tambah Data Presensi</h1>

    <?php
    include '../koneksi.php';
    $nisn = $_GET['NISN'] ?? ''; // Menambahkan fallback jika NISN tidak tersedia
    ?>

    <form action="../actions/tambah_presensi_aksi.php" method="post" class="needs-validation" novalidate>
        <!-- Input NISN -->
        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input name="nisn" type="number" class="form-control" id="nisn" value="<?php echo htmlspecialchars($nisn); ?>" required>
            <div class="invalid-feedback">Silakan masukkan NISN siswa.</div>
        </div>

        <!-- Input Status Kehadiran -->
        <div class="mb-3">
            <label for="status_kehadiran" class="form-label">Status Kehadiran</label>
            <select name="status_kehadiran" id="status_kehadiran" class="form-select" required>
                <option value="" disabled selected>Pilih Status Kehadiran</option>
                <option value="Hadir">Hadir</option>
                <option value="Absen">Absen</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
            </select>
            <div class="invalid-feedback">Silakan pilih status kehadiran.</div>
        </div>

        <!-- Input Keterangan -->
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control">
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-between">
            <a href="../presensi.php" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

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
</body>

</html>
