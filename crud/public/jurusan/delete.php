<?php
session_start();
include_once "../../config/Database.php";
include_once "../../classes/Jurusan.php";
$database = new Database();
$db = $database->getConnection();
$jurusan = new Jurusan($db);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($jurusan->destroy($_GET['id'])) {
        $_SESSION['message'] = "Data jurusan berhasil dihapus.";
    } else {
        $_SESSION['message'] = "Error: " . $db->error;
    }

    header("Location: index.php");
    exit();
}