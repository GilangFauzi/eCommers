<?php 

require '../functions.php';
$result = mysqli_query($conn, "SELECT * FROM tbl_sepatu");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan Sepatu</title>
</head>

<body>

    <h1>Silahkan Pilih Barang</h1>

    <form action="" method="post">

        <table border="1">
            <tr>
                <th>No</th>
                <th>Merk Sepatu</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Order</th>
            </tr>
            <?php
        $no = 1;
while ($sepatu = mysqli_fetch_assoc($result)):
?>
            <tr>
                <td><?= $no?></td>
                <td><?= $sepatu['merk']?></td>
                <td><?= $sepatu['qty']?></td>
                <td><?= $sepatu['harga']?></td>
                <td><a href="keranjang.php?id=<?=$sepatu['id'];?>">Order Now</a></td>
            </tr>
            <?php 
        $no++;
endwhile;
?>
        </table>
    </form>
    <a href="../dataSepatu.php">Tambah Data</a>
</body>

</html>