<?php
//variabel koneksi
$connect = mysqli_connect("localhost","root","","sppsekolah");

if(!$connect){
	echo "Koneksi Database Gagal...!!!";
}
?>