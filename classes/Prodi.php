<?php
class Prodi {
    private $conn;
    private $table = "prodi";

    public function __construct($db) 
    {
        $this->conn = $db;
    }

    public function getData($request) 
    {
        $columns = ['id', 'kode_prodi', 'nama_prodi', 'jenjang', 'jurusan'];

        $limit  = intval($request['length'] ?? 10);
        $start  = intval($request['start'] ?? 0);
        $search = $request['search']['value'] ?? '';

        $orderColumnIndex = $request['order'][0]['column'] ?? 0;
        $orderColumn = $columns[$orderColumnIndex] ?? 'id';
        $orderDir = $request['order'][0]['dir'] ?? 'asc';

        // Base query
        $sql = "SELECT * FROM {$this->table} WHERE 1";

        // Search
        if (!empty($search)) {
            $sql .= " AND (nama_prodi LIKE ? OR kode_prodi LIKE ? OR jenjang LIKE ? OR jurusan LIKE ?)";
        }

        // Order & Limit
        $sql .= " ORDER BY $orderColumn $orderDir LIMIT ?, ?";

        $stmt = $this->conn->prepare($sql);

        if (!empty($search)) {
            $searchTerm = "%$search%";
            $stmt->bind_param("ssssii", $searchTerm, $searchTerm, $searchTerm, $searchTerm, $start, $limit);
        } else {
            $stmt->bind_param("ii", $start, $limit);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $jurusan_query = $this->conn->query("SELECT * FROM jurusan WHERE id='". $row['jurusan'] ."'");
            $jurusan_name = $jurusan_query->fetch_assoc();

            $data[] = [
                'id' => $row['id'],
                'kode_prodi' => $row['kode_prodi'],
                'nama_prodi' => $row['nama_prodi'],
                'jenjang' => $row['jenjang'],
                'jurusan' => $jurusan_name['nama_jurusan'],
                'action' => "<a href='?page=prodi&action=edit&id=" . $row['id'] . "' class='btn btn-sm btn-warning btn-edit' data-id='".$row['id']."'><i class='bi bi-pencil'></i> Edit</a> <button class='btn btn-sm btn-danger btn-delete' data-id='".$row['id']."'><i class='bi bi-trash'></i></button>"
            ];
        }

        return $data;
    }

    public function countAll() 
    {
        $result = $this->conn->query("SELECT COUNT(*) as total FROM {$this->table}");
        return $result->fetch_assoc()['total'];
    }

    public function countFiltered($search) 
    {
        if (!empty($search)) {
            $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM {$this->table} WHERE nama_prodi LIKE ? OR kode_prodi LIKE ?");
            $searchTerm = "%$search%";
            $stmt->bind_param("ss", $searchTerm, $searchTerm);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc()['total'];
        }
        return $this->countAll();
    }

    public function getJurusan() 
    {
        $sql = "SELECT * FROM jurusan ORDER BY id ASC";
        $result = $this->conn->query($sql);
    
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    
        return $data;
    }

    public function store($data) 
    {
        // Validasi sederhana
        if (empty($data['kode_prodi']) || empty($data['nama_prodi']) || empty($data['jenjang'])) {
            return [
                'status' => false,
                'message' => 'Field wajib tidak boleh kosong'
            ];
        }

        // Sanitasi input
        $kode_prodi = trim($data['kode_prodi']);
        $nama_prodi = trim($data['nama_prodi']);
        $jenjang    = trim($data['jenjang']);
        $jurusan   = isset($data['jurusan']) ? trim($data['jurusan']) : null;

        // Cek duplikasi kode_prodi
        $check = $this->conn->prepare("SELECT id FROM {$this->table} WHERE kode_prodi = ?");
        $check->bind_param("s", $kode_prodi);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            return [
                'status' => false,
                'message' => 'Gagal Simpan! Kode prodi sudah digunakan.'
            ];
        }

        // Insert data
        $stmt = $this->conn->prepare("
            INSERT INTO {$this->table} (kode_prodi, nama_prodi, jenjang, jurusan)
            VALUES (?, ?, ?, ?)
        ");

        $stmt->bind_param("ssss", $kode_prodi, $nama_prodi, $jenjang, $jurusan);

        if ($stmt->execute()) {
            return [
                'status' => true,
                'message' => 'Data prodi berhasil disimpan!'
            ];
        }

        return [
            'status' => false,
            'message' => 'Gagal menyimpan data: ' . $stmt->error
        ];
    }

    public function getProdiById($id) 
    {
        // Assuming $this->db is a mysqli connection
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id); // "i" means integer
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // Returns data as an array
    }

    public function update($id, $data) 
    {
        // Validasi ID
        $id = intval($id);
        if ($id <= 0) {
            return [
                'status' => false,
                'message' => 'ID tidak valid'
            ];
        }
    
        // Validasi field wajib
        if (empty($data['kode_prodi']) || empty($data['nama_prodi']) || empty($data['jenjang'])) {
            return [
                'status' => false,
                'message' => 'Field wajib tidak boleh kosong'
            ];
        }
    
        // Sanitasi input
        $kode_prodi = trim($data['kode_prodi']);
        $nama_prodi = trim($data['nama_prodi']);
        $jenjang    = trim($data['jenjang']);
        $jurusan   = isset($data['jurusan']) ? trim($data['jurusan']) : null;
    
        // Validasi ENUM jenjang
        $allowed = ['D3','D4','S1','S2'];
        if (!in_array($jenjang, $allowed)) {
            return [
                'status' => false,
                'message' => 'Jenjang tidak valid'
            ];
        }
    
        // Cek apakah data ada
        $checkId = $this->conn->prepare("SELECT id FROM {$this->table} WHERE id = ?");
        $checkId->bind_param("i", $id);
        $checkId->execute();
        $resultId = $checkId->get_result();
    
        if ($resultId->num_rows === 0) {
            return [
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ];
        }
    
        // Cek duplikasi kode_prodi (kecuali dirinya sendiri)
        $checkKode = $this->conn->prepare("SELECT id FROM {$this->table} WHERE kode_prodi = ? AND id != ?");
        $checkKode->bind_param("si", $kode_prodi, $id);
        $checkKode->execute();
        $checkKode->store_result();
    
        if ($checkKode->num_rows > 0) {
            return [
                'status' => false,
                'message' => 'Kode prodi sudah digunakan'
            ];
        }
    
        // Query update
        $stmt = $this->conn->prepare("
            UPDATE {$this->table}
            SET kode_prodi = ?, nama_prodi = ?, jenjang = ?, jurusan = ?
            WHERE id = ?
        ");
    
        $stmt->bind_param("ssssi", $kode_prodi, $nama_prodi, $jenjang, $jurusan, $id);
    
        if ($stmt->execute()) {
            return [
                'status' => true,
                'message' => 'Data prodi berhasil diperbarui'
            ];
        }
    
        return [
            'status' => false,
            'message' => 'Gagal update: ' . $stmt->error
        ];
    }

    public function destroy($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id); // "i" means the variable is an integer
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
}