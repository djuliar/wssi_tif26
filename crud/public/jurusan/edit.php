<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jurusan</title>
</head>
<body>
    <h1>Tambah Jurusan</h1>
    <?php
    require_once "../../config/Database.php";
    require_once "../../classes/Jurusan.php";
    $database = new Database();
    $db = $database->getConnection();
    $jurusan = new Jurusan($db);
    $id = $_GET['id'];
    $data = $jurusan->getById($id);
    ?>
    <form action="update.php?id=<?php echo $_GET['id']; ?>" method="post">
        <label for="kode_jurusan">Kode Jurusan:</label><br>
        <input type="text" id="kode_jurusan" name="kode_jurusan" required value="<?php echo $data['kode_jurusan'] ?>"><br><br>
        <label for="nama_jurusan">Nama Jurusan:</label><br>
        <input type="text" id="nama_jurusan" name="nama_jurusan" required value="<?php echo $data['nama_jurusan'] ?>"><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>