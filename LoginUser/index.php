<?php 
session_start();  
require 'function.php';

if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  $result = mysqli_query($conn,"SELECT * FROM  tbl_customer WHERE id = '$id'");
  mysqli_fetch_assoc($result);

  if($key === hash('sha256', $row['username'])){
    $_SESSION['login_cust'] = true;
  }
}

if(isset($_SESSION["login_cust"])){
    header("Location : ../index2.php");
    exit;
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $result = mysqli_query($conn,"SELECT * FROM  tbl_customer WHERE username = '$username'");
    
    if(mysqli_num_rows($result) === 1){
    
        $row = mysqli_fetch_assoc($result);

        $_SESSION["login_cust"]=true;

        if(isset($_POST['remember'])){
          setcookie('id',$row['id'], time()+60);
          setcookie('key',hash('sha256',$row['username']),time()+60);
        }
        
        if(password_verify($pass, $row['password'])){
           
                header('location: ../index2.php');
           
         
        }
    }
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Form Login</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan Melakukan Login <b>Customer</b></p>
                <form action="" method="post">
                    <?php 
        if(isset($error)){?>
                    <p style=" color:red; font-weight: bold; font-style : italic;">Password atau Username Salah</p>
                    <?php
        }
        ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form">
                        <input lass="form-check-input" type="checkbox" name="remember">
                        <label class="form-check-label">Ingat Saya</label>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="login" class="btn btn-success btn-block">Sign In</button>
                <a href="../index.php" class="btn btn-danger btn-block">Kembali</a>
                <a href="register.php" class="btn btn-warning btn-block">Registrasi</a>
            </div>
            </form>
            <!-- /.social-auth-links -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <script src="alert/dist/sweetalert2.all.min.js"></script>
</body>

</html>