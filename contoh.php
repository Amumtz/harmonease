<?php
session_start();
require_once('koneksi.php');

// Cek jika pengguna sudah login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Ambil data psikolog dari database
$sql = "SELECT * FROM psikolog"; 
$result = mysqli_query($conn, $sql);

// Periksa apakah ada data
if (mysqli_num_rows($result) > 0) {
    // Ambil semua data psikolog
    $psikologList = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $psikologList = [];
}


// Debug output URL gambar
$gambar_url = "foto_psikolog/" . urlencode($psikolog['foto']);
echo "<p>URL gambar: " . $gambar_url . "</p>"; // Debug



?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HarmonEasee Konsultasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <h3 class="text-3xl font-bold my-7 ml-5 text-cyan-800">Psikolog yang cocok untuk anda</h3>

  <!-- Psikolog List -->
  <section class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($psikologList as $psikolog): ?>
      <div class="psikolog-card bg-[#F0F3FA] p-4 rounded-lg shadow-md">
        <div class="flex items-center">
          <!-- Tampilkan gambar dengan urlencoded path -->
          <div class="w-14 h-14 bg-gray-300 rounded-full mr-4">
            <img src="<?php echo $gambar_url; ?>" alt="Gambar Psikolog">
          </div>
          <div>
            <h3 class="text-lg font-medium"><?php echo $psikolog['nama_lengkap']; ?></h3>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </section>

</body>
</html>
