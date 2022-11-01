<?php 

$conn = mysqli_connect('localhost','root','','tokosepatu');

function query($query){
  global $conn;
  $result = mysqli_query($conn,$query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
  }
    return $rows;
}

function add($data){
    global $conn;
    $namaProduk = $data['nama_produk'];
    $merk = $data['merk'];
    $harga = $data['harga'];
    $qty = $data['qty'];

$gambar = upload();
if(!$gambar){
    return false;
}
    $query = "INSERT INTO tbl_sepatu VALUES (
        '',
        '$namaProduk',
        '$merk',    
        '$harga',
        '$qty',
        '$gambar'
    )";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}
function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES ['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if($error === 4){
        echo"<script>
        alert('Choose Image');
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg','jpeg','png','pdf','xlsx'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
        session_start();
        $_SESSION['info-gambar']=true;
        header('location: sepatu.php');
        // echo"<script>
        // alert('Not Image');
        // </script>";
        return false;
    }
    // itu ukuran 1mb
    if ($ukuranFile > 5000000){
        $_SESSION['info-size']=true;
        header('location: sepatu.php');
    //     echo"
    //     <script>
    //     Swal.fire({
    //         icon: 'warning',
    //         title: 'Ukuran Gambar Terlalu Besar'
    //     })
    // </script>";
        return false;
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/'.$namaFile);

    return $namaFile;
}


// function cari($keyword){
//     global $conn;
//     $query = "SELECT * FROM tbl_sepatu WHERE 
//     merk LIKE '%$keyword%' OR nama_produk LIKE '%$keyword%'";
// return query($query);

// }


function ubah($ubah){
    global $conn;
    
    $id = $ubah['id_produk'];
    $namaProduk = $ubah['nama_produk'];
    $merk = $ubah['merk'];
    $harga = $ubah['harga'];
    $qty = $ubah['qty'];
    $gambar = $ubah['gambar'];
    $gambarLama = $ubah['gambarLama'];

    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    $result = "UPDATE tbl_sepatu SET
    nama_produk = '$namaProduk',
    merk = '$merk',
    harga = '$harga',
    qty = '$qty',
    gambar = '$gambar'
        WHERE id_produk = $id";

        mysqli_query($conn,$result);
    return mysqli_affected_rows($conn);
}

function registrasi($data){
    global $conn;

    $username = strtolower(stripcslashes($data['username']));
    $pass = mysqli_real_escape_string($conn,$data['password']);
    $pass2 = mysqli_real_escape_string($conn,$data['password2']);

    $result = mysqli_query($conn,"SELECT username FROM tbl_user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo"
        <script>
        alert('Username Sudah Terdaftar');
        </script>
        ";
        return false;
    }

    if($pass !== $pass2){
        echo"
        <script>
        alert('Konfirmasi password salah');
        </script>
        ";
        return false;
    }
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO tbl_user VALUE ('', '$username', '$pass')");

    return mysqli_affected_rows($conn);
    }
?>