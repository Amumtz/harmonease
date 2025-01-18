<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Data Audio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content {
    margin-left: 250px; /* Memberi ruang agar konten tidak tertutup sidebar */
    transition: margin-left 0.3s ease-in-out;
}

.content.shift {
    margin-left: 0; /* Saat sidebar muncul, konten digeser ke kanan */
}

/* Tombol hamburger */
.navbar-toggler {
    border: none;
    background: transparent;
}

        .fixed-top + .d-flex {
            margin-top: 56px; /* Adjust based on header height */
        }

         /* Sidebar */
         #sidebar {
            position: fixed;
            top: 100;
            left: 0; /* Sidebar tersembunyi di kiri layar */
            width: 250px;
            height: 100vh;
            background-color: #f8f9fa;
            transition: left 0.3s ease-in-out; /* Efek transisi saat sidebar muncul atau hilang */
        }

        #sidebar.show {
            left: -250px; /* Sidebar muncul */
        }

        .sidebar-link {
            padding: 15px;
            text-decoration: none;
            color: #000;
            display: block;
        }

        .sidebar-link:hover {
            background-color: #e9ecef;
        }

        /* Konten utama agar tidak tertutup sidebar */
        .content {
            margin-left: 250px; /* Memberi ruang agar konten tidak tertutup sidebar */
            transition: margin-left 0.3s ease-in-out;
        }

        .content.shift {
            margin-left: 0; /* Saat sidebar muncul, konten digeser ke kanan */
        }

        /* Tombol hamburger */
        .navbar-toggler {
            border: none;
            background: transparent;
        }
    </style>

</head>

<body class="bg-gray-100" style="font-family: 'Kanit', sans-serif">
    <header class="fixed-top bg-white shadow">
        <div class="container-fluid px-4 py-3 d-flex justify-content-between align-items-center">
            
            <!-- Tombol hamburger dan logo dalam satu container -->
            <div class="d-flex align-items-center">
            <!-- Tombol hamburger -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" id="hamburgerButton">
                <span class="navbar-toggler-icon"></span><img src="img/hamburger-menu-4.png" style="width: 40px; height: 40px;">
            </button>
            
            <!-- Logo dan Nama -->
            <div class="d-flex align-items-center ms-2"> <!-- ms-2 untuk jarak lebih kecil antara hamburger dan logo -->
                <img src="img/logo.png" alt="Logo HarmonEasee" class="rounded-circle me-2" style="width: 40px; height: 40px;">
                <span class="fw-semibold fs-5" style="font-family: 'Kanit', sans-serif;">HarmonEasee</span>
            </div>
            </div>

            <div class="d-flex">
            
            <div class="dropdown">
                    <a href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="img/notification-alert.svg" alt="Notification Icon" class="rounded-circle border border-secondary" style="width: 40px; height: 40px;">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown" style="width: 300px;">
                        <li class="dropdown-item text-center fw-bold">Notifications</li>
                        <li><hr class="dropdown-divider"></li>
                        <li class="dropdown-item">Pengguna baru mendaftar</li>
                        <li class="dropdown-item">Pengguna mengirim laporan</li>
                        <li class="dropdown-item">Server maintenence</li>
                        <li class="dropdown-item text-center">
                            <a href="#" class="text-decoration-none">View All</a>
                        </li>
                    </ul>
                </div>
            <!-- Foto Profil -->
            <div class="d-flex align-items-center ms-2"> <!-- ms-2 untuk jarak lebih kecil antara hamburger dan logo -->
            <div class="dropdown">
                    <a href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="img/profile.jpeg" alt="Foto Profil" class="rounded-circle border border-secondary" style="width: 40px; height: 40px;">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown" style="width: 300px;">
                        <li class="dropdown-item text-center fw-bold"></li>
                        <li><hr class="dropdown-divider"></li>
                        <li class="dropdown-item"><a href="logout.php">Log Out</a></li>
                        <!-- <li class="dropdown-item text-center">
                            <a href="#" class="text-decoration-none">View All</a>
                        </li> -->
                    </ul>
                </div>
            </div>
            </div>
        </div> 
    </header>


<div class="flex pt-5">

    
    <!-- Sidebar -->
    <aside class="bg-light p-4 d-none d-md-block" style="width: 250px; min-height: 100vh;" id="sidebar">
        <ul class="nav flex-column position-fixed">
            <li class="nav-item">
                <a href="admindb.php" class="nav-link text-dark">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="adminkonsultasi.php" class="nav-link text-dark">Konsultasi</a>
            </li>
            <li class="nav-item">
                <a href="adminpodcast.php" class="nav-link text-dark">Podcast</a>
            </li>
            <li class="nav-item">
                <a href="adminpsikolog.php" class="nav-link text-dark">Psikolog</a>
            </li>
        </ul>
    </aside>

    <div class="content">
        <div class="container mx-auto my-10 p-5 bg-white rounded shadow-lg">

        <h1 class="text-2xl font-bold mb-5 text-left">DATA AUDIO</h1>

        <!-- Form Pencarian -->
        <form method="GET" action="">
            <div class="mb-4">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama audio..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            </div>
            <div class="mb-4">
                <button type="submit" class="btn btn-primary">Cari</button>
                <a href="adminpodcast.php" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <div class="flex justify-start mb-5">
            <a href="admin_tambah_pod.php" class="btn btn-primary">Tambah Audio</a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Audio</h6>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Artis</th>
                            <th>File</th>
                            <th>Cover</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <?php
                    require_once("koneksi.php");

                    //ambil nama audio
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $sql = "SELECT * FROM podcast";

                    //sql untuk menampilkan yg dicari
                    if ($search != '') {
                        $sql .= " WHERE judul LIKE '%$search%'";
                    }

                    $result = mysqli_query($conn, $sql);

                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id_podcast'];
                        $file = $row['file_podcast'];
                        $cover = $row['cover_img'];
                        echo "
                        <tbody>
                            <tr>
                                <td>{$no}</td>
                                <td>{$row['judul']}</td>
                                <td>{$row['artis']}</td>
                                <td>
                                    <audio controls>
                                        <source src='$file' type='audio/mp3'>
                                        Browser Anda tidak mendukung audio.
                                    </audio>
                                </td>
                                <td>
                                    <img src='$cover' alt='Cover' class='object-cover mx-auto rounded' style='max-width: 100px; max-height: 100px;'>
                                </td>
                                <td>
                                    <a href='admin_edit_pod.php?id=$id' class='btn btn-warning btn-sm mx-1'>Edit</a>
                                    <a href='hapus.php?id=$id' class='btn btn-danger btn-sm mx-1' data-bs-toggle='modal' data-bs-target='#exampleModal'>Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                        ";
                        $no = $no + 1;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <footer class="sticky-footer py-4" style="background-color: #7AD8FE;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; HarmonEasee</span>
                    </div>
                </div>
            </footer>
</div>

                
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Mengambil elemen sidebar dan tombol hamburger
    const sidebar = document.getElementById('sidebar');
    const hamburgerButton = document.getElementById('hamburgerButton');
    const content = document.querySelector('.content');

    // Menambahkan event listener untuk membuka dan menutup sidebar
    hamburgerButton.addEventListener('click', () => {
        sidebar.classList.toggle('show'); // Menampilkan atau menyembunyikan sidebar
        content.classList.toggle('shift'); // Menggeser konten utama saat sidebar muncul
    });
</script>
    
</body>

</html>
