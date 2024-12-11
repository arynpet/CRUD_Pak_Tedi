<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <script>
        function updateForm() {
            document.getElementById('formNISN').submit();
        }
    </script>
</head>
<body class="p-5 bg-light">
    <div class="container shadow-sm p-4 bg-white rounded">
        <h1 class="mb-4">Tambah Data</h1>
        <?php
        include '../koneksi.php';

        $nisn = isset($_POST['nisn']) ? $_POST['nisn'] : '';
        $nama = '';

        if ($nisn) {
            $query = mysqli_query($koneksi, "SELECT nama_lengkap FROM siswa WHERE nisn='$nisn'");
            $data = mysqli_fetch_assoc($query);
            if ($data) {
                $nama = $data['nama_lengkap'];
            }
        }

        $result = mysqli_query($koneksi, "SELECT nisn, nama_lengkap FROM siswa");
        ?>
        <form id="formNISN" action="../actions/tambah_presensi_aksi.php" method="post">
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <select name="nisn" id="nisn" class="form-select" required>
                    <option value="" disabled selected>Pilih NISN</option>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <option value="<?php echo $row['nisn']; ?>" <?php echo ($nisn == $row['nisn']) ? 'selected' : ''; ?>>
                            <?php echo $row['nisn'] . " -- " . $row['nama_lengkap']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="status_kehadiran" class="form-label">Status</label>
                <select name="status_kehadiran" id="status_kehadiran" class="form-select" required>
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Absen">Absen</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control" required minlength="3" placeholder="Tambah keterangan">
            </div>
            <div class="d-flex justify-content-between">
                <a href="../view_guru/presensi.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
