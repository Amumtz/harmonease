<?php
require_once('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['Nama_Lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirpassword = $_POST['konfirmasiPassword'];

    $stmt = $conn->prepare("SELECT id_pengguna FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Jika email sudah terdaftar
        echo "<script>alert('Email sudah terdaftar. Silakan gunakan email lain.');</script>";
        echo "<script>window.history.back();</script>";
        exit();
    }

    $stmt->close();

    // Hash password untuk keamanan
    if ($password === $konfirpassword) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
        if(strpos($email, "@admin.com") !== false){
            $role= "admin";
        } else{
            $role = "user";
        }

        $stmt = $conn->prepare("INSERT INTO user (Nama_Lengkap, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $hashedPassword, $role);

        if ($stmt->execute()) {
            header('Location: login.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    } else {
        echo "<script>alert('Password dan konfirmasi password tidak sesuai');</script>";
        echo "<script>window.history.back();</script>";
    }
    
}