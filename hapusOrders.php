<?php 
include 'functions.php';
$id = $_GET['id'];

$result = mysqli_query($conn,"DELETE a.*, b.* FROM orders a JOIN ordersdetail b ON a.id = b.ordersid WHERE a.id = $id");
// $result = mysqli_query($conn,"DELETE FROM orders WHERE id=$id");

header('location: dataOrders.php?m=1');
// if(mysqli_affected_rows($conn) > 0){
//     echo "
//     <script>
//     alert('Data Terhapus');
//     document.location.href = 'dataOrders.php';
//     </script>";
// }else{
//     echo "
//     <script>
//     alert('Data Gagal Terhapus');
//     document.location.href = 'dataOrders.php';
//     </script>";
// }

?>