<?php  include "header.php"; ?>

<h3>Data Kelas dan Wali Kelas</h3>
<a href="tambahwalikelas.php">Tambah data</a>
<table border="1" margin="5">
    <tr>
        <th>No</th>
        <th>Nama Kelas</th>
        <th>Nama Wali Kelas</th>
        <th>Aksi</th>
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
            <td>$no</td>
            <td>$d[kelas]</td>
            <td>$d[namaguru]</td>
            <td>
                <a href='editwalikelas.php?kls=$d[kelas]'>Edit</a>
                <a href='hapuswalikelas.php?kls=$d[kelas]'>Hapus</a>
            </td>
        </tr>";
        $no++;
    }
    ?>
</table>

<?php  include "footer.php"; ?>