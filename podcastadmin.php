<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Data Audio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100" style="font-family: 'Kanit', sans-serif">

<div class="flex">
    <aside class="w-64 bg-gray-200 min-h-screen p-4 hidden md:block">
        <ul>
            <li><a href="admindb.php" class="block py-2 px-4 hover:bg-gray-300">Dashboard</a></li>
            <li><a href="#" class="block py-2 px-4 hover:bg-gray-300">Tes Kesehatan</a></li>
            <li><a href="" class="block py-2 px-4 hover:bg-gray-300">Ruang Edukasi</a></li>
            <li><a href="podcastadmin.php" class="block py-2 px-4 hover:bg-gray-300">Podcast</a></li>
            <li><a href="#" class="block py-2 px-4 hover:bg-gray-300">Meditasi</a></li>
            <li><a href="#" class="block py-2 px-4 hover:bg-gray-300">Psikolog</a></li>
        </ul>
    </aside>


    <div class="container mx-auto my-10 p-5 bg-white rounded shadow-lg">
        <h1 class="text-2xl font-bold mb-5 text-left">DATA AUDIO</h1>

        <div class="flex justify-start mb-5">
            <a href="tambah.php" class="btn btn-primary">Tambah Audio</a>
        </div>

        <?php
        require_once("koneksi.php");
        session_start();

        $sql = "SELECT * FROM podcast";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="overflow-x-auto">';
            echo '<table class="table table-striped table-bordered">';
            echo '<thead class="bg-blue-600 text-white text-center">
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Artis</th>
                        <th>File</th>
                        <th>Cover</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>';
            echo '<tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id_podcast'];
                $file = $row['file_podcast'];
                $cover = $row['cover_img'];
                echo "<tr class='text-center'>
                        <td>{$row['id_podcast']}</td>
                        <td>{$row['judul']}</td>
                        <td>{$row['artis']}</td>
                        <td>
                            <audio controls>
                                <source src='$file' type='audio/mp3'>
                                Browser Anda tidak mendukung audio.
                            </audio>
                        </td>
                        <td>
                            <img src='$cover' alt='Cover' class='w-24 h-24 object-cover mx-auto rounded'>
                        </td>
                        <td>
                            <a href='edit.php?id=$id' class='btn btn-warning btn-sm mx-1'>Edit</a>
                            <a href='hapus.php?id=$id' class='btn btn-danger btn-sm mx-1'>Hapus</a>
                        </td>
                      </tr>";
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo '<p class="text-center text-gray-500">Tidak ada data yang ditemukan.</p>';
        }
        ?>

    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
