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

function registrasi($data){
    global $conn;

    $username = strtolower(stripcslashes($data['username']));
    $pass = mysqli_real_escape_string($conn,$data['password']);
    $pass2 = mysqli_real_escape_string($conn,$data['password2']);

    $result = mysqli_query($conn,"SELECT username FROM tbl_customer WHERE username = '$username'");
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

    mysqli_query($conn, "INSERT INTO  tbl_customer VALUE ('', '$username', '$pass')");

    return mysqli_affected_rows($conn);
    }
?>