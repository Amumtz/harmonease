<?php
require_once("koneksi.php");


$sql_det_konsul = "SELECT * FROM user JOIN detail_konsultasi ON user.id_pengguna = detail_konsultasi.id_pengguna 
                    JOIN psikolog ON psikolog.id = detail_konsultasi.id";
$resultkonsul = mysqli_query($conn, $sql_det_konsul);






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>HarmonEase - Podcast</title>
    <style>
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

<body style="font-family: 'Kanit', sans-serif">

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

        <!-- Main Content -->

            <div class="content">
            <div class="container mx-auto my-10 p-5 bg-white rounded shadow-lg">

                <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center mb-4">
                        <h4 class="card-title mb-sm-0">Konsultasi</h4>
                        <a href="#" class="text-dark ms-auto mb-3 mb-sm-0"></a>
                        </div>
                        <div class="table-responsive border rounded p-1">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="font-weight-bold">Nama Klien</th>
                                <th class="font-weight-bold">Nama Psikolog</th>
                                <th class="font-weight-bold">Tanggal</th>
                                <th class="font-weight-bold">Jam</th>
                                <th class="font-weight-bold">Status</th>
                                <th class="font-weight-bold">Detail</th>

                            </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($resultkonsul)) {
                                $id = $row['id_pengguna'];
                                $nama = $row['Nama_Lengkap'];
                                $namapsi = $row['nama_lengkap'];
                                $status = $row['status'];
                                $tanggal = $row['tgl_konsul'];
                                $jam = $row['jam_konsul'];
                            
                                echo "<tbody>
                                <tr>
                                    <td>{$nama}</td>
                                    <td>{$namapsi}</td>
                                    <td>{$tanggal}</td>
                                    <td>{$jam}</td>";
                            
                                if ($status == 'selesai') {
                                    echo "<td><span class='badge bg-success text-white p-2' style='font-weight: normal;'>$status</span></td>"; 
                                } elseif ($status == 'berlangsung') {
                                    echo "<td><span class='badge bg-warning text-dark p-2' style='font-weight: normal;'>$status</span></td>"; 
                                } else {
                                    echo "<td><span class='badge bg-primary text-white p-2' style='font-weight: normal;'>$status</span></td>"; 
                                }
                            
                                // Tombol untuk membuka modal
                                echo "<td>
                                    <button class='btn btn-warning btn-sm mx-1' data-bs-toggle='modal' data-bs-target='#modalDetail$id'>
                                        <i class='fa-solid fa-eye'></i> <span style='font-weight: normal;'>Lihat</span>
                                    </button>
                                </td>
                                </tr>";
                            
                                // Modal unik untuk setiap baris
                                echo "
                                <div class='modal fade' id='modalDetail$id' tabindex='-1' aria-labelledby='modalDetailLabel$id' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='modalDetailLabel$id'>Detail Konsultasi</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                                <p><strong>Nama Klien:</strong> {$nama}</p>
                                                <p><strong>Nama Psikolog:</strong> {$namapsi}</p>
                                                <p><strong>Tanggal:</strong> {$tanggal}</p>
                                                <p><strong>Jam:</strong> {$jam}</p>
                                                <p><strong>Status:</strong> {$status}</p>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                            }
                            
                            ?>
                        </table>
                        
                        </div>
                    </div>
                    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
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
