<?php include "header.php" ?>

<h3>Laporan Guru dan Siswa</h3>
<ul>
    <li><a href="laporanguru.php">Laporan Guru</a></li>
    <li><a href="laporansiswa.php?">Laporan Siswa</a></li>
</ul>
<form method="get" action="laporancarisiswa.php" target="blank">
    <table style="margin-left: 20px;">
        <tr>
            <td>Dari</td>
            <td><input type="date" name="dari"></td>
            <td>Hingga</td>
            <td><input type="date" name="hingga"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="button" value="Cari" >
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
</form>

<?php
?>

<?php include "footer.php" ?>