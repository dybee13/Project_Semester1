<?php
    include "../db.php";
    session_start();
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $query= mysqli_query($konek, "SELECT * FROM login_admin WHERE username='$username' AND password='$password'");
        if(mysqli_num_rows($query)>0){
            $_SESSION['username'] = $_POST['username'];
            header("Location:admin.php");
        }else{
            echo "<script>
            alert('Ussername atau Password tidak sesuai!')
            window.location = 'index.php';
            </script>";
        }
    }
    if(isset($_POST['daftar'])){
        $username = $_POST['username'];
        $pw = $_POST['pw'];
        $pw2 = $_POST['pw2'];
        $queryy = mysqli_query($konek, "SELECT * FROM login_admin WHERE username='$username'");
        $cek_login = mysqli_num_rows($queryy);
    
        if($cek_login > 0){
            echo "<script>
            alert('username telah digunakan');
            window.location = 'index.php';
            </script>";
        }else if(empty($username) || empty($pw) || empty($pw2)){
            echo "<script>
            alert('Data harus diisi terlebih dahulu!!');
            window.location = 'index.php';
            </script>";
        }else{
            if ($pw != $pw2){
                echo"<script>
                alert('konfirmasi password tidak sesuai');
                window.location = 'index.php';
                </script>";
            }else{
                mysqli_query($konek,"INSERT INTO login_admin(username,password) VALUES('$username','$pw')"); 
                echo "<script>
                alert('data berhasil dikirim');
                window.location = 'home.php';
                </script>";
            }
        }
    }
    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

<div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
         <header>Login D'music</header>
         <form action="index.php" method="post">
            <input type="text" placeholder="username" name="username">
            <input type="password" placeholder="Masukan password" name="password">
            <a href="#">Lupa password?</a>
            <input type="submit" value="login" name="login" class="submit">
         </form>
         <div class="signup">
            <span class="signup">Belum punya akun?
            <label for="check">Daftar</label>
            </span>
         </div>
    </div>
    <div class="registration form">
        <header>register form</header>
            <form action="index.php" method="post">
                
                <input type="text" placeholder="Username" name="username">
                <input type="password" placeholder="Masukan password" name="pw">
                <input type="password" placeholder="Masukan ulang password" name="pw2">
                <input type="submit" value="daftar" name="daftar" class="submit">
            </form>
            <div class="signup">
                <span class="signup">Sudah punya akun?
                    <label for="check">Login</label>
                </span>
            </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  </body>
</html>