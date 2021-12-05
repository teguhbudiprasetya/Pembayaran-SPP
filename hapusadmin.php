<?php

    session_start();
    if(isset($_SESSION['login'])){
        include "connection.php";
        $hapus = mysqli_query($connect, "DELETE FROM admin WHERE idadmin='$_GET[id]'");
        if($hapus){
            header('location:dataadmin.php');
        }
        else{
            echo "Hapus data gagal! <br>
            Anda sudah bertanggung jawab atas penambahan siswa!";
        }
    }
    else{
        echo "Anda tidak memiliki akses!";
    }



?>