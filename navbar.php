<?php
include "config.php";
// session_start(); kalau pakai ini tetap login jika bukan di page customer
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POP - Soda Pop</title>

    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-primary fs-6">
        <div class="container-fluid px-5">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="nav">
                    <li class="nav-item">
                        <a class="nav-link fw-bold link-secondary active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link fw-bold link-secondary" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </a>
                        <ul>
                            <li><?php include("kategori.php"); ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/logo.svg" alt="" width="65" height="59">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-magnifying-glass fa-lg" style="color: #14433c;"></i></a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="login.php?pesan=a">
                            <i class="fa-solid fa-cart-shopping fa-lg" style="color: #14433c;"></i>
                            <span class="position-absolute top-2 start-150 translate-middle badge rounded-pill bg-danger">
                                0
                                <!-- <span class="visually-hidden">unread messages</span> -->
                            </span>
                        </a>
                    </li>
                    <?php
                    if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='logout.php'><i class='fa-solid fa-circle-user fa-lg' style='color: #14433c;'></i> $_SESSION[nama]</a>
                        </li>
                        ";
                    } else {
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='login.php'><i class='fa-solid fa-circle-user fa-lg' style='color: #14433c;'></i></a>
                        </li>
                        ";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End of NavBar -->
</body>

</html>