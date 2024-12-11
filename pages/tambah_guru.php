<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="p-5">
    <div class="container">
        <h1 class="mb-5 text-center">Tambah Data Guru</h1>
        <form action="../actions/tambah_guru_aksi.php" method="post" class="row g-3">
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="number" class="form-control" id="nip" name="NIP" required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="Nama" required>
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <select class="form-select" id="jabatan" name="jabatan" required>
                    <option value="" disabled selected>Pilih Jabatan</option>
                    <option value="Guru TKJ">Guru TKJ</option>
                    <option value="Guru TEI">Guru TEI</option>
                    <option value="Guru RPL">Guru RPL</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="../view_admin/guru.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
