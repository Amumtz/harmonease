<?php
require_once("koneksi.php");

$sql = "SELECT * FROM podcast LIMIT 6"; // limit untuk batas card yg tampil
$result = mysqli_query($conn, $sql);

//count banyak user
$sqluser = "SELECT COUNT(id_pengguna) as total FROM user where role like 'user'";
$resultuser = mysqli_fetch_assoc(mysqli_query($conn,$sqluser));
$countuser = $resultuser['total'];

//count banyak psikolog
$sqlpsi = "SELECT COUNT(id) as total FROM psikolog";
$resultpsi = mysqli_fetch_assoc(mysqli_query($conn,$sqlpsi));
$countpsi = $resultpsi['total'];

//total user

$jumlahusee = $countpsi + $countuser;

//ambil data user
$sqlusernm = "SELECT * FROM user where role like 'user'";
$resultnmuser = mysqli_query($conn, $sqlusernm);

//ambil data psikolog
$sqlpsinm = "SELECT * FROM user where role like 'psikolog'";
$resultnmuser = mysqli_query($conn, $sqlusernm);


$sql_det_konsul = "SELECT * FROM user JOIN detail_konsultasi ON user.id_pengguna = detail_konsultasi.id_pengguna 
                    JOIN psikolog ON psikolog.id = detail_konsultasi.id WHERE detail_konsultasi.status LIKE 'terjadwal' LIMIT 10";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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

    <div class="d-flex">
    
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
        <div class="flex-grow-1 p-4">
            <div class="content">

                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1 ">
                                            Jumlah Pengguna</div>
                                        <div class="h1 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahusee ?></div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-users fa-3x me-3"></i> <!-- Ikon dengan margin kanan -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                                            Jumlah Klien</div>
                                        <div class="h1 mb-0 font-weight-bold text-gray-800"><?php echo $countuser ?></div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-user fa-3x me-3"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                                            Jumlah Psikolog</div>
                                        <div class="h1 mb-0 font-weight-bold text-gray-800"><?php echo $countpsi ?></div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-user-md fa-3x me-3"></i> <!-- Ikon dengan margin kanan -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


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
                                    </tr>
                                    </thead>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($resultkonsul)) {
                                                    $id = $row['id_pengguna'];
                                                    $nama = $row['Nama_Lengkap'];
                                                    $namapsi = $row['nama_lengkap'];
                                                    $status = $row['status'];
                                    
                                    echo "<tbody>
                                    <tr>
                                        <td>
                                            {$nama}
                                        </td>
                                        <td>$namapsi</td>
                                        <td>{$row['tgl_konsul']}</td>
                                        <td>{$row['jam_konsul']}</td>";
                                        if ($status == 'selesai') {
                                            echo "<td><span class='badge bg-success text-white p-2' style='font-weight: normal;'>$status</span></td>"; 
                                        } elseif ($status == 'berlangsung') {
                                            echo "<td><span class='badge bg-warning text-dark p-2' style='font-weight: normal;'>$status</span></td>"; 
                                        } else {
                                            echo "<td><span class='badge bg-primary text-white p-2' style='font-weight: normal;'>$status</span></td>"; 
                                        }
                                        
                                        
                                    echo "</tr>";}
                                    ?>
                                </table>
                                </div>
                        </div>
                    </div>
    
                            <!-- Project Card Example -->
                    <div class="card shadow mt-4 mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kondisi Kesehatan Mental</h6>
                        </div>
                        <div class="card-body">
                                    <h4 class="small font-weight-bold">Gangguan Kecemasan <span
                                        class="float-right">10%</span></h4>
                                    <div class="progress mb-4">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 10%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Depresi <span
                                            class="float-right">25%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 25%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Anxiety <span
                                            class="float-right">15%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 15%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Stress <span
                                            class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 20%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sehat Mental <span
                                    class="float-right">30%</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 30%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
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
