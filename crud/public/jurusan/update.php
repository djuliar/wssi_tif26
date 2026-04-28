<?php
session_start();
include_once "../../config/Database.php";
include_once "../../classes/Jurusan.php";

$database = new Database();
$db = $database->getConnection();
$jurusan = new Jurusan($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_jurusan = $_POST['kode_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];
    $id = $_GET['id'];

    if ($jurusan->update($id, $kode_jurusan, $nama_jurusan)) {
        $_SESSION['message'] = "Data jurusan berhasil diupdate.";
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $db->error;
    }
}