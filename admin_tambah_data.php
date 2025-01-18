
<?php
require_once("koneksi.php");
session_start();

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $artis = $_POST['artis'];

    // File Podcast
    $target_dir = "upload/"; // Menuju folder upload
    $target_file = $target_dir . basename($_FILES['file']['name']);
    $path = ""; // Jalur yang akan disimpan di database
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        $path = $target_file;
    }

    // Cover Image
    $target_dir_img = "upload/img/"; // Menuju folder img di dalam upload
    $target_file_img = $target_dir_img . basename($_FILES['cover']['name']);
    $path_img = ""; // Jalur yang akan disimpan di database
    if (move_uploaded_file($_FILES['cover']['tmp_name'], $target_file_img)) {
        $path_img = $target_file_img;
    }

    // Simpan ke database
    $sql = "INSERT INTO podcast (judul, artis, file_podcast, cover_img)
            VALUES ('$judul', '$artis', '$path', '$path_img')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Insert success";
    } else {
        echo "Error insert: " . mysqli_error($conn);
    }

    // Redirect ke halaman admin
    header("Location: adminpodcast.php");
    exit();
}
