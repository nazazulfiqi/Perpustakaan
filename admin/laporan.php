<?php
  require "../config/koneksi.php";
  session_start();

$laporan = mysqli_query($conn,"SELECT * FROM laporan");
  $x = 1 ;
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

    <div class="container" id="akun">
        <div class="row">
            <h1 class="fw-bold text-center">Laporan</h1>
            <div class="col-12">
                <h1></h1>
                <table class="table table table-dark table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">No.Telp</th>
                            <th scope="col">Alamat Email</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
              while($result = mysqli_fetch_assoc($laporan))
              {
          ?>
                        <tr>
                        <th scope="row"><?= $x++;?></th>
                        <td><?= $result['nama']?></td>
                        <td><?= $result['no_telp']?></td>
                        <td><?= $result['email']?></td>
                        <td><?= $result['judul']?></td>
                        <!-- <td><?= $result['password']?></td> -->
                            <td>
                                <button type="button" class="btn btn-light px-3" name="hapus"> <a
                                        href="../proses/proses-hapus-laporan.php?id=<?=$result["id"] ?>" style="color: #fff ;
                                        text-decoration: none;"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="text-dark" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg></a> </button>

                            </td>
                        </tr>
                        <?php
              }
          ?>
                    </tbody>
                </table>

            </div>
            <a href="admin.php" class="btn mb-2 btn-primary ms-auto me-2">Kembali</a>
        </div>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
        </script>
</body>

</html>