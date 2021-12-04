<?php   

    session_start();
    if(!isset($_SESSION['login'])){
        header('location:login.php');
    }
    include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pembayaran SPP</title>
</head>
<body>
    
    <h3>Aplikasi Pembayaran SPP</h3>
    <hr>
    <a href="">Data admin</a>
    <a href="dataguru.php">Data guru</a>
    <a href="datawalikelas.php">Data wali kelas</a>
    <a href="datasiswa.php">Data siswa</a>
    <a href="transaksi.php">Transaksi</a>
    <a href="laporan.php">Laporan</a>
    <a href="logout.php">Logout</a>
    <hr>