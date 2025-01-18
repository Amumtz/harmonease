<?php

require_once("koneksi.php");
session_start();
$id = $_GET['id'];

echo "Menghapus data dengan ID $id";
$sql = "DELETE FROM podcast WHERE id_podcast= $id";
$result = mysqli_query($conn,$sql);

header("location: adminpodcast.php")




?>