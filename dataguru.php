<?php
    include "header.php";
?>

<h1 class="panel-name">Data Guru</h1>
<a href="tambahguru.php" class="btn btn-primary btn-sm">Tambah Data</a>
<table style="margin-top: 20px;" class="table table-hover table-bordered">
    <tr>
        <th style="width: 40px; text-align:center;">No</th>
        <th>Nama Guru</th>
        <th style="width: 138px; text-align:center;">Aksi</th>
    </tr>
    <?php
    $sql = mysqli_query($connect, "SELECT * FROM guru ORDER BY idguru");
    $no = 1;
    while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>
			<td>$d[namaguru]</td>
			<td style='text-align: center;'>
				<a class='btn btn-primary btn-sm' href='editguru.php?id=$d[idguru]'>Edit</a> 
				<a class='btn btn-danger btn-sm' href='hapusguru.php?id=$d[idguru]'>Hapus</a>
			</td>
		</tr>";
		$no++;
	}
	?>
</table>




<?php
    include "footer.php";
?>