<?php
require_once '../config/Database.php';

$db = new Database();

if ($db->conn) {
    echo "Koneksi Database Berhasil!";
} else {
    echo "Koneksi Database Gagal!";
}
?>