<?php include "header.php"; ?>

<h3>Data Siswa</h3>
<a href="tambahsiswa.php">Tambah data</a>

<table border="1">
    <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Tahun ajaran</th>
        <th>Biaya</th>
        <th>Aksi</th>
    </tr>
    <?php
        $sql = mysqli_query($connect, "SELECT siswa.idsiswa, siswa.nis, siswa.namasiswa, siswa.kelas,
                siswa.tahunajaran, siswa.biaya FROM siswa ORDER BY kelas");
                $no = 1;
                while ( $d = mysqli_fetch_array($sql)) {
                    echo"
                        <tr>
                            <td>$no</td>
                            <td>$d[nis]</td>
                            <td>$d[namasiswa]</td>
                            <td>$d[kelas]</td>
                            <td>$d[tahunajaran]</td>
                            <td>$d[biaya]</td>
                            <td>
                            <a href='editsiswa.php?nis=$d[idsiswa]'>Edit</a>
                            <a href='hapussiswa.php?nis=$d[idsiswa]'>Hapus</a>
                            </td>
                        </tr>
                    ";
                    $no++;
                }
    ?>
</table>



<?php include "footer.php"; ?>