<?php 
include "header.php"; 
ob_start();
?>

<?php
$sqlEdit = mysqli_query($connect, "SELECT * FROM siswa WHERE idsiswa='$_GET[nis]'");
$e=mysqli_fetch_array($sqlEdit);
?>
<h1 class="panel-name">Edit Data Siswa</h1>
<form method="post" action="">
		<div class='form-group'>
        <label for='password'>NIS</label>
            <div class='form-control-lg'>
        		<input type='text' class='form-control'  name='nissiswa' value="<?php echo$e['nis']; ?>" readonly>
        	</div>
        </div>
		<div class='form-group'>
        <label for='password'>Nama Siswa</label>
            <div class='form-control-lg'>
        		<input type='text' class='form-control'  name='namasiswa' value="<?php echo$e['namasiswa']; ?>" readonly>
        	</div>
        </div>
		<div class='form-group'>
        <label for='password'>Kelas</label>
            <div class='form-control-lg'>
			<select class="form-control" name="kelassiswa">
					<!-- <option value="" selected> ---Pilih Kelas--- </option> -->
					<?php
						$sqlEditKelas = mysqli_query($connect, "SELECT * FROM walikelas ORDER BY idguru");
						while ( $x = mysqli_fetch_array($sqlEditKelas)) {
							if($x['kelas'] == $e['kelas']){
								$select = 'selected';
							}
							else{
								$select = '';
							}
							echo "<option value='$x[kelas]' $select> $x[kelas] </option>";
					}
					?>
			
				</select>
        	</div>
			<small><i>*Hanya dapat mengubah kelas</i></i></small>
        </div>
		<div class="form-group">
        <label for='password'>Tahun Ajaran</label>
            <div class='form-control-lg'>
        		<input type='text' class='form-control'  name='tahunajaran' value="<?php echo$e['tahunajaran']; ?>" readonly>
        	</div>
        </div>
		<div style="margin-top: 17px;" class='form-group'>
            <div class='col-sm-10'>
                <button type='submit' class='btn btn-success'>Update</button>
            </div>
        </div>
</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	// Membuat variabel untuk menampung input user
	
	$id = $e['idsiswa'];
	$nis = $_POST['nissiswa'];
	$nama = $_POST['namasiswa'];
	$kelas = $_POST['kelassiswa'];
	$tahun = $_POST['tahunajaran'];
	// $biaya = $_POST['biaya'];

	if(empty($nama) || empty($nis) || empty($kelas) || empty($tahun)){
		echo "Form belum lengkap";
		echo $nama, $nis, $kelas, $tahun;
	}
	else{
		//proses edit data guru
		$edit = mysqli_query($connect, "UPDATE siswa SET kelas='$kelas' WHERE idsiswa='$id'");
		
		if(!$edit){
			echo "Edit data gagal!!";
		}else{
			header('location:datasiswa.php');
		}
	}
}
?>

<?php 
ob_flush();
include "footer.php"; 
?>