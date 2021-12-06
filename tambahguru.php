<?php
    include "header.php";
?>

    <h3 class="panel-name">Tambah Data Guru</h3>
    <form method="post" action="">
        <div class='form-group'>
            <label for='password'>Nama Guru</label>
            <div class='form-control-lg'>
        <input type='text' class='form-control'  name='namaguru'>
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