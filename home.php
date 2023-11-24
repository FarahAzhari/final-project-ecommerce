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
    <?php include "navbar.php"; ?>
    <!-- End of NavBar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid bg-primary p-5">
        <div class="row">
            <div class="col">
                <div class="container-fluid p-5 m-5">
                    <h1 class="display-5 fw-bold text-secondary">Welcome to TokoFarah.com!</h1>
                    <p class="col-md-10 fs-3 text-danger">Shop the best soda in town! Taste our various signature flavour with ZERO sugar.</p>
                    <a href="login.php?pesan=a"><button class="btn btn-secondary btn-lg" type="button">Buy Now</button></a>
                </div>
            </div>
            <div class="col-md-6 position-relative">
                <img src="assets/images/20230907013543.png" class="img-fluid text-right pt-2" width="500px">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="position-absolute top-0 end-0">
            <img src="assets/images/blob-danger.svg" class="img-fluid text-right" width="300px">
        </div>
    </div>
    <!-- End of Jumbotron -->

    <!-- Our Favourite Drinks -->
    <div class="container px-4 py-5" id="custom-cards">
        <h2 class="pb-2 text-center text-secondary">Our Favourite Drinks</h2>

        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('assets/images/product-cola.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <!-- <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Short title, long jacket</h3> -->
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="d-flex align-items-center me-3">
                                <h3 class="fw-bold">Coca Cola</h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('assets/images/product-energy4.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="d-flex align-items-center me-3">
                                <!-- <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"/></svg> -->
                                <h3 class="fw-bold">Runa Pineapple</h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('assets/images/product-energy5.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                        <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"></h3>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="d-flex align-items-center me-3">
                                <h3 class="fw-bold">Monster Energy</h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Our Favourite Drinks -->

    <!-- Our Products -->
    <h2 class="pb-2 text-center text-secondary">Our Products</h2>
    <div class="container p-5">
        <div class="row">
            <?php
            include "koneksi_farah.php";
            @$idkat = $_GET['id'];
            $qrydrinkkat = mysqli_query($conn, "SELECT * from drink where id_ketegori='$idkat'");
            $qrydrink = mysqli_query($conn, "SELECT * from drink");
            if ($idkat == 0) {
                while ($drink = mysqli_fetch_assoc($qrydrink)) {
            ?>
                    <div class="col-md-3" style="margin-top:20px;">
                        <div class="drink">
                            <center><img src="assets/images/<?php echo $drink['gambar'] ?>" style="margin-top:20px; height:190px;"></center>
                            <h5 style="text-align:center; color:#14433c;"><?php echo $drink['judul'] ?></h5>
                            <center style="color: green;"><b>Harga</b> Rp<?php echo number_format($drink['harga'],0,',','.'); ?></center>
                            <center style="color: red;"><b>Stok</b> (<?php echo $drink['stok']; ?>)</center>
                            <center><a class="btn btn-secondary" href="detail.php?id=<?php echo $drink['id_drink'] ?>" role="button" style="margin-top:10px;">View details &raquo;</a></center>
                        </div>
                    </div>
                <?php }
            } else {
                while ($drink1 = mysqli_fetch_assoc($qrydrinkkat)) { ?>
                    <div class="col-md-3" style="margin-top:20px;">
                        <div class="drink">
                            <center><img src="assets/images/<?php echo $drink1['gambar'] ?>" style="margin-top:20px; height:190px;"></center>
                            <h5 style="text-align:center; color:#14433c; "><?php echo $drink1['judul'] ?></h5>
                            <center style="color: green;"><b>Harga</b> Rp<?php echo number_format($drink1['harga'],0,',','.'); ?></center>
                            <center style="color: red;"><b>Stok</b> (<?php echo $drink1['stok']; ?>)</center>
                            <center><a class="btn btn-secondary" href="detail.php?id=<?php echo $drink1['id_drink'] ?>" role="button" style="margin-top:10px;">View details &raquo;</a></center>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
    <!-- End of Our Products -->

    <!-- Footer -->
    <?php include "footer.php"; ?>
    <!-- End of Footer -->
</body>

</html>