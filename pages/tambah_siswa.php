<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="p-5">
    <h1 class="mb-5">Tambah data</h1>

    <form action="../actions/tambah_siswa_aksi.php" method="post">
    <table>
        <tr>
            <td>NISN</td>
            <td><input type="number" name="NISN"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="Nama"></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td><input type="text" name="Kelas"></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td><input type="text" name="Jurusan"></td>
        </tr>
        <tr>
            <td><a href="../siswa.php" class="btn btn-secondary">Kembali</a></td>
            <td><input class="btn btn-primary" type="submit" value="Simpan"></td>
        </tr>
    </table>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>