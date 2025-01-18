<h1>ANDA BERHASIL LOGIN USER</h1>

<?php
//index
require_once("koneksi.php");

// session_start();
// echo session_id();
// echo "<br>";

$sql = "SELECT * FROM podcast";

$result = mysqli_query($conn,$sql);



if(mysqli_num_rows($result)>0){
    echo '<table border="1" cellspacing="0">';
    echo '<tr><th>ID</th><th>judul</th><th>file</th>';
    while($row = mysqli_fetch_assoc($result)){
            $id = $row['id_podcast'];
            $file = $row['file_podcast'];
            echo "<tr>
            <td>{$row['id_podcast']}</td>
            <td>{$row['judul']}</td>
            <td><audio controls><source src='$file' type='audio/mp3'>
                Your browser does not support the audio element.
                </audio>
            </td>
            </tr>";
            echo "<br>"; 
    }
}else{
    echo "0 result";
}


?>

<a href="logout.php">Logout</a>