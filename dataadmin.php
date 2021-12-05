<?php
    include "header.php"
    ?>

<?php
    if($_SESSION["username"] == "adminmaster"){ ?>
        <h3>Data Admin</h3>
        <a href="tambahadmin.php">Tambah Admin</a>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Username</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
            <?php 
        $no = 1;
        $sql = mysqli_query($connect, "SELECT * FROM admin WHERE username NOT LIKE 'adminmaster%' ORDER BY idadmin");
        while($d = mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $d['idadmin']; ?></td>
                <td><?= $d['username']; ?></td>
                <td><?= $d['password']; ?></td>
                <td>
                    <a href="editadmin.php?id=<?=$d['idadmin']?>">Edit</a>
                    <a href="hapusadmin.php?id=<?=$d['idadmin']?>">Hapus</a>
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