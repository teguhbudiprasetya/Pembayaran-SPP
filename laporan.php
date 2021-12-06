<?php include "header.php" ?>

<h1 class="panel-name">Laporan Guru dan Siswa</h1>
<a class="btn btn-info btn-sm" href="laporanguru.php">Laporan Guru</a>
<a class="btn btn-info btn-sm" href="laporansiswa.php?">Laporan Siswa</a>
<form style="margin-top: 20px;"method="get" action="laporancarisiswa.php" target="blank">
    <div class='form-group'>
        <label for='password'>Dari</label>
        <div class='form-control-lg' style="width: 15%;">
            <input type='date' class='form-control'  name='dari'>
        </div>
    </div>
    <div class='form-group' >
        <label for='password'>Hingga</label>
        <div class='form-control-lg' style="width: 15%;">
            <input type='date' class='form-control'  name='hingga'>
        </div>
    </div>
    <div class='form-group row'>
            <div class='col-sm-10'>
                <button type='submit' class='btn btn-success'>Cari</button>
            </div>
    </div>
</form>


<?php include "footer.php" ?>