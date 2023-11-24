<?php
include "../../config.php";
session_start();
if (!isset($_SESSION['username'])) {
  header("location:../../login.php");
}
$nama = $_SESSION['nama'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Admin - POP - Soda Pop</title>
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/fontawesome/css/all.css" rel="stylesheet">
  <link href="../../assets/css/styleAdmin.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-fixed-top bg-dark">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#" style="color:#fff; font-size:30px;">Toko<b>Farah.Com</b></a>
      </div>
      <div class="collapse navbar-collapse ">
        <ul class="navbar-nav ms-auto" id="nav">
          <li class="bg-dark text-white"><a href="#"><i class="fa-solid fa-user"></i><span style="color:#fff;"> <?php echo $nama; ?></span></a>
            <ul>
              <li class="bg-dark text-white"><a href="outpage.php"><i class="fa-solid fa-right-from-bracket"></i><span>Keluar</span></a></li>
            </ul>
          </li>
          <div class="clear"></div>
        </ul>
      </div>
  </nav>

  <div class="container-fluid">
    <div class="row flex-nowrap">
      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

          <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
              <a href="indexAdmin.php" class="nav-link align-middle px-0">
                <i class="fs-4 fa-solid fa-house" style="color: white;"></i> <span class="ms-1 d-none d-sm-inline text-white">Home</span>
              </a>
            </li>
            <li>
              <a href="indexAdmin.php?page=kategori" class="nav-link px-0 align-middle">
                <i class="fs-4 fa-solid fa-list" style="color: white;"></i> <span class="ms-1 d-none d-sm-inline text-white">Kategori</span></a>
            </li>
            <li>
              <a href="indexAdmin.php?page=drink" class="nav-link px-0 align-middle">
                <i class="fs-4 fa-solid fa-server" style="color: white;"></i> <span class="ms-1 d-none d-sm-inline text-white">Barang/Minuman</span></a>
            </li>
            <li>
              <a href="indexAdmin.php?page=customer" class="nav-link px-0 align-middle">
                <i class="fs-4 fa-solid fa-users" style="color: white;"></i> <span class="ms-1 d-none d-sm-inline text-white">Customers</span> </a>
            </li>
            <li>
              <a href="indexAdmin.php?page=laporan" class="nav-link px-0 align-middle">
                <i class="fs-4 fa-solid fa-chart-simple" style="color: white;"></i> <span class="ms-1 d-none d-sm-inline text-white">Laporan</span> </a>
            </li>
          </ul>
          <hr>
        </div>
      </div>
      <div class="col py-3">
        <?php
        if (isset($_GET['page'])) {
          $page = $_GET['page'] . ".php";
          include("$page");
        } else {
          include('home.php');
        } ?>
      </div>
    </div>
  </div>
</body>
</html>