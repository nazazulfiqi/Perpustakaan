<?php

$server="localhost";
$user="root";
$pass="";
$database="perpus_aca";


$conn = mysqli_connect($server, $user, $pass,$database);
if (!$conn) {
  die("Connection failed" . mysqli_connect_error());
}


$akun = mysqli_query($conn, "SELECT * FROM users WHERE ROLE LIKE 'USER' ");
$laporan = mysqli_query($conn, "SELECT * FROM laporan");
?>
