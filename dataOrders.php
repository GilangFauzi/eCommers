<?php 
session_start();
error_reporting(0);
require 'functions.php';

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
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
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <script src="alert/jquery-3.6.0.min.js"></script>
    <script src="alert/dist/sweetalert2.all.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="dist/img/hc.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Home Creative</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="dataSepatu.php" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Data Sepatu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="dataOrders.php" class="nav-link">
                                <i class="fas fa-money-check-alt"></i>
                                <p>Data Orders</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>Mode Customer</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>LogOut</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Orders</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- TABLE -->
            <?php 
                                    if(isset($_GET['m'])):?>
            <div class="flash-data" data-flashdata="<?= $_GET['m'];?>"></div>
            <?php endif;?>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <a href="cetakLaporan.php" target="_blank" class="btn btn-primary"><b>Cetak</b></a>
                                <div class="card-header">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8 offset-md-2">
                                                <?php 
                                   
                                    if(isset($_POST['tambah'])){
                                        $keuntungan = $_POST['keuntungan'];
                                        $donasi = $_POST['donasi'];
                                        $total = $_POST['total'];
                                        $tgl = date("Y-m-d H:i:s");
                                        
                                        $query = "INSERT INTO tbl_donasi VALUES ('','$keuntungan','$donasi','$total','$tgl')";
                                        mysqli_query($conn,$query);
                                        
                                        if(mysqli_affected_rows($conn) > 0){
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
                                                title : 'Gagal',
                                                text: 'Data Gagal di Tambahkan',
                                                icon: 'error',
                                                showConfirmButton: false,
                                                timer: 1300
                                            })
                                            </script>";
                                            // menampilkan pesan kesalahan jika gagal
                                            echo mysqli_error($conn);
                                        }
                                    
                                    }
                                    ?>
                                                <form action="" method="post">
                                            </div>
                                        </div>
                                    </div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>ID</th>
                                            <th>Size</th>
                                            <th>QTY</th>
                                            <th>Harga</th>
                                            <th>Donasi</th>
                                            <th>Tanggal Transaksi</th>

                                            <th>Aksi</th>
                                        </tr>
                                        <?php 
                $result = mysqli_query($conn,"SELECT orders.id, orders.nama, orders.alamat, orders.ukuran, orders.tgl_transaksi, ordersdetail.harga, ordersdetail.qty
                FROM orders INNER JOIN ordersdetail ON orders.id = ordersdetail.ordersid");
          
            if(mysqli_num_rows($result)){
          
        $i = 1;
        while($sepatu = mysqli_fetch_assoc($result)){      
            ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $sepatu['nama']?></td>
                                            <td><?php echo $sepatu['alamat']?></td>
                                            <td><?php echo $sepatu['id']?></td>
                                            <td><?php echo $sepatu['ukuran']?></td>
                                            <td><?php echo $sepatu['qty']?></td>
                                            <?php 
                $a = $sepatu['harga'];
                $b = $sepatu['qty'];
                $jumlah = $a * $b;
                $ppn = ($jumlah * 5)/100 ;
                $total = $jumlah - $ppn;
                $jm_total = $total+$i;
                ?>
                                            <td>Rp.<?php echo $jumlah; ?>,-</td>
                                            <td>Rp.<?php echo $ppn; ?>,-</td>
                                            <td><?php echo $sepatu['tgl_transaksi']?></td>

                                            <td>
                                                <a href="hapusOrders.php?id=<?=$sepatu['id']?>"
                                                    class="btnDelete">Hapus</a>
                                            </td>

                                            <?php 
        $i++;
}
            }else{
                echo '<td colspan="9" align="center">Data Gak Ada</td>';
            }
                            ?>
                                    </table>

                                    <?php 


                                $x = mysqli_query($conn,"SELECT * FROM ordersdetail");

                                $total_harga = 0;
                                while($y = mysqli_fetch_assoc($x)){
                                $z = $y['qty'] * $y['harga'];  
                                $total_harga += $z;
                                $ppn = ($total_harga * 5)/100;
                                $potongan = $total_harga - $ppn;
                                
                                }

                        ?>
                                    <table>
                                        <th>

                                            <p>Total Keuntungan
                                                <input class="form-control" type="text" name="keuntungan" readonly
                                                    value="Rp.<?php echo $potongan; ?>,-"></input>
                                            </p>

                                        </th>
                                        <th>

                                            <p>Total Donasi
                                                <input class="form-control" type="text" name="donasi" readonly
                                                    value="Rp.<?php echo $ppn; ?>,-"></input>
                                            </p>

                                        </th>
                                        <th>
                                            <p>Total Semua
                                                <input class="form-control" type="text" name="total" readonly
                                                    value="Rp.<?php echo $total_harga; ?>,-"></input>
                                            </p>
                                        </th>
                                    </table>
                                </div>
                            </div>

                            <button type="submit " class="btn btn-primary" name="tambah"
                                onclick="return confirm('Data akan ditambahkan ke database');">Simpan Data
                                Keuangan</button>
                            </form>
            </section>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Add Content Here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>

        <footer class="main-footer">
            <strong>Copyright Home Creative</strong>
        </footer>
        <script src="alert/jquery-3.6.0.min.js"></script>
        <script src="alert/dist/sweetalert2.all.min.js"></script>

        <script>
        $('.btnDelete').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data Akan di Hapus Permanen",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
        })

        const flashdata = $('.flash-data').data('flashdata')
        if (flashdata) {
            Swal.fire({
                title: 'Success',
                text: 'Data Berhasil di Hapus',
                icon: 'success',
                showConfirmButton: false,
                timer: 1200
            })
        }
        </script>
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- JQVMap -->
        <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- overlayScrollbars -->
        <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>