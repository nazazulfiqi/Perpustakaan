<?php

$server="localhost";
$user="root";
$pass="";
$database="perpus_aca";

$conn = mysqli_connect($server, $user, $pass,$database);
if (!$conn) {
  die("Connection failed" . mysqli_connect_error());
}

// FUNCTION BUAT AKUN

function daftar($data){
  global $conn;

  $nama = strtolower(stripslashes($data["nama"]));
  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  $role = ($role='USER');

  if(empty($_POST['nama'])){
    echo "<script>
    alert('Nama Tidak Boleh Kosong!')
    </script>";

return false;
}

  if(empty($_POST['username'])){
    echo "<script>
    alert('Nama Pengguna Tidak Boleh Kosong!')
    </script>";

return false;
}
if(empty($_POST['password'])){
  echo "<script>
  alert('Kata Sandi Tidak Boleh Kosong!')
  </script>";

return false;
}

  //username sudah terpakai / belum
  $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");  
  if(mysqli_fetch_assoc($result)){
    echo "<script>
          alert('Username Sudah Digunakan!')
          </script>";

    return false;
  }

  //cek konfirmasi
  if($password !== $password2){
    echo "<script>
          alert('Password Tidak Sesuai!')
          </script>";
          return false;
  }

  //enkripsi password
  // $password = password_hash($password, PASSWORD_DEFAULT);
  

  //tambah user
  mysqli_query($conn, "INSERT INTO users VALUE('','$nama','$username','$password','$role')");

  return mysqli_affected_rows($conn);



}



?>

