<?php
session_start();

require_once("koneksi.php");



    $id = $_GET['id'];
    $judul = $_POST['judul'];
    $artis = $_POST['artis'];
    
    //file
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
    
$sql = "UPDATE podcast SET judul='$judul', artis='$artis', file_podcast='$path', cover_img='$path_img' WHERE id_podcast=$id"; 
$result = mysqli_query($conn, $sql);



if ($result){
    echo "Data berhasil diubah";
}else{
    echo "Error update ". mysqli_error($conn);
}

header("location: adminpodcast.php")
?>

