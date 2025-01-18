<?php
session_start();
require_once('koneksi.php');
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

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
  <title>Profil Psikolog</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="">
  <div id="popup" class="fixed inset-0 flex items-center justify-center bg-black/50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-80">
      <h2 class="text-xl font-bold mb-4">Masukkan Kode</h2>
      <div id="message-container"></div>
      <input type="text" id="input-code" class="w-full p-2 border rounded mb-4" placeholder="Masukkan kode Anda" />
      <div class="flex justify-end space-x-4">
        <button id="cancel-button" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</button>
        <button id="submit-button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">OK</button>
      </div>
    </div>
  </div>
  <!-- Header -->
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
        <a href="daftarpsikolog.php" class="font-medium text-sm text-gray-900 hover:underline">Psikolog</a>
      </nav>
    </div>
  </div>

  <!-- Content -->
  <main class="p-6 max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Sidebar Profile Card -->
    <aside class="border rounded-lg  p-6 h-fit bg-sky-300/10 shadow-lg flex flex-col items-center">
        <?php $file = $_SERVER['DOCUMENT_ROOT'] . "/proyekHarmonEasee/" . $psikolog['foto'];
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
    <section class="bg-white p-6 md:col-span-2">
      <h1 class="text-4xl font-bold text-sky-700 mb-4"><?php echo $psikolog['nama_lengkap']; ?></h1>
      <p class="text-gray-500 text-sm mb-2">Nomor Izin Praktik: <span class="font-semibold text-gray-800"><?php echo $psikolog['nomor_lisensi']; ?></span></p>
      <div class="mt-4">
        <h3 class="font-bold text-sky-700">Spesialis</h3>
        <div class="flex space-x-2 mt-2">
          <?php $spesialis = explode(',', $psikolog['spesialis']);
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
        <p class="text-gray-500 font-light">Jumlah Konsultasi: <?php echo $psikolog['jumlah_konsultasi']; ?> Konsultasi</p>
      </div>
      <div class="mt-4">
        <h3 class="font-bold text-sky-700">About</h3>
        <p class="text-gray-500 font-light"><?php echo $psikolog['deskripsi']; ?></p>
      </div>
    </section>

    <!-- Reviews Section -->
    <section class="md:col-span-3">
      <h2 class="text-xl font-bold text-sky-700 mb-4">Reviews</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Review Card -->
        <div class="bg-blue-300/10 shadow-md border rounded-lg p-4">
          <div class="flex items-center justify-around px-1 mb-2">
            <div class="w-12 h-12 bg-gray-300 rounded-full ">
              <img src="img/pasien (2).jpeg" alt="" class="w-12 h-12 rounded-full">
            </div>
            <div class=" mr-8">
              <h4 class="font-semibold text-gray-800">Flora Gheraldi</h4>
              <span class="text-gray-800 text-sm font-thin">Patient</span>
            </div>
            <div class="flex justify-center bg-slate-200 border px-2 py-1 rounded-2xl ml-20">
              <i class="fa fa-star text-yellow-400 mr-0.5 mt-0.5"></i>
              <p class="text-green-950 text-sm mt-0.5">4.5</p>
            </div>
          </div>
          <p class="text-gray-500 text-sm font-extralight line-clamp-4 ">
            Saya sangat puas dengan layanan konsultasi yang saya terima dari Bapak Arsha. Dari awal sesi, beliau membuat saya merasa sangat nyaman dan aman untuk berbicara tentang masalah-masalah pribadi saya. Pendekatan beliau yang empatik dan profesional sangat membantu saya dalam memahami dan mengatasi stres yang saya alami.
          </p>
        </div>
        <!-- Repeat for other reviews -->
        <div class="bg-blue-300/10 shadow-md border rounded-lg p-4">
          <div class="flex items-center justify-around mb-2">
            <div class="w-12 h-12 bg-gray-300 rounded-full ">
              <img src="img/pasien (1).jpeg" alt="" class="w-12 h-12 rounded-full">
            </div>
            <div class="mr-1">
              <h4 class="font-semibold text-gray-800">Arkana Cakrawala</h4>
              <span class="text-gray-800 text-sm font-thin">Patient</span>
            </div>
            <div class="flex justify-center bg-slate-200 border px-2 py-1 rounded-2xl ml-20">
              <i class="fa fa-star text-yellow-400 mr-0.5 mt-0.5"></i>
              <p class="text-green-950 text-sm mt-0.5">4.5</p>
            </div>
          </div>
          <p class="text-gray-500 text-sm font-extralight line-clamp-4 ">
            Saya sangat bersyukur telah mengikuti sesi konsultasi dengan Bapak Arsha. Dari pertama kali bertemu, beliau menunjukkan sikap yang sangat profesional dan penuh empati. Bapak Arsha sangat sabar mendengarkan semua keluhan dan masalah yang saya alami, dan memberikan pandangan serta solusi yang sangat membantu.
          </p>
        </div>
        <div class="bg-blue-300/10 shadow-md border rounded-lg p-4">
          <div class="flex items-center justify-around  mb-2">
            <div class="w-12 h-12 bg-gray-300 rounded-full ">
              <img src="img/pasien (3).jpeg" alt="" class="w-12 h-12 rounded-full">
            </div>
            <div class=" mr-12">
              <h4 class="font-semibold text-gray-800">Zoya Skylar</h4>
              <span class="text-gray-800 text-sm font-thin">Patient</span>
            </div>
            <div class="flex justify-center bg-slate-200 border px-2 py-1 rounded-2xl ml-20">
              <i class="fa fa-star text-yellow-400 mr-0.5 mt-0.5"></i>
              <p class="text-green-950 text-sm mt-0.5">4.5</p>
            </div>
          </div>
          <p class="text-gray-500 text-sm font-extralight line-clamp-4 ">
            Setelah beberapa sesi, saya merasakan perubahan positif yang signifikan dalam cara saya menghadapi masalah dan merespons situasi yang menekan. Saya sangat merekomendasikan Bapak Arsha kepada siapa saja yang membutuhkan dukungan psikologis
          </p>
        </div>
      </div>
    </section>
  </main>
  <footer class="bg-gray-200/50 my-20 pt-10 pb-3">
          <!-- Copyright -->
          <div class="mt-3 text-center">
              <p class="text-sm text-gray-500">© 2024 HarmonEase. All Rights Reserved.</p>
          </div>
  </footer>
  <script>
        // Ambil elemen tombol profil dan menu
        const profileButton = document.getElementById('profile');
      const profileMenu = document.getElementById('profile-menu');
  
      // Tambahkan event listener untuk toggle menu
      profileButton.addEventListener('click', () => {
          profileMenu.classList.toggle('hidden'); // Menampilkan/menghilangkan menu
      });
  
      // Menutup menu dropdown ketika klik di luar area menu
      document.addEventListener('click', (event) => {
          if (!profileButton.contains(event.target) && !profileMenu.contains(event.target)) {
              profileMenu.classList.add('hidden'); // Sembunyikan menu jika klik di luar
          }
      });

      const popup = document.getElementById('popup');
      const inputCode = document.getElementById('input-code');
      const cancelButton = document.getElementById('cancel-button');
      const submitButton = document.getElementById('submit-button');

      let targetLink = ''; // Menyimpan link tujuan berdasarkan tombol

      document.addEventListener('DOMContentLoaded', () => {
        // Tombol Phone
        document.getElementById('phone-button').addEventListener('click', () => {
          console.log('Phone button diklik');

          // Ubah isi pop-up
          document.querySelector('#popup h2').textContent = 'Informasi';
          document.querySelector('#popup input').classList.add('hidden');
          document.querySelector('#popup .flex').classList.add('hidden');

          // Periksa apakah pesan sudah ada
          const messageContainer = document.getElementById('message-container');
          let message = document.querySelector('#message-container .message');
          console.log('Pesan yang ditemukan:', message);

          if (!message) {
            console.log('Menambahkan pesan khusus...');
            message = document.createElement('p');
            message.textContent = 'Maaf, fitur ini masih dalam pengembangan.';
            message.className = 'text-center text-gray-700 mt-4 message';
            messageContainer.appendChild(message); // Masukkan ke dalam message-container
          }

          // Tampilkan pop-up
          popup.classList.remove('hidden');
        });

        // Tombol Message
        document.getElementById('message-button').addEventListener('click', () => {
          targetLink = 'https://wa.me/628123456789';
          popup.classList.remove('hidden');
        });

        // Tombol Video Call
        document.getElementById('video-call-button').addEventListener('click', () => {
          targetLink = 'https://zoom.us/j/1234567890';
          popup.classList.remove('hidden');
        });
      });

      // Tombol Cancel
      cancelButton.addEventListener('click', () => {
        // Reset pop-up
        popup.classList.add('hidden');
        const message = document.querySelector('#message-container .message');
        if (message) message.remove(); // Hapus pesan jika ada
        document.querySelector('#popup h2').textContent = 'Masukkan Kode'; // Reset ke default
        document.querySelector('#popup input').classList.remove('hidden');
        document.querySelector('#popup .flex').classList.remove('hidden');
        inputCode.value = ''; // Kosongkan input
      });

      // Tombol Submit
      submitButton.addEventListener('click', () => {
        const code = inputCode.value;
        if (code === '1234') { // Validasi kode
          popup.classList.add('hidden');
          inputCode.value = ''; // Kosongkan input
          window.location.href = targetLink; // Arahkan ke link tujuan
        } else {
          alert('Kode salah!');
        }
      });

  </script>
</body>
</html>
