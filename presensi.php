<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pak Tedi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
</head>
<body class="p-5">
	<h1 class="mb-5">Tabel Presensi</h1>
		<a href="./presensi.php">Tabel Presensi</a>
        <a href="./siswa.php">Tabel Siswa</a>
        <a href="./guru.php">Tabel Guru</a> <br>
        <a class="btn btn-primary" href="./pages/tambah_presensi.php">Tambah data</a>
<table class="table table-striped table-bordered">
		<tr>
			<th>No</th>
			<th>NISN</th>
			<th>Status</th>
			<th>Waktu</th>
			<th>Tanggal</th>
            <th>Keterangan</th>
            <th>Opsi</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$data = mysqli_query($koneksi,"select * from presensi");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $d['id']; ?></td>
                <td><?php echo $d['nisn']; ?></td>
				<td><?php echo $d['status_kehadiran']; ?></td>
				<td><?php echo $d['waktu']; ?></td>
				<td><?php echo $d['tanggal']; ?></td>
				<td><?php echo $d['keterangan']; ?></td>
                <td>
                        <a href="./pages/edit_presensi.php?id=<?php echo $d['id']; ?>">Edit</a>
                        <a href="./actions/hapus_presensi.php?id=<?php echo $d['id']; ?>">Hapus</a>
                </td>
			</tr>
			<?php 
		}
		?>
	</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>