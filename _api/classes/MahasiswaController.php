<?php

class MahasiswaController 
{
    private $conn;

    public function __construct($db) 
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT * FROM mahasiswa ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getDataById($id)
    {
        $query = "SELECT * FROM mahasiswa WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function store($data)
    {
        $query = "INSERT INTO mahasiswa (nim, nama, prodi) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $data['nim'], $data['nama'], $data['prodi']);
        $stmt->execute();

        return $this->getDataById($this->conn->insert_id);
    }

    public function update($id, $data)
    {
        if (!$this->getDataById($id)) {
            return false; // Data tidak ditemukan
        } else {
            $query = "UPDATE mahasiswa SET nim = ?, nama = ?, prodi = ? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sssi", $data['nim'], $data['nama'], $data['prodi'], $id);
            $stmt->execute();

            return $this->getDataById($id);
        }
    }

    public function destroy($id)
    {
        if (!$this->getDataById($id)) {
            return false; // Data tidak ditemukan
        } else {
            $query = "DELETE FROM mahasiswa WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        }
    }

    // Pengaturan untuk Datatable
    public function read_data($request)
    {
        $columns = ['id', 'nim', 'nama', 'nama_prodi', 'nama_jurusan'];
        
        $limit  = intval($request['length'] ?? 10);
        $start  = intval($request['start'] ?? 0);
        $search = $request['search']['value'] ?? '';

        $orderColumnIndex = $request['order'][0]['column'] ?? 0;
        $orderColumn = $columns[$orderColumnIndex] ?? 'id';
        $orderDir = $request['order'][0]['dir'] ?? 'asc';
        
        // Base Query
        $sql = "SELECT a.*, b.nama_prodi, c.nama_jurusan
            FROM mahasiswa a 
            INNER JOIN prodi b ON a.prodi=b.id 
            INNER JOIN jurusan c ON b.jurusan=c.id
            WHERE 1";
        
        // Search
        if (!empty($search)) {
            $sql .= " AND (nim LIKE ? OR nama LIKE ? OR nama_prodi LIKE ? OR nama_jurusan LIKE ?)";
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
        return $stmt->get_result();
    }

    public function countAll() 
    {
        $result = $this->conn->query("SELECT COUNT(*) as total FROM mahasiswa");
        return $result->fetch_assoc()['total'];
    }

    public function countFiltered($search) 
    {
        if (!empty($search)) {
            $query = "SELECT COUNT(*) as total FROM mahasiswa WHERE nim LIKE ? OR nama LIKE ?";
            $stmt = $this->conn->prepare($query);
            $searchTerm = "%$search%";
            $stmt->bind_param("ss", $searchTerm, $searchTerm);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc()['total'];
        }

        return $this->countAll();
    }
}