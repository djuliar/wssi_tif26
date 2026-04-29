<?php
session_start();
require_once '../../config/Database.php';
require_once '../../classes/Jurusan.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_jurusan = $_POST['kode_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];

    $database = new Database();
    $db = $database->getConnection();

    $jurusan = new Jurusan($db);
    $result = $jurusan->create($kode_jurusan, $nama_jurusan);

    if ($result) {
        $_SESSION['message'] = "Jurusan berhasil ditambahkan.";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['message'] = "Gagal menambahkan jurusan.";
        header("Location: create.php");
        exit();
    }
} else {
    header("Location: create.php");
    exit();
}

?>