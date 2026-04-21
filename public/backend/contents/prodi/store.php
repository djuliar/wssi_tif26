<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/Database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Prodi.php';

$db = new Database();
$conn = $db->getConnection();

$prodi = new Prodi($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $result = $prodi->store($_POST);

    if ($result['status']) {
        // sukses
        $_SESSION['success'] = $result['message'];
    } else {
		// gagal
        $_SESSION['error'] = $result['message'];
    }
    
    header("Location: ../../dashboard.php?page=prodi");
    exit;
}
?>