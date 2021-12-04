<?php
    include "header.php";
?>

    <h3>Tambah Data Walikelas</h3>
    <form method="post" action="">
        <table>
            <tr>
                <td>Kelas</td>
                <td><input type="text" name="kelas"></td>
            </tr>
                <td>Pilih Guru/ Wali Kelas</td>
                <td>
                    <select name="guru">
                        <option value="" hidden disabled selected> - Pilih Guru - </option>
                        <?php
                            $sqlEditGuru = mysqli_query($connect, "SELECT guru.idguru, guru.namaguru, walikelas.kelas
                            FROM guru
                            LEFT JOIN walikelas ON walikelas.idguru = guru.idguru
                            WHERE walikelas.idguru IS NULL");
                            // $sqlEditKelas = mysqli_query($connect, "SELECT * FROM guru ORDER BY guru.idguru");
                            while ( $x = mysqli_fetch_array($sqlEditGuru)) {
                                
                                echo "<option value='$x[idguru]' $select > $x[namaguru] </option>";
                                
                            }
                            ?>
                
            </select>
        </td>
        <tr>
            <td></td>
            <td><input type="submit" value="Simpan"></td>
        </tr>
    </table>
    </form>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Membuat variabel untuk menampung input user
        $kelas = $_POST['kelas'];
        $nama = $_POST['guru'];

        if(empty($kelas) || empty($nama)){
            echo "Form belum lengkap";
        }
        else{
            $sqlCheckGuru = mysqli_query($connect, "SELECT walikelas.kelas, walikelas.idguru, guru.namaguru FROM walikelas INNER JOIN guru ON walikelas.idguru = guru.idguru ORDER BY idguru");
            // $sql = mysqli_query($connect, "SELECT walikelas.kelas, walikelas.idguru, guru.namaguru FROM walikelas INNER JOIN guru ON walikelas.idguru=guru.idguru ORDER BY walikelas.kelas");
            $cond = true;
                while ( $x = mysqli_fetch_array($sqlCheckGuru)) {
                    if( $nama == $x['idguru']){
                        echo "Simpan data gagal! <br>
                        $x[namaguru] telah menjadi walikelas $x[kelas]";
                        $cond = false;
                        break;
                    }
                }
                if ( $cond == true) {
                    $simpan = mysqli_query($connect, "INSERT INTO walikelas(kelas, idguru) VALUES ('$kelas','$nama')");
                    
                    if(!$simpan){
                        echo "Simpan data gagal!";
                    }
                    else{
                        header('location:datawalikelas.php');
                    }
                    
                }
        }
    }
    
    
    
    
    
    
    
    include "footer.php";
?>