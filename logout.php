<?php
session_start();

// Hapus session
session_unset();
session_destroy();

// Hapus cookie
setcookie("remember_me", "", time() - 3600, "/");

// Redirect ke halaman login
header("Location: login.php");
exit;



?>