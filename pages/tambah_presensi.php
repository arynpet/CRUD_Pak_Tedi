<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="p-5">
    <h1 class="mb-5">Tambah data</h1>
    <?php
	include '../koneksi.php';
	$nisn = $_GET['NISN'];
	?>
    <form action="../actions/tambah_presensi_aksi.php" method="post">
        <table>
            <tr>
                <td>NISN</td>
                <td><input name="nisn" required type="number" name="NISN" value="<?php echo $nisn; ?>"></td>
            </tr>
            <tr>
            <td>Status</td>
                <td>
                    <select name="status_kehadiran" required>
                        <option value="Hadir">Hadir</option>
                        <option value="Absen">Absen</option>
                        <option value="Izin">Izin</option>
                        <option value="Sakit">Sakit</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keterangan"></td>
            </tr>
            <tr>
                <td><a href="../presensi.php" class="btn btn-secondary">Kembali</a></td>
                <td><input class="btn btn-primary" type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
