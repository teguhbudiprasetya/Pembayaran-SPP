<?php include "header.php"; ?>

<?php
	$sqlEditKelas = mysqli_query($connect, "SELECT * FROM walikelas WHERE kelas='$_GET[kls]'");
// $sqlEditKelas2 = mysqli_query($connect, "SELECT * FROM walikelas WHERE kelas='$_GET[nama]'");

// $sqlEditGuru = mysqli_query($connect, "SELECT * FROM guru WHERE idguru='$_GET[kls]'");
// $sqlEditKelas=mysqli_query($connect, "SELECT * FROM guru WHERE idguru=1");
	echo print_r($_GET) ;
	$e=mysqli_fetch_array($sqlEditKelas); 
?>
<h3>Edit Data Guru</h3>
<form method="post" action="">
        <div class='form-group'>
            <label for='username'>Kelas</label>
            <div class='form-control-lg'>
            <input type='text' class='form-control' name='kelas' value="<?= $_GET['kls']; ?>" readonly>
            </div>
        </div>
        <div class='form-group'>
        <label for='username'>Guru</label>
        <div class='form-control-lg'>
           <!-- <input type='text' class='form-control' name='username'> -->
           <select name="guru" class='form-control'>
                        <option value="" hidden disabled selected> - Pilih Guru - </option>
                        <?php
                            $sqlEditGuru = mysqli_query($connect, "SELECT guru.idguru, guru.namaguru, walikelas.kelas
                            FROM guru
                            LEFT JOIN walikelas ON walikelas.idguru = guru.idguru
                            WHERE walikelas.idguru IS NULL");
                            // $sqlEditKelas = mysqli_query($connect, "SELECT * FROM guru ORDER BY guru.idguru");
                            while ( $x = mysqli_fetch_array($sqlEditGuru)) {
                                
                                echo "<option value='$x[idguru]' $select > $x[namaguru] </option>";
                                
                            }
                            ?>
                
            </select>
        </div>
        </div>
    <div class='form-group row'>
        <div class='col-sm-10'>
            <button type='submit' class='btn btn-success'>Simpan</button>
        </div>
    </div>
    </form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	//variabel dari elemen form
	$kelas	= $_POST['kelas'];
	$guru 	= $_POST['guru'];
	
	if($guru=='' || $kelas ==''){
		echo "Form belum lengkap!!!";
	}else{
		//proses edit data guru
		$edit = mysqli_query($connect, "UPDATE walikelas SET idguru='$guru' WHERE kelas='$kelas'");
		
		if(!$edit){
			echo "Update data gagal!!";
		}else{
			header('location:datawalikelas.php');
		}
	}
}
?>

<?php include "footer.php"; ?>