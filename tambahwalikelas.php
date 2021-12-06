<?php
    include "header.php";
?>

    <h3>Tambah Data Walikelas</h3>
    <form method="post" action="">
        <div class='form-group'>
            <label for='username'>Kelas</label>
            <div class='form-control-lg'>
            <input type='text' class='form-control' name='kelas'>
            </div>
        </div>
        <div class='form-group'>
        <label for='username'>Guru</label>
        <div class='form-control-lg'>
           <!-- <input type='text' class='form-control' name='username'> -->
           <select name="guru" class='form-control'>
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
        </div>
        </div>
    <div class='form-group row'>
        <div class='col-sm-10'>
            <button type='submit' class='btn btn-success'>Simpan</button>
        </div>
    </div>
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