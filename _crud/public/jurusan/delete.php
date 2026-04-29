<?php
session_start();
require_once '../../config/Database.php';
require_once '../../classes/Jurusan.php';

$id = $_GET['id'];

$database = new Database();
$db = $database->getConnection();

$jurusan = new Jurusan($db);
$result = $jurusan->destroy($id);

if ($result) {
    $_SESSION['message'] = "Jurusan berhasil dihapus.";
    header("Location: index.php");
    exit();
} else {
    $_SESSION['message'] = "Gagal menghapus jurusan.";
    header("Location: index.php?id=" . $id);
    exit();
}