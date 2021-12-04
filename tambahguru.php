<?php
    include "header.php";
?>

    <h3>Tambah Data Guru</h3>
    <form method="post" action="">
        <table>
            <tr>
                <td>Nama Guru</td>
                <td><input type="text" name="namaguru"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Membuat variabel untuk menampung input user
        $nama = $_POST['namaguru'];

        if(empty($nama)){
            echo "Form belum lengkap";
        }
        else{
            //Proses simpan data guru
            $simpan = mysqli_query($connect, "INSERT INTO guru(namaguru) VALUES ('$nama')");

            if(!$simpan){
                echo "Simpan data gagal!";
            }
            else{
                header('location:dataguru.php');
            }
        }
    }
    
    
    
    
    
    
    
    include "footer.php";
?>