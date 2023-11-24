<?php
include "koneksi_farah.php";
$id = $_GET['id'];
$qry = mysqli_query($conn, "SELECT * from drink where id_drink='$id'");
$data = mysqli_fetch_assoc($qry);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product - POP - Soda Pop</title>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.min.js"></script>

    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/all.css">
    <link rel="stylesheet" href="./assets/css/detail.css">
</head>

<body>
    <!-- NavBar -->
    <?php include "navbar.php"; ?>
    <!-- End of NavBar -->

    <!-- Details Product -->
    <section>
        <div class="container-details flex">
            <div class="left mx-auto">
                <div class="main_image">
                    <img src="assets/images/<?php echo $data['gambar']; ?>" style="max-height: 500px;" class="img-fluid mx-auto d-block">
                </div>
            </div>
            <div class="right">
                <h3 id="judul"><?php echo $data['judul']; ?></h3>
                <h4 style="color: green;"> <small style="color: green;">Rp</small><?php echo number_format($data['harga'], 0, ',', '.'); ?></h4>
                <p style="margin: 10px 0 20px 0; line-height: 25px;">
                    <b><?php echo $data['description']; ?>.</b><br>
                    <b>Volume: <?php echo $data['volume']; ?></b><br>
                    <b>Expired: <?php echo $data['expired']; ?></b><br>
                    <b>Stok: <?php echo $data['stok']; ?></b>
                </p>
                <!-- <h5 style="font-size: 15px;">Number</h5> -->
                <div class="input-group" style="width: 150px;">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[2]">
                            <span><i class="fa-solid fa-minus" style="color: #14433c;"></i></span>
                        </button>
                    </span>
                    <input type="text" name="quant[2]" class="form-control input-number text-center add-input" value="1" min="1" max="<?php echo $data['stok']; ?>">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-danger btn-number" data-type="plus" data-field="quant[2]">
                            <span><i class="fa-solid fa-plus" style="color: #14433c;"></i></span>
                        </button>
                    </span>
                </div>

                <!-- login first if you want to add product to cart -->
                <a href="login.php?pesan=a"><button class="add-btn">Add to Cart</button></a>
            </div>
        </div>
    </section>
    <!-- End of Details Product -->

    <!-- Our Products -->
    <h2 class="mt-5 text-center text-secondary">Our Products</h2>
    <div class="container p-5">
        <div class="row">
            <?php
            include "koneksi_farah.php";
            $qrydrink = mysqli_query($conn, "SELECT * from drink");
                while ($drink = mysqli_fetch_assoc($qrydrink)) {
            ?>
                    <div class="col-md-3" style="margin-top:20px;">
                        <div class="drink">
                            <center><img src="assets/images/<?php echo $drink['gambar'] ?>" style="margin-top:20px; height:190px;"></center>
                            <h5 style="text-align:center; color:#14433c;"><?php echo $drink['judul'] ?></h5>
                            <center style="color: green;"><b>Harga</b> Rp<?php echo number_format($drink['harga'],0,',','.') ; ?></center>
                            <center style="color: red;"><b>Stok</b> (<?php echo $drink['stok']; ?>)</center>
                            <center><a class="btn btn-secondary" href="detail.php?id=<?php echo $drink['id_drink'] ?>" role="button" style="margin-top:10px;">View details &raquo;</a></center>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </div>
    <!-- End of Our Products -->

    <!-- Footer -->
    <?php include "footer.php"; ?>
    <!-- End of Footer -->

    <script src="./assets/js/detail.js"></script>
</body>

</html>