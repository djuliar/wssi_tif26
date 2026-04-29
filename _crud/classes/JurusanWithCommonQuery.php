<?php

class Jurusan {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM jurusan ORDER BY id DESC";
        $result = $this->conn->query($query);
        return $result;
    }

    public function create($kode_jurusan, $nama_jurusan) {
        $query = "INSERT INTO jurusan (kode_jurusan, nama_jurusan) VALUES ('$kode_jurusan', '$nama_jurusan')";
        $result = $this->conn->query($query);
        return $result;
    }

    function getById($id) {
        $query = "SELECT * FROM jurusan WHERE id = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    function update($id, $kode_jurusan, $nama_jurusan) {
        $query = "UPDATE jurusan SET kode_jurusan='$kode_jurusan', nama_jurusan='$nama_jurusan' WHERE id=$id";
        $result = $this->conn->query($query);
        return $result;
    }

    function destroy($id) {
        $query = "DELETE FROM jurusan WHERE id = $id";
        $result = $this->conn->query($query);
        return $result;
    }
}