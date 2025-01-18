<?php
session_start();
require_once('koneksi.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styledaftar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Daftar</title>
</head>
<body>
    <div class="gambar">
        <img src="img/illustrasi.png" alt="illustrasi" srcset="">
    </div>
    <div class="kotak">
        <div class="tulisan">
            <h1>Daftar</h1>
            <p>Sudah punya akun? <a href="login.php">Login</a></p>
        </div>
        <div class="Sign-In">
            <form action="proses_daftar.php" method="post">
                    <div class="form-item">
                        <label for="Nama_Lengkap">Nama Lengkap</label>
                        <input type="text" id="Nama_Lengkap" name="Nama_Lengkap" required placeholder="Nama Lengkap">
                        <i class="fi fi-sr-user" src=""></i>
                    </div>
                    
                    <div class="form-item">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="nama@gmail.com">
                    </div>
                    
                    <div class="form-item">
                        <label for="Password">Password </label>
                        <input type="password" id="password" name="password" required placeholder="Masukkan password" >
                    </div>

                    <div class="form-item">
                        <label for="konfirmasiPassword">Konfirmasi Password </label>
                        <input type="password" id="konfirmasiPassword" name="konfirmasiPassword" required placeholder="Masukkan password" >
                    </div>

                    <div class="checkbox">
                        <input type="checkbox" name="konfirmasi" id="konfirmasi">
                        <label for="konfirmasi">Dengan mendaftar, saya menyetujui <a href="#">Ketentuan Pengguna</a> dan <a href="#">Kebijakan Privasi</a></label>
                    </div><br>

                    <div class="tombol">
                        <button type="submit" value="Daftar">Daftar</button><br>
                        <a href="https://accounts.google.com/login" class="google-btn"><img src="img/download.png" alt="google" srcset="">Daftar dengan Google</a>                    
                    </div>
            </form>
        </div>
    </div>
</body>
</html>