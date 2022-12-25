<?php

require 'config/function.php';

if(isset($_POST["daftar"])){

    if(daftar($_POST) > 0 ){

        echo"<script>
            alert('Akun Berhasil didaftarkan!');
            window.location = 'login.php';
            </script>";
    }else {
        echo mysqli_error($conn);
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Logo Title -->
    <link rel="icon" href="image/logowedding.png" type="image/x-icon">

    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Css -->

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Daftar  -->
    <div class="container d-flex justify-content-center align-items-center" id="daftar">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header text-center fw-bold">Daftar Akun</h5>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Nama Pengguna</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password2" class="form-label">Konfirmasi Sandi</label>
                                <input type="password" class="form-control" id="password2" name="password2" required>
                            </div>
                            <button type="submit" class="btn btn-primary ms-0" name="daftar">Daftar</button>
                            <a href="index.php" class="btn btn-primary ms-3">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Daftar -->


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
        </script>
</body>

</html>