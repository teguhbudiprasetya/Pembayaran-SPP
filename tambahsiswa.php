<?php
    include "header.php";
    ob_start();
    
    $idadmin = $_SESSION['id'];
?>
    <h1>Tambah Data Siswa</h1>
    <form method="post" action="">
    <div class='form-group'>
        <label for='password'>NIS</label>
        <div class='form-control-lg'>
            <input type='text' class='form-control'  name='nissiswa'>
        </div>
    </div>
    <div class='form-group'>
        <label for='password'>Nama Siswa</label>
            <div class='form-control-lg'>
                <input type='text' class='form-control'  name='namasiswa'>
            </div>
    </div>    
    <div class='form-group'>
        <label for='password'>Kelas</label>
            <div class='form-control-lg'>
			<select class="form-control" name="kelassiswa">
                <option value="" selected> ---Pilih Kelas--- </option>
					<?php
						$sqlEditKelas = mysqli_query($connect, "SELECT * FROM walikelas ORDER BY idguru");
                        while ( $x = mysqli_fetch_array($sqlEditKelas)) {
                            echo "<option value='$x[kelas]' $select > $x[kelas] </option>";
                        }
					
					?>
			
				</select>
        	</div>
        </div>
        <div class="form-group">
            <label for='tahunjaran'>Tahun Ajaran</label>
                <?php 
                    $startdateTahunAjaran=strtotime(date("F j Y"));
                    $enddateTahunAjaran=strtotime("+1 Years", $startdateTahunAjaran); 
                ?>
                <div class='form-control-lg'>
                    <input type="text" class="form-control" name="tahunajaran" value="<?= date("Y"); ?>/<?= date("Y", $enddateTahunAjaran)?>" readonly>
                </div>
        </div>
        <div class="form-group">
        <label for='password'>Biaya</label>
            <div class='form-control-lg'>
        		<input type='text' class='form-control'  name='biaya' value="50000" readonly>
        	</div>
        </div>
        <div class="form-group">
        <label for='password'>Jatuh Tempo</label>
            <div class='form-control-lg'>
        		<input type='text' class='form-control'  name='tempo' value="<?php echo date("Y-m-d"); ?>" readonly>
        	</div>
        </div>
        <div style="margin-top: 17px;" class='form-group row'>
            <div class='col-sm-10'>
                <button type='submit' class='btn btn-success'>Simpan</button>
            </div>
        </div>
        <!-- <table>
            <tr>
                <td>NIS</td>
                <td><input type="text" name="nissiswa"></td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td><input type="text" name="namasiswa"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>
                    <select name="kelassiswa">
                        <option value="" selected> ---Pilih Kelas--- </option>
                        <?php
                            
                        ?>
                
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tahun Ajaran</td>
                <?php 
                //     $startdateTahunAjaran=strtotime(date("F j Y"));
                //     $enddateTahunAjaran=strtotime("+1 Years", $startdateTahunAjaran); 
                // ?>
                <td><input type="text" name="tahunajaran" value="<?= date("Y"); ?>/<?= date("Y", $enddateTahunAjaran)?>" readonly>
            <tr>
                <td>Biaya</td>
                <td><input type="number" name="biaya"></td>
            </tr>
            <tr>
                <td>Jatuh Tempo</td>
                <td>
                    <input type="text" name="tempo" value="<?php echo date("Y-m-d"); ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Jatuh Tempo Selanjutnya</td>
                <td>
                    <?php
                        // $startdateJatumTempoLanjutan=strtotime(date("F j Y"));
                        // $enddate=strtotime("+1 Years", $startdateJatumTempoLanjutan);
                        // echo date("d-M-Y", $enddate) . "<br>";
                    ?>
                    <input type="text" name="tempo2" value="<?php echo date("Y-m-d", $enddate); ?>" readonly>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table> -->
    <!-- </form> -->

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Membuat variabel untuk menampung input user
        $nis = $_POST['nissiswa'];
        $nama = $_POST['namasiswa'];
        $kelas = $_POST['kelassiswa'];
        $tahun = $_POST['tahunajaran'];
        $biaya = $_POST['biaya'];
        $tempo = $_POST['tempo'];
        // echo $bulan."bulan<br>";

        if(empty($nama) || empty($nis) || empty($kelas) || empty($tahun) || empty($biaya)){
            echo "Form belum lengkap";
            // echo $nama, $nis, $kelas, $tahun, $biaya;
        }
        else{
            //Proses simpan data guru
            $simpan = mysqli_query($connect, "INSERT INTO siswa(nis, namasiswa, 
            kelas, tahunajaran, biaya) VALUES ('$nis','$nama','$kelas','$tahun','$biaya')");

            if(!$simpan){
                echo "Simpan data gagal!";
            }
            else{
                $ds = mysqli_fetch_array(mysqli_query($connect, "SELECT idsiswa FROM siswa ORDER BY idsiswa DESC LIMIT 1"));
                $id = $ds['idsiswa'];
                
                $startdate3=strtotime("December 2021");
                // echo $startdateTahunAjaran;
                $startdate2 = strtotime("<?php $tempo;?>");
        
                for($i=0; $i < 12; $i++) {
                    $bulanSpp = date('F Y', strtotime("+$i month", $startdate3));
                    $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($tempo)));
                    // echo date('F Y', $bulanSpp);
                    $toSpp = mysqli_query($connect, "INSERT INTO spp(idsiswa, idadmin ,jatuhtempo, bulan, jumlah) VALUES('$id','$idadmin','$jatuhtempo','$bulanSpp','$biaya')");
                }


                    header('location:datasiswa.php');
                }

            }
        }
       
    
    
    
    
    
    
    
    ob_flush();
    include "footer.php";
?>