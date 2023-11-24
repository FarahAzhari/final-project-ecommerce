<?php
include "../../config.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../../login.php");
}
$nama = $_SESSION['nama'];
@$pesan = $_GET['pesan'];
if ($pesan == "blok") {
    echo "<script type='text/javascript'>alert('Anda tidak dapat membeli dikarenakan anda belum membayar/belum dikonfirmasi oleh admin');</script>";
} else if ($pesan == "suwon") {
    echo "<script type='text/javascript'>alert('Terima kasih telah melakukan konfirmasi, anda dapat melakukan pembelian lagi setelah permintaan konfirmasi anda dikonfirmasi oleh admin');</script>";
} else if ($pesan == "sudah konfirmasi") {
    echo "<script type='text/javascript'>alert('Anda sudah konfirmasi, anda dapat melakukan pembelian lagi setelah permintaan konfirmasi anda dikonfirmasi oleh admin');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POP - Soda Pop</title>

    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-primary fs-6">
        <div class="container-fluid px-5">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="nav">
                    <li class="nav-item">
                        <a class="nav-link fw-bold link-secondary active" aria-current="page" href="indexCus.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link fw-bold link-secondary" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </a>
                        <ul>
                            <li><?php include("kat.php"); ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <a class="navbar-brand" href="indexCus.php">
                <img src="../../assets/images/logo.svg" alt="" width="65" height="59">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="cara_pesan.php"><i class="fa-solid fa-circle-info fa-lg" style="color: #14433c;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="detail.php?page=keranjang">
                            <i class="fa-solid fa-cart-shopping fa-lg" style="color: #14433c;"></i>
                            <span class="position-absolute top-2 start-150 translate-middle badge rounded-pill bg-danger">
                                <?php
                                include "../../koneksi_farah.php";
                                $qcek = mysqli_query($conn, "SELECT * from keranjang where id_pembeli='$_SESSION[id_pembeli]'");
                                $cek = mysqli_num_rows($qcek);
                                $q_cekout = mysqli_query($conn, "SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]'");
                                $cekout = mysqli_num_rows($q_cekout);
                                if ($cekout >= 1) {
                                    echo "0";
                                } else {
                                    echo $cek;
                                }  ?>
                                <!-- <span class="visually-hidden">unread messages</span> -->
                            </span>
                        </a>
                    </li>
                    <?php
                    include "../../koneksi_farah.php";
                    $q_cek_cekout = mysqli_query($conn, "SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]'");
                    $cek_cekout = mysqli_num_rows($q_cek_cekout);
                    if ($cek_cekout >= 1) {
                        $queri_cek = mysqli_query($conn, "SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]' && status_terima='sudah diterima'");
                        $cek = mysqli_num_rows($queri_cek);
                        if ($cek >= 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link text-secondary" href="indexCus.php?pesan=sudah konfirmasi"><i class="fa-solid fa-square-check" style="color: #14433c;"></i> Konfirmasi</a> 
                            </li> <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link text-secondary" href="cara_pesan.php?page=konfirmasi"><i class="fa-solid fa-square-check" style="color: #14433c;"></i> Konfirmasi</a> 
                            </li> <?php } } ?>
                    
                    <?php
                    if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
                        echo "
              <div class='collapse navbar-collapse'>
                <ul class='navbar-nav ms-auto' id='nav'>
                  <li class='text-secondary'><a href='#'><i class='fa-solid fa-circle-user fa-lg' style='color: #14433c;'></i><span style='color:#14433c;'> $_SESSION[nama]</span></a>
                  <ul>
                    <li class='text-secondary'><a href='../../logout.php'><i class='fa-solid fa-right-from-bracket'></i><span>Logout</span></a></li>
                  </ul>
                  </li>
                    <div class='clear'></div>
                </ul>
              </div>
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