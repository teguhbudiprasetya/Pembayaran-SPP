<?php

    session_start();
    if(isset($_SESSION['login'])){
        include "connection.php";
        $hapus = mysqli_query($connect, "DELETE FROM siswa WHERE idsiswa='$_GET[nis]'");
        if($hapus){
            header('location:datasiswa.php');
        }
        else{
            // echo $hapus;
            echo "Hapus data gagal, guru masih menjadi wali kelas<br> 
            <a href='datasiswa.php'><<<Kembali</a>";
        }
    }
    else{
        echo "Anda tidak memiliki akses ke halaman ini!";
    
    }

?>