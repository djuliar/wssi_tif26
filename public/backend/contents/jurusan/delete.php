<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/Database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Jurusan.php';

$db = new Database();
$conn = $db->getConnection();

$jurusan = new Jurusan($conn);

$id = $_POST['id'];
$result = $jurusan->delete($id);

if ($result['status']) {
    echo $result['message'];
    $_SESSION['success'] = $result['message'];
} else {
    echo $result['message'];
    $_SESSION['error'] = $result['message'];
}