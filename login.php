<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login POP - Soda Pop</title>

    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/all.css">

    <!-- <script src="./assets/js/jquery.min.js"></script> -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <?php
    @$pesan = $_GET['pesan'];
    if ($pesan == "gagal") {
        echo "<script type='text/javascript'>
      alert('Username or password not valid');
    </script>";
    } else if ($pesan == "berhasil") {
        echo "<script type='text/javascript'>
      alert('Anda berhasil mendaftar, silahkan login');
    </script>";
    } else if ($pesan == "a") {
        echo "<script type='text/javascript'>
      alert('Anda harus melakukan LOGIN terlebih dahulu sebelum melakukan pemesanan');
    </script>";
    }
    ?>
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black">
                    <a href="home.php" class="text-secondary"><i class="fa-solid fa-xmark fa-2xl"></i></a>
                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                        <form action="ceklogin.php" method="post" style="width: 23rem;">
                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
                            <div class="mb-4">
                                <input type="text" name="username" class="form-control form-control-lg">
                                <label class="form-label">Username</label>
                            </div>
                            <div class="mb-4">
                                <input type="password" name="password" class="form-control form-control-lg">
                                <label class="form-label">Password</label>
                            </div>
                            <button type="submit" class="btn btn-lg btn-secondary mb-4 pt-1">Login</button>
                            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                            <p>Don't have an account? <a href="daftar.php" class="link-info">Register here</a></p>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="/assets/images/product-cola.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
</body>

</html>