<?php
session_start();
require 'koneksi.php';

// Tambah komentar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_comment'])) {
    $username = $_SESSION['user'];
    $komentar = $_POST['komentar'];

    $stmt = $conn->prepare("INSERT INTO komentar (username, komentar) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $komentar);
    $stmt->execute();
    $stmt->close();
    header("Location: artikel.php");
    exit();
}

// Update komentar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_comment'])) {
    $id = $_POST['id'];
    $komentar = $_POST['komentar'];

    $stmt = $conn->prepare("UPDATE komentar SET komentar = ? WHERE id = ?");
    $stmt->bind_param("si", $komentar, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: artikel.php");
    exit();
}

// Hapus komentar
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM komentar WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: artikel.php");
    exit();
}

// Ambil semua komentar
$comments = $conn->query("SELECT * FROM komentar ORDER BY waktu_post DESC");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <title>Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <div class="mt-32 mx-16 w-5/6">
        <h1 class="text-2xl font-bold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h1>
        <p class="text-md text-gray-500 font-medium mt-2">Author : Aisyah Mumtaziah</p>
        <img src="img/Hero Image.png" alt="Cover artike" class="mt-16 w-full h-80 object-cover rounded-md">
    </div>
    <div class="mt-5 mx-16">
        <p class="text-wrap mr-16 ">Percaya diri adalah kunci utama untuk meraih sukses dalam berbagai aspek kehidupan, baik itu dalam karier, hubungan sosial, atau perkembangan pribadi. Banyak orang merasa kesulitan untuk memiliki rasa percaya diri yang kuat. Namun, jangan khawatir! Berikut adalah beberapa langkah praktis yang dapat membantu Anda meningkatkan rasa percaya diri secara efektif.
            <ol class="ml-1 mr-20 text-wrap">
                <li>1. Kenali dan Terima Diri Sendiri</li>
                <p class="ml-4">Langkah pertama untuk meningkatkan percaya diri adalah mengenali diri sendiri. Kenali kekuatan dan kelemahan Anda, lalu terimalah apa adanya. Jangan terlalu keras pada diri sendiri. Ingatlah bahwa tidak ada manusia yang sempurna. Dengan menerima diri sendiri, Anda akan merasa lebih nyaman dan percaya diri.</p>
                <li>2. Tetapkan Tujuan yang Realistis</li>
                <p class="ml-4">Menetapkan tujuan yang realistis dan terukur adalah cara yang baik untuk meningkatkan rasa percaya diri. Mulailah dengan tujuan kecil yang dapat dicapai dalam waktu singkat. Setiap kali Anda mencapai satu tujuan, Anda akan merasa lebih percaya diri untuk mengejar tujuan yang lebih besar.</p>
                <li>3. Latih Keterampilan Baru</li>
                <p class="ml-4">Belajar dan menguasai keterampilan baru dapat meningkatkan rasa percaya diri. Pilihlah sesuatu yang Anda minati, seperti belajar bahasa baru, bermain alat musik, atau menguasai keterampilan profesional yang dapat meningkatkan karier Anda. Proses belajar dan perkembangan akan membuat Anda merasa lebih kompeten dan percaya diri.</p>
                <li>4. Jaga Kesehatan Fisik</li>
                <p class="ml-4">Kesehatan fisik berpengaruh besar pada rasa percaya diri. Olahraga secara teratur, makan makanan sehat, dan istirahat yang cukup dapat membuat Anda merasa lebih baik secara fisik dan mental. Ketika tubuh Anda dalam kondisi baik, Anda akan merasa lebih energik dan siap menghadapi tantangan.</p>
            </ol>
        </p>
    </div>
    <div class="flex my-5 ml-20 mr-36  h-64 justify-center max-md:ml-0 max-md:w-full max-md:flex-wrap">
        <img src="img/Hero Image.png" alt="" class="w-3/6 mr-2 max-md:mb-5 max-md:h-40">
        <img src="img/Hero Image.png" alt="" class="w-3/6 ml-2 max-md:mb-5 max-md:h-40 max-md:ml-0">
    </div>
    <div class="my-5 mx-16 max-md:mt-24">
        <ol class="mr-20 text-wrap">
            <li>5. Berpikir Positif</li>
            <p class="ml-4">Pikiran positif dapat meningkatkan rasa percaya diri secara signifikan. Ubah cara Anda berpikir dengan fokus pada hal-hal positif dalam hidup Anda. Jangan biarkan pikiran negatif menguasai. Cobalah untuk melihat sisi baik dari setiap situasi dan ingatkan diri sendiri tentang pencapaian dan kelebihan Anda.</p>
            <li>6. Jauhi Lingkungan Negatif</li>
            <p class="ml-4">Lingkungan yang negatif dapat merusak rasa percaya diri Anda. Hindari orang-orang yang sering mengkritik atau merendahkan Anda. Sebaliknya, carilah lingkungan yang mendukung dan memotivasi. Dikelilingi oleh orang-orang yang positif dan mendukung dapat meningkatkan rasa percaya diri Anda.</p>
            <li>7. Asah Kemampuan Berkomunikasi</li>
            <p class="ml-4">Kemampuan berkomunikasi yang baik sangat penting untuk rasa percaya diri. Latih keterampilan berbicara di depan umum, mendengarkan dengan baik, dan mengekspresikan diri dengan jelas. Kemampuan berkomunikasi yang baik akan membuat Anda merasa lebih percaya diri dalam berinteraksi dengan orang lain.</p>
            <li>8. Rayakan Kemenangan Kecil</li>
            <p class="ml-4">Jangan lupa untuk merayakan setiap kemenangan kecil dalam hidup Anda. Mengapresiasi pencapaian-pencapaian kecil akan memberikan dorongan positif dan meningkatkan rasa percaya diri Anda. Rayakan dengan cara yang sederhana namun bermakna, seperti makan malam spesial atau waktu santai untuk diri sendiri.</p>
            <li>9. Cari Bantuan Profesional Jika Diperlukan</li>
            <p class="ml-4">Jika Anda merasa kesulitan meningkatkan rasa percaya diri Anda sendiri, jangan ragu untuk mencari bantuan profesional. Konselor atau terapis dapat membantu Anda mengidentifikasi masalah dan menemukan solusi yang efektif. Jangan biarkan rasa percaya diri Anda terganggu oleh masalah yang dapat diatasi dengan bantuan profesional.</p> 
        </ol>
        <p class="mt-5 mr-16 text-wrap">Meningkatkan rasa percaya diri memang memerlukan waktu dan usaha, tetapi dengan langkah-langkah praktis di atas, Anda dapat mencapai perubahan yang positif. Ingatlah bahwa setiap orang memiliki potensi untuk menjadi lebih percaya diri. Teruslah berusaha, tetap positif, dan jangan pernah menyerah!</p>
    </div>
    
    <div id="komentar">
        <p class="text-2xl font-bold ml-16">Komentar</p>
        <div class="mt-6 ml-16 space-y-4 w-9/12">
            <?php while ($row = $comments->fetch_assoc()): ?>
            <div class="bg-gray-100 p-4 rounded-lg shadow">
                <div class="flex items-center space-x-4">
                    <img
                        src="https://via.placeholder.com/40"
                        alt="Avatar"
                        class="w-10 h-10 rounded-full"
                    />
                    <div>
                        <h3 class="font-semibold"><?php echo htmlspecialchars($row['username']); ?></h3>
                        <p class="text-sm text-gray-500"><?php echo htmlspecialchars($row['waktu_post']); ?></p>
                    </div>
                </div>
                <p class="mt-2 text-gray-700">
                    <?php echo nl2br(htmlspecialchars($row['komentar'])); ?>
                </p>
                <!-- Tombol Edit dan Hapus -->
                <div class="flex justify-end space-x-4 mt-4">
                    <!-- Tombol Edit -->
                    <a href="edit_comment.php?id=<?php echo $row['id']; ?>" class="text-blue-600 hover:text-blue-800">Edit</a>
                    
                    <!-- Tombol Hapus -->
                    <a href="artikel.php?delete=<?php echo $row['id']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this comment?')">Hapus</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <form method="POST" action="artikel.php">
        <div class="w-9/12 ml-16 mt-4 mb-4 border border-gray-200 rounded-lg bg-gray-50">
            <div class="px-4 py-2 bg-white rounded-t-lg">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea id="comment" name="komentar" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0" placeholder="Write a comment..." required></textarea>
            </div>
            <div class="flex items-center justify-between px-3 py-2 border-t">
                <button type="submit" name="add_comment" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
                    Post comment
                </button>
            </div>
        </div>
    </form> 
</body>
</html>
