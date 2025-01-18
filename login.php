<?php
session_start();
require_once('koneksi.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin copy.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Log-In</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-between h-screen font-kanit">
    <div>
        <a href="indexnotlogin.php">
            <div class="flex items-center space-x-2">
                <img src="img/logofull2.png" alt="Logo HarmonEasee" class="w-8 h-8 ">
                <span class="font-semibold text-lg ">HarmonEasee</span>
            </div>
        </a>
        <div class="gambar">
            <img src="img/illustrasi.png" alt="illustrasi" srcset="">
        </div>
    </div>
    <div class="relative mx-auto p-5 bg-white w-[350px] rounded-2xl border border-gray-300 shadow-lg">
        <div class="text-center">
            <h1 class="text-2xl font-semibold mb-1">Login</h1>
            <p class="text-sm">Belum punya akun? <a href="daftar.php" class="text-blue-500 hover:underline">Daftar</a></p>
        </div>
        <div class="Login">
            <form action="proses_login.php" method="post" class="mt-6">
                    <div class="mb-2 ">
                        <label for="email" class="block text-sm mb-1">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="nama@gmail.com" class="w-full px-6 py-2 border border-gray-300 rounded-lg bg-gray-100 text-sm">
                    </div>
                    
                    <div class="mb-1 relative">
                        <label for="password" class="block text-sm mb-1">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" required placeholder="Masukkan password"
                                class="w-full px-3 py-2 pr-10 border border-gray-300 rounded-lg bg-gray-100 text-sm password-input">
                            <span id="togglePassword" 
                                class="absolute inset-y-0 right-5 flex items-center cursor-pointer text-gray-500">
                                <i class="fa fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>

                    <div class="mb-4 flex justify-content-between text-center">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="remember_me" value="remember_me" class="form-checkbox mr-1">
                            <span class="mr-8 text-sm">Remember Me</span>
                        </label>
                        <div class="text-right text-sm ml-7">
                            <a href="lupapassword.php" class="text-gray-500 hover:underline">Lupa kata sandi?</a>
                        </div>
                    </div>
            <div class="space-y-3">
                <button type="submit" class="w-full bg-blue-400 text-white py-2 rounded-lg text-sm">Login</button>
                <a href="https://accounts.google.com/login" class="flex items-center justify-center space-x-1 w-full border border-gray-300 py-2 rounded-lg text-sm bg-white hover:shadow">
                    <img src="img/download.png" alt="Google Logo" class="w-5 h-5">
                    <span>Login dengan Google</span>
                </a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');

            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                const icon = this.querySelector('i');
                icon.classList.toggle('fa-eye-slash');
                icon.classList.toggle('fa-eye');
            });
        });
    </script>
</body>
</html>