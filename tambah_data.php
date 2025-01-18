<?php
require_once("koneksi.php");
session_start();

if(isset($_POST['tambah'])){
$judul = $_POST['judul'];
$artis = $_POST['artis'];

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES['file']['name']);
$path ="";
if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
    $path = $target_file;
}

//cover img
$target_dir = "upload/img/";
$target_file = $target_dir . basename($_FILES['cover']['name']);
$path_img ="";

if(move_uploaded_file($_FILES['cover']['tmp_name'], $target_file)){
    $path_img = $target_file;
}

$sql = "INSERT INTO podcast (judul,artis,file_podcast,cover_img)
        VALUES ('$judul','$artis','$path','$path_img')
        ";
$result = mysqli_query($conn, $sql);
}

if ($result){
    echo " insert succes";
}else{
    echo "Error insert ". mysqli_error($conn);
}

header("location: podcastadmin.php")
?>
