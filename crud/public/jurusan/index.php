<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP OOP</title>
</head>
<body>
    <h1>Data Jurusan</h1>
    <?php
    session_start();
    if (isset($_SESSION['message'])) {
        echo "<p>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
    }
    ?>
    <a href="create.php">Tambah Jurusan</a>
    <table border="1" cellspacing="0" cellpadding="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Jurusan</th>
                <th>Nama Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once "../../config/Database.php";
            include_once "../../classes/Jurusan.php";
            $database = new Database();
            $db = $database->getConnection();

            $jurusan = new Jurusan($db);
            $result = $jurusan->getAll();
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row['kode_jurusan'] . "</td>";
                echo "<td>" . $row['nama_jurusan'] . "</td>";
                echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Apakah anda yakin?')\">Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>