<?php
    include "header.php"
    ?>

<?php
    if($_SESSION["username"] == "adminmaster"){ ?>
        <h1 class="panel-name">Data Admin</h1>
        <a href="tambahadmin.php" class="btn btn-primary btn-sm">Tambah Admin</a>
        <table style="margin-top: 20px;" class="table table-hover table-bordered">
            <tr>
                <th style="width: 40px; text-align:center;">No</th>
                <th style="width: 40px; text-align:center;">Id</th>
                <th>Username</th>
                <th>Password</th>
                <th style="width: 138px; text-align:center;">Aksi</th>
            </tr>
            <?php 
        $no = 1;
        $sql = mysqli_query($connect, "SELECT * FROM admin WHERE username NOT LIKE 'adminmaster%' ORDER BY idadmin");
        while($d = mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td style="text-align: center;"><?= $no; ?></td>
                <td style="text-align: center;"><?= $d['idadmin']; ?></td>
                <td><?= $d['username']; ?></td>
                <td><?= $d['password']; ?></td>
                <td style="text-align: center;">
            
                    <a class="btn btn-primary btn-sm" href="editadmin.php?id=<?=$d['idadmin']?>">Edit</a>
                    <a class="btn btn-danger btn-sm" href="hapusadmin.php?id=<?=$d['idadmin']?>">Hapus</a>
                </td>
            </tr>
            
            
        <?php
        $no++;
        }
        echo" </table>";
        
    }
    else{
        echo "<h3>Anda bukan Admin Master!</h3>";
    }
?>








<?php
    include "footer.php"
?>