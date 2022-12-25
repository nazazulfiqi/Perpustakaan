<?php
    require "../config/koneksi.php";
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $hapus_buku = mysqli_query($conn, "DELETE FROM buku WHERE id=$id");
        
        if ($hapus_buku){
            header("Location:../admin/data-buku.php");
          }else {
            echo mysqli_error($conn);
          }
      }else {
        header("Location:../admin/data-buku.php");
      }     

?>