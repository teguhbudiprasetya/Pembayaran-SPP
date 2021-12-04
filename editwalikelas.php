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
	<table>
		<tr>
			<td>Kelas</td>
			<td>
				<input type="text" name="kelas" readonly value="<?php echo $e['kelas']; ?>" maxlength="40" />
			</td>
		</tr>
		<tr>
			<td>Pilih Guru/ Wali Kelas</td>
			<td>
				<select name="guru">
					<!-- <option value="" selected> ---Pilih Guru--- </option> -->
					<?php
						$sqlEditGuru = mysqli_query($connect, "SELECT * FROM guru ORDER BY idguru");
						while ( $x = mysqli_fetch_array($sqlEditGuru)) {
							// echo $x['idguru'];
							if($x['idguru'] == $e['idguru']){
								$select = "selected";
							}
							else{
								$select = "";
							}
							echo "<option value='$x[idguru]' $select > $x[namaguru] </option>";
					}
					?>
			
		</select>
	</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Update" /></td>
		</tr>
	</table>
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