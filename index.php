<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Native | CRUD</title>
    <!-- Bootstrap 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     Data Tables
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
   Font Google
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    Own CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stylehome.css">


</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand"><span class="text-warning">Sche</span>Web</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Data Master
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="guru/dataguru.php">Data Guru</a></li>
                            <li><a class="dropdown-item" href="siswa/datasiswa.php">Data Siswa</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Data Pembelajaran
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="kelas&jadwal/datakelasdjadwal.php">Data Jadwal</a></li>
                            <li><a class="dropdown-item" href="kelas/datakelas.php">Data Kelas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">LogOut</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>ScheWeb | Web Penjadwalan</h5>
                    <p>Website Penjadwalan Mata Pelajaran Yang Dapat Membantu Penjadwalan Pada Sekolah Dasar. Masuk Dan
                        Lakukan Entry Data Siswa, Guru, Mata Pelajaran , Kelas , Dan Penjadwalan</p>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <!-- about -->
    <section id="about" class="about-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="about-img">
                        <img src="img/kalender2.jpg" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <div class="about-text">
                        <h2>Tentang Aplikasi</h2>
                        <p> Website ini adalah hasil dari dedikasi dan kerja keras kami dalam mengembangkan tampilan
                            yang menarik dan responsif. Dengan HTML sebagai tulang punggungnya, kami mampu membangun
                            struktur yang solid dan menjamin aksesibilitas yang optimal.
                            CSS dan Bootstrap 5 memberikan sentuhan visual yang modern dan profesional pada website kami
                            ini. Menggunakan kombinasi fleksibilitas CSS dan keunggulan Bootstrap, kami dapat mengatur
                            tata letak, warna, dan elemen desain dengan mudah.
                            Visual Studio Code menjadi mitra setia kami dalam proses pengembangan. Editor ini menawarkan
                            fitur-fitur hebat, seperti highlighting kode, saran otomatis, dan integrasi dengan Git, yang
                            mempercepat dan menyempurnakan alur kerja kami.
                        <br>
                            Terima kasih telah mengunjungi Website kami. Kami berharap Anda menikmati pengalaman
                            menjelajahi website kami lainnya dan menemukan nilai yang berguna dari website yang telah
                            kami buat dengan penuh dedikasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- about -->

    <!-- team -->
    <section id="team" class="team section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Our Project</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="img/danang.jpg" alt="" class="img-fluid rounded-circle">
                            <h3 class="card-title py-2">Ahmad Danang S W</h3>
                            <p class="card-text">21050974014 | PTIB-21 | Teknik Informatika | UNESA</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="img/yurie.jpg" alt="" class="img-fluid rounded-circle">
                            <h3 class="card-title py-2">Yurie Enggarnisa</h3>
                            <p class="card-text">21050974050 | PTIB-21 | Teknik Informatika | UNESA</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="img/adinda.jpg" alt="" class="img-fluid rounded-circle">
                            <h3 class="card-title py-2">Adinda Amelia Putri</h3>
                            <p class="card-text">21050974056 | PTIB-21 | Teknik Informatika | UNESA</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="img/galista.jpg" alt="" class="img-fluid rounded-circle">
                            <h3 class="card-title py-2">Galista Haidir</h3>
                            <p class="card-text">21050974064 | PTIB-21 | Teknik Informatika | UNESA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <!-- team -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>