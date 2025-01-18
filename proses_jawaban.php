<?php
session_start();
require_once('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idSoal = (int)$_POST['id_soal'];
    $skor = (int)$_POST['skor'];

    // Simpan skor ke session
    if (!isset($_SESSION['skor_total'])) {
        $_SESSION['skor_total'] = 0;
    }
    $_SESSION['skor_total'] += $skor;

    // Redirect ke soal berikutnya
    header("Location: soaltes1.php?id_soal=" . ($idSoal + 1));
    exit();
}
