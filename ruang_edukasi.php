<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <title>Ruang Edukasi</title>
</head>
<body>
    <header id="header-placeholder" class=" bg-white mt-0 shadow z-50">
        <script src="header.js"></script>
    </header>
    <div class="text-center mt-32 mx-44">
        <h1 class="text-3xl font-extrabold text-[#1A74A0]">Ruang Edukasi</h1>
        <p class="mt-8 text-wrap text-lg font-medium text-gray-600 md:font-normal md:text-balance">Selamat datang di Ruang Edukasi, tempat terbaik untuk memperkaya wawasan dan menjaga kesehatan mental Anda. Dalam aplikasi HarmonEasee, kami menyediakan berbagai sumber daya untuk membantu Anda memahami, mengelola, dan merawat kesehatan mental dengan lebih baik.</p>
    </div>
    <div id="artikel" class="mt-32 mx-10">
        <div class="flex items-center justify-between">
            <h4 class="text-lg font-bold text-[#1A74A0] ">Artikel</h4>
            <p class="text-right text-[#339af0]"><a href="kategoriartikel.php">Selanjutnya</a></p>
        </div>
        <div class="flex items-center space-x-4 mt-4">
            <div id="carousel" class="flex overflow-x-auto space-x-4 scrollbar-hide">
                <div class="relative flex-shrink-0 w-48"><a href="artikel.php">
                    <img src="img/aertikel (2).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-48"><a href="#">
                    <img src="img/artikel (2).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-reguler">Menumbuhkan Rasa Syukur: Cara Meningkatkan Kepuasan Hidup</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-48"><a href="#">
                    <img src="img/artikel (1).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-reguler">Strategi Menghadapi Penolakan dan Membangun Ketahanan Diri</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-48"><a href="#">
                    <img src="img/artikel (4).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-reguler">Mengelola Stres dengan Latihan Fisik yang Teratur</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-48"><a href="#">
                    <img src="img/aertikel (1).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-reguler">Dampak Kesehatan Mental terhadap Hubungan Anda</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-48"><a href="#">
                    <img src="img/artikel (3).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-reguler">Menumbuhkan Rasa Syukur: Cara Meningkatkan Kepuasan Hidup</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-48"><a href="#">
                    <img src="img/aertikel (5).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-reguler">Menjaga Kesehatan Mental dalam Hubungan Interpersonal</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-28 mx-10">
        <div class="flex items-center justify-between">
            <h4 class="text-lg font-bold text-[#1A74A0]">Video</h4>
            <p class="text-right text-[#339af0]"><a href="kategorivideo.php">Selanjutnya</a></p>
        </div>
        <div class="flex items-center space-x-4 mt-4">
            <div id="carousel" class="flex overflow-x-auto space-x-4 scrollbar-hide">
                <div class="relative flex-shrink-0 w-52"><a href="video.php">
                    <img src="external/thumbnailvideo (1).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-sm font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-52"><a href="#">
                    <img src="external/thumbnailvideo (2).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-sm font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-52"><a href="#">
                    <img src="external/thumbnailvideo (3).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-sm font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-52"><a href="#">
                    <img src="external/thumbnailvideo (4).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-sm font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-52"><a href="#">
                    <img src="external/thumbnailvideo (6).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-sm font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-52"><a href="#">
                    <img src="external/thumbnailvideo (5).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-sm font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-52"><a href="#">
                    <img src="external/thumbnailvideo (7).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-sm font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="podcast" class="mt-28 mx-10 mb-20">
        <div class="flex items-center justify-between">
            <h4 class="text-lg font-bold text-[#1A74A0]">Podcast</h4>
            <p class="text-right text-[#339af0]"><a href="kategoripodcast.php">Selanjutnya</a></p>
        </div>
        <div class="flex items-center space-x-4 mt-4">
            <div id="carousel" class="flex overflow-x-auto space-x-4 scrollbar-hide">
                <div class="relative flex-shrink-0 w-36"><a href="podcast.php">
                    <img src="img/podcast (1).png" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="img/podcast (2).png" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="img/podcast (3).png" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="img/podcast (4).png" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="img/podcast (5).png" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="img/podcast (8).png" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="img/podcast (7).png" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="img/Graphic.png" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="img/Graphic.png" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="img/Graphic.png" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-gray-100/50 my-20">
        <div class="container-fluid px-4 pt-5 lg:px-4">
            <!-- Logo dan Navigasi -->
            <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
                <!-- Logo Perusahaan --> 
                <div class="col-span-1 md:col-span-1 mb-6 flex items-center">
                    <img src="img/logo.png" alt="Logo Perusahaan" class="w-16 h-16">
                    <h1 class="text-2xl ml-2 text-gray-900 font-medium text-center">HarmonEasee</h1>
                </div>
    
                <!-- Menu COMPANY -->
                <div class="col-span-1 ml-10 mb-6">
                    <h3 class="text-xl font-semibold mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="aboutus.php" class="text-gray-400 hover:text-gray-700">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Careers</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Our Story</a></li>
                    </ul>
                </div>
    
                <!-- Menu Service -->
                <div class="col-span-1 mb-6">
                    <h3 class="text-xl font-semibold mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Consulting</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Support</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Custom Solutions</a></li>
                    </ul>
                </div>
    
                <!-- Menu Resources -->
                <div class="col-span-1 mb-6">
                    <h3 class="text-xl font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Guides</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">FAQs</a></li>
                    </ul>
                </div>
    
                <!-- Social Media Icons -->
                <div class="col-span-1 mb-6 flex flex-col items-start">
                    <h3 class="text-xl font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-gray-900">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-900">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-900">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-900">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
    
            <!-- Copyright -->
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500">© 2024 HarmonEase. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>
<script>
    const iframe = document.querySelector('iframe');
    iframe.onload = function() {
      iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
    };
</script>
<style>
    .scrollbar-hide::-webkit-scrollbar {
      display: none;
    }
    .scrollbar-hide {
      -ms-overflow-style: none; /* Internet Explorer 10+ */
      scrollbar-width: none; /* Firefox */
    }
  </style>
</html>