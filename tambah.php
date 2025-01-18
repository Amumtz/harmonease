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
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100" style="font-family: 'Kanit', sans-serif">

    <div class="container mx-auto my-10 p-5 bg-white rounded shadow-lg">
        <h1 class="text-3xl font-bold mb-5 text-center text-gray-800">Tambah Data Audio</h1>

        <form action="tambah_data.php" method="POST" enctype="multipart/form-data" class="space-y-6">
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
