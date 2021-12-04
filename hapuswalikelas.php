<?php

    session_start();
    if(isset($_SESSION['login'])){
        include "connection.php";
        $hapus = mysqli_query($connect, "DELETE FROM walikelas WHERE kelas='$_GET[kls]'");
        if($hapus){
            header('location:datawalikelas.php');
        }
        else{
            echo "Hapus data gagal<br> 
            <a href='datawalikelas.php'><<<Kembali</a>";
        }
    }
    else{
        echo "Anda tidak memiliki akses ke halaman ini!";
    
    }

?>