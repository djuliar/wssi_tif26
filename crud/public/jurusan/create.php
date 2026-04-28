<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jurusan</title>
</head>
<body>
    <h1>Tambah Jurusan</h1>
    <form action="store.php" method="post">
        <label for="kode_jurusan">Kode Jurusan:</label><br>
        <input type="text" id="kode_jurusan" name="kode_jurusan" required><br><br>
        <label for="nama_jurusan">Nama Jurusan:</label><br>
        <input type="text" id="nama_jurusan" name="nama_jurusan" required><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>