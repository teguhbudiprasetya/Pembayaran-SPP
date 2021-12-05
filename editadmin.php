<?php include "header.php"; ?>



<h3>Edit data admin</h3>
<?php
    $sql = mysqli_query($connect, "SELECT * FROM admin WHERE idadmin='$_GET[id]'");
    $editAdmin = mysqli_fetch_array($sql);
    echo"
    
    <form method='post'>
    <table>
        <tr>
            <td>Nama lengkap</td>
            <td>:</td>
            <td>
            <input type='text' name='nama' value='$editAdmin[namalengkap]'>
            </td>
        </tr>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td>
            <input type='text' name='username' value='$editAdmin[username]'>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td>
            <input type='text' name='password' value='$editAdmin[password]'>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <input type='submit' value='Simpan'>
            </td>
        <tr>
    </table>
    </form>
    ";
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
<?php include "footer.php"; ?>