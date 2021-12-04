<?php include "header.php" ?>

<?php 
    // $last = 0;
    $sql = mysqli_query($connect, "SELECT MAX(nobayar) AS last FROM spp");
    $null = mysqli_query($connect, "SELECT * FROM spp WHERE idspp = '$_GET[id]'");
    if(isset($null)){
        $sqlmax = mysqli_fetch_array($sql);
        $sql = mysqli_fetch_array($null);
        
        //Mengambil jatuh tempo lalu di convert ke ymd
        $tempo = $sql['jatuhtempo'];
        $day = date('ymd', strtotime($tempo));
        
        #Mengambil value no bayar terakhir lalu diambil 2 string terakhir
        $lastnobayar = substr($sqlmax['last'], -2);
        $nextnourut =  (int)$lastnobayar + 1;


        //Value yang diperlukan
        $idsiswa = $sql['idsiswa'];
        $keterangan = 'LUNAS';
        $tglbayar = date('Y-m-d');
        $nobayar = $day.$idsiswa.sprintf("%02s",$nextnourut);
        // echo $nobayar;

        $editBayar = mysqli_query($connect, "UPDATE spp SET nobayar='$nobayar', tglbayar='$tglbayar', ket='$keterangan' WHERE idspp = '$_GET[id]'");

        header('location:transaksi.php?nis='.$_GET['nis']);
    }
?>



<?php include "footer.php" ?>