<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$response = [];

try {
    // Ambil data POST
    $id_karyawan = $_POST['id_karyawan'];
    $tanggal = $_POST['tanggal'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $nobadge = $_POST['nobadge'];
    $jabatan = $_POST['jabatan'];
    $uraian = $_POST['uraian'];
    $penyebab = $_POST['penyebab'];
    $tingkat_insiden = $_POST['tingkat_insiden'];
    $nlti = $_POST['nlti'];
    $tli = $_POST['tli'];
    $day_lost = $_POST['day_lost'];

    // Lakukan koneksi ke database
    $mysqli = new mysqli("localhost", "root", "", "simhes");

    if ($mysqli->connect_error) {
        $response['status'] = 'error';
        $response['message'] = 'Database connection failed';
        echo json_encode($response);
        exit();
    }

    // Query untuk memasukkan data
    $query = "INSERT INTO insiden_kerja (id_karyawan, tanggal, nama_karyawan, nobadge, jabatan, uraian, penyebab, tingkat_insiden, nlti, tli, day_lost) 
              VALUES ('$id_karyawan', '$tanggal', '$nama_karyawan', '$nobadge', '$jabatan', '$uraian', '$penyebab', '$tingkat_insiden','$nlti','$tli', '$day_lost')";

    if ($mysqli->query($query) === TRUE) {
        $response['status'] = 'success';
    } else {
        $response['status'] = 'error';
        $response['message'] = $mysqli->error;
    }

    $mysqli->close();
} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
