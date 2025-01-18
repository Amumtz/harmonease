<?php
session_start();

// Bersihkan skor
$_SESSION['skor_total'] = 0;

// Redirect ke halaman tes awal
header("Location: soaltes1.php");
exit();
?>
