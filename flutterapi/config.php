<?php
$servername = "127.0.0.1"; // Nama server, biasanya "localhost"
$username = "root"; // Nama pengguna database
$password = ""; // Kata sandi pengguna database
$dbname = "simhes"; // Nama database yang digunakan

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    // echo 'koneksi berhasil';
}
