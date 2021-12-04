<?php

    session_start();
    if(isset($_SESSION['login'])){
        include "connection.php";
        $hapus = mysqli_query($connect, "DELETE FROM guru WHERE idguru='$_GET[id]'");
        if($hapus){
            header('location:dataguru.php');
        }
        else{
            // echo $hapus;
            echo "Hapus data gagal, guru masih menjadi wali kelas<br> 
            <a href='dataguru.php'><<<Kembali</a>";
        }
    }
    else{
        echo "Anda tidak memiliki akses ke halaman ini!";
    
    }

?>