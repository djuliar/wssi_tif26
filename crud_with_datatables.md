Berikut **kode lengkap CRUD PHP Native OOP** untuk tabel `jurusan` pada database `db_kampus`, sekaligus menampilkan data dengan **DataTables (client-side)**. Struktur dibuat sederhana namun tetap rapi dan siap dikembangkan.

---

# 1. Struktur Project

```bash
project/
├── config/
│   └── Database.php
├── classes/
│   └── Jurusan.php
├── index.php          # tampil data + datatable
├── create.php         # form tambah
├── store.php          # proses simpan
├── edit.php           # form edit
├── update.php         # proses update
├── delete.php         # proses hapus
```

---

# 2. Database

```sql
CREATE DATABASE db_kampus;

USE db_kampus;

CREATE TABLE jurusan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_jurusan VARCHAR(10) NOT NULL UNIQUE,
    nama_jurusan VARCHAR(100) NOT NULL
);
```

---

# 3. Koneksi Database (config/Database.php)

```php
<?php
class Database {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost","root","","db_kampus");

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
```

---

# 4. Model OOP (classes/Jurusan.php)

```php
<?php
class Jurusan {
    private $conn;
    private $table = "jurusan";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        return $this->conn->query("SELECT * FROM $this->table ORDER BY id DESC");
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function store($kode, $nama) {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (kode_jurusan,nama_jurusan) VALUES (?,?)");
        $stmt->bind_param("ss", $kode, $nama);
        return $stmt->execute();
    }

    public function update($id, $kode, $nama) {
        $stmt = $this->conn->prepare("UPDATE $this->table SET kode_jurusan=?, nama_jurusan=? WHERE id=?");
        $stmt->bind_param("ssi", $kode, $nama, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
```

---

# 5. Tampil Data + DataTables (index.php)

```php
<?php
require_once 'config/Database.php';
require_once 'classes/Jurusan.php';

$db = new Database();
$conn = $db->getConnection();

$model = new Jurusan($conn);
$result = $model->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Jurusan</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>

<h2>Data Jurusan</h2>
<a href="create.php">+ Tambah Data</a>

<table id="tableJurusan" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; while($row=$result->fetch_assoc()): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['kode_jurusan']) ?></td>
            <td><?= htmlspecialchars($row['nama_jurusan']) ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#tableJurusan').DataTable();
});
</script>

</body>
</html>
```

---

# 6. Form Tambah (create.php)

```php
<form action="store.php" method="POST">
    <input type="text" name="kode" placeholder="Kode Jurusan" required>
    <input type="text" name="nama" placeholder="Nama Jurusan" required>
    <button type="submit">Simpan</button>
</form>
```

---

# 7. Proses Simpan (store.php)

```php
<?php
require_once 'config/Database.php';
require_once 'classes/Jurusan.php';

$db = new Database();
$model = new Jurusan($db->getConnection());

$model->store($_POST['kode'], $_POST['nama']);

header("Location: index.php");
```

---

# 8. Form Edit (edit.php)

```php
<?php
require_once 'config/Database.php';
require_once 'classes/Jurusan.php';

$db = new Database();
$model = new Jurusan($db->getConnection());

$data = $model->getById($_GET['id']);
?>

<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <input type="text" name="kode" value="<?= $data['kode_jurusan'] ?>">
    <input type="text" name="nama" value="<?= $data['nama_jurusan'] ?>">
    <button type="submit">Update</button>
</form>
```

---

# 9. Proses Update (update.php)

```php
<?php
require_once 'config/Database.php';
require_once 'classes/Jurusan.php';

$db = new Database();
$model = new Jurusan($db->getConnection());

$model->update($_POST['id'], $_POST['kode'], $_POST['nama']);

header("Location: index.php");
```

---

# 10. Delete (delete.php)

```php
<?php
require_once 'config/Database.php';
require_once 'classes/Jurusan.php';

$db = new Database();
$model = new Jurusan($db->getConnection());

$model->delete($_GET['id']);

header("Location: index.php");
```
