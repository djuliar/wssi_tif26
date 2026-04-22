<?php
class Jurusan {
    private $conn;
    private $table = "jurusan";

    public function __construct($db) {
        $this->conn = $db;
    }

    // READ
    public function getAll() {
        return $this->conn->query("SELECT * FROM $this->table");
    }

    // CREATE
    public function store($data) {
        $stmt = $this->conn->prepare("INSERT INTO $this->table(kode_jurusan,nama_jurusan) VALUES (?,?)");
        $stmt->bind_param("ss", $data['kode'], $data['nama']);
        if ($stmt->execute()) {
            return [
                'status' => true,
                'message' => 'Data jurusan berhasil disimpan!'
            ];
        }

        return [
            'status' => false,
            'message' => 'Gagal menyimpan data: ' . $stmt->error
        ];
    }

    // UPDATE
    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE $this->table SET kode_jurusan=?, nama_jurusan=? WHERE id=?");
        $stmt->bind_param("ssi", $data['kode'], $data['nama'], $id);
        if ($stmt->execute()) {
            return [
                'status' => true,
                'message' => 'Data jurusan berhasil diperbarui'
            ];
        }
    
        return [
            'status' => false,
            'message' => 'Gagal update: ' . $stmt->error
        ];
    }

    // DELETE
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return [
                'status' => true,
                'message' => 'Data Berhasil Dihapus!'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Data Gagal Dihapus!'
            ];
        }
    }

    public function getJurusanById($id) 
    {
        // Assuming $this->db is a mysqli connection
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id); // "i" means integer
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // Returns data as an array
    }
}
?>