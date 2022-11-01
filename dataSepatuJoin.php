<?php 

require 'functions.php';
$result = "SELECT orders.nama, orders.tglBeli FROM orders 
JOIN tbl_sepatu ON tbl_sepatu.id = orders.id";
$p = mysqli_query($conn, $result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepatu</title>
</head>

<body>
    <h1>Data Orderan</h1>
    <form action="" method="post">
        <input type="text" name="keyword" autofocus="off">
        <button type="submit" name="cari">Cari</button>
        <a href="sepatu.php">Tambah</a>
        <table border="1">
            <tr>
                <th>NO</th>
                <th>Merk</th>
                <th>Harga</th>
                <th>QTY</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php 
      
          
        $i = 1;
        while($sepatu = mysqli_fetch_array($p)){      
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $sepatu['merk']?></td>
                <td><?php echo $sepatu['harga']?></td>
                <td><?php echo $sepatu['qty']?></td>
                <td><?php echo $sepatu['ket']?></td>
                <td><?php echo $sepatu['tglBeli']?></td>
                <td><?php echo $sepatu['nama']?></td>
                <td>
                    <a href="ubah.php?id=<?=$sepatu['id'] ?> ">Ubah</a>|
                    <a href="hapus.php?id=<?= $sepatu['id']?>">Hapus</a>
                </td>
                <?php 
        $i++;
}

?>
        </table>
    </form>
    <a href="logout.php">Logout</a> ||
    <a href="costumer/dataPenjualan.php">Mode Customer</a>
</body>

</html>