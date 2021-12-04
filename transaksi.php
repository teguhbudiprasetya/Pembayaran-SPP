<?php include "header.php" ;?>


<h3>Transaksi pembayaran</h3>
<form method="get" action="">
    <table>
        <tr>
            <td>NIS :</td>
            <td><input type="text" name="nis"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="" value="Cari Siswa"></td>
        </tr>
    </table>
</form>

<?php
    if(isset($_GET['nis'])) {
        $sqlSiswa = mysqli_query($connect, "SELECT * FROM siswa WHERE nis = '$_GET[nis]'");
        $ds = mysqli_fetch_array($sqlSiswa);
        $nis = $ds['nis'];
        $nama = $ds['namasiswa'];
        $kelas = $ds['kelas'];
    
?>
    <h3>Informasi Siswa</h3>
    <table  style="width:35%;">
        <tr>
            <td>NIS </td>
            <td>:</td>
            <td><?= $nis; ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $nama; ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?= $kelas; ?></td>
        </tr>
    </table>
    
    <h3>Tagihan SPP Siswa</h3>
    <table border="1" style="width: 60%; text-align:center;">
        <tr>
            <th>No</th>
            <th>Bulan</th>
            <th>Jatuh Tempo</th>
            <th>No. Bayar</th>
            <th>Tgl. Bayar</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Bayar</th>
        </tr>

        <?php
        $sql = mysqli_query($connect, "SELECT * FROM spp WHERE idsiswa=$ds[idsiswa]");
        
        // $sppTempo = $sqlSpp['jatuhtempo'];
        
        $no = 1;
        while($d = $sqlSpp = mysqli_fetch_array($sql)){
            $sppBulan = $d['bulan'];
            $sppTempo = $d['jatuhtempo'];
            $nobayar = $d['nobayar'];
            $tglbayar = $d['tglbayar'];
            $jumlah = $d['jumlah'];
            $keterangan = $d['ket'];
            $sppTempo = $d['jatuhtempo'];
            // echo $sppBulan."<br>";
            echo "
            <tr>
                <td>$no</td>
                <td>$sppBulan</td>
                <td>$sppTempo</td>
                <td>$nobayar</td>
                <td>$tglbayar</td>
                <td>$jumlah</td>
                <td>$keterangan</td>
                <td>";
                    if($d['nobayar'] == ''){
                        echo "<a href='transaksiproses.php?nis=$nis&id=$d[idspp]'>Bayar</a>";
                    }
                    else{
                        echo "-";
                    }
                echo "</td>
        </tr>";
        $no++;
        }
        ?>



    </table>
<?php } ?>

<?php include "footer.php" ;?>