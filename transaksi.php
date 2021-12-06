<?php include "header.php" ;?>

<h3>Transaksi pembayaran</h3>
<form id="noprint" method="get" action="">
    <div class='form-group'>
        <label for='password'>NIS</label>
        <div class='form-control-lg'>
            <input type='text' class='form-control'  name='nis'>
        </div>
    </div>
    <div class='form-group row'>
            <div class='col-sm-10'>
                <button type='submit' class='btn btn-success'>Simpan</button>
            </div>
    </div>
</form>

<?php
    if(isset($_GET['nis'])) {
        $sqlSiswa = mysqli_query($connect, "SELECT * FROM siswa WHERE nis = '$_GET[nis]'");
        $ds = mysqli_fetch_array($sqlSiswa);
        $nis = $ds['nis'];
        $nama = $ds['namasiswa'];
        $kelas = $ds['kelas'];
    
?>
    <h1 class="panel-name">Informasi Siswa</h1>
    <table  style="width:35%; font-size:medium;">
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
    <table style="margin-top: 20px; text-align:center;" class="table table-hover table-bordered">
        <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Bulan</th>
            <th style="text-align: center;">Jatuh Tempo</th>
            <th style="text-align: center;">No. Bayar</th>
            <th style="text-align: center;">Tgl. Bayar</th>
            <th style="text-align: center;">Jumlah</th>
            <th style="text-align: center;">Keterangan</th>
            <th style="text-align: center;">Bayar</th>
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