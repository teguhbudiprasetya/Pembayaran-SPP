<?php include "header.php" ?>
<h3>Tambah Data Admin</h3>
<form method='post'>
    <table>
        <tr>
            <td>Nama lengkap</td>
            <td>:</td>
            <td>
            <input type='text' name='nama'>
            </td>
        </tr>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td>
            <input type='text' name='username'>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td>
            <input type='text' name='password'>
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