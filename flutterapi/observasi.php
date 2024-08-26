<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');

// Mendapatkan data dari permintaan POST
$data = json_decode(file_get_contents("php://input"));

// Pastikan mengakses setiap nilai yang diperlukan
$tanggal = $data->tanggal;
$id_karyawan = $data->id_karyawan;
$observasi_diri_sendiri = $data->observasi_diri_sendiri;
$coach = $data->coach;
$lokasi_observasi = $data->lokasi_observasi;
$jumlah_observasi = $data->jumlah_observasi;
$golongan_observasi = $data->golongan_observasi;
$organisasi_observasi = $data->organisasi_observasi;
$perusahaan_kontraktor = $data->perusahaan_kontraktor;
$perilaku_selamat = $data->perilaku_selamat;
$perilaku_beresiko = $data->perilaku_beresiko;
$ketika = $data->ketika;
$ditemukan = $data->ditemukan;
$sebab = $data->sebab;
$saran = $data->saran;
$setuju_perilaku_terjadi = $data->setuju_perilaku_terjadi;
$setuju_perilaku_beresiko = $data->setuju_perilaku_beresiko;
$bentuk_perilaku_selamat = $data->bentuk_perilaku_selamat;
$tindak_lanjut = $data->tindak_lanjut;
$komentar = $data->komentar;

// Kolom 1.1
$kolom_1_1 = $data->{'1.1'};
// Kolom 1.2
$kolom_1_2 = $data->{'1.2'};
// Kolom 1.3
$kolom_1_3 = $data->{'1.3'};
// Kolom 1.4
$kolom_1_4 = $data->{'1.4'};
// Kolom 1.5
$kolom_1_5 = $data->{'1.5'};

$kolom_2_1 = $data->{'2.1'};
$kolom_2_2 = $data->{'2.2'};
$kolom_2_3 = $data->{'2.3'};
$kolom_2_4 = $data->{'2.4'};
$kolom_3_1 = $data->{'3.1'};
$kolom_3_2 = $data->{'3.2'};
$kolom_4_1 = $data->{'4.1'};
$kolom_4_2 = $data->{'4.2'};
$kolom_4_3 = $data->{'4.3'};
$kolom_4_4 = $data->{'4.4'};
$kolom_4_5 = $data->{'4.5'};
$kolom_4_7 = $data->{'4.7'};
$kolom_5_1 = $data->{'5.1'};
$kolom_5_2 = $data->{'5.2'};
$kolom_5_3 = $data->{'5.3'};
$kolom_6_1 = $data->{'6.1'};
$kolom_6_2 = $data->{'6.2'};
$kolom_6_3 = $data->{'6.3'};
$kolom_6_4 = $data->{'6.4'};
$kolom_6_5 = $data->{'6.5'};
$kolom_6_6 = $data->{'6.6'};
$kolom_6_7 = $data->{'6.7'};
$kolom_6_8 = $data->{'6.8'};
$kolom_6_9 = $data->{'6.9'};
$kolom_6_10 = $data->{'6.10'};
$kolom_7_1 = $data->{'7.1'};
$kolom_7_2 = $data->{'7.2'};
$kolom_7_3 = $data->{'7.3'};
$kolom_8_1 = $data->{'8.1'};
$kolom_8_2 = $data->{'8.2'};
$kolom_8_3 = $data->{'8.3'};
$kolom_8_4 = $data->{'8.4'};
$kolom_8_5 = $data->{'8.5'};
$kolom_8_6 = $data->{'8.6'};
$kolom_8_7 = $data->{'8.7'};
$kolom_8_8 = $data->{'8.8'};
$kolom_8_9 = $data->{'8.9'};
$kolom_9_1 = $data->{'9.1'};
$kolom_9_2 = $data->{'9.2'};
$kolom_9_3 = $data->{'9.3'};
$kolom_9_4 = $data->{'9.4'};
$kolom_9_5 = $data->{'9.5'};
$kolom_9_6 = $data->{'9.6'};
$kolom_9_7 = $data->{'9.7'};
$kolom_9_8 = $data->{'9.8'};
$kolom_9_9 = $data->{'9.9'};
$kolom_10_1 = $data->{'10.1'};
$kolom_10_2 = $data->{'10.2'};
$kolom_10_3 = $data->{'10.3'};
$kolom_10_4 = $data->{'10.4'};
$kolom_11_0 = $data->{'11.0'};

try {
    $pdo = new PDO('mysql:host=localhost;dbname=simhes', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO observasi (
            tanggal, id_karyawan, observasi_diri_sendiri, coach, lokasi_observasi, jumlah_observasi, 
            golongan_observasi, organisasi_observasi, perusahaan_kontraktor, 
            `1.1`, `1.2`, `1.3`, `1.4`, `1.5`, 
            `2.1`, `2.2`, `2.3`, `2.4`, 
            `3.1`, `3.2`, 
            `4.1`, `4.2`, `4.3`, `4.4`, `4.5`, `4.7`, 
            `5.1`, `5.2`, `5.3`, 
            `6.1`, `6.2`, `6.3`, `6.4`, `6.5`, `6.6`, `6.7`, `6.8`, `6.9`, `6.10`, 
            `7.1`, `7.2`, `7.3`, 
            `8.1`, `8.2`, `8.3`, `8.4`, `8.5`, `8.6`, `8.7`, `8.8`, `8.9`, 
            `9.1`, `9.2`, `9.3`, `9.4`, `9.5`, `9.6`, `9.7`, `9.8`, `9.9`, 
            `10.1`, `10.2`, `10.3`, `10.4`, 
            `11.0`, perilaku_selamat, perilaku_beresiko, ketika, ditemukan, sebab, saran, setuju_perilaku_terjadi, setuju_perilaku_beresiko, bentuk_perilaku_selamat, tindak_lanjut, komentar
        ) 
        VALUES (
            :tanggal, :id_karyawan, :observasi_diri_sendiri, :coach, :lokasi_observasi, :jumlah_observasi, 
            :golongan_observasi, :organisasi_observasi, :perusahaan_kontraktor, 
            :kolom_1_1, :kolom_1_2, :kolom_1_3, :kolom_1_4, :kolom_1_5, 
            :kolom_2_1, :kolom_2_2, :kolom_2_3, :kolom_2_4, 
            :kolom_3_1, :kolom_3_2, 
            :kolom_4_1, :kolom_4_2, :kolom_4_3, :kolom_4_4, :kolom_4_5,:kolom_4_7, 
            :kolom_5_1, :kolom_5_2, :kolom_5_3, 
            :kolom_6_1, :kolom_6_2, :kolom_6_3, :kolom_6_4, :kolom_6_5, :kolom_6_6, :kolom_6_7, :kolom_6_8, :kolom_6_9, :kolom_6_10, 
            :kolom_7_1, :kolom_7_2, :kolom_7_3, 
            :kolom_8_1, :kolom_8_2, :kolom_8_3, :kolom_8_4, :kolom_8_5, :kolom_8_6, :kolom_8_7, :kolom_8_8, :kolom_8_9, 
            :kolom_9_1, :kolom_9_2, :kolom_9_3, :kolom_9_4, :kolom_9_5, :kolom_9_6, :kolom_9_7, :kolom_9_8, :kolom_9_9, 
            :kolom_10_1, :kolom_10_2, :kolom_10_3, :kolom_10_4, 
            :kolom_11_0, :perilaku_selamat, :perilaku_beresiko, :ketika, :ditemukan, :sebab, :saran, :setuju_perilaku_terjadi, :setuju_perilaku_beresiko, :bentuk_perilaku_selamat, :tindak_lanjut, :komentar
        )";


    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':tanggal', $tanggal);
    $stmt->bindParam(':id_karyawan', $id_karyawan);
    $stmt->bindParam(':observasi_diri_sendiri', $observasi_diri_sendiri);
    $stmt->bindParam(':coach', $coach);
    $stmt->bindParam(':lokasi_observasi', $lokasi_observasi);
    $stmt->bindParam(':jumlah_observasi', $jumlah_observasi);
    $stmt->bindParam(':golongan_observasi', $golongan_observasi);
    $stmt->bindParam(':organisasi_observasi', $organisasi_observasi);
    $stmt->bindParam(':perusahaan_kontraktor', $perusahaan_kontraktor);
    $stmt->bindParam(':kolom_1_1', $kolom_1_1);
    $stmt->bindParam(':kolom_1_2', $kolom_1_2);
    $stmt->bindParam(':kolom_1_3', $kolom_1_3);
    $stmt->bindParam(':kolom_1_4', $kolom_1_4);
    $stmt->bindParam(':kolom_1_5', $kolom_1_5);
    // Lanjutkan binding untuk kolom-kolom lainnya

    $stmt->bindParam(':kolom_2_1', $kolom_2_1);
    $stmt->bindParam(':kolom_2_2', $kolom_2_2);
    $stmt->bindParam(':kolom_2_3', $kolom_2_3);
    $stmt->bindParam(':kolom_2_4', $kolom_2_4);
    $stmt->bindParam(':kolom_3_1', $kolom_3_1);
    $stmt->bindParam(':kolom_3_2', $kolom_3_2);
    $stmt->bindParam(':kolom_4_1', $kolom_4_1);
    $stmt->bindParam(':kolom_4_2', $kolom_4_2);
    $stmt->bindParam(':kolom_4_3', $kolom_4_3);
    $stmt->bindParam(':kolom_4_4', $kolom_4_4);
    $stmt->bindParam(':kolom_4_5', $kolom_4_5);
    $stmt->bindParam(':kolom_4_7', $kolom_4_7);
    $stmt->bindParam(':kolom_5_1', $kolom_5_1);
    $stmt->bindParam(':kolom_5_2', $kolom_5_2);
    $stmt->bindParam(':kolom_5_3', $kolom_5_3);
    $stmt->bindParam(':kolom_6_1', $kolom_6_1);
    $stmt->bindParam(':kolom_6_2', $kolom_6_2);
    $stmt->bindParam(':kolom_6_3', $kolom_6_3);
    $stmt->bindParam(':kolom_6_4', $kolom_6_4);
    $stmt->bindParam(':kolom_6_5', $kolom_6_5);
    $stmt->bindParam(':kolom_6_6', $kolom_6_6);
    $stmt->bindParam(':kolom_6_7', $kolom_6_7);
    $stmt->bindParam(':kolom_6_8', $kolom_6_8);
    $stmt->bindParam(':kolom_6_9', $kolom_6_9);
    $stmt->bindParam(':kolom_6_10', $kolom_6_10);
    $stmt->bindParam(':kolom_7_1', $kolom_7_1);
    $stmt->bindParam(':kolom_7_2', $kolom_7_2);
    $stmt->bindParam(':kolom_7_3', $kolom_7_3);
    $stmt->bindParam(':kolom_8_1', $kolom_8_1);
    $stmt->bindParam(':kolom_8_2', $kolom_8_2);
    $stmt->bindParam(':kolom_8_3', $kolom_8_3);
    $stmt->bindParam(':kolom_8_4', $kolom_8_4);
    $stmt->bindParam(':kolom_8_5', $kolom_8_5);
    $stmt->bindParam(':kolom_8_6', $kolom_8_6);
    $stmt->bindParam(':kolom_8_7', $kolom_8_7);
    $stmt->bindParam(':kolom_8_8', $kolom_8_8);
    $stmt->bindParam(':kolom_8_9', $kolom_8_9);
    $stmt->bindParam(':kolom_9_1', $kolom_9_1);
    $stmt->bindParam(':kolom_9_2', $kolom_9_2);
    $stmt->bindParam(':kolom_9_3', $kolom_9_3);
    $stmt->bindParam(':kolom_9_4', $kolom_9_4);
    $stmt->bindParam(':kolom_9_5', $kolom_9_5);
    $stmt->bindParam(':kolom_9_6', $kolom_9_6);
    $stmt->bindParam(':kolom_9_7', $kolom_9_7);
    $stmt->bindParam(':kolom_9_8', $kolom_9_8);
    $stmt->bindParam(':kolom_9_9', $kolom_9_9);
    $stmt->bindParam(':kolom_10_1', $kolom_10_1);
    $stmt->bindParam(':kolom_10_2', $kolom_10_2);
    $stmt->bindParam(':kolom_10_3', $kolom_10_3);
    $stmt->bindParam(':kolom_10_4', $kolom_10_4);
    $stmt->bindParam(':kolom_11_0', $kolom_11_0);

    $stmt->bindParam(':perilaku_selamat', $perilaku_selamat);
    $stmt->bindParam(':perilaku_beresiko', $perilaku_beresiko);
    $stmt->bindParam(':ketika', $ketika);
    $stmt->bindParam(':ditemukan', $ditemukan);
    $stmt->bindParam(':sebab', $sebab);
    $stmt->bindParam(':saran', $saran);
    $stmt->bindParam(':setuju_perilaku_terjadi', $setuju_perilaku_terjadi);
    $stmt->bindParam(':setuju_perilaku_beresiko', $setuju_perilaku_beresiko);
    $stmt->bindParam(':bentuk_perilaku_selamat', $bentuk_perilaku_selamat);
    $stmt->bindParam(':tindak_lanjut', $tindak_lanjut);
    $stmt->bindParam(':komentar', $komentar);
    // Execute query
    if ($stmt->execute()) {
        echo json_encode(array("message" => "Observasi berhasil disimpan."));
    } else {
        echo json_encode(array("message" => "Gagal menyimpan observasi."));
    }
} catch (PDOException $e) {
    die("ERROR: Could not execute query. " . $e->getMessage());
}
