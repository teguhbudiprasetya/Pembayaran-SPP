<?php   

    session_start();
    if(!isset($_SESSION['login'])){
        header('location:login.php');
    }
    include 'connection.php';
//  echo $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pembayaran SPP</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/naming-univ.css">
    <script src="js/header.js"></script>
</head>
<body>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <h3>Aplikasi Pembayaran SPP</h3>
    <hr>
    <a href="dataadmin.php">Data admin</a>
    <a href="dataguru.php">Data guru</a>
    <a href="datawalikelas.php">Data wali kelas</a>
    <a href="datasiswa.php">Data siswa</a>
    <a href="transaksi.php">Transaksi</a>
    <a href="laporan.php">Laporan</a>
    <a href="logout.php">Logout</a>
    <hr> -->

<div class="wrapper">
  <!-- Sidebar Holder -->
  <nav id="sidebar">
    <div class="sidebar-header">
      <h3>Aplikasi Pembayaran SPP</h3>
      
    </div>
    <ul class="list-unstyled components">
      <p>Welcome, <?= $_SESSION["username"] ?></p>
      <!-- <hr> -->
      <!-- <li class="active">
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Beranda</a>
        <ul class="collapse list-unstyled" id="homeSubmenu">
          <li><a href="#">Home 1</a></li>
          <li><a href="#">Home 2</a></li>
          <li><a href="#">Home 3</a></li>
        </ul>
      </li> -->
      <li>
        <a href="index.php">Beranda</a>
      </li>
      <li>
        <a href="dataadmin.php">Data Admin</a>
      </li>
      <li>
        <a href="dataguru.php">Data Guru</a>
      </li>
      <li>
        <a href="datawalikelas.php">Data Walikelas</a>
      </li>
      <li>
        <a href="datasiswa.php">Data Siswa</a>
      </li>
      <li>
        <a href="transaksi.php">Transaksi</a>
      </li>
      <li>
        <a href="laporan.php">Laporan</a>
      </li>
      <li>
        <a href="logout.php">Keluar</a>
      </li>
    </ul>
  </nav>

  <!-- Page Content Holder -->
  <div id="content">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                <span id="content-span"><</span>
            </button>
        <div class="container-fluid">
            <h2 style="visibility: hidden; margin-top:-50px;">asdsasadsadsadasdasdasddasdasdsada Sidebar Using Bootstrap 3</h2>
      