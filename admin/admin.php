<?php
session_start();
include "../config/koneksi.php";
if (!isset($_SESSION['log_admin'])) {
  header("Location: ../login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
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
            if (!isset($_SESSION['log_admin'])) {
            ?>
                    <a href="daftar.php"><button class="button-secondary me-0">DAFTAR</button></a>
                    <a href="login.php"><button class="button-primary">MASUK</button></a>
                    <?php } else { ?>
                    <a href="../proses/logout.php"><button class="button-third">KELUAR</button></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->

    <!-- Tentang Kami -->
    <section id="tentang">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center fw-bold">Menu Admin</h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4 text-center">
                    <div class="card-tentang">
                        <div class="circle-icon position-relative mx-auto mt-5">
                            <img src="../assets/img/programer.png" alt=""
                                class="position-absolute top-50 start-50 translate-middle">
                        </div>
                        <h3 class="judul-tentang">Akun Terdaftar</h3>
                        <a href="akun.php" class="btn btn-primary">Pilih</a>
                    </div>
                </div>
                <div class=" col-md-4 text-center">
                    <div class="card-tentang">
                        <div class="circle-icon position-relative mx-auto mt-5">
                            <img src="../assets/img/laporan.png" alt=""
                                class="position-absolute top-50 start-50 translate-middle">
                        </div>
                        <h3 class="judul-tentang">Laporan</h3>
                        <a href="laporan.php" class="btn btn-primary">Pilih</a>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card-tentang">
                        <div class="circle-icon position-relative mx-auto mt-5">
                            <img src="../assets/img/book.png" alt="" width="80"
                                class="position-absolute top-50 start-50 translate-middle">
                        </div>
                        <h3 class="judul-tentang">Data Buku</h3>
                        <a href="data-buku.php" class="btn btn-primary">Pilih</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Tentang Kami -->



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
        </script>
</body>

</html>