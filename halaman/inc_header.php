<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_admin";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi){
    die("tidak bisa terhubung");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ScheWeb</title>
  <link rel="stylesheet" href="../css/styleutama.css">
  <!-- bootstrap links -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- bootstrap links -->
  <!-- fonts links -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
  <!-- fonts links -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <!-- this is icons link -->

  <style>
    .mx-auto {
      width: 1200px;
    }
    .card {
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="all-content">

    <!-- navbar start -->
    <nav class="navbar sticky-top navbar-expand-lg" style="background-color: #bbe1fc;">
      <a class="navbar-brand" href="#" id="logo">
        <img src="../images/logodispen.png" alt="Logo" style="width: 90px"
          class="d-inline-block align-text-top me-2"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="halaman.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Data Master
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="dataguru.php">Data Guru</a></li>
              <li><a class="dropdown-item" href="datasiswa.php">Data Siswa</a></li>
              <li><a class="dropdown-item" href="datamatapelajaran.php">Data Mata Pelajaran</a></li>
              <li><a class="dropdown-item" href="datakelas.php">Data Kelas</a></li>
              <li><a class="dropdown-item" href="datajadwalguru.php">Data Jadwal Pelajaran</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Apa Kabar,Admin</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
