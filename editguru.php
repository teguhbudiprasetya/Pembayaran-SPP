<?php include "header.php"; ?>

<?php
$sqlEdit = mysqli_query($connect, "SELECT * FROM guru WHERE idguru='$_GET[id]'");
// $sqlEdit=mysqli_query($connect, "SELECT * FROM guru WHERE idguru=1");
// echo $_GET;
// echo print_r($_GET);
$e=mysqli_fetch_array($sqlEdit);
var_dump($_GET['id']);
echo $_GET['id'];
?>
<h3>Edit Data Guru</h3>
<form method="post" action="">
	<input type="hidden" name="idguru" value="<?php echo $e['idguru']; ?>" />
	<table>
		<tr>
			<td>Nama Guru</td>
			<td><input type="text" name="namaguru" value="<?php echo $e['namaguru']; ?>" /></td>
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
	$id		= $_POST['idguru'];
	$nama 	= $_POST['namaguru'];
	
	if($nama==''){
		echo "Form belum lengkap!!!";
	}else{
		//proses edit data guru
		$edit = mysqli_query($connect, "UPDATE guru SET namaguru='$nama' WHERE idguru='$id'");
		
		if(!$edit){
			echo "Edit data gagal!!";
		}else{
			header('location:dataguru.php');
		}
	}
}
?>

<?php include "footer.php"; ?>