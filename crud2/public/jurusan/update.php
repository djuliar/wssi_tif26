<?php
session_start();
require_once '../../config/Database.php';
require_once '../../classes/Jurusan.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_jurusan = $_POST['kode_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];
    $id = $_GET['id'];

    $database = new Database();
    $db = $database->getConnection();

    $jurusan = new Jurusan($db);
    $result = $jurusan->update($kode_jurusan, $nama_jurusan, $id);

    if ($result) {
        $_SESSION['message'] = "Jurusan berhasil diperbaharui.";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['message'] = "Gagal memperbaharui jurusan.";
        header("Location: edit.php");
        exit();
    }
} else {
    header("Location: edit.php");
    exit();
}