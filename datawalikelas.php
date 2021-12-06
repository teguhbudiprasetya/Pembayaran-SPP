<?php  include "header.php"; ?>

<h1  class="panel-name">Data Kelas dan Wali Kelas</h1>
<a href="tambahwalikelas.php" class="btn btn-primary btn-sm">Tambah data</a>
<table style="margin-top: 20px;" class="table table-hover table-bordered">
    <tr>
        <th style="width: 40px; text-align:center;">No</th>
        <th  style="width: 138px; text-align:center;">Nama Kelas</th>
        <th>Nama Wali Kelas</th>
        <th style="width: 138px; text-align:center;">Aksi</th>
    </tr>
    <?php
    $sql = mysqli_query($connect, "SELECT walikelas.kelas, 
    walikelas.idguru, guru.namaguru FROM walikelas 
    INNER JOIN guru ON walikelas.idguru=guru.idguru
    ORDER BY walikelas.kelas");
    $no = 1;
    while ( $d = mysqli_fetch_array($sql)) {
        echo"
        <tr>
            <td style='text-align: center;'>$no</td>
            <td style='text-align: center;'>$d[kelas]</td>
            <td>$d[namaguru]</td>
            <td style='text-align: center;'>
                <a class='btn btn-primary btn-sm' href='editwalikelas.php?kls=$d[kelas]'>Edit</a>
                <a class='btn btn-danger btn-sm' href='hapuswalikelas.php?kls=$d[kelas]'>Hapus</a>
            </td>
        </tr>";
        $no++;
    }
    ?>
</table>

<?php  include "footer.php"; ?>