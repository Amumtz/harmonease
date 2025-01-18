<?php
session_start();
require_once('koneksi.php');

// Cek jika pengguna sudah login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Ambil data filter dari request
$filterSpesialis = isset($_GET['spesialis']) && $_GET['spesialis'] !== 'all' ? $_GET['spesialis'] : null;
$filterPenilaian = isset($_GET['penilaian']) && $_GET['penilaian'] !== 'all' ? $_GET['penilaian'] : null;
$filterBiaya = isset($_GET['biaya_konsultasi']) && $_GET['biaya_konsultasi'] !== 'all' ? $_GET['biaya_konsultasi'] : null;

// Susun query SQL dinamis
$sql = "SELECT p.*, GROUP_CONCAT(i.name) AS issues
        FROM psikolog p
        LEFT JOIN psikolog_issues pi ON p.id = pi.psikolog_id
        LEFT JOIN issues i ON pi.issues_id = i.id
        WHERE 1=1";

if ($filterSpesialis) {
    $sql .= " AND p.spesialis = '" . mysqli_real_escape_string($conn, $filterSpesialis) . "'";
}

if ($filterPenilaian) {
    $sql .= " AND p.penilaian >= " . (float)$filterPenilaian;
}

if ($filterBiaya) {
    switch ($filterBiaya) {
        case 'low':
            $sql .= " AND p.biaya_konsultasi < 50000";
            break;
        case 'medium':
            $sql .= " AND p.biaya_konsultasi BETWEEN 50000 AND 100000";
            break;
        case 'high':
            $sql .= " AND p.biaya_konsultasi > 100000";
            break;
    }
}

$sql .= " GROUP BY p.id";

// Eksekusi query
$result = mysqli_query($conn, $sql);

// Proses hasil
$psikologList = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $psikologList[] = $row;
    }
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
</head>
<body class="">
  <!-- Header -->
    <header id="header-placeholder" class="bg-white mt-0 shadow z-50">
        <script src="header.js"></script>
    </header>

  <!-- Filter Section -->
    <form method="GET" action="" class="p-6 px-44 mt-20 flex">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 bg-gray-200/40 py-5 px-2 rounded-md">
            <!-- Spesialis Dropdown -->
            <div>
                <label class="block text-gray-700 font-medium">Spesialis</label>
                <select name="spesialis" class="w-full p-2 mt-1 bg-gray-200/40">
                    <option value="all">Pilih spesialis</option>
                    <option value="klinis">Psikolog Klinis</option>
                    <option value="konseling">Psikolog Konseling</option>
                    <option value="anak-remaja">Psikolog Anak dan Remaja</option>
                </select>
            </div>

            <!-- Penilaian Dropdown -->
            <div>
                <label class="block text-gray-700 font-medium">Penilaian</label>
                <select name="penilaian" class="w-full p-2 mt-1 bg-gray-200/40">
                    <option value="all">Semua Penilaian</option>
                    <option value="4.5">4.5 ke atas</option>
                    <option value="4.0">4.0 ke atas</option>
                    <option value="3.5">3.5 ke atas</option>
                </select>
            </div>

            <!-- Biaya Konsultasi Dropdown -->
            <div>
                <label class="block text-gray-700 font-medium">Biaya Konsultasi</label>
                <select name="biaya_konsultasi" class="w-full p-2 mt-1 bg-gray-200/40">
                    <option value="all">Semua Biaya</option>
                    <option value="low">Di bawah 50,000</option>
                    <option value="medium">50,000 - 100,000</option>
                    <option value="high">Di atas 100,000</option>
                </select>
            </div>
        </div>
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Filter</button>
    </form>
    <h3 class="text-3xl font-bold my-7 ml-5 text-cyan-800">Psikolog yang cocok untuk anda</h3>
    <!-- Psikolog List -->
    <section class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php foreach ($psikologList as $psikolog): ?>

            <div class="psikolog-card bg-[#F0F3FA] p-3 rounded-lg shadow-md flex flex-col justify-between" data-spesialis="<?php echo $psikolog['spesialis']; ?>" data-gender="<?php echo $psikolog['gender']; ?>" data-usia="<?php echo $psikolog['usia_range']; ?>">

                <!-- Header: Foto & Nama Psikolog -->
                <div class="flex items-center mb-2">
                    <div class="w-16 h-16 bg-gray-300 rounded-full mr-4 overflow-hidden">
                        <?php
                        $file = $_SERVER['DOCUMENT_ROOT'] . "/proyekHarmonEasee/" . $psikolog['foto'];
                        if (file_exists($file)) {
                            echo "<img src='/proyekHarmonEasee/" . htmlspecialchars($psikolog['foto']) . "' alt='Foto Psikolog' class='w-full h-full object-cover'>";
                        } else {
                            echo "<span class='text-gray-500'>Foto tidak tersedia</span>";
                        }
                        ?>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium"><?php echo htmlspecialchars($psikolog['nama_lengkap']); ?></h3>
                        <div class="text-sm flex text-gray-500 items-center">
                            <div class="flex items-center">
                                <p id="spesialis" class="mr-1">
                                    <?php echo htmlspecialchars($psikolog['spesialis']); ?>
                                </p>
                                <span class="mx-1">|</span>
                                <p class="mr-2">
                                    <?php echo $psikolog['jumlah_konsultasi']; ?>+ konsultasi
                                </p>
                                <span class="mx-1">|</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fa fa-star text-yellow-300 mr-1"></i>
                                <p id="penilaian">
                                    <?php echo $psikolog['penilaian']; ?>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Rating -->

                <!-- Issues -->
                <div class="issues-container mb-1 flex flex-wrap ">
                    <?php
                    $issues = explode(',', $psikolog['issues']); // Ambil issues per psikolog
                    foreach ($issues as $specialty): ?>
                        <span class="issue-item text-xs border border-blue-600 text-gray-800 px-2 py-1 rounded-md mr-0.5"><?php echo htmlspecialchars($specialty); ?></span>
                    <?php endforeach; ?>
                </div>

                <!-- Footer: Biaya & Tombol -->
                <div class="flex justify-between items-center">
                    <div class="text-left">
                        <p class="font-medium text-lg" id="biaya_konsultasi">Rp. <?php echo number_format($psikolog['biaya_konsultasi'], 0, ',', '.'); ?><span class="text-xs font-normal">/ sesi</span></p>
                    </div>
                    <a href="deskripsipsikolog.php?id=<?php echo $psikolog['id']; ?>">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-2xl hover:bg-blue-700">Book</button>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Duplikat kartu psikolog dengan data berbeda -->
        <!-- Tambahkan lebih banyak kartu sesuai kebutuhan -->
    </section>

</body>
</html>
