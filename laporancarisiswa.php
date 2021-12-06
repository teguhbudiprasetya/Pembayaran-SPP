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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        @media print{
            button{
                display: none;
            }
        }
    </style>
</head>
<body>

<h3>SMK NEGERI 1 BRONDONG<br>Laporan Pembayaran SPP</h3>
<h4>Periode: <?= $_GET['dari']?> - <?= $_GET['hingga'] ?></h4>
<button onclick="window.print()">Cetak</button>
<hr>
<table class="table table-hover table-striped table-bordered">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tanggal Bayar</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
<?php
    $dari = $_GET['dari'];
    $hingga = $_GET['hingga'];
    // echo $dari;
    // echo $hingga;
    $sql = mysqli_query($connect, "SELECT spp.*, siswa.nis, siswa.namasiswa, siswa.kelas FROM spp INNER JOIN siswa ON spp.idsiswa = siswa.idsiswa 
    WHERE tglbayar BETWEEN '$_GET[dari]' AND '$_GET[hingga]'");
    // echo print_r($sql);
    $no = 1;
    if(isset($sql)){
        $jumlah = 0;
        while($d= mysqli_fetch_array($sql)){
            echo"
            <tr>
                <td align='center'>$no</td>
                <td align='center'>$d[nis]</td>
                <td style='text-indent:10px;'>$d[namasiswa]</td>
                <td align='center'>$d[kelas]</td>
                <td align='center'>$d[tglbayar]</td>
                <td align='right'>$d[jumlah]</td>
                <td>$d[ket]</td>
            </tr>
            
            ";
            $jumlah += $d['jumlah'];
            $no++;    
        }
    }
    ?>
    
</table>
<p>Jumlah : Rp.<?= $jumlah; ?></p>   
</body>
</html>