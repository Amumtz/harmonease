<?php

session_start();
require_once('koneksi.php');
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM podcast";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$podcasts = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $podcasts[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Podcast</title>
</head>
<body class="flex flex-wrap space-x-4">
    <div class="flex flex-col h-full ">
        <main class="container flex ">
          <!-- Left Section -->
          <div class="w-full bg-white ">
            <header class="bg-white p-4">
              <div class="container mx-auto flex items-center justify-between">
                <div class="flex items-center">
                  <div class=" h-10 w-10 border-2 ml-20 rounded-md shadow-sm">
                    <button class="back-button text-xl ml-2 mt-1 hover:text-gray-300">
                      <i class="fa-solid fa-arrow-left"></i>
                    </button>
                  </div>
                  <nav class="text-gray-600 text-sm ml-5">
                    <a href="index.php" class="text-xs hover:underline">Home</a>
                    <span class="mx-2">›</span>
                    <a href="ruang_edukasi.php" class="text-xs text-gray-900 hover:underline">Ruang Edukasi</a>
                    <span class="mx-2">›</span>
                    <a href="podcast.php" class="font-medium text-gray-900 hover:underline">Podcast</a>
                  </nav>
                </div>
                
                <div class="relative mr-20 ">
                  <input type="text" placeholder="Search" class="border rounded-full px-4 py-2 text-sm w-64">
                  <button class="absolute right-2 top-2 text-gray-400"> <img src="external/vectori344-knem.svg" alt="otifikasi" class="w-5 h-5">
                  </button>
                </div>
              </div>
          </header>
          <div class="flex bg-gray-300 items-center rounded border-2 h-60 mx-20 mt-8">
            <div class="mr-28 ml-10">
                <p class="text-red-600 font-bold text-sm">Verified Artist</p>
                <h1 class="text-2xl text-cyan-800 font-bold">Jones</h1>
                <div class="flex">
                  <i class="fa-solid fa-headphones mt-2 mr-2"></i>
                  <p class="text-gray-500  text-xs font-extrabold mt-2">82,736,050</p>
                  <p class="text-gray-500 ml-2 mt-2 font-medium text-xs ">monthly listeners</p>
                </div>
                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-3xl shadow hover:bg-blue-600">Play</button>
            </div>
            <img src="img/podcast (1).png" alt="Artist" class="w-80 h-60 rounded-lg">
          </div>
      
          <div class="mt-8 mb-36 mx-24">
              <h2 class="text-lg font-semibold">Playlist</h2>
              <ul class="mt-4 space-y-4">
                <?php if (!empty($podcasts)): ?>
                    <?php foreach ($podcasts as $podcast): ?>
                        <li class="flex items-center justify-between border-b pb-1 podcast-item" data-audio="<?php echo htmlspecialchars($podcast['file_podcast']); ?>">
                            <div class="flex items-center ml-2">
                                <!-- Menampilkan gambar cover -->
                                <img src="<?php echo htmlspecialchars($podcast['cover_img']); ?>" alt="Cover <?php echo htmlspecialchars($podcast['judul']); ?>" 
                                    class="w-16 h-16 rounded-md mr-4 object-cover shadow-sm">

                                <!-- Informasi Podcast -->
                                <p class="font-semibold text-gray-600 mr-36"><?php echo htmlspecialchars($podcast['judul']); ?></p>
                            </div>
                            <div class="flex items-center text-gray-500 ">
                                <i class="fa-solid fa-headphones ml-2 mr-2"></i>
                                <p class="mr-10">460,228,511</p>
                                <i class="fa-solid fa-clock mr-2"></i>
                                <p class="mr-10">3:27</p>
                                <button class="love-button mr-10 text-xl hover:text-red-500">
                                     <i class="fa-regular fa-heart"></i>
                                </button>
                                <button class="add-to-queue-btn text-blue-500 hover:text-blue-700">Tambah ke Antrian</button>
                            </div>
                             <!-- Tombol Add to Queue -->
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                <li>
                    <p class="text-gray-600">Tidak ada data podcast yang tersedia.</p>
                </li>
            <?php endif; ?>
            </ul>      
          </div>
          <div class="mt-5 text-center bg-gray-100/50 py-10 mb-24">
                <p class="text-sm text-gray-500">© 2024 HarmonEase. All Rights Reserved.</p>
          </div>
          </div>

          <aside class="fixed top-0 right-0 h-screen w-1/4 bg-cyan-600 py-6 px-6 rounded-lg shadow-md">
            <div class="flex ">
              <img src="external/ellipse23437-cpab-200h.png" alt="" class="w-10 h-10">
              <p class="text-base font-light ml-3 mt-2 mb-6">Samudra Batara</p>
            </div>
            <h2 class="text-lg font-semibold">Antrian</h2>
            <ul id="queueList" class="mt-4 space-y-2">
                <!-- Daftar antrian akan diisi secara dinamis -->
            </ul>
          </aside>
        
        </main>    
        <div class="fixed inset-x-0 bottom-0">
            <footer class="spotify-player backdrop-blur-3xl bg-cyan-600/40 text-white fixed bottom-0 w-full p-3 flex items-center justify-between">
                <!-- Audio Player -->
                <audio id="audioPlayer" src="<?php echo htmlspecialchars($file) ?>" preload="auto" class="w-96 h-1 bg-gray-600 rounded-lg"></audio>
              <div class="flex items-center justify-between text-white px-4 py-2">
              <!-- Bagian Kiri: Gambar dan Teks -->
              <div class="flex items-center gap-4">
                  
                  <div class="flex items-center mr-24 gap-4">
                      <img id="footerCover" src="<?php echo htmlspecialchars($podcast['cover_img']); ?>" alt="Cover <?php echo htmlspecialchars($podcast['judul']); ?>" class="w-16 h-16 rounded-md mr-4 object-cover shadow-sm">
                      <div class="items-center ml-2">
                          <p id="footerTitle" class="font-semibold text-gray-600"><?php echo htmlspecialchars($podcast['judul']); ?></p>
                          <p id="footerArtis" class="font-light text-gray-600 mr-5"><?php echo htmlspecialchars($podcast['artis']); ?></p>
                        </div>
                        <button class="love-button hover:text-red-500">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </div>   
                    <div class="relative mr-16">
                        <!-- Bagian Tengah: Kontrol Pemutar -->
                        <div class="flex items-center ml-48 gap-4">
                            <button class="shuffle-button text-xl hover:text-gray-400">
                                <i class="fa-solid fa-shuffle"></i><!-- Ikon Shuffle -->
                            </button>
                            <button class="prev-button text-2xl hover:text-gray-400">
                                <i class="fa-solid fa-backward"></i> <!-- Ikon Previous -->
                            </button>
                            <button id="playButton" class="text-2xl text-gray-600 ">
                                <i class="fa-solid fa-play"></i><!-- Ikon Play -->
                            </button>
                            <button class="next-button text-2xl hover:text-gray-400">
                                <i class="fa-solid fa-forward"></i> <!-- Ikon Next -->
                            </button>
                            <button class="repeat-button text-xl hover:text-gray-400">
                                <i class="fa-solid fa-repeat"></i><!-- Ikon Repeat -->
                            </button>
                        </div>
                        <div class="flex items-center gap-2 ml-24 w-full">
                            <span id="currentTime" class="text-xs text-gray-700">0:00</span>
                            <div class="relative flex-grow h-2 rounded-full bg-gray-600 overflow-hidden">
                                <input id="progressBar" type="range" min="0" max="100" value="0" class="absolute w-full h-full appearance-none bg-transparent accent-green-500 cursor-pointer">
                                <div class="absolute h-full bg-green-500 rounded-full pointer-events-none" style="width: 0%" id="progressFill">
                                </div>
                            </div>
                            <span id="duration" class="text-xs text-gray-700">0:00</span>
                        </div>
                    </div>
                
                <!-- Bagian Kanan: Volume dan Durasi -->
                <div class="flex items-center gap-2 ml-40">
                  <!-- <p class="text-sm">1:45 / 30:42</p> -->
                <button class="volume-button text-xl hover:text-gray-400">
                    <i class="fa-solid fa-volume-high"></i> <!-- Ikon Volume -->
                    <input id="volumeSlider" type="range" min="0" max="100" value="50">
                    <label for="volumeSlider"></label></button>
                </div>
              </div>
            </footer>
          </div>
        </div> 
    </div>

    <script src="scriptpodcast.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const audioPlayer = document.getElementById('audioPlayer');
    const playButton = document.getElementById('playButton');
    const prevButton = document.querySelector('.prev-button');
    const nextButton = document.querySelector('.next-button');
    const shuffleButton = document.querySelector('.shuffle-button');
    const repeatButton = document.querySelector('.repeat-button');
    const progressBar = document.getElementById('progressBar');
    const volumeSlider = document.getElementById('volumeSlider');
    const currentTimeLabel = document.getElementById('currentTime');
    const durationLabel = document.getElementById('duration');
    const footerCover = document.getElementById('footerCover');
    const footerTitle = document.getElementById('footerTitle');
    const podcastItems = document.querySelectorAll('.podcast-item');
    const queueList = document.getElementById('queueList');

    // Playlist: Data lagu dari elemen podcast-item
    const playlist = Array.from(podcastItems).map(item => ({
        audioUrl: item.getAttribute('data-audio'),
        coverImg: item.querySelector('img').src,
        title: item.querySelector('p').textContent
    }));

    audioPlayer.addEventListener('timeupdate', () => {
        progressBar.value = (audioPlayer.currentTime / audioPlayer.duration) * 100;
        currentTimeLabel.textContent = formatTime(audioPlayer.currentTime);
        durationLabel.textContent = formatTime(audioPlayer.duration);
    });

    // Seek in the audio
    progressBar.addEventListener('input', () => {
        audioPlayer.currentTime = (progressBar.value / 100) * audioPlayer.duration;
    });

    // Format time in MM:SS
    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = Math.floor(seconds % 60).toString().padStart(2, '0');
        return `${minutes}:${remainingSeconds}`;
    }

    const queue = []; // Antrian untuk lagu
    let currentIndex = null;

    // Fungsi untuk memperbarui player
    function updatePlayer(index) {
        if (index === null || index >= playlist.length) {
            console.log("Indeks lagu tidak valid.");
            return;
        }

        const { audioUrl, coverImg, title } = playlist[index];
        currentIndex = index;

        // Perbarui UI
        audioPlayer.src = audioUrl;
        footerCover.src = coverImg;
        footerTitle.textContent = title;

        // Mulai memutar
        audioPlayer.play();
        playButton.innerHTML = '<i class="fa-solid fa-pause"></i>';
    }

    // Fungsi untuk toggle play/pause
    function togglePlay() {
        if (audioPlayer.paused) {
            audioPlayer.play();
            playButton.innerHTML = '<i class="fa-solid fa-pause"></i>';
        } else {
            audioPlayer.pause();
            playButton.innerHTML = '<i class="fa-solid fa-play"></i>';
        }
    }

    // Fungsi untuk memutar lagu berikutnya
    function playNext() {
        if (queue.length > 0) {
            const nextIndex = queue.shift(); // Ambil lagu dari antrian
            updatePlayer(nextIndex);
        } else if (currentIndex + 1 < playlist.length) {
            updatePlayer(currentIndex + 1);
        } else {
            console.log("Antrian kosong dan tidak ada lagu berikutnya.");
        }
    }

    // Fungsi untuk menambahkan podcast ke antrian
    function addToQueue(index) {
        if (index !== null && !queue.includes(index)) {
            queue.push(index);
            console.log(`Podcast "${playlist[index].title}" ditambahkan ke antrian.`);
            updateQueueDisplay();
        }
    }

    // Fungsi untuk memperbarui tampilan antrian
    function updateQueueDisplay() {
        queueList.innerHTML = ''; // Kosongkan antrian
        queue.forEach(index => {
            const { title } = playlist[index];
            const listItem = document.createElement('li');
            listItem.textContent = title;
            queueList.appendChild(listItem);
        });
    }

    // Fungsi untuk mengatur volume
    function setVolume() {
        audioPlayer.volume = volumeSlider.value / 100;
    }

    // Fungsi untuk toggle repeat
    function toggleRepeat() {
        audioPlayer.loop = !audioPlayer.loop;
        repeatButton.style.color = audioPlayer.loop ? 'blue' : 'black';
    }

    // Event listeners
    playButton.addEventListener('click', togglePlay);
    nextButton.addEventListener('click', playNext);
    prevButton.addEventListener('click', function () {
        if (currentIndex - 1 >= 0) {
            updatePlayer(currentIndex - 1);
        } else {
            console.log("Sudah di lagu pertama.");
        }
    });
    shuffleButton.addEventListener('click', function () {
        alert('Shuffle belum diimplementasikan!');
    });
    repeatButton.addEventListener('click', toggleRepeat);
    progressBar.addEventListener('input', function () {
        if (!isNaN(audioPlayer.duration)) {
            audioPlayer.currentTime = (progressBar.value / 100) * audioPlayer.duration;
        }
    });
    volumeSlider.addEventListener('input', setVolume);

    // Event Listener untuk item podcast
    podcastItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            addToQueue(index);
            // Jangan putar lagu langsung saat menambahkan ke antrian
        });
    });

    // Inisialisasi volume
    audioPlayer.volume = 0.5; // Default volume
    audioPlayer.addEventListener('timeupdate', function () {
        if (!isNaN(audioPlayer.duration)) {
            progressBar.value = (audioPlayer.currentTime / audioPlayer.duration) * 100;
        }
    });
});

</script>
</body>
</html>