<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <title>Meditasi Audio</title>
          <link rel="preconnect" href="https://fonts.googleapis.com" />
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
          <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;600&display=swap" rel="stylesheet" />
          <script src="https://cdn.tailwindcss.com"></script>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
          <style>
               body {
                    font-family: "Kanit", sans-serif;
               }

               input[type="range"] {
                    -webkit-appearance: none;
                    width: 100%;
                    height: 4px;
                    background: #e5e7eb;
                    border-radius: 5px;
                    outline: none;
               }

               input[type="range"]::-webkit-slider-thumb {
                    -webkit-appearance: none;
                    width: 12px;
                    height: 12px;
                    background: #3b82f6;
                    border-radius: 50%;
                    cursor: pointer;
               }
          </style>
     </head>

     <body class="bg-gray-100 text-gray-900">
          <div class="container mx-auto p-6 pb-28">
               <!-- Header -->
               <header class="flex items-center space-x-4 mb-6">
                    <button class="p-2 bg-gray-200 rounded-full">
                         <i class="fas fa-arrow-left text-gray-700"></i>
                    </button>
                    <nav class="text-sm text-gray-500"><a href="#" class="hover:underline">Home</a> › <a href="#" class="hover:underline">Ruang Edukasi</a> › <a href="#" class="hover:underline">Kategori Podcast</a> › Podcast</nav>
                    <div class="relative mr-20 flex items-center space-x-2">
                        <input type="text" placeholder="Search" class="border rounded-full px-4 py-2 text-sm w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button class="absolute right-3 top-2 text-gray-400">
                            <i class="fa-solid fa-magnifying-glass"></i>
                       </div>
               </header>

               <!-- Podcast Info -->
               <section class="bg-gray-200 p-6 rounded-lg flex items-center space-x-6">
                    <div class="w-48 h-48 bg-gray-400 rounded-lg"></div>
                    <div>
                         <h1 class="text-2xl font-bold text-gray-800">Jones</h1>
                         <p class="text-sm text-red-500 font-medium">Verified Artist</p>
                         <p class="text-sm text-gray-600 mt-1 flex items-center">
                              <i class="fas fa-headphones-alt mr-2"></i>
                              82,736,050 monthly listeners
                         </p>
                         <button class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700">Play</button>
                    </div>
               </section>

               <!-- Playlist -->
               <section class="mt-8">
                    <h2 class="text-xl font-semibold mb-4">Playlist</h2>
                    <ul class="space-y-4">
                         <li class="flex items-center justify-between bg-white p-4 rounded-lg shadow">
                              <div class="flex items-center space-x-4">
                                   <p class="text-lg font-medium">1</p>
                                   <div class="w-12 h-12 bg-gray-300 rounded"></div>
                                   <div>
                                        <p class="text-gray-800">Chapter 1</p>
                                   </div>
                              </div>
                              <div class="flex items-center space-x-6 text-gray-600">
                                   <div class="flex items-center">
                                        <i class="fas fa-headphones-alt mr-2"></i>
                                        <span>460,228,511</span>
                                   </div>
                                   <div class="flex items-center">
                                        <i class="fas fa-clock mr-2"></i>
                                        <span>3:27</span>
                                   </div>
                                   <i class="fas fa-heart cursor-pointer"></i>
                                   <i class="fas fa-ellipsis-h cursor-pointer"></i>
                              </div>
                         </li>
                         <!-- Duplicate this block for more items -->
                    </ul>
               </section>
          </div>

          <!-- Footer Player -->
          <footer class="  bg-cyan-600/40 fixed bottom-0 left-0 right-0  shadow-md p-4 ">
               <div class="flex items-center justify-between">
                    <!-- Song Info -->
                    <div class="flex items-center space-x-4">
                         <div class="w-16 h-16 bg-gray-300 rounded"></div>
                         <div>
                              <p class="text-gray-800 font-semibold">Oblivion</p>
                              <p class="text-sm text-gray-500">Fasetya feat. Lily Potter</p>
                         </div>
                    </div>

                    <!-- Controls -->
                    <div class="flex flex-col items-center space-y-2">
                         <div class="flex items-center space-x-4">
                              <button>
                                   <i class="fa-solid fa-shuffle text-gray-700 text-xl"></i>
                              </button>
                              <button>
                                   <i class="fa-solid fa-backward-step text-gray-700 text-xl"></i>
                              </button>
                              <button>
                                   <i class="fa-solid fa-play text-gray-700 text-2xl"></i>
                              </button>
                              <button>
                                   <i class="fa-solid fa-forward-step text-gray-700 text-xl"></i>
                              </button>
                              <button>
                                   <i class="fa-solid fa-repeat text-gray-700 text-xl"></i>
                              </button>
                         </div>
                         <!-- Progress Bar -->
                         <div class="flex items-center space-x-2 w-80">
                              <span class="text-sm text-gray-500">0:00</span>
                              <input type="range" min="0" max="100" value="30" />
                              <span class="text-sm text-gray-500">3:11</span>
                         </div>
                    </div>

                    <!-- Volume -->
                    <div class="flex items-center space-x-4">
                         <i class="fa-solid fa-volume-high text-gray-700"></i>
                         <input type="range" min="0" max="100" value="50" class="w-24" />
                    </div>
               </div>
          </footer>

          <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
     </body>
</html>
