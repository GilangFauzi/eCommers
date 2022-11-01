<?php 
session_start();
require '../functions.php';
require 'item.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <script src="../alert/jquery-3.6.0.min.js"></script>
    <script src="../alert/dist/sweetalert2.all.min.js"></script>
</head>

<body style="background-image : url(../img/cover.jpg);
 background-position: 0 -700px;">

    <?php
if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tglTransaksi = date('Y-m-d');
    $ukuran = $_POST['ukuran'];
    $email = $_POST['email'];
   
    $query = "INSERT INTO orders VALUES 
    ('','$nama','$alamat','$tglTransaksi','$ukuran','$email')";
    mysqli_query($conn,$query);

    $ordersid = mysqli_insert_id($conn); 
    $cart = unserialize(serialize($_SESSION['cart']));
    for($i=0; $i<count($cart);$i++) {
    $sql2 = 'INSERT INTO ordersdetail (productid, ordersid, harga, qty) VALUES 
    ('.$cart[$i]->id_produk.', '.$ordersid.', '.$cart[$i]->harga.', '.$cart[$i]->qty.')';
    mysqli_query($conn, $sql2);
    // Clear all product in cart
    unset($_SESSION['cart']);

    if(mysqli_affected_rows($conn) > 0){
        echo "<script>
       alert ('Data berhasil Checkout');
       document.location.href = '../index2.php';
                    </script>";
                   
    }else{
        echo "<script>
        alert ('Terdapat barang yang sama!');
       document.location.href = '../index2.php';
        </script>";
    }
    
}

}

// Save new orders
// $sql1 = 'INSERT INTO orders (nama, tglBeli, ket, username) VALUES ("New Order","'.date('Y-m-d').'","LUNAS","accOrders")';
// mysqli_query($conn, $sql1);
// $ordersid = mysqli_insert_id($conn); 

// Save order details for new orders
// $cart = unserialize(serialize($_SESSION['cart']));
// for($i=0; $i<count($cart);$i++) {
    
// $sql2 = 'INSERT INTO ordersdetail (productid, ordersid, harga, qty) VALUES ('.$cart[$i]->id.', '.$ordersid.','.$cart[$i]->harga.', '.$cart[$i]->qty.')';
// mysqli_query($conn, $sql2);
//}
// Clear all product in cart
// unset($_SESSION['cart']);

 ?>
    <br>

    <div class="col-md-8 offset-md-2">
        <div class="card">
            <h2 class="btn btn-danger">CHECKOUT!</h2>
            <div class="card-header">
                <form action="" method="post" style="background-color : white;">
                    <div class="card-body">
                        <label for="nama" class="col-sm-2 col-form-label"> Nama :</label>
                        <div class="col-sm-12">
                            <input type="text" name="nama" class="form-control" placeholder="masukan nama" required>
                        </div>
                        <label for="alamat" class="col-sm-2 col-form-label"> Alamat :</label>
                        <div class="col-sm-12">
                            <input type="text" name="alamat" class="form-control" placeholder="masukan alamat" required>
                        </div>
                        <label for="ukuran" class="col-sm-2 col-form-label"> Ukuran :</label>
                        <div class="col-sm-12">
                            <input type="text" name="ukuran" class="form-control" placeholder="0" required>
                        </div>
                        <label for="email" class="col-sm-2 col-form-label"> Email :</label>
                        <div class="col-sm-12">
                            <input type="email" name="email" class="form-control" placeholder="masukan email" required>
                            <div>
                            </div>
                            <br>
                            <button type="submit" name="simpan" class="btn btn-success">Kirim</button>
                            <a href="../index2.php" class="btn btn-danger">Cencel</a>
                        </div>
                    </div>
                    <br>

                </form>
            </div>
        </div>
</body>

</html>