<?php
session_start();
require_once('koneksi.php');

// Cek jika pengguna sudah login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Ambil data psikolog dari database
$id_psikolog = isset($_GET['id']) ? intval($_GET['id']) : 1; // ID default jika tidak ada parameter
$sql = "SELECT p.*, GROUP_CONCAT(i.name) AS issues
FROM psikolog p
LEFT JOIN psikolog_issues pi ON p.id = pi.psikolog_id
LEFT JOIN issues i ON pi.issues_id = i.id
WHERE p.id = $id_psikolog
GROUP BY p.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $psikolog = $result->fetch_assoc();
} else {
    echo "Psikolog tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HarmonEasee Konsultasi</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>

  </style>
</head>
<body>
  <!-- Header -->
    <header id="header-placeholder" class="bg-white mt-0 shadow z-50">
        <script src="header.js"></script>
    </header>

  <!-- Filter Section -->
    <!-- Sidebar Profile Card -->
    <aside class="border rounded-lg mt-20 p-6 h-fit bg-sky-300/10 shadow-lg flex flex-col items-center">
        <?php
                        $file = $_SERVER['DOCUMENT_ROOT'] . "/proyekHarmonEasee/" . $psikolog['foto'];
                        if (file_exists($file)) {
                            echo "<img src='/proyekHarmonEasee/" . htmlspecialchars($psikolog['foto']) . "' alt='Foto Psikolog' class='w-44 h-44 rounded-full mb-4'>";
                        } else {
                            echo "<span class='text-gray-500'>Foto tidak tersedia</span>";
                        }
                        ?>
        <div class="text-center">
            <div class="flex justify-center">
                <i class="fa fa-star text-yellow-400 mt-0.5"></i>
                <p class="text-green-950 text-base font-medium"><?php echo $psikolog['penilaian']; ?></p>
            </div>
            <p class="text-gray-500">Rp <?php echo number_format($psikolog['biaya_konsultasi'], 0, ',', '.'); ?></p>
            <p class="text-sm text-blue-500 mb-4">Online</p>
        </div>
        <div class="flex space-x-4 mt-4">
            <button id="phone-button" class="bg-blue-400 text-white p-2 px-3 rounded-md hover:bg-blue-600"><i class="fas fa-phone text-xl hover:text-blue-950"></i></button>
            <button id="message-button" class="bg-blue-400 text-white p-2 px-3 rounded-md hover:bg-blue-600"><i class="fas fa-comment text-xl hover:text-blue-950"></i></button>
            <button id="video-call-button" class="bg-blue-400 text-white p-2 px-3 rounded-md hover:bg-blue-600"><i class="fa-solid fa-video text-xl hover:text-blue-950"></i></button>
        </div>
        <a href="jadwalpsikolog.php?id=<?php echo $psikolog['id']; ?>" class="w-full">
            <button class="bg-blue-600 text-white w-full py-2 rounded-md mt-4 hover:bg-blue-700">Book</button>
        </a>
    </aside>

    <!-- Profile Detail -->
    <section class="bg-white mt-16 p-6 md:col-span-2">
        <h1 class="text-4xl font-bold text-sky-700 mb-4"><?php echo $psikolog['nama_lengkap']; ?></h1>
        <p class="text-gray-500 text-sm mb-2">Nomor Izin Praktik: <span class="font-semibold text-gray-800"><?php echo $psikolog['nomor_lisensi']; ?></span></p>
        <div class="mt-4">
            <h3 class="font-bold text-sky-700">Spesialis</h3>
            <div class="flex space-x-2 mt-2">
                <?php
                $spesialis = explode(',', $psikolog['spesialis']);
                foreach ($spesialis as $sp) {
                    echo "<span class='border-blue-500 border text-gray-800 px-2 py-1 rounded-2xl font-light'>psikolog $sp</span>";
                }
                ?>
            </div>
        </div>
        <div class="mt-4">
            <h3 class="font-bold text-sky-700">Issues</h3>
            <div class="flex flex-wrap gap-2 mt-2">
                <?php
                $issues = explode(',', $psikolog['issues']);
                foreach ($issues as $issue) {
                    echo "<span class='border-blue-500 border text-gray-800 px-2 py-1 rounded-2xl font-light'>$issue</span>";
                }
                ?>
            </div>
        </div>
        <div class="mt-4">
            <h3 class="font-bold text-sky-700">Qualifications</h3>
            <p class="text-gray-500 font-light"><?php echo $psikolog['kualifikasi']; ?></p>
        </div>
        <div class="mt-4">
            <h3 class="font-bold text-sky-700">Experience</h3>
            <p class="text-gray-500 font-light">Pengalaman: <?php echo $psikolog['pengalaman_tahun']; ?> tahun</p>
            <p class="text-gray-500 font-light">Jumlah Konsultasi: <?php echo $psikolog['jumlah_konsultasi']; ?>+ Konsultasi</p>
        </div>
        <div class="mt-4">
            <h3 class="font-bold text-sky-700">About</h3>
            <p class="text-gray-500 font-light"><?php echo $psikolog['deskripsi']; ?></p>
        </div>
    </section>
</body>
</html>
