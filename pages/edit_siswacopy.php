<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="p-5 bg-light">
    <div class="container">
        <h1 class="mb-5 text-center">Edit Data Siswa</h1>

        <?php
        include '../koneksi.php';
        $nisn = $_GET['NISN'];
        $data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$nisn'");
        while ($d = mysqli_fetch_array($data)) {
        ?>

        <form action="../actions/update_siswa.php" method="post" class="shadow p-4 bg-white rounded">
            <div class="mb-3">
                <label for="Nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="Nama" name="Nama" value="<?= htmlspecialchars($d['nama_lengkap']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="NISN" class="form-label">NISN</label>
                <input type="number" class="form-control" id="NISN" name="NISN" value="<?= htmlspecialchars($d['nisn']); ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="Kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="Kelas" name="Kelas" value="<?= htmlspecialchars($d['kelas']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="Jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="Jurusan" name="Jurusan" value="<?= htmlspecialchars($d['jurusan']); ?>" required>
            </div>

            <div class="d-flex justify-content-between">
                <a class="btn btn-secondary" href="../view_admin/siswa.php">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>

        <?php 
        }
        ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
