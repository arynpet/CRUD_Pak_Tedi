<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="p-5">
    <h1 class="mb-5">Edit</h1>
    <br>
    
    <?php
	include '../koneksi.php';
	$nip = $_GET['NIP'];
	$data = mysqli_query($koneksi,"select * from guru where nip='$nip'");
	while($d = mysqli_fetch_array($data)){
		?>
        <form action="../actions/update_guru.php" method="post">
            <table>
                <tr>
                    <td>NIP</td>
                    <td><input type="number" name="nip" value="<?php echo $d['nip']; ?>"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="<?php echo $d['nama']; ?>"></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td><input type="text" name="jabatan" value="<?php echo $d['jabatan']; ?>"></td>
                </tr>
                <tr>
                    <td><a class="btn btn-secondary" href="../guru.php">Kembali</a></td>
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