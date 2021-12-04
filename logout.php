<?php

    session_start();
    session_destroy(); //Menghancurkan sessison start agar logout
    header("location:login.php");

?>