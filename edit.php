<?php
require_once("koneksi.php");
session_start();
$id = $_GET['id'];


$sql = "SELECT * FROM podcast WHERE id_podcast = $id
        ";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

?>

<!-- form untuk ubah data -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Podcast</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100" style="font-family: 'Kanit', sans-serif">

    <div class="container mx-auto my-10 p-5 bg-white rounded shadow-lg">
        <h1 class="text-3xl font-bold mb-5 text-center text-gray-800">Ubah Data Podcast</h1>

        <form action="update.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            <!-- Judul -->
            <div class="form-group">
                <label for="judul" class="block text-gray-700 font-medium mb-2">Judul</label>
                <input type="text" id="judul" name="judul" 
                    class="form-control border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-200" 
                    placeholder="Masukkan judul podcast" 
                    value="<?php echo $row['judul'] ?>" required>
            </div>

            <!-- Artis -->
            <div class="form-group">
                <label for="artis" class="block text-gray-700 font-medium mb-2">Artis</label>
                <input type="text" id="artis" name="artis" 
                    class="form-control border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-200" 
                    placeholder="Masukkan nama artis" 
                    value="<?php echo $row['artis'] ?>" required>
            </div>

            <!-- File Audio -->
            <div class="form-group">
                <label for="file" class="block text-gray-700 font-medium mb-2">File Baru</label>
                <input type="file" id="file" name="file" 
                    class="form-control border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-200" 
                    accept="audio/*" required>
            </div>

            <!-- Cover Image -->
            <div class="form-group">
                <label for="cover" class="block text-gray-700 font-medium mb-2">Cover Baru</label>
                <input type="file" id="cover" name="cover" 
                    class="form-control border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-200" 
                    accept="image/*" required>
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit" name="edit" 
                    class="btn btn-primary px-6 py-2 rounded-lg shadow-lg bg-blue-500 text-white hover:bg-blue-600">
                    Update
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

