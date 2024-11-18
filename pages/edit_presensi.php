<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="p-5">
    <h1 class="mb-5">Edit</h1>
    <br>
    
    <?php
	include '../koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from presensi where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
        <form action="../actions/update_presensi.php" method="post">
            <table>
                <tr>
                    <td>NISN</td>
                    <td><input type="number" name="NISN" value="<?php echo $d['nisn']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><input type="text" name="Status" value="<?php echo $d['status_kehadiran']; ?>"></td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td><input type="time" name="Waktu" value="<?php echo $d['waktu']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><input type="date" name="Tanggal" value="<?php echo $d['tanggal']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td><input type="text" name="Keterangan" value="<?php echo $d['keterangan']; ?>"></td>
                </tr>
                <tr>
                    <td><a class="btn btn-secondary" href="../presensi.php">Kembali</a></td>
                    <td><input class="btn btn-primary" type="submit" value="Simpan"></td>
                </tr>
            </table>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </form>
        <?php 
	}
	?>
</body>
</html>