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
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        #nip{
            margin-top: -15px;
        }
        #awalheading{
            display: none;
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

<h3 id="awalheadingguru">SMK NEGERI 1 BRONDONG<br>Laporan Data Guru</h3>
<h3 id="awalheading">SMK NEGERI 1 BRONDONG<br>Laporan Data Walikelas</h3>
<form method="get" action="" id="formhidden">
    <table>
        <tr>
            <td>Data</td>
            <td>:</td>
            <td>
                <select name="choice">
                    <option selected disabled hidden>-Pilih Data-</option>
                    <option value="Semua">Semua</option>
                    <option value="Walikelas">Walikelas</option>
                </select>
            </td>
            <td>
                <input type="submit" value="Cari">
            </td>
            <td>
                <button  onclick="window.print()">Cetak</button>
            </td>
            <td><button><a href="laporan.php" style="text-decoration: none; color:black">Kembali</a></button></td>
        </tr>
    </table>
</form>

<hr style="height:3px;background-color:black;">
<?php 
if(isset($_GET['choice'])){ ?>

    <table border="1"style="width: 100%; border-collapse: collapse; ">
        <?php
            $no = 1;
            if($_GET['choice'] == 'Walikelas'){ ?>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                </tr>
                <script>
                    document.querySelector('#awalheading').style.display = "block";
                    document.querySelector('#awalheadingguru').style.display = "none";
            </script>
            <?php
                $sqlSemua = mysqli_query($connect, "SELECT guru.*, walikelas.kelas FROM guru INNER JOIN walikelas WHERE guru.idguru = walikelas.idguru ORDER BY kelas");
                while($d= mysqli_fetch_array($sqlSemua)){
                    // $walikelas = $d['namaguru'];
                    echo"
                    <tr>
                        <td style='width:50px;' align='center'>$no</td>
                        <td style='text-indent:10px;'>$d[namaguru]</td>
                        <td align='center'>$d[kelas]</td>
                    </tr>
                    
                    ";
                    $no++;    
                }
            }
            else if($_GET['choice'] == 'Semua'){
                echo "<tr>
                    <th>No</th>
                    <th>Nama</th>
                </tr>";
                $sqlSemua = mysqli_query($connect, "SELECT * FROM guru ORDER BY namaguru");
                while($d= mysqli_fetch_array($sqlSemua)){
                    // $walikelas = $d['namaguru'];
                    echo"
                    <tr>
                        <td style='width:50px;' align='center'>$no</td>
                        <td style='text-indent:10px;'>$d[namaguru]</td>
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