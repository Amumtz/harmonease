<?php
session_start();

require_once("koneksi.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Audio</title>
    <!-- Tailwind CSS -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .fixed-top + .d-flex {
            margin-top: 56px; /* Adjust based on header height */
        }

         /* Sidebar */
         #sidebar {
            position: fixed;
            top: 100;
            left: 0; /* Sidebar tersembunyi di kiri layar */
            width: 250px;
            height: 100vh;
            background-color: #f8f9fa;
            transition: left 0.3s ease-in-out; /* Efek transisi saat sidebar muncul atau hilang */
        }

        #sidebar.show {
            left: -250px; /* Sidebar muncul */
        }

        .sidebar-link {
            padding: 15px;
            text-decoration: none;
            color: #000;
            display: block;
        }

        .sidebar-link:hover {
            background-color: #e9ecef;
        }

        /* Konten utama agar tidak tertutup sidebar */
        .content {
            margin-left: 250px; /* Memberi ruang agar konten tidak tertutup sidebar */
            transition: margin-left 0.3s ease-in-out;
        }

        .content.shift {
            margin-left: 0; /* Saat sidebar muncul, konten digeser ke kanan */
        }

        /* Tombol hamburger */
        .navbar-toggler {
            border: none;
            background: transparent;
        }
    </style>
</head>

<body class="bg-gray-100" style="font-family: 'Kanit', sans-serif">
<header class="fixed-top bg-white shadow">
  <div class="container-fluid px-4 py-3 d-flex justify-content-between align-items-center">
    
    <!-- Tombol hamburger dan logo dalam satu container -->
    <div class="d-flex align-items-center">
      <!-- Tombol hamburger -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" id="hamburgerButton">
        <span class="navbar-toggler-icon"></span><img src="/otwtubes/img/hamburger-menu-4.png" style="width: 40px; height: 40px;">
      </button>
      
      <!-- Logo dan Nama -->
      <div class="d-flex align-items-center ms-2"> <!-- ms-2 untuk jarak lebih kecil antara hamburger dan logo -->
         <img src="/otwtubes/img/logofull2.png" alt="Logo HarmonEasee" class="rounded-circle me-2" style="width: 40px; height: 40px;">
        <span class="fw-semibold fs-5" style="font-family: 'Kanit', sans-serif;">HarmonEasee</span>
      </div>
    </div>

    <!-- Foto Profil -->
    <a href="profile.php">
      <img src="/otwtubes/img/profile.jpeg" alt="Foto Profil" class="rounded-circle border border-secondary" style="width: 40px; height: 40px;">
    </a>
    
  </div> 
</header>
<div class="flex pt-5">
    
        <!-- Sidebar -->
        <aside class="bg-light p-4 d-none d-md-block" style="width: 250px; min-height: 100vh;" id="sidebar">
            <ul class="nav flex-column position-fixed">
                <li class="nav-item">
                    <a href="admindb.php" class="nav-link text-dark">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark">Tes Kesehatan</a>
                </li>
                <li class="nav-item">
                    <a href="#adminkonsultasi.php" class="nav-link text-dark">Konsultasi</a>
                </li>
                <li class="nav-item">
                    <a href="podcastadmin.php" class="nav-link text-dark">Podcast</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark">Psikolog</a>
                </li>
            </ul>
        </aside>

<div class="content">
    <div class="container mx-auto my-10 p-5 bg-white rounded shadow-lg">
        <h1 class="text-3xl font-bold mb-5 text-center text-gray-800">Tambah Data Audio</h1>

        <form action="admin_tambah_data.php" method="POST" enctype="multipart/form-data" class="space-y-6">
            <!-- judul -->
            <div class="form-group">
                <label for="judul" class="block text-gray-700 font-medium mb-2">Judul</label>
                <input type="text" id="judul" name="judul" 
                    class="form-control border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-200" 
                    placeholder="Masukkan judul audio" 
                    required>
            </div>

            <!-- artis -->
            <div class="form-group">
                <label for="artis" class="block text-gray-700 font-medium mb-2">Artis</label>
                <input type="text" id="artis" name="artis" 
                    class="form-control border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-200" 
                    placeholder="Masukkan nama artis" 
                    required>
            </div>

            <!--file audio -->
            <div class="form-group">
                <label for="file" class="block text-gray-700 font-medium mb-2">File Audio</label>
                <input type="file" id="file" name="file" 
                    class="form-control border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-200" 
                    accept="audio/*" 
                    required>
            </div>

            <!-- cover -->
            <div class="form-group">
                <label for="cover" class="block text-gray-700 font-medium mb-2">Cover Image</label>
                <input type="file" id="cover" name="cover" 
                    class="form-control border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-200" 
                    accept="image/*" 
                    required>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" name="tambah" 
                    class="btn btn-primary px-6 py-2 rounded-lg shadow-lg bg-blue-500 text-white hover:bg-blue-600">
                    Tambah
                </button>
            </div>
        </form>
    </div>
    <footer class="sticky-footer py-4" style="background-color: #7AD8FE;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; HarmonEasee</span>
                    </div>
                </div>
    </footer>
</div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Mengambil elemen sidebar dan tombol hamburger
    const sidebar = document.getElementById('sidebar');
    const hamburgerButton = document.getElementById('hamburgerButton');
    const content = document.querySelector('.content');

    // Menambahkan event listener untuk membuka dan menutup sidebar
    hamburgerButton.addEventListener('click', () => {
        sidebar.classList.toggle('show'); // Menampilkan atau menyembunyikan sidebar
        content.classList.toggle('shift'); // Menggeser konten utama saat sidebar muncul
    });
</script>
</body>

</html>
