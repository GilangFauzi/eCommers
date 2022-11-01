<?php
session_start();
require 'functions.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sepatu</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script src="alert/jquery-3.6.0.min.js"></script>
    <script src="alert/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <br>
    <?php 
    if(isset($_SESSION['info-size'])){
        echo"
        <script>
        Swal.fire({
            icon: 'warning',
            text: 'Ukuran Gambar Terlalu Besar, Max 5mb',
            title: 'Gagal Menyimpan Data',
        })
        </script>
        ";
    }
    unset($_SESSION['info-size']);

    if(isset($_SESSION['info-gambar'])){
        echo"<script>
        Swal.fire({
            icon : 'warning',
            title: 'Gagal Menyimpan Data',
            text: 'Yang Anda Masukan Bukan Gambar'
        })
        </script>";
        unset($_SESSION['info-gambar']);
    }
    ?>
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <h1 class="btn-primary" align="center">Input Data Sepatu</h1>
            <div class="card-header">
                <?php 
            if(isset($_POST["tambah"])){
                if(add($_POST)>0){
                    echo "<script>
                    Swal.fire({
                        title : 'Success',
                        text: 'Data Berhasil di Tambahkan',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1300
                    })
                    </script>";
                }else{
                 echo "<script>
                 Swal.fire({
                    title: 'Gagal',
                     text:'Data Gagal di Tambahkan',
                     icon: 'error',
                     showConfirmButton: false,
                     timer : 1300
                 })
                 </script>";
                }
             }
            ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="merk">Merk Sepatu</label>
                            <input type="text" class="form-control" name="merk" id="merk" require
                                placeholder="masukan merk" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" name="harga" id="harga" require
                                placeholder="masukan harga">
                        </div>
                        <label for="qty">Stok</label>
                        <input type="number" class="form-control" min="0" name="qty" id="qty" require
                            placeholder="masukan qty">
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" require
                                placeholder="masukan nama produk">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Image</label>
                            <div class="form-control">
                                <div class="input-group-append">
                                    <input type="file" name="gambar" id="gambar">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" name="tambah">Simpan</button>
                        <a href="dataSepatu.php" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>