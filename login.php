<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Aplikasi Pembayaran SPP</title>
</head>
<body>
    <h3>Silahkan login menggunakan username dan password anda!</h3>
    <hr>
    <form method="post" action="">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Login"></td>
            </tr>
        </table>
    </form>
    <?php 
        if($_SERVER['REQUEST_METHOD'] =='POST'){
            //Membuat variabel untuk menampung input user
            $user = $_POST['username'];
            $pass = $_POST['password'];
            if($user == '' || $pass == ''){
                echo 'Form belum lengkap!';
            }
            else{
                include "connection.php";
                $sqlLogin = mysqli_query($connect, "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'");
                //Unutk mengecek ada berapa data yang ditemukan
                $jml = mysqli_num_rows($sqlLogin);
                $d = mysqli_fetch_array($sqlLogin);
                // print_r($d);
                if($jml > 0){
                    session_start();
                    $_SESSION['login'] = true;
                    $_SESSION['id'] = $d['idadmin'];
                    $_SESSION['username'] = $d['username'];
                    $_SESSION['password'] = $d['password'];

                    header('location:index.php');
                }
                else{
                    echo "username dan password anda salah!";
                }
            }
        }
    ?>
</body>
</html>