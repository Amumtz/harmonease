<?php
require 'koneksi.php';

// Pastikan ada ID komentar yang dikirimkan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil komentar berdasarkan ID
    $stmt = $conn->prepare("SELECT * FROM komentarvideo WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if ($row['username'] !== $_SESSION['user']) {
        echo "Anda tidak memiliki izin untuk mengedit komentar ini.";
        header("Location: video.php");
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_comment'])) {
        $komentar = $_POST['komentar'];
        

        // Update komentar
        $stmt = $conn->prepare("UPDATE komentarvideo SET komentar = ? WHERE id = ?");
        $stmt->bind_param("si", $komentar, $id);
        $stmt->execute();
        $stmt->close();

        header("Location: video.php");
        exit();
    }
} else {
    echo "Komentar tidak ditemukan!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Komentar</title>
</head>
<body>

<h1>Edit Komentar</h1>

<form method="POST" action="editcommentvideo.php?id=<?php echo $id; ?>">
    <textarea name="komentar" rows="4" cols="50"><?php echo htmlspecialchars($row['komentar']); ?></textarea><br>
    <button type="submit" name="update_comment">Update Comment</button>
</form>

</body>
</html>
