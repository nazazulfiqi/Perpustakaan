<?php
  require "config/koneksi.php";
  session_start();

  $user = mysqli_query($conn,"SELECT * FROM users");
  $buku = mysqli_query($conn,"SELECT * FROM buku");
  $box = mysqli_query($conn,"SELECT * FROM buku");
  $x = 1 ;
  if (!isset($_SESSION['log_user'])) {
    header("Location: login.php");
}

$result = mysqli_query($conn, "SELECT * FROM laporan");

    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $no_telp = $_POST['no_telp'];
        $email = $_POST['email'];
        $judul = $_POST['select'];

        $query = "INSERT INTO laporan (id,nama,no_telp,email,judul) VALUES ('','$nama','$no_telp','$email','$judul')";
        $tambah = mysqli_query($conn, $query);

        if(!$tambah) {
          echo "Buku Gagal Dipinjam";
        } else {
          echo "<script>
          alert('Buku Berhasil Dipinjam');
          window.location = 'home.php';
          </script>";
        }
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">

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
                    <a href="proses/logout.php"><button class="button-third">KELUAR</button></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->

    <div class="container home">
        <div class="row">
        </div>
        <div class="row">
            <div class="col-6">
            <h1 class="fw-bold">Selamat Datang</h1>
                <div class="card col-md-9">
                    <h5 class="card-header fw-bold">Perpustakaan GemarBaca</h5>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pengguna</label>
                                <input type="text" class="form-control" id="nama" name="nama" required value="<?= $_SESSION['username']?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="telp" class="form-label">No Telp</label>
                                <input type="number" class="form-control" id="no_telp" name="no_telp" required>
                            </div>
                            <div class="mb-3">
                                <label for="penulis" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Buku</label>
                                <select style="font-size: 18px;" class="form-select form-select-lg mb-3 select-box" name="select" id="select"
                                    onchange="nerbit()" placeholder="Pilih :">
                                    <?php
                                    while($hasil = mysqli_fetch_assoc($box))
                                     {
                                    ?>
                                    <option value="<?= $hasil['judul']?>">
                                        <?= $hasil['judul']?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>
                            <button type="submit" class="btn btn-primary ms-0" name="submit">Pinjam</button>
                            <a href="index.php" class="btn btn-primary ms-3">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" col-6">
                <h1 class="text-center fw-bold mt-0">List Buku</h1>
                <table class="table table-dark table-striped" border="2">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Halaman</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
              while($result = mysqli_fetch_assoc($buku))
              {
          ?>

                        <tr>
                            <th scope="row">
                                <?= $x++;?>
                            </th>
                            <td>
                                <?= $result['judul']?>
                            </td>
                            <td>
                                <?= $result['penulis']?>
                            </td>
                            <td>
                                <?= $result['halaman']?>
                            </td>
                        </tr>
                        <?php
              }
          ?>
                    </tbody>
                </table>
            </div>
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