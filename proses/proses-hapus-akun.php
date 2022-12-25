<?php
    require "../config/koneksi.php";
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $hapus_akun = mysqli_query($conn, "DELETE FROM users WHERE id=$id");
        
        if ($hapus_akun){
            header("Location:../admin/akun.php");
          }else {
            echo mysqli_error($conn);
          }
      }else {
        header("Location:../admin/akun.php");
      }     

?>