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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-white">
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
              <a href="daftarpsikolog.php" class="font-medium text-sm hover:underline">Psikolog</a>
              <span class="mx-2">›</span>
              <a href="jadwalpsikolog.php" class="font-medium text-sm hover:underline">Jadwal konsultasi</a>
              <span class="mx-2">›</span>
              <a href="pembayaran.php" class="font-medium text-sm text-gray-900 hover:underline">Pembayaran</a>
            </nav>
        </div>
    </div>
    <div class="max-w-8xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <main class="col-span-2 bg-white p-6 rounded-lg shadow-lg border">
                <p class="text-sm text-gray-600">Yuk selesaikan pembayaran dalam <span class="text-black mx-3">00:00:00</span><i class="fa-solid fa-clock mr-2"></i></p>
                <h1 class="text-2xl font-semibold text-cyan-700 mt-6">Mau bayar pakai metode apa?</h1>
                <div id="accordion-arrow-icon" data-accordion="open" class="mt-5">
                    <h2 id="accordion-arrow-icon-heading-1">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-900 bg-gray-100 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 gap-3" data-accordion-target="#accordion-arrow-icon-body-1" aria-expanded="true" aria-controls="accordion-arrow-icon-body-1">
                        <span>Virtual Account</span>
                    </button>
                    </h2>
                    <div id="accordion-arrow-icon-body-1" aria-labelledby="accordion-arrow-icon-heading-1">
                    <div class="p-5 border border-b-0 border-gray-200 ">
                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment-method" value="bca" class="h-4 w-4 text-blue-600 border-gray-300">
                            <span>BCA Virtual Account</span>
                        </label>
                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment-method" value="bca" class="h-4 w-4 text-blue-600 border-gray-300">
                            <span>Mandiri Virtual Account</span>
                        </label>
                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment-method" value="bca" class="h-4 w-4 text-blue-600 border-gray-300">
                            <span>BRI Virtual Account</span>
                        </label>
                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment-method" value="bca" class="h-4 w-4 text-blue-600 border-gray-300">
                            <span>BNI Virtual Account</span>
                        </label>
                    </div>
                    </div>
                    <h2 id="accordion-arrow-icon-heading-2">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 gap-3" data-accordion-target="#accordion-arrow-icon-body-2" aria-expanded="false" aria-controls="accordion-arrow-icon-body-2">
                        <span>Transfer Bank (ATM/Bank Lainnya)</span>
                    </button>
                    </h2>
                    <div id="accordion-arrow-icon-body-2" class="hidden" aria-labelledby="accordion-arrow-icon-heading-2">
                    <div class="p-5 border border-b-0 border-gray-200 ">
                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment-method" value="bca" class="h-4 w-4 text-blue-600 border-gray-300">
                            <span>BCA</span>
                        </label>
                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment-method" value="bca" class="h-4 w-4 text-blue-600 border-gray-300">
                            <span>Mandiri</span>
                        </label>
                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment-method" value="bca" class="h-4 w-4 text-blue-600 border-gray-300">
                            <span>BRI</span>
                        </label>
                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment-method" value="bca" class="h-4 w-4 text-blue-600 border-gray-300">
                            <span>BNI</span>
                        </label>
                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment-method" value="bca" class="h-4 w-4 text-blue-600 border-gray-300">
                            <span>CIMB Niaga</span>
                        </label>
                    </div>
                    </div>
                    <h2 id="accordion-arrow-icon-heading-3">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 gap-3" data-accordion-target="#accordion-arrow-icon-body-3" aria-expanded="false" aria-controls="accordion-arrow-icon-body-3">
                        <span>E-wallet</span>
                    </button>
                    </h2>
                    <div id="accordion-arrow-icon-body-3" class="hidden" aria-labelledby="accordion-arrow-icon-heading-3">
                    <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment-method" value="bca" class="h-4 w-4 text-blue-600 border-gray-300">
                            <span>ShopeePay</span>
                        </label>
                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment-method" value="bca" class="h-4 w-4 text-blue-600 border-gray-300">
                            <span>GoPay</span>
                        </label>
                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment-method" value="bca" class="h-4 w-4 text-blue-600 border-gray-300">
                            <span>OVO</span>
                        </label>
                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment-method" value="bca" class="h-4 w-4 text-blue-600 border-gray-300">
                            <span>LinkAja</span>
                        </label>
                    </div>
                    </div>
                </div>
                <!-- Kolom Kupon -->
                <div class="mt-6">
                    <h3 class="font-medium text-gray-700 mb-2">Pakai Kupon</h3>
                    <div class="flex items-center space-x-3">
                        <input type="text" placeholder="Masukkan kode kupon" class="flex-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Pakai</button>
                    </div>
                </div>

                <!-- Harga & Tombol Bayar -->
                <div class="mt-8 border-t pt-4">
                    <div class="flex items-center justify-between text-lg font-semibold">
                        <span>Total Harga:</span>
                        <span class="text-blue-600">Rp. <?php echo number_format($psikolog['biaya_konsultasi'], 0, ',', '.'); ?></span>
                    </div>
                    <a href="buktipembayaran.php?id=<?php echo $psikolog['id']; ?>">
                    <form id="paymentForm" action="buktipembayaran.php" method="get">
                        <input type="hidden" name="id" value="<?php echo $psikolog['id']; ?>">
                        <button type="button" 
                                class="w-full mt-4 px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700"
                                onclick="confirmPayment()">
                            Bayar Sekarang
                        </button>
                    </form>
                </div>
            </main>

            <!-- Booking Details Sidebar -->
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
                        <p><span class="font-semibold">Jumlah Sesi</span>: 1 Sesi</p> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    // Fungsi untuk memvalidasi metode pembayaran
    function validatePayment() {
        const paymentMethod = document.querySelector('input[name="payment-method"]:checked');
        if (!paymentMethod) {
            alert("Silakan pilih metode pembayaran sebelum melanjutkan.");
            return false;
        }
        return true;
    }

    // Tambahkan pop-up konfirmasi
    function confirmPayment() {
        if (validatePayment()) {
            const confirmAction = confirm("Apakah Anda yakin ingin melanjutkan ke pembayaran?");
            if (confirmAction) {
                document.getElementById("paymentForm").submit();
            }
        }
    }
</script>

</body>
</html>
