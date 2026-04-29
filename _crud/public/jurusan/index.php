<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jurusan</title>
</head>
<body>
    <?php
    require_once '../../config/Database.php';
    require_once '../../classes/Jurusan.php';

    $database = new Database();
    $db = $database->getConnection();

    $jurusan = new Jurusan($db);
    $result = $jurusan->getAll();
    ?>
    <a href="create.php">Tambah Jurusan</a>
    <?php
    session_start();
    if (isset($_SESSION['message'])) {
        echo "<p>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
    }
    ?>
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Jurusan</th>
                <th>Nama Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['kode_jurusan'] . "</td>";
                    echo "<td>" . $row['nama_jurusan'] . "</td>";
                    echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Apakah anda yakin?')\">Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>