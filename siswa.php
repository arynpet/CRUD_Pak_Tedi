<!DOCTYPE html>
<html>
    <head>
        <title>CRUD Pak Tedi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="p-5">
        <h1 class="mb-5">Tabel Siswa</h1>
        <a href="./presensi.php">Tabel Presensi</a>
        <a href="./siswa.php">Tabel Siswa</a>
        <a href="./guru.php">Tabel Guru</a> <br>
        <a class="btn btn-primary" href="./pages/tambah_siswa.php">Tambah data</a>
        <table class="table table-striped table-bordered">
            <tr>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Opsi</th>
            </tr>
            <?php 
            include 'koneksi.php';
            $data = mysqli_query($koneksi,"select * from siswa");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $d['nisn']; ?></td>
                    <td><?php echo $d['nama_lengkap']; ?></td>
                    <td><?php echo $d['kelas']; ?></td>
                    <td><?php echo $d['jurusan']; ?></td>
                    <td>
                        <a href="./pages/edit_siswa.php?NISN=<?php echo $d['nisn']; ?>">Edit</a>
                        <a href="./actions/hapus_siswa.php?NISN=<?php echo $d['nisn']; ?>">Hapus</a>
                    </td>
                </tr>
                <?php 
            }
            ?>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>