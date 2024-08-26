<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$response = [];

try {
    $mysqli = new mysqli("localhost", "root", "", "simhes");

    if ($mysqli->connect_error) {
        $response['status'] = 'error';
        $response['message'] = 'Database connection failed';
        echo json_encode($response);
        exit();
    }

    $result = $mysqli->query("SELECT id_karyawan, nama_karyawan, nobadge, jabatan FROM karyawan");

    $karyawanList = [];
    while ($row = $result->fetch_assoc()) {
        $karyawanList[] = $row;
    }

    $response['status'] = 'success';
    $response['data'] = $karyawanList;

    $mysqli->close();
} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
