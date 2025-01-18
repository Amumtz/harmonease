<?php
session_start();
require_once('koneksi.php');
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}
$id_psikolog = isset($_GET['id']) ? intval($_GET['id']) : 1; // ID default jika tidak ada parameter
$sql = "SELECT 
            p.*, 
            GROUP_CONCAT(i.name) AS issues, 
            d.tgl_konsul, 
            d.jam_konsul
        FROM psikolog p
        LEFT JOIN psikolog_issues pi ON p.id = pi.psikolog_id
        LEFT JOIN issues i ON pi.issues_id = i.id
        LEFT JOIN detail_konsultasi d ON p.id = d.id
        WHERE p.id = $id_psikolog
        GROUP BY p.id, d.tgl_konsul, d.jam_konsul";

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
    <title>Pembayaran</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>    
</head>
<body class="bg-gray-50 antialiased">
    <header id="header-placeholder" class=" bg-white mt-0 shadow z-50">
        <script src="header.js"></script>
    </header>
    <div class="flex justify-between mt-20 ml-5">
        <div class="flex items-center">
            <div class=" h-10 w-10 border-2 rounded-md shadow-sm">
                <button class="back-button text-xl ml-2 mt-1 hover:text-gray-300" onclick="history.back()">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
            </div>
            <nav class="text-gray-600 text-sm ml-5">
              <a href="index.php" class="hover:underline">Home</a>
              <span class="mx-2">›</span>
              <a href="deskripsipsikolog.php" class="font-medium text-sm hover:underline">Psikolog</a>
              <span class="mx-2">›</span>
              <a href="jadwalpsikolog.php" class="font-medium text-sm hover:underline">Jadwal konsultasi</a>
              <span class="mx-2">›</span>
              <a href="pembayaran.php" class="font-medium text-sm text-gray-900 hover:underline">Pembayaran</a>
            </nav>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="container mx-auto px-4 py-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Kolom Utama -->
        <div class="lg:col-span-2">
            <!-- Informasi Pembayaran -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-gray-700">Mohon Transfer ke</h2>
                <div class="mt-4 bg-blue-100 p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <p class="text-blue-800 font-semibold">BCA Virtual Account</p>
                    </div>
                    <div class="mt-4 space-y-2">
                        <p class="text-gray-700">
                            <span class="font-semibold">ID Pesanan</span>: PSY-20240160-XY12345
                        </p>
                        <div class="flex items-center justify-between">
                            <p class="text-gray-700">
                                <span class="font-semibold">Nomor Virtual Account</span>: 1234567890123
                            </p>
                            <button class="text-blue-500 hover:underline" onclick="copyText('1234567890123')">Salin</button>
                        </div>
                        <p class="text-gray-700">
                            <span class="font-semibold">Nama Penerima</span>: HarmonEasee
                        </p>
                        <div class="flex items-center justify-between">
                            <p class="text-gray-700">
                                <span class="font-semibold">Jumlah Transfer</span>: Rp. 80.000
                            </p>
                            <button class="text-blue-500 hover:underline" onclick="copyText('80000')">Salin</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cara Membayar -->
            <div class="bg-white p-6 mt-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-gray-700">Bagaimana Cara Membayar</h2>
                <div class="mt-4">
                  <!-- Accordion -->
                  <div id="accordion-payment" class="accordion">
                    <!-- BCA Mobile -->
                    <h2 id="accordion-heading-1">
                      <button type="button" class="flex items-center justify-between w-full py-4 text-left text-gray-700 font-medium"
                        onclick="toggleAccordion('accordion-content-1', this)">
                        BCA Mobile
                        <svg class="w-5 h-5 transition-transform transform" xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </button>
                    </h2>
                    <div id="accordion-content-1" class="hidden" aria-labelledby="accordion-heading-1">
                      <div class="py-4 pl-4 text-gray-600">
                        <ol class="list-decimal space-y-1">
                          <li>Buka Aplikasi BCA Mobile.</li>
                          <li>Pilih Menu "m-BCA".</li>
                          <li>Masukkan kode akses Anda untuk masuk ke dalam layanan m-BCA.</li>
                          <li>Pilih menu "m-Transfer".</li>
                          <li>Di dalam menu m-Transfer, pilih opsi "BCA Virtual Account".</li>
                          <li>Masukkan nomor Virtual Account yang telah diberikan kepada Anda.</li>
                        </ol>
                      </div>
                    </div>
              
                    <!-- ATM BCA -->
                    <h2 id="accordion-heading-2">
                      <button type="button" class="flex items-center justify-between w-full py-4 text-left text-gray-700 font-medium"
                        onclick="toggleAccordion('accordion-content-2', this)">
                        ATM BCA
                        <svg class="w-5 h-5 transition-transform transform" xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </button>
                    </h2>
                    <div id="accordion-content-2" class="hidden" aria-labelledby="accordion-heading-2">
                      <div class="py-4 pl-4 text-gray-600">
                        <ol class="list-decimal space-y-1">
                          <li>Masukkan kartu ATM ke mesin ATM.</li>
                          <li>Masukkan PIN Anda.</li>
                          <li>Pilih menu "Transaksi Lainnya".</li>
                          <li>Pilih menu "Pembayaran".</li>
                          <li>Masukkan nomor Virtual Account yang telah diberikan.</li>
                          <li>Ikuti instruksi untuk menyelesaikan pembayaran.</li>
                        </ol>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <!-- Konfirmasi Pembayaran -->
            <div class="bg-white p-6 mt-6 rounded-lg shadow">
                <h2 class="text-lg font-medium text-gray-700">Sudah selesai bayar?</h2>
                <p class="text-sm text-gray-500 mt-2">
                    Sistem akan mengonfirmasi pembayaran dengan mengirimkan kode pemesanan dan bukti pembayaran ke emailmu.
                </p>
                <button class="mt-4 w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600" onclick="handlePaymentConfirmation()">
                    Ya, saya sudah membayar
                </button>
            </div>
        </div>

        <!-- Kolom Rincian Booking -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-700">Rincian Booking</h2>
            <div class="mt-4">
                <div class="flex">
                    <?php $file = $_SERVER['DOCUMENT_ROOT'] . "/proyekHarmonEasee/" . $psikolog['foto'];
                        if (file_exists($file)) {
                            echo "<img src='/proyekHarmonEasee/" . htmlspecialchars($psikolog['foto']) . "' alt='Foto Psikolog' class='w-16 h-16 rounded-full mb-4'>";
                        } else {
                            echo "<span class='text-gray-500'>Foto tidak tersedia</span>";
                        }
                    ?>
                    <div class="ml-3">
                        <h1 class="text-base font-medium text-sky-700 justify-center"><?php echo $psikolog['nama_lengkap']; ?></h1>
                        <div class="flex justify-center text-center">
                            <i class="fa fa-star text-yellow-400 mt-1 mr-1"></i>
                            <p class="text-green-950 text-base font-medium mr-2"><?php echo $psikolog['penilaian']; ?></p>
                            <p class="text-base font-medium mx-2">|</p>
                            <i class="fa fa-briefcase text-gray-800 mt-1 mr-1"></i>
                            <p class="text-gray-800 font-light"><?php echo $psikolog['pengalaman_tahun']; ?> tahun</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4 space-y-2 text-gray-700">
                    <p><span class="font-semibold">Jadwal Sesi</span>: <?php echo htmlspecialchars($psikolog['tgl_konsul']); ?></p>
                    <p><span class="font-semibold">Waktu Sesi</span>: <?php echo htmlspecialchars($psikolog['jam_konsul']); ?></p>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="paymentModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-md w-96">
                <h3 class="text-lg font-semibold text-gray-800">Pembayaran Berhasil!</h3>
                <p class="text-gray-600 mt-2">Kode konsultasi Anda: <span id="bookingCode"></span></p>
                <div class="mt-4 text-right">
                    <button onclick="closeModal()" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-gray-200/50 my-20 pt-10 pb-3">
            <!-- Copyright -->
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500">© 2024 HarmonEase. All Rights Reserved.</p>
            </div>
    </footer>
    <script>
        function handlePaymentConfirmation() {
            const bookingCode = "1234"; // Ganti dengan data dinamis jika diperlukan
            
            // Insert booking code into modal
            document.getElementById('bookingCode').innerText = bookingCode;
            
            // Show the modal
            document.getElementById('paymentModal').classList.remove('hidden');
        }

        function closeModal() {
            // Hide the modal
            document.getElementById('paymentModal').classList.add('hidden');
            window.location.href = "index.php";
        }


    </script>
</body>
</html>
