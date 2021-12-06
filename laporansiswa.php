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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <title>Aplikasi Pembayaran SPP</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        #nip{
            margin-top: -15px;
        }
        @media print{
            button{
                display: none;
            }
            #formhidden{
                display: none;
            }
        }
    </style>
</head>
<body>

<h3>SMK NEGERI 1 BRONDONG<br>Laporan Data Siswa</h3>
<form id="formhidden" method="get" action="">
    <table>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td>
                <select name="kelas" id="">
                    <option hidden selected>  --Kelas--</option>
                    <?php 
                        $sql = mysqli_query($connect,  "SELECT kelas FROM walikelas");
                        while($x = mysqli_fetch_array($sql)){
                            echo "
                                <option>
                                    $x[kelas]
                                    </option>
                            ";
                        }
                        ?>
                        <option value="semua">Semua</option>
                </select>
            </td>
            <td>
                <input type="submit" name="button" value="Cari" >
            </td>
            <td>
                <button  onclick="window.print()">Cetak</button>
            </td>
            <td>
                <button><a href="laporan.php" style="text-decoration: none; color:black">Kembali</a></button>
            </td>
        </tr>
        
    </table>
</form>
<?php
    if(isset($_GET['kelas'])){
        if($_GET['kelas'] == 'semua'){
           
            // $temp= mysqli_fetch_array($sqlwali);
            
            echo "<table class='table table-bordered table-striped'>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Wali Kelas</td>
                <td>:</td>
                <td>-</td>
            </tr>
            </table>";
        }
        else{
            $sqlwali = mysqli_query($connect, "SELECT walikelas.*, guru.namaguru FROM walikelas INNER JOIN guru ON walikelas.idguru = guru.idguru WHERE kelas='$_GET[kelas]'");
            $temp= mysqli_fetch_array($sqlwali);
            echo "<table>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>$_GET[kelas]</td>
            </tr>
            <tr>
                <td>Wali Kelas</td>
                <td>:</td>
                <td>$temp[namaguru]</td>
            </tr>
            </table>";

        }
    }
?>
<hr style="height:3px;background-color:black;">
<table class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tahun Ajaran</th>
            </tr>
    <?php
    // echo $dari;
    // echo $hingga;

    $no = 1;
    if(isset($_GET['kelas'])){
        if($_GET['kelas'] == 'semua'){
            $sqlSemua = mysqli_query($connect, "SELECT * FROM siswa ORDER BY kelas");
            while($d= mysqli_fetch_array($sqlSemua)){
                // $walikelas = $d['namaguru'];
                echo"
                <tr>
                <td align='center'>$no</td>
                <td align='center'>$d[nis]</td>
                    <td style='text-indent:10px;'>$d[namasiswa]</td>
                    <td align='center'>$d[kelas]</td>
                    <td align='center'>$d[tahunajaran]</td>
                </tr>
                
                ";
                $no++;    
            }
        }
        else{ 
            $sql = mysqli_query($connect, "SELECT * FROM siswa WHERE kelas='$_GET[kelas]' ORDER BY namasiswa, kelas ASC");
            while($d= mysqli_fetch_array($sql)){
                // $walikelas = $d['namaguru'];
                echo"
                <tr>
                <td align='center'>$no</td>
                <td align='center'>$d[nis]</td>
                    <td style='text-indent:10px;'>$d[namasiswa]</td>
                    <td align='center'>$d[kelas]</td>
                    <td align='center'>$d[tahunajaran]</td>
                </tr>
                
                ";
                $no++;    
            }
        }
    }
    ?>

</table>
<div style="float: right; margin:50px 0px 0 0px;">
     Lamongan, <?php echo date("d F Y"); ?>
     <p>Kepala Kemahasiswaan</p>
     <br><br><br><br>
     <p>Sebasitan Alexander Kurniawan</p>
     <p id="nip">NIP : 200411123 231</p>
</div>
<script>
    document.title ="Laporan Siswa <?=$_GET['kelas']?> <?=date('M-Y')?> ";
</script>
</body>
</html>