<?php

class Jurusan {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM jurusan ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    function create($kode_jurusan, $nama_jurusan) {
        $query = "INSERT INTO jurusan (kode_jurusan, nama_jurusan) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $kode_jurusan, $nama_jurusan);
        return $stmt->execute();
    }

    function update($kode_jurusan, $nama_jurusan, $id) {
        $query = "UPDATE jurusan SET kode_jurusan = ?, nama_jurusan = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $kode_jurusan, $nama_jurusan, $id);
        return $stmt->execute();
    }

    function getJurusanById($id) {
        $query = "SELECT * FROM jurusan WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    function destroy($id) {
        $query = "DELETE FROM jurusan WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}