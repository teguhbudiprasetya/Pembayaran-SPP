<?php include "header.php" ?>
<h3>Tambah Data Admin</h3>
<form method='post'>
<div class='form-group'>
    <label for='nama'>Nama Lengkap</label>
    <div class='form-control-lg'>
        <input type='text' class='form-control' id='nama' name='nama'>
    </div>
    </div>
     <div class='form-group'>
        <label for='username'>Username</label>
        <div class='form-control-lg'>
           <input type='text' class='form-control' name='username'>
        </div>
     </div>
     
    <div class='form-group'>
        <label for='password'>Password</label>
        <div class='form-control-lg'>
    <input type='text' class='form-control'  name='password'>
        </div>
    </div>
    <div class='form-group row'>
        <div class='col-sm-10'>
            <button type='submit' class='btn btn-success'>Simpan</button>
        </div>
    </div>
</form>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $newName = $_POST['nama'];
        $newUsername = $_POST['username'];
        $newPassword = $_POST['password'];

        if(empty($newName) || empty($newUsername) || empty($newPassword)){
            echo "Form kurang lengkap!";
        }
        else{
            $simpan =mysqli_query($connect, "INSERT INTO admin(username, password, namalengkap) VALUES('$newUsername', '$newPassword', '$newName')");
            if(!$simpan){
                echo "Simpan data gagal!";
            }
            else{
                header('location:dataadmin.php');
            }
        }
    }
?>

<?php include "footer.php" ?>;