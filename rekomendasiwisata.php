<?php
session_start();
require_once('koneksi.php');
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
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Rekomendasi Wisata</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header id="header-placeholder" class=" bg-white mt-0 shadow z-50">
        <script src="header.js"></script>
    </header>
    <div class="mt-16">
        <div class="Atas">
            <section class="bg-center bg-no-repeat bg-[url('img/jumbo.jpg')] bg-blend-multiply">
                <div class="px-4 mx-auto max-w-screen-xl py-24 lg:py-56">
                    <h1 class="text-white text-4xl font-bold text-left px-3 mt-4 max-w-2xl">Rekomendasi Tempat untuk Kesehatan Mental yang Lebih Baik</h1>
                </div>
            </section>
            <div class="container justify-items-center mx-30 px-2 py-8 relative ">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="bg-white border border-black-200px shadow-md rounded-lg p-3 text-center w-[300px]">
                        <span class="text-md font-semibold text-black ">Tempat Wisata Alam</span>
                        <img src="img/9309745f-3a86-4bc5-bc78-9692aa88a9c3.jpeg" alt=""class="w-full h-[200px] object-cover mx-auto mt-4">
                        <p class="text-gray-600 mt-2 line-clamp-4 text-justify">Kawasan hijau seperti hutan dan pantai yang dikenal untuk membantu menenangkan pikiran dan memberikan relaksasi.</p>
                        <button class="mt-4 bg-cyan-300 text-white px-4 py-2 rounded hover:bg-cyan-500" name="Selengkapnya">Selengkapnya</button>
                    </div>
                    <div class="bg-white border border-black-200px shadow-md rounded-lg p-3 text-center w-[300px]">
                        <span class="text-md font-semibold text-black ">Tempat Sejarah dan Budaya</span>
                        <img src="img/candi.jpeg" alt="" class="w-full h-[200px] mx-auto mt-4">
                        <p class="text-gray-600 mt-2 line-clamp-4 text-justify">Tempat sejarah dan budaya yang menemukan tempat-tempat sejarah dan budaya yang dapat memberikan pengalaman inspiratif, memperluas wawasan, dan menenangkan pikiran.</p>
                        <button class="mt-4 bg-cyan-300 text-white px-4 py-2 rounded hover:bg-cyan-500" name="Selengkapnya">Selengkapnya</button>
                    </div>
                    <div class="bg-white border border-black-200px shadow-md rounded-lg p-3 text-center w-[300px]">
                        <span class="text-md font-semibold text-black ">Taman Rekreasi dan Taman Kota</span>
                        <img src="img/TMII.jpeg" alt="" class="w-full h-[200px] mx-auto mt-4 ">
                        <p class="text-gray-600 mt-2 line-clamp-4 text-justify">Taman Rekreasi dan Taman Kota membantu untuk menemukan taman rekreasi dan taman kota terdekat yang dapat menjadi tempat untuk melepaskan stres, menenangkan pikiran, atau sekadar menghabiskan waktu di lingkungan yang mendukung kesehatan mental.</p>
                        <button class="mt-4 bg-cyan-300 text-white px-4 py-2 rounded hover:bg-cyan-500" name="Selengkapnya">Selengkapnya</button>
                    </div>
                </div>
                <div class="font-semibold mt-9 text-2xl">
                    <span class=" text-gray-600 hover:text-black">LAINNYA</span>
                </div>
            </div>
        </div>
        <div class="mb-40 mr-20 ml-10">
            <div class="mt-12">
                <span class="text-xl font-bold ml-5">Rekomendasi tempat wisata populer</span>
                <div class="text-right mb-10 mr-5">
                    <a href="wisata1.php" class="text-blue-500 hover:underline">Selengkapnya</a>
                </div>
            </div>
            <div class="flex items-center space-x-4 ">
                <button id="prevBtn" class="absolute left-0 text-gray-600 hover:text-gray-900 z-10" onclick="scrollCarousel(-1)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <div id="carousel" class="flex overflow-x-auto space-x-5 scrollbar-hide">
                    <div class="relative flex-shrink-0 w-64"><a href="wisata1.php">
                        <img src="img/KARIMUNJAWA.jpg" alt="" class="w-full h-48 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Karimun Jawa</h3>
                            <p class="text-white text-sm">Kabupaten Jepara, Jawa Tengah</p>
                        </div></a>
                    </div>
                    <div class="relative flex-shrink-0 w-64"><a href="wisata2.php">
                        <img src="img/LABUANBAJO.jpeg" alt="" class="w-full h-48 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Labuan Bajo</h3>
                            <p class="text-white text-sm">Kabupaten Manggarai Barat, NTT</p>
                        </div></a>
                    </div>
                    <div class="relative flex-shrink-0 w-64"><a href="wisata3.php">
                        <img src="img/Banda Neira,.jpeg" alt="" class="w-full h-48 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Banda Neira</h3>
                            <p class="text-white text-sm">Kabupaten Maluku Tengah, Maluku</p>
                        </div></a>
                    </div>
                    <div class="relative flex-shrink-0 w-64"><a href="wisata4.php">
                        <img src="img/Taman safari.jpeg" alt="" class="w-full h-48 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Taman Safari Indonesia</h3>
                            <p class="text-white text-sm">Kabupaten Bogor, Jawa Barat</p>
                        </div></a>
                    </div>
                    <div class="relative flex-shrink-0 w-64">
                        <img src="img/Terasering Panyaweuyan.jpeg" alt="" class="w-full h-48 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Terasering Panyaweuyan</h3>
                            <p class="text-white text-sm">Kabupaten Majalengka, Jawa Barat</p>
                        </div>
                    </div>
                    <div class="relative flex-shrink-0 w-64">
                        <img src="img/KAWAHIJEN.jpeg" alt="" class="w-full h-48 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Kawah Ijen</h3>
                            <p class="text-white text-sm">Kabupaten Banyuwangi, Jawa Timur</p>
                        </div>
                    </div>
                    <div class="relative flex-shrink-0 w-64">
                        <img src="img/TMII.jpeg" alt="" class="w-full h-48 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Taman Mini Indonesia Indah</h3>
                            <p class="text-white text-sm">Kota Jakarta Timur, DKI Jakarta</p>
                        </div>
                    </div>
                    <div class="relative flex-shrink-0 w-64">
                        <img src="img/De Djawatan.jpeg" alt="" class="w-full h-48 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">De Djawatan</h3>
                            <p class="text-white text-sm">Kabupaten Banyuwangi, Jawa Timur</p>
                        </div>
                    </div>
                    <button id="nextBtn" class="absolute right-0 text-gray-500 hover:text-gray-700 z-3 mt-20 mr-5" onclick="scrollCarousel(1)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
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
    <!-- Tambahkan script JavaScript -->
<script>
    const scrollCarousel = (direction) => {
      const carousel = document.getElementById('carousel');
      const scrollAmount = 300; // Jarak scroll
      carousel.scrollBy({
        left: direction * scrollAmount,
        behavior: 'smooth',
      });
    };
  </script>
  
  <!-- Tambahkan style untuk sembunyikan scrollbar -->
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