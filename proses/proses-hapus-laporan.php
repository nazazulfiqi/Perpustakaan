<?php
    require "../config/koneksi.php";
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $hapus_laporan = mysqli_query($conn, "DELETE FROM laporan WHERE id=$id");
        
        if ($hapus_laporan){
            header("Location:../admin/laporan.php");
          }else {
            echo mysqli_error($conn);
          }
      }else {
        header("Location:../admin/laporan.php");
      }     

?>