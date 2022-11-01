<?php 
session_start();
include 'functions.php';
$id = $_GET['id_produk'];

$result = mysqli_query($conn,"DELETE FROM tbl_sepatu WHERE id_produk=$id");

header('location: dataSepatu.php?m=1');
// if(mysqli_affected_rows($conn) > 0){
//     echo "
//     <script>
//     alert('Data Terhapus');
//     document.location.href = 'dataSepatu.php';
//     </script>";
// }else{
//     echo "
//     <script>
//     alert('Data Gagal Terhapus');
//     document.location.href = 'dataSepatu.php';
//     </script>";
// }

?>