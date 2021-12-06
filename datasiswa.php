<?php include "header.php"; ?>

<h1 class="panel-name">Data Siswa</h1>
<a class="btn btn-primary btn-sm" href="tambahsiswa.php">Tambah data</a>
<table style="margin-top: 20px;" class="table table-hover table-bordered">
    <tr>
        <th style="width: 40px; text-align:center;">No</th>
        <th style="text-align: center;">NIS</th>
        <th>Nama</th>
        <th style="text-align: center;"> Kelas</th>
        <th style="width: 138px; text-align:center;">Tahun ajaran</th>
        <th style="text-align: center;">Biaya</th>
        <th style="width: 138px; text-align:center;">Aksi</th>
    </tr>
    <?php
        $sql = mysqli_query($connect, "SELECT siswa.idsiswa, siswa.nis, siswa.namasiswa, siswa.kelas,
                siswa.tahunajaran, siswa.biaya FROM siswa ORDER BY kelas");
                $no = 1;
                while ( $d = mysqli_fetch_array($sql)) {
                    echo"
                        <tr>
                            <td style='text-align:center;'>$no</td>
                            <td style='text-align:center;'>$d[nis]</td>
                            <td>$d[namasiswa]</td>
                            <td style='text-align:center;'>$d[kelas]</td>
                            <td style='text-align:center;'>$d[tahunajaran]</td>
                            <td style='text-align:center;'>$d[biaya]</td>
                            <td style='text-align: center;'>
                            <a class='btn btn-primary btn-sm' href='editsiswa.php?nis=$d[idsiswa]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='hapussiswa.php?nis=$d[idsiswa]'>Hapus</a>
                            </td>
                        </tr>
                    ";
                    $no++;
                }
    ?>
</table>



<?php include "footer.php"; ?>