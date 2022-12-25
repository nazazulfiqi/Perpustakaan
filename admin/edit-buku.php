<?php
// session_start();
include "../config/koneksi.php";
// if (!isset($_SESSION['log_admin'])) {
//     header("Location: ../login.php");
// }
$result = mysqli_query($conn, "SELECT * FROM buku");

if(isset($_POST['edit'])) {
    $id = $_GET['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $halaman = $_POST['halaman'];

    $query = "UPDATE buku set judul='$judul', penulis='$penulis', halaman='$halaman' WHERE id='$id' ";

        $tambah = mysqli_query($conn, $query);

        if(!$tambah) {
          echo "Buku Gagal Diupdate";
        } else {
          echo "<script>
          alert('Buku Berhasil Diupdate');
          window.location = 'data-buku.php';
          </script>";
        }
    }
?>
<?php
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM buku WHERE id = '$id' ");
    $x = mysqli_fetch_assoc($result);
    // var_dump($result);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Logo Title -->
    <link rel="icon" href="image/logowedding.png" type="image/x-icon">

    <title>GemarBaca</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light nav-color fixed-top">
        <div class="container">
            <p class="navbar-brand text-light ">GEMARBACA</p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="ms-auto">
                    <?php
        if (!isset($_SESSION['log_user'])) {
        ?>
                    <a href="daftar.php"><button class="button-secondary me-0">DAFTAR</button></a>
                    <a href="login.php"><button class="button-primary">MASUK</button></a>
                    <?php } else { ?>
                    <a href="logout.php"><button class="button-third">KELUAR</button></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->

    <!-- Edit Buku  -->
    <div class="container d-flex justify-content-center" id="edit-buku">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header text-center fw-bold">Edit Buku</h5>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Buku</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="<?= $x['judul'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" class="form-control" id="penulis" name="penulis"
                                    value="<?= $x['penulis'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="halaman" class="form-label">Halaman</label>
                                <input type="text" class="form-control" id="halaman" name="halaman"
                                    value="<?= $x['halaman'] ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary ms-0" name="edit">Edit</button>
                            <a href="data-buku.php" class="btn btn-primary ms-3">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>