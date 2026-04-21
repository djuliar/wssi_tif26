<?php
require_once '../../config/Database.php';

$db = new Database();
$conn = $db->getConnection();

$id = $_POST['id'];

$stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>console.log('success');</script>";
} else {
    echo "<script>console.log('error');</script>";
}