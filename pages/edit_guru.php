<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="p-5">
    <div class="container">
        <h1 class="mb-5">Edit Guru</h1>
        
        <?php
        include '../koneksi.php';
        $nip = $_GET['nip'];
        $data = mysqli_query($koneksi,"select * from guru where nip='$nip'");
        while($d = mysqli_fetch_array($data)){
        ?>
        <form action="../actions/update_guru.php" method="post" class="row g-3">
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="number" class="form-control" id="nip" name="nip" value="<?php echo $d['nip']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $d['nama']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $d['jabatan']; ?>" required>
            </div>

            <div class="d-flex justify-content-between">
                <a class="btn btn-secondary" href="../view_admin/guru.php">Kembali</a>
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