<?php include "header.php"; ?>

<?php
$sqlEdit = mysqli_query($connect, "SELECT * FROM guru WHERE idguru='$_GET[id]'");
// $sqlEdit=mysqli_query($connect, "SELECT * FROM guru WHERE idguru=1");
// echo $_GET;
// echo print_r($_GET);
$e=mysqli_fetch_array($sqlEdit);
?>
<h3 class="panel-name">Edit Data Guru</h3>
<form method="post" action="">
	<div class='form-group'>
            <label for='password'>Nama Guru</label>
            <div class='form-control-lg'>
        <input type='text' class='form-control'  name='namaguru' value="<?php echo $e['namaguru']; ?>">
            </div>
        </div>
        <div class='form-group row'>
            <div class='col-sm-10'>
                <button type='submit' class='btn btn-success'>Update</button>
            </div>
        </div>
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