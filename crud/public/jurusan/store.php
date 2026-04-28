<?php
session_start();
include_once "../../config/Database.php";
include_once "../../classes/Jurusan.php";

$database = new Database();
$db = $database->getConnection();

$jurusan = new Jurusan($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_jurusan = $_POST['kode_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];
    
    if ($jurusan->create($kode_jurusan, $nama_jurusan)) {
        $_SESSION['message'] = "Jurusan berhasil ditambahkan.";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['message'] = "Gagal menambahkan jurusan.";
        header("Location: create.php");
        exit();
    }
}

?>