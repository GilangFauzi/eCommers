<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'functions.php';
$laporan = query("SELECT orders.id, orders.nama, orders.alamat, orders.ukuran, orders.tgl_transaksi, ordersdetail.harga, ordersdetail.qty
FROM orders INNER JOIN ordersdetail ON orders.id = ordersdetail.ordersid");
$x = mysqli_query($conn,"SELECT * FROM ordersdetail");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <h1 align="center">Laporan Transaksi Penjualan</h1>
    <table class="table">
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Size</th>
                <th>QTY</th>
                <th>Harga</th>
                <th>Donasi</th>
                <th>Tanggal Transaksi</th>
            </tr>';             
            $i = 1;
            $r = "Rp.";
            $p = ",-";
            foreach($laporan as $sepatu){
                $a = $sepatu['harga'];
                $b = $sepatu['qty'];
                $jumlah = $a * $b;
                $ppn = ($jumlah * 5)/100 ;
                $total = $jumlah - $ppn;
                $jm_total = $total+$i;

               $html.= '<tr >
                <td >'. $i++ .'</td>
                <td>'. $sepatu["nama"].'</td>
                <td>'. $sepatu["alamat"].'</td>
                <td>'. $sepatu["ukuran"].'</td>
                <td >'. $sepatu["qty"].'</td>
                <td >'.$r.$jumlah.$p.'</td>
                <td>'.$r.$ppn.$p.'</td>
                <td>'. $sepatu["tgl_transaksi"].'</td>
                </tr>';
               
            };
$html .= '</table>
</body>
</html>';

$html2 = '<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<br>
    <table class="table2">
        $html.= <tr>
        <th >Total Keuntungan</th>
        <th>Total Donasi</th>
        </tr>';
        $r = "Rp.";
        $p = ",-";
        $total_harga = 0;
        foreach($x as $y){
        $z = $y["qty"] * $y["harga"];  
        $total_harga += $z;
        $ppn = ($total_harga * 5)/100;
        $potongan = $total_harga - $ppn;
        }
        $html2.= '<tr>
        <td>'.$r.$potongan.$p.'</td>
        <td>'.$r.$ppn.$p.'</td>
        </tr>';

        $html2 .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output('laporan-transaksi.pdf', \Mpdf\Output\Destination::INLINE);
?>