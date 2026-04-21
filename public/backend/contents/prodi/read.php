<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/Database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Prodi.php';

$db = new Database();
$conn = $db->getConnection();

$model = new Prodi($conn);

// Ambil request DataTables
$request = $_POST;

$data = $model->getData($request);

$response = [
    "draw" => intval(@$request['draw']),
    "recordsTotal" => $model->countAll(),
    "recordsFiltered" => $model->countFiltered(@$request['search']['value']),
    "data" => $data
];

header('Content-Type: application/json');
echo json_encode($response);