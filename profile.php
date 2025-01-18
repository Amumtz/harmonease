<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header id="header-placeholder" class=" bg-white mt-0 shadow z-50">
        <script src="header.js"></script>
    </header>
    <!-- Profil -->
    <div class="container mx-auto p-1 max-w-screen-lg flex items-center">
        <!-- Profil Header -->
        <div class="w-full max-w-full flex flex-col bg-white relative mb-16">
            <h1 class="profile-text10 absolute ml-16 mt-20 text-[#1A74A0] text-3xl font-bold">
                Akun Anda
            </h1>

            <!-- Foto Profil -->
            <div class="absolute mt-40 flex items-start ml-16 w-full">
                <div class="relative w-[145px] h-[145px] rounded-full bg-gray-300">
                    <img src="img/profile.jpeg" alt="" class="w-[145px] h-[145px] rounded-full">
                </div>
                <button id="editProfilePic" class="absolute mt-12 ml-40 text-center text-lg font-normal text-gray-800 hover:underline flex items-center">
                    <span>Edit foto profil Anda</span>
                    <img src="external/material-symbols_person-edit-outline-sharp.png" alt="Edit" class="ml-2 w-6 h-6">
                </button>
            </div>

            <!-- Data Profil -->
            <div class="absolute top-[365px] left-5 sm:left-2 md:left-5 w-full flex flex-col space-y-6">
                <!-- Nama Lengkap -->
                <div>
                    <p class="ml-14 text-xl font-normal">Nama Lengkap</p>
                    <p id="nama_lengkap_display" class="mt-6 ml-14 text-left text-lg font-light">Samudra Batara</p>
                    <input type="text" id="nama_lengkap_input" class="w-10/12 ml-14 hidden border rounded p-2" value="Samudra Batara">
                    <img src="external/line13439-wnec.svg" alt="" class="mt-[10px] ml-14 border-gray-300">
                </div>
                <!-- Email -->
                <div>
                    <p class=" ml-14 text-xl font-normal">Email</p>
                    <p id="email_display" class=" mt-6 ml-14 text-left text-lg font-light">batarasam@example.com</p>
                    <input type="text" id="email_input" class="w-10/12 ml-14 hidden border rounded p-2" value="batarasam@example.com">
                    <img src="external/line13439-wnec.svg" alt="" class="mt-[10px] ml-14 border-gray-300">
                </div>
                <!-- Jenis Kelamin -->
                <div>
                    <p class="ml-14 text-xl font-normal">Jenis Kelamin</p>
                    <p id="gender_display" class="ml-14 mt-6 text-left text-lg font-light">Laki-laki</p>
                    <input type="text" id="gender_input" class="w-10/12 ml-14 hidden border rounded p-2" value="Laki-laki">
                    <img src="external/line13439-wnec.svg" alt="" class="mt-[10px] ml-14 border-gray-300">
                </div>
                <!-- Bahasa -->
                <div>
                    <p class="ml-14 text-xl font-normal">Bahasa</p>
                    <p id="language_display" class="ml-14 mt-6 text-left text-lg font-light">Indonesia</p>
                    <input type="text" id="language_input" class="w-10/12 ml-14 hidden border rounded p-2" value="Indonesia">
                    <img src="external/line13439-wnec.svg" alt="" class="mt-[10px] ml-14 border-gray-300">
                </div>
            </div>
        </div>
    </div>
    <div class="absolute mt-96 w-96">
        <!-- Tombol Edit -->
        <div class="mt-96 ml-24">
            <button id="editButton" class="button max-w-fit bg-blue-400 text-white py-2 px-5 rounded-full hover:bg-blue-500">
                Edit
            </button>
        </div>

        <!-- Riwayat Konsultasi -->
        <div class="absolute mt-5 ml-24 flex items-center">
            <img src="external/materialsymbolshistory3237-waxo.svg" alt="materialsymbolshistory3237" class="w-10 h-10">
            <span class=" ml-2 mt-1 text-lg">Riwayat konsultasi</span>
        </div>

        <!-- Logout -->
        <div class="mt-16 ml-24">
            <a href="login.html" class="absolute flex items-center">
                <img src="external/icbaselinelogout3237-93ef.svg" alt="simbol" class="w-10 h-10">
                <span class=" ml-2 text-lg">Logout</span>
            </a>
        </div>
    </div> 
    <div id="popup" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-80">
            <h2 class="text-xl font-bold mb-4">Edit Foto Profil</h2>
            <input type="file" id="uploadProfilePic" class="mb-4 block w-full">
            <div class="flex justify-end space-x-4">
                <button id="closePopup" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Save</button>
            </div>
        </div>
    </div>
    <script>
        // Show popup for editing profile picture
        const editProfilePicButton = document.getElementById('editProfilePic');
        const popup = document.getElementById('popup');
        const closePopupButton = document.getElementById('closePopup');
        
        editProfilePicButton.addEventListener('click', () => {
            console.log("Button clicked!");
            popup.classList.remove('hidden');
        });

        closePopupButton.addEventListener('click', () => {
            console.log("Close button clicked!");
            popup.classList.add('hidden');
        });
        
        // Toggle input fields on Edit button click
        document.addEventListener('DOMContentLoaded', () => {
            const editButton = document.getElementById('editButton');
            const fields = ['nama_lengkap', 'email', 'gender', 'language'];
            
            editButton.addEventListener('click', () => {
                fields.forEach(field => {
                    const textElement = document.getElementById(`${field}_display`);
                    const inputElement = document.getElementById(`${field}_input`);

                    // Toggle visibility
                    if (textElement && inputElement) {
                        textElement.classList.toggle('hidden');  // Menyembunyikan teks
                        inputElement.classList.toggle('hidden'); // Menampilkan input
                    }
                });
            });
        });

    </script>   
</body>
</html>
