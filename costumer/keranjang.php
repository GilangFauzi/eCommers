<?php 
// Start the session
session_start();
ob_start();
require '../functions.php';
require 'item.php';
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body>

    <?php
if(isset($_GET['id_produk']) && !isset($_POST['update']))  { 
	$sql = "SELECT * FROM tbl_sepatu WHERE id_produk=".$_GET['id_produk'];
	$result = mysqli_query($conn, $sql);
	$product = mysqli_fetch_object($result); 
    
	$item = new Item();
	$item->id_produk = $product->id_produk;
    $item->nama_produk = $product->nama_produk;
	$item->merk = $product->merk;
    $item->gambar = $product->gambar;
	$item->harga = $product->harga;
    $iteminstock = $product->qty;
	$item->qty = 1;
	// Check product is existing in cart
	$index = -1;
	$cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
	for($i=0; $i<count($cart);$i++)
		if ($cart[$i]->id_produk == $_GET['id_produk']){
			$index = $i;
			break;
		}
		if($index == -1) 
			$_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
		else {
			
			if (($cart[$index]->qty) < $iteminstock)
				 $cart[$index]->qty ++;
			     $_SESSION['cart'] = $cart;
		}
}
// Delete product in cart
if(isset($_GET['index']) && !isset($_POST['update'])) {
	$cart = unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;
}
// Update qty in cart
if(isset($_POST['update'])) {
  $arrQuantity = $_POST['qty'];
  $cart = unserialize(serialize($_SESSION['cart']));
  for($i=0; $i<count($cart);$i++) {
     $cart[$i]->qty = $arrQuantity[$i];
  }
  $_SESSION['cart'] = $cart;
}
?>
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <a href="#" class="btn btn-success">
                            <h4> Produk di Keranjang</h4>
                        </a>
                        <div class="card-header">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                    </div>
                                </div>
                            </div>
                            <form action="" method="POST">
                                <table id="example1" class="table table-bordered table-striped">
                                    <tr>
                                        <th>Option</th>
                                        <th>Id</th>
                                        <th>Nama Produk</th>
                                        <th>Merk</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Qty</th>

                                        <th>Total Harga</th>
                                    </tr>
                                    <?php 
                                    $cart = unserialize(serialize($_SESSION['cart']));
                                    $jumlah = 0;
                                    $index = 0;
                                    for($i=0; $i<count($cart); $i++){
                                        $jumlah += ($cart[$i]->harga * $cart[$i]->qty);
                                ?>
                                    <tr>
                                        <td><a href="keranjang.php?index=<?php echo $index; ?>"
                                                onclick="return confirm('Apakah Anda Yakin?')">Delete</a>
                                        </td>
                                        <td> <?php echo $cart[$i]->id_produk; ?> </td>
                                        <td> <?php echo $cart[$i]->nama_produk; ?> </td>
                                        <td> <?php echo $cart[$i]->merk; ?> </td>
                                        <td> <img src="../img/<?php echo $cart[$i]->gambar; ?>" width="50" height="50">
                                        </td>
                                        <td> <?php echo $cart[$i]->harga; ?> </td>
                                        <td> <input type="number" min="1" value="<?php echo $cart[$i]->qty; ?>"
                                                name="qty[]">
                                        </td>
                                        <td> <?php echo $cart[$i]->harga * $cart[$i]->qty; ?> </td>
                                    </tr>
                                    <?php 
                            $index++;
                        } ?>
                                    <tr align="center">
                                        <td colspan="7" style="text-align:right; font-weight:bold">
                                            <input type="submit" name="update" alt="Save Button" value="Jumlahkan"
                                                class="btn btn-success">
                                            <input type="hidden" name="update">
                                        </td>
                                        <td>
                                            <?php 
                                            $discount = ($jumlah * 3)/100 ;
                                            $total = $jumlah - $discount;
                                            echo "Rp.$jumlah,-";
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <br>
                            <a href="../index2.php" class="btn btn-success">Continue Shopping </a>
                            <a href="checkout3.php" class="btn btn-warning">Checkout</a>
                            <?php 
                            if(isset($_GET["id_produk"]) || isset($_GET["index"])){
                            header('Location: keranjang.php');
                            } 
                          
                            ?>


                            <!-- TEST -->
                            <br>
                            <br>
                            <br>
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <a href="#" class="btn btn-info">
                                                    <h4> INVOICE</h4>
                                                </a>
                                                <div class="card-header">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-8 offset-md-2">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form action="" method="POST">
                                                        <table id="example1" class="table table-bordered table-striped">
                                                            <tr>

                                                                <th>Id</th>
                                                                <th>Nama Produk</th>
                                                                <th>Merk</th>
                                                                <th>Gambar</th>
                                                                <th>Harga</th>
                                                                <th>Qty</th>

                                                                <th>Total Harga</th>
                                                            </tr>
                                                            <?php 
                                                                    $cart = unserialize(serialize($_SESSION['cart']));
                                                                    $jumlah = 0;
                                                                    $index = 0;
                                                                    for($i=0; $i<count($cart); $i++){
                                                                        $jumlah += ($cart[$i]->harga * $cart[$i]->qty);
                                                                ?>
                                                            <tr>

                                                                <td> <?php echo $cart[$i]->id_produk; ?> </td>
                                                                <td> <?php echo $cart[$i]->nama_produk; ?> </td>
                                                                <td> <?php echo $cart[$i]->merk; ?> </td>
                                                                <td> <img src="../img/<?php echo $cart[$i]->gambar; ?>"
                                                                        width="50" height="50">
                                                                </td>

                                                                <td> <?php echo $cart[$i]->harga; ?> </td>
                                                                <td>
                                                                    <p name="qty[]" readonly>
                                                                        <?php echo $cart[$i]->qty; ?>
                                                                </td>
                                                                <td> <?php echo $cart[$i]->harga * $cart[$i]->qty; ?>

                                                                </td>

                                                            </tr>
                                                            <?php 
                                                                    $index++;
                                                                } ?>
                                                            <tr>
                                                                <td colspan="7" "
                                                                    style=" text-align:center; font-weight:bold">
                                                                    <?php 
                                                                    echo"Total = ";
                                            $discount = ($jumlah * 3)/100 ;
                                            $total = $jumlah - $discount;
                                            echo "Rp.$jumlah,-";
                                            ?>
                                                                    <input type="hidden" name="update">
                                                                </td>

                                                            </tr>
                                                        </table>
                                                    </form>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

    </section>
</body>

</html>