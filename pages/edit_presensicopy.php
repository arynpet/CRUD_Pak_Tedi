<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="p-5 bg-light">
    <div class="container shadow-sm p-4 bg-white rounded">
        <h1 class="mb-4">Edit</h1>
        <?php
        include '../koneksi.php';
        $id = $_GET['id'];
        $data = mysqli_query($koneksi, "SELECT * FROM presensi WHERE id='$id'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <form action="../actions/update_presensi.php" method="post">
            <div class="mb-3">
                <label for="NISN" class="form-label">NISN</label>
                <input type="number" name="NISN" id="NISN" class="form-control" value="<?php echo $d['nisn']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="Status" class="form-label">Status</label>
                <input type="text" name="Status" id="Status" class="form-control" value="<?php echo $d['status_kehadiran']; ?>">
            </div>
            <div class="mb-3">
                <label for="Waktu" class="form-label">Waktu</label>
                <input type="time" name="Waktu" id="Waktu" class="form-control" value="<?php echo $d['waktu']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="Tanggal" class="form-label">Tanggal</label>
                <input type="date" name="Tanggal" id="Tanggal" class="form-control" value="<?php echo $d['tanggal']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="Keterangan" class="form-label">Keterangan</label>
                <input type="text" name="Keterangan" id="Keterangan" class="form-control" value="<?php echo $d['keterangan']; ?>">
            </div>
            <div class="d-flex justify-content-between">
                <a href="../view_admin/presensi.php" class="btn btn-secondary">Kembali</a>
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