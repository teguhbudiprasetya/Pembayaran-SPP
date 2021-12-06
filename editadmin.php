<?php 
include "header.php"; 
ob_start();
?>
<h1 class="panel-name">Edit data admin</h1>
<?php
    $sql = mysqli_query($connect, "SELECT * FROM admin WHERE idadmin='$_GET[id]'");
    $editAdmin = mysqli_fetch_array($sql);
    echo"
    <form method='post'>
    <div class='form-group'>
            <label for='nama'>Nama Lengkap</label>
            <div class='form-control-lg'>
                <input type='text' class='form-control' id='nama' name='nama' value='$editAdmin[namalengkap]'>
            </div>
        </div>
     <div class='form-group'>
     <label for='username'>Username</label>
     <div class='form-control-lg'>
     <input type='text' class='form-control' name='username' value='$editAdmin[username]'>
     </div>
     </div>
     
        <div class='form-group'>
            <label for='password'>Password</label>
            <div class='form-control-lg'>
        <input type='text' class='form-control'  name='password' value='$editAdmin[password]'>
            </div>
        </div>
        <div class='form-group row'>
            <div class='col-sm-10'>
                <button type='submit' class='btn btn-success'>Update</button>
            </div>
        </div>
        </form>";
    ?>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $newName = $_POST['nama'];
        $newUsername = $_POST['username'];
        $newPassword = $_POST['password'];
        
        if(empty($newName) || empty($newUsername) || empty($newPassword)){
            echo "Form kurang lengkap!";
        }
        else{
            $edit = mysqli_query($connect, "UPDATE admin SET username='$newUsername', password='$newPassword', namalengkap='$newName' WHERE idadmin='$_GET[id]'");
            if(!$edit){
                echo "Edit data gagal!";
            }
            else{
                header('location:dataadmin.php');
            }
        }
    }
?>
<?php 
ob_flush();
include "footer.php"; 
?>