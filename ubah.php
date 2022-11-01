<?php 
include 'functions.php';
$id = $_GET['id_produk'];
$sepatu = query("SELECT * FROM tbl_sepatu WHERE id_produk = $id")[0];

if(isset($_POST["ubah"])){
  
    if (ubah($_POST) > 0 ){
        echo "<script>
        alert('Sukses');
        document.location.href = 'dataSepatu.php';
        </script>";
    }else{
        echo "<script>
        alert('GAGAL');
        document.location.href = 'dataSepatu.php';
        </script> ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah</title>
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
    <br>
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <h1 class="btn-primary" align="center">Ubah Data Sepatu</h1>
            <div class="card-header">
                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id_produk" value="<?= $sepatu['id_produk']?>">
                    <input type="hidden" name="gambarLama" value="<?= $sepatu['gambar']?>">
                    <input type="hidden" name="gambar" value="<?= $sepatu['gambar']?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" class="form-control" name="merk" value="<?= $sepatu['merk']?>">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control" name="harga" value="<?php echo $sepatu['harga']?>">
                        </div>
                        <div class="form-group">

                            <label>Stok</label>
                            <input type="number" class="form-control" min="0" name="qty"
                                value="<?php echo $sepatu['qty']?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk"
                                value="<?php echo $sepatu['nama_produk']?>">
                        </div>

                        <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>

                </form>
                <a class="btn btn-danger" href="dataSepatu.php">Kembali</a>
            </div>
        </div>
    </div>
</body>

</html>