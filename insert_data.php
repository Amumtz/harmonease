<?php
require_once("koneksi.php");
session_start();

// Mengambil data dari form HTML
$nama_lengkap = $_POST['nama_lengkap'];
$nomor_lisensi = $_POST['nomor_lisensi'];
$gender = $_POST['gender'];
$usia_range = $_POST['usia_range'];
$spesialis = $_POST['spesialis'];
$kualifikasi = $_POST['kualifikasi'];
$pengalaman_tahun = $_POST['pengalaman_tahun'];
$biaya_konsultasi = $_POST['biaya_konsultasi'];
$deskripsi = $_POST['deskripsi'];
$penilaian = $_POST['penilaian'] ?? 0.0; // Jika penilaian tidak diisi, set default 0
$foto = $_FILES['foto'];

// Menyimpan foto jika ada
$foto_path = null;
if ($foto['error'] == 0) {
    $foto_path = 'foto_psikolog/' . basename($foto['name']);
    move_uploaded_file($foto['tmp_name'], $foto_path);
}

// Menyiapkan query untuk memasukkan data ke tabel psikolog
$stmt = $conn->prepare("INSERT INTO psikolog (nama_lengkap, nomor_lisensi, gender, usia_range, spesialis, kualifikasi, pengalaman_tahun, biaya_konsultasi, deskripsi, penilaian, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssidsds", $nama_lengkap, $nomor_lisensi, $gender, $usia_range, $spesialis, $kualifikasi, $pengalaman_tahun, $biaya_konsultasi, $deskripsi, $penilaian, $foto_path);
$stmt->execute();

if (isset($_POST['issues']) && !empty($_POST['issues'])) {
    $psikolog_id = $conn->insert_id;
    $issues = $_POST['issues'];
    foreach ($issues as $issue_id) {
        $sql_issue = "INSERT INTO psikolog_issues (psikolog_id, issues_id) VALUES (?, ?)";
        $stmt_issue = $conn->prepare($sql_issue);
        $stmt_issue->bind_param("ii", $psikolog_id, $issue_id);
        $stmt_issue->execute();
    }
} else {
    echo "Tidak ada issue yang dipilih.";
}
header("Location: insert_psikolog.php");
// Menutup koneksi
$conn->close();
?>

