<?php
require_once("koneksi.php");

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

// Ambil id psikolog dari URL
if (isset($_GET['id'])) {
    $id_psikolog = intval($_GET['id']); // Mengonversi menjadi integer
    if ($id_psikolog <= 0) {
        echo "ID psikolog tidak valid.";
        exit();
    }
} else {
    echo "Parameter id tidak ditemukan di URL.";
    exit();
}

echo "ID psikolog yang diterima: " . $id_psikolog; // Debugging untuk memastikan id terambil dengan benar

// Cek apakah user sudah login
if (isset($_SESSION['id_user'])) {
    // ID user
    $user_id = $_SESSION['id_user'];
    // Nama user
    $user = $_SESSION['user'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['tanggal']) && isset($_POST['waktu'])) {
            $tanggal = $_POST['tanggal'];
            $waktu = $_POST['waktu'];

            // Dapatkan tanggal dan waktu saat ini
            $current_date = date('Y-m-d');
            $current_time = date('H:i');

            // Tentukan status berdasarkan kondisi
            $status = '';
            if (strtotime($tanggal) < strtotime($current_date)) {
                // Jika tanggal sudah lewat
                $status = 'selesai';
            } elseif ($tanggal == $current_date && strtotime($waktu) >= strtotime('10:00') && strtotime($waktu) <= strtotime('13:00')) {
                // Jika tanggal adalah hari ini dan waktu berada di antara 10:00 - 13:00
                $status = 'sedang berlangsung';
            } elseif (strtotime($tanggal) > strtotime($current_date) || ($tanggal == $current_date && strtotime($waktu) > strtotime($current_time))) {
                // Jika tanggal belum lewat
                $status = 'terjadwal';
            }

            // Simpan data ke database
            $query = "INSERT INTO detail_konsultasi (id_pengguna, id, tgl_konsul, jam_konsul, status) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('iisss', $user_id, $id_psikolog, $tanggal, $waktu, $status);

            if ($stmt->execute()) {
                echo "Data berhasil disimpan!";
                header("Location: pembayaran.php");
                exit();
            } else {
                echo "Terjadi kesalahan: " . $conn->error;
            }
        } else {
            echo "Tanggal dan waktu harus diisi.";
        }
    }
} else {
    echo "Anda belum login.";
}
?>
