<?php
header('Content-Type: application/json; charset=utf-8');

require_once '../config/Database.php';
require_once '../app/controllers/MahasiswaController.php';

$database = new Database();
$db = $database->getConnection();
$mahasiswa = new MahasiswaController($db);

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $mhs = $mahasiswa->read_data();
        $data = [
            'status' => 'success',
            'method' => 'GET',
            'message' => 'Data berhasil diambil',
            'count' => $mhs->num_rows,
            'data' => $mhs->fetch_all(MYSQLI_ASSOC),
        ];
        break;

    case 'POST':
        $post = [
            'nim' => $_POST['nim'] ?? null,
            'nama' => $_POST['nama'] ?? null,
            'prodi' => $_POST['prodi'] ?? null,
        ];
        
        if($mhs = $mahasiswa->store($post)) {
            $data = [
                'status' => 'success',
                'method' => 'POST',
                'message' => 'Data berhasil disimpan',
                'data' => $mhs,
            ];
            http_response_code(201);
        } else {
            $data = [
                'status' => 'error',
                'method' => 'POST',
                'message' => 'Gagal menyimpan data',
            ];
            http_response_code(400);
        }
        break;

    case 'PUT':
        parse_str(file_get_contents("php://input"), $_PUT);
        $id = $_PUT['id'] ?? null;
        $put = [
            'nim' => $_PUT['nim'] ?? null,
            'nama' => $_PUT['nama'] ?? null,
            'prodi' => $_PUT['prodi'] ?? null,
        ];

        if($mhs = $mahasiswa->update($id, $put)) {
            $data = [
                'status' => 'success',
                'method' => 'PUT',
                'message' => 'Data berhasil diupdate',
                'data' => $mhs,
            ];
            http_response_code(200);
        } else {
            $data = [
                'status' => 'error',
                'method' => 'PUT',
                'message' => 'Gagal mengupdate data',
            ];
            http_response_code(400);
        }
        break;

    case 'DELETE':
        $id = $_GET['id'] ?? null;
        if($mahasiswa->destroy($id)) {
            $data = [
                'status' => 'success',
                'method' => 'DELETE',
                'message' => 'Data berhasil dihapus',
                'data' => []
            ];
            http_response_code(200);
        } else {
            $data = [
                'status' => 'error',
                'method' => 'DELETE',
                'message' => 'Gagal menghapus data',
            ];
            http_response_code(400);
        }
        break;
    default:
        $data = [
            'status' => 'error',
            'message' => 'Metode tidak diizinkan'
        ];
        http_response_code(405);
        break;
}

echo json_encode($data);
?>