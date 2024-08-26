<?php
include 'config.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');

// Mendapatkan data dari request
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['username']) && isset($data['password'])) {
    $username = $data['username'];
    $password = $data['password'];

    // Memeriksa apakah username dan password sesuai
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    $response = [];

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi password
        if ($password === $user['password']) {
            if ($user['level'] === 'hescoordinator') {
                $response = ["status" => "success", "message" => "Login successful"];
            } else {
                $response = ["status" => "error", "message" => "Access denied"];
            }
        } else {
            $response = ["status" => "error", "message" => "Invalid password"];
        }
    } else {
        $response = ["status" => "error", "message" => "User not found"];
    }
} else {
    $response = ["status" => "error", "message" => "Invalid input"];
}

echo json_encode($response);
$conn->close();
