<?php
require_once("koneksi.php");
session_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Psikolog</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-3xl">
      <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Form Tambah Data Psikolog</h1>
      <form action="insert_psikolog.php" method="POST" enctype="multipart/form-data" class="space-y-4">
        <!-- Nama Lengkap -->
        <div>
          <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap:</label>
          <input type="text" name="nama_lengkap" id="nama_lengkap" required
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <!-- Nomor Lisensi -->
        <div>
          <label for="nomor_lisensi" class="block text-sm font-medium text-gray-700">Nomor Lisensi:</label>
          <input type="text" name="nomor_lisensi" id="nomor_lisensi" required
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <!-- Gender -->
        <div>
          <label for="gender" class="block text-sm font-medium text-gray-700">Gender:</label>
          <select name="gender" id="gender" required
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            <option value="male">Laki-laki</option>
            <option value="female">Perempuan</option>
          </select>
        </div>

        <!-- Usia Range -->
        <div>
          <label for="usia_range" class="block text-sm font-medium text-gray-700">Usia:</label>
          <select name="usia_range" id="usia_range" required
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            <option value="25-30">25 - 30 tahun</option>
            <option value="30-35">30 - 35 tahun</option>
            <option value=">35">> 35 tahun</option>
          </select>
        </div>

        <!-- Spesialis -->
        <div>
          <label for="spesialis" class="block text-sm font-medium text-gray-700">Spesialis:</label>
          <select name="spesialis" id="spesialis" required
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            <option value="klinis">Psikolog Klinis</option>
            <option value="konseling">Psikolog Konseling</option>
            <option value="anak-remaja">Psikolog Anak dan Remaja</option>
          </select>
        </div>

        <!-- Kualifikasi -->
        <div>
          <label for="kualifikasi" class="block text-sm font-medium text-gray-700">Kualifikasi:</label>
          <textarea name="kualifikasi" id="kualifikasi"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
        </div>

        <!-- Pengalaman Tahun -->
        <div>
          <label for="pengalaman_tahun" class="block text-sm font-medium text-gray-700">Pengalaman Tahun:</label>
          <input type="number" name="pengalaman_tahun" id="pengalaman_tahun" required
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <!-- Biaya Konsultasi -->
        <div>
          <label for="biaya_konsultasi" class="block text-sm font-medium text-gray-700">Biaya Konsultasi:</label>
          <input type="number" name="biaya_konsultasi" id="biaya_konsultasi" required
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <!-- Deskripsi -->
        <div>
          <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi:</label>
          <textarea name="deskripsi" id="deskripsi"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
        </div>

        <!-- Penilaian -->
        <div>
          <label for="penilaian" class="block text-sm font-medium text-gray-700">Penilaian (0-5):</label>
          <input type="number" step="0.1" name="penilaian" id="penilaian" min="0" max="5"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <!-- Issues -->
        <div>
          <h3 class="text-lg font-semibold text-blue-700">Issues:</h3>
          <div class="flex flex-wrap gap-3">
            <label class="flex items-center space-x-2"><input type="checkbox" name="issues" value="1"> <span>Depresi</span></label>
            <label class="flex items-center space-x-2"><input type="checkbox" name="issues" value="2"> <span>Gangguan Kecemasan</span></label>
            <label class="flex items-center space-x-2"><input type="checkbox" name="issues" value="3"> <span>Gangguan Kepribadian</span></label>
            <label class="flex items-center space-x-2"><input type="checkbox" name="issues" value="4"> <span>Gangguan Makan</span></label><br>
            <label class="flex items-center space-x-2"><input type="checkbox" name="issues" value="5"> <span>PTSD</span></label>
            <label class="flex items-center space-x-2"><input type="checkbox" name="issues" value="6"> <span>Transisi hidup</span></label>
            <label class="flex items-center space-x-2"><input type="checkbox" name="issues" value="7"> <span>Stress</span></label>
            <label class="flex items-center space-x-2"><input type="checkbox" name="issues" value="8"> <span>kepercayaan diri</span></label>
            <label class="flex items-center space-x-2"><input type="checkbox" name="issues" value="9"> <span>Pengelolaan emosi</span></label><br>
            <label class="flex items-center space-x-2"><input type="checkbox" name="issues" value="10"> <span>Gangguan belajar</span></label>
            <label class="flex items-center space-x-2"><input type="checkbox" name="issues" value="11"> <span>Masalah perilaku</span></label>
            <label class="flex items-center space-x-2"><input type="checkbox" name="issues" value="13"> <span>Bullying</span></label>
            <label class="flex items-center space-x-2"><input type="checkbox" name="issues" value="12"> <span>Trauma masa kecil</span></label>
            <label class="flex items-center space-x-2"><input type="checkbox" name="issues" value="14"> <span>Masalah perkembangan</span></label>
        </div>


          <!-- Foto -->
          <div class="mt-2">
            <label for="foto" class="block text-sm font-medium text-gray-700">Foto:</label>
            <input type="file" name="foto" id="foto" required
              class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
          </div>
        </div>


        <!-- Submit -->
        <div>
          <button type="submit"
            class="w-full py-2 px-4 bg-blue-600 text-white font-bold rounded-lg shadow hover:bg-blue-700">Submit</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>

