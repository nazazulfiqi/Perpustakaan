<?php
session_start();
include "config/koneksi.php";

// jika tombol login ditekan
if (isset($_POST['submit'])){
    // tangkap data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek apakah username ada
    if(mysqli_num_rows($result) === 1){
        
        // cek password
        $row = mysqli_fetch_assoc($result);
        if($password == $row["password"]){

            // cek role nya
            if($row['role'] == "ADMIN" ||$row['role'] == "admin"){
                $_SESSION ['log_admin'] = true;
                header("Location: admin/admin.php");
                exit;
            }if($row['role'] == "USER" ||$row['role'] == "user"){
                $_SESSION ['log_user'] = true;
                $_SESSION ['username'] = $username;
                $_SESSION ['nama'] = $user;
                header("Location: home.php");
                exit;
            }
        }
    }
    $error = true;
}
if (isset($error)) {
    echo '<div class="alert alert-danger" style="width: 100%;margin-top: 50px;position: absolute; display: flex;justify-content: center;" role="alert">
    Username atau Password Salah!
  </div>';
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
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Css -->

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" id="login">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <h5 class="card-header text-center fw-bold">Masuk</h5>
                    <div class="card-body">
                        <form method="POST">
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg></span>
                    <input type="text" class="form-control" placeholder="Nama Pengguna" required aria-label="Username" aria-describedby="basic-addon1" name="username" id="username">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg></span>
            <input type="password" class="form-control" placeholder="Kata Sandi" aria-label="Username" aria-describedby="basic-addon1" name="password" id="password" required>
          </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" onclick="myFunction()" id="check">
                                <label class="form-check-label" for="check">Perlihatkan Sandi</label>
                                <script>
                                    function myFunction() {
                                        var x = document.getElementById("password");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                    }
                                </script>
                            </div>
                            <button type="submit" class="btn btn-primary ms-2" name="submit">Masuk</button>
                            <a href="index.php" class="btn btn-primary ms-2">Kembali</a>
                        </form>
                        <p class="text-daftar text-center mt-4">Belum Punya Akun?<a href="daftar.php">Daftar</a></p>
                    </div>
                </div>
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