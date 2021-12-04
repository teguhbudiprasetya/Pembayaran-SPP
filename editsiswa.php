<?php include "header.php"; ?>

<?php
$sqlEdit = mysqli_query($connect, "SELECT * FROM siswa WHERE idsiswa='$_GET[nis]'");
// $sqlEdit=mysqli_query($connect, "SELECT * FROM guru WHERE idguru=1");
// echo $_GET;
// echo print_r($_GET);
$e=mysqli_fetch_array($sqlEdit);
print_r($e);
// echo $_GET['id'];
?>
<h3>Edit Data Siswa</h3>
<form method="post" action="">
	<!-- <input type="hidden" name="idsiswa" value="<?php echo $e['idsiswa']; ?>" /> -->
	<table>
		<tr>
			<td>NIS</td>
			<td><input type="text" name="nissiswa" value="<?php echo $e['nis'];?>" readonly></td>
		</tr>
		<tr>
			<td>Nama Siswa</td>
			<td><input type="text" name="namasiswa" value="<?php echo $e['namasiswa'];?>" readonly></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>
				<select name="kelassiswa">
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
			</td>
		</tr>
		<tr>
			<td>Tahun Ajaran</td>
			<td><input type="text" name="tahunajaran" value="2021/2022" readonly></td>
		</tr>
		<tr>
			<td>Biaya</td>
			<td><input type="number" name="biaya" value="<?php echo $e['biaya'];?>" readonly></td>
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
					$startdate=strtotime(date("F j Y"));
					$enddate=strtotime("+1 Years", $startdate);
					// echo date("d-M-Y", $enddate) . "<br>";
				?>
				<input type="text" name="tempo" value="<?php echo date("Y-m-d", $enddate); ?>" readonly>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Simpan"></td>
		</tr>
	</table>
</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	// Membuat variabel untuk menampung input user
	
	$id = $e['idsiswa'];
	$nis = $_POST['nissiswa'];
	$nama = $_POST['namasiswa'];
	$kelas = $_POST['kelassiswa'];
	$tahun = $_POST['tahunajaran'];
	$biaya = $_POST['biaya'];

	if(empty($nama) || empty($nis) || empty($kelas) || empty($tahun) || empty($biaya)){
		echo "Form belum lengkap";
		echo $nama, $nis, $kelas, $tahun, $biaya;
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

<?php include "footer.php"; ?>