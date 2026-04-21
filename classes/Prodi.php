<?php
class Prodi {
    private $conn;
    private $table = "prodi";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getData($request) {
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
            $data[] = [
                'id' => $row['id'],
                'kode_prodi' => $row['kode_prodi'],
                'nama_prodi' => $row['nama_prodi'],
                'jenjang' => $row['jenjang'],
                'jurusan' => $row['jurusan'],
                'action' => "<a href='?page=prodi&action=edit&id=" . $row['id'] . "' class='btn btn-sm btn-warning btn-edit' data-id='".$row['id']."'><i class='bi bi-pencil'></i> Edit</a> <button class='btn btn-sm btn-danger btn-delete' data-id='".$row['id']."'><i class='bi bi-trash'></i></button>"
            ];
        }


        return $data;
    }

    public function countAll() {
        $result = $this->conn->query("SELECT COUNT(*) as total FROM {$this->table}");
        return $result->fetch_assoc()['total'];
    }

    public function countFiltered($search) {
        if (!empty($search)) {
            $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM {$this->table} WHERE nama_prodi LIKE ? OR kode_prodi LIKE ?");
            $searchTerm = "%$search%";
            $stmt->bind_param("ss", $searchTerm, $searchTerm);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc()['total'];
        }
        return $this->countAll();
    }
}