<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pak Tedi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Tambahkan animasi hover untuk card */
        .card:hover {
            transform: scale(1.05); /* Perbesar sedikit */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Tambahkan bayangan */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animasi smooth */
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body class="p-5">
<h1>Tabel Presensi</h1>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="./siswa.php">Tabel Siswa</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="./presensi.php">Tabel Presensi</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="./guru.php">Tabel Guru</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
        <a class="btn btn-primary" href="./pages/tambah_presensi.php">Tambah data</a>
        <div class="container">
            <div class="row">
		<?php 
		include 'koneksi.php';
		$data = mysqli_query($koneksi,"select * from view_presensi");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
			?>
			<div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title""><?php echo $no++; ?></h5>
                        <p class="card-text">Nisn: <?php echo $d['nisn']; ?> </p> 
                        <p class="card-text">Nama: <?php echo $d['nama_lengkap']; ?> </p>
                        <p class="card-text">Status: <?php echo $d['status_kehadiran']; ?> </p>
                        <p class="card-text">Waktu: <?php echo $d['waktu']; ?> </p>
                        <p class="card-text">Tanggal: <?php echo $d['tanggal']; ?> </p>
                        <p class="card-text">Keterangan: <?php echo $d['keterangan']; ?> </p>
                        <a class="btn btn-success" href="./pages/edit_presensi.php?id=<?php echo $d['id']; ?>">Edit</a>
                        <a class="btn btn-danger" href="./actions/hapus_presensi.php?id=<?php echo $d['id']; ?>">Hapus</a>
                    </div>
                </div>
            </div>
            <?php 
		}
		?>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>