<?php 
session_start();
require '../functions.php';
require 'item.php';

// Save new orders
$sql1 = 'INSERT INTO orders (nama, tglBeli, ket, username) VALUES ("New Order","'.date('Y-m-d').'","LUNAS","accOrders")';
mysqli_query($conn, $sql1);
$ordersid = mysqli_insert_id($conn); 
// Save order details for new orders
$cart = unserialize(serialize($_SESSION['cart']));
for($i=0; $i<count($cart);$i++) {
    
$sql2 = 'INSERT INTO ordersdetail (productid, ordersid, harga, qty) VALUES ('.$cart[$i]->id.', '.$ordersid.','.$cart[$i]->harga.', '.$cart[$i]->qty.')';
mysqli_query($conn, $sql2);
}
// Clear all product in cart
unset($_SESSION['cart']);
if(mysqli_affected_rows($conn) > 0){
    echo "<script>
    alert('Data sudah Tersimpan');
    document.location.href = '../index.php';
    </script>";
}else{
    echo "<script>
    alert('Data tidak Tersimpan');
    document.location.href = 'keranjang.php';
    </script>";
}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
     
 </body>
 </html>