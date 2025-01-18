<?php
session_start();
require_once("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Login berhasil
        if ($user && password_verify($password, $user['password'])) {
            // Login berhasil
            $_SESSION['id_user'] = $user['id_pengguna'] ;
            $_SESSION['user'] = $user['Nama_Lengkap'];
            $_SESSION['email'] = $user['email']; // Simpan email di sesi
            $_SESSION['role'] = $user['role']; // Simpan role di sesi

            if ($remember == 'on') {
                setcookie("remember_me", $email, time() + (7 * 24 * 60 * 60), "/");
            }

            if ($user['role'] == 'admin') {
                header('Location: admindb.php');
                exit();
            } elseif ($user['role'] == 'user'){
                header("Location: index.php"); // Redirect ke halaman homepage
                exit();
            }
        }else {
            // Password salah
            echo "<script>alert('Password salah! Silakan coba lagi.');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
        }
    } else {
        // Login gagal
        echo "<script>alert('Email atau password salah! Silakan coba lagi.');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>