<?php
session_start();
require_once('koneksi.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $newPassword = trim($_POST['new-password']);
    $confirmPassword = trim($_POST['confirm-password']);

    // Validasi input
    if (empty($email) || empty($newPassword) || empty($confirmPassword)) {
        echo json_encode(['status' => 'error', 'message' => 'Semua bidang harus diisi.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Email tidak valid.']);
        exit;
    }

    if ($newPassword !== $confirmPassword) {
        echo json_encode(['status' => 'error', 'message' => 'Kata sandi tidak cocok.']);
        exit;
    }

    // Enkripsi kata sandi baru
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    // Periksa apakah email ada di database
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Perbarui kata sandi di database
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashedPassword, $email);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Kata sandi berhasil diperbarui.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan saat memperbarui kata sandi.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Email tidak ditemukan.']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Ulang Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div id="password-form" class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-center mb-4">Atur Ulang Password</h1>
        <p class="text-sm text-gray-600 text-center mb-6">
        Silakan masukkan kata sandi baru Anda untuk menggantikan kata sandi lama.
        </p>
        <form id="resetPasswordForm" class="space-y-4">
            <div class="relative">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" required placeholder="nama@gmail.com" required>
            </div>
            <!-- Input Password Baru -->
            <div class="relative">
                <label for="new-password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi Baru</label>
                <input 
                type="password" 
                id="new-password" 
                name="new-password" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" 
                placeholder="Masukkan kata sandi baru" 
                required
                />
                <!-- Tombol Mata -->
                <span 
                class="absolute right-3 top-9 cursor-pointer text-gray-500" 
                id="toggleNewPassword">
                <i class="fa fa-eye-slash"></i>
                </span>
            </div>

            <!-- Input Konfirmasi Password -->
            <div class="relative">
                <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                <input 
                type="password" 
                id="confirm-password" 
                name="confirm-password" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" 
                placeholder="Konfirmasi kata sandi baru" 
                required
                />
                <!-- Tombol Mata -->
                <span 
                class="absolute right-3 top-9 cursor-pointer text-gray-500" 
                id="toggleConfirmPassword">
                <i class="fa fa-eye-slash"></i>
                </span>
            </div>

            <!-- Tombol Kirim -->
            <button 
                type="submit" 
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition">
                Ubah Kata Sandi
            </button>
        </form>
        <div class="mt-6 text-center">
            <a href="login.php" class="text-blue-500 hover:underline text-sm">Kembali ke Login</a>
        </div>
    </div>

    <!-- Pesan Sukses -->
    <div id="success-message" class="hidden w-full max-w-md bg-green-100 rounded-lg shadow-md p-6 text-center">
        <h1 class="text-2xl font-bold text-green-700 mb-4">Berhasil!</h1>
        <p class="text-sm text-green-700 mb-6">Password Anda telah berhasil diperbarui.</p>
        <a href="login.php" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition">Kembali ke Login</a>
    </div>

    <script>
       // Toggle visibility of new password
        const newPassword = document.getElementById('new-password');
        const toggleNewPassword = document.getElementById('toggleNewPassword');
        toggleNewPassword.addEventListener('click', () => {
            const type = newPassword.type === 'password' ? 'text' : 'password';
            newPassword.type = type;

            // Ubah ikon menggunakan Font Awesome
            const icon = toggleNewPassword.querySelector('i');
            if (type === 'password') {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Toggle visibility of confirm password
        const confirmPassword = document.getElementById('confirm-password');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        toggleConfirmPassword.addEventListener('click', () => {
            const type = confirmPassword.type === 'password' ? 'text' : 'password';
            confirmPassword.type = type;

            // Ubah ikon menggunakan Font Awesome
            const icon = toggleConfirmPassword.querySelector('i');
            if (type === 'password') {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Handle form submission
        const form = document.getElementById('resetPasswordForm');
        const passwordForm = document.getElementById('password-form');
        const successMessage = document.getElementById('success-message');
        form.addEventListener('submit', (e) => {
            e.preventDefault(); // Prevent form from refreshing the page
            const newPasswordValue = newPassword.value;
            const confirmPasswordValue = confirmPassword.value;

            // Simple validation
            if (newPasswordValue === confirmPasswordValue) {
                // Show success message
                passwordForm.classList.add('hidden');
                successMessage.classList.remove('hidden');
            } else {
                alert('Kata sandi tidak cocok. Silakan coba lagi.');
            }
        });

    </script>
</body>
</html>
