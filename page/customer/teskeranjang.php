<?php
include "../../koneksi_farah.php";
$id_pembeli = $_SESSION['id_pembeli'];
$qry = mysqli_query($conn, "SELECT * from keranjang where id_pembeli='$id_pembeli'");
@$aksi = $_GET['aksi'];
if ($aksi == "hapus") {
    $id_keranjang = $_GET['id'];
    $query_qty = mysqli_query($conn, "SELECT * from keranjang where id_keranjang='$id_keranjang'");
    $data_qty = mysqli_fetch_assoc($query_qty);
    $qty = $data_qty['qty'];
    $id_drink = $data_qty['id_drink'];
    $query_drink = mysqli_query($conn, "SELECT * from drink where id_drink='$id_drink'");
    $data_drink = mysqli_fetch_assoc($query_drink);
    $stok = $data_drink['stok'];
    $stok_ubah = $stok + $qty;
    mysqli_query($conn, "update drink set stok='$stok_ubah' where id_drink='$id_drink'");
    mysqli_query($conn, "DELETE from keranjang where id_keranjang='$id_keranjang'");
    header("location:detail.php?page=keranjang");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - POP - Soda Pop</title>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/mdb.min.css">
    <link rel="stylesheet" href="../../assets/css/keranjang.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <!-- <link rel="stylesheet" href="../../assets/css/all.css"> -->
</head>

<body>
    <section class="h-100 h-custom">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="h5">Shopping Bag</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Total</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($keranjang = mysqli_fetch_assoc($qry)) { ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center">
                                                <img src="https://i.imgur.com/2DsA49b.webp" class="img-fluid rounded-3" style="width: 120px;" alt="Book">
                                                <div class="flex-column ms-4">
                                                    <?php
                                                    $q = mysqli_query($conn,"SELECT * from drink where id_drink='$keranjang[id_drink]'");
                                                    $d = mysqli_fetch_assoc($q);
                                                    $judul = $d['judul']; echo "<p class='mb-2'>$judul</p>";
                                                    $qbyar = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_harga) as total_bayar from keranjang where id_pembeli='$id_pembeli'"));
                                                    $bayar = $qbyar['total_bayar'];
                                                    ?>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle">
                                            <div class="d-flex flex-row">
                                                <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fas fa-minus"></i>
                                                </button>

                                                <input id="form1" min="1" name="quantity" value="1" type="number" class="form-control form-control-sm" style="width: 50px;" />

                                                <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0" style="font-weight: 500;"><?php echo $keranjang['harga'] ?></p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0" style="font-weight: 500;"><?php echo $keranjang['total_harga']?></p>
                                        </td>
                                        <td class="align-middle">
                                            <a href="keranjang.php?aksi=hapus&id=<?php echo $keranjang['id_keranjang']; ?>">
                                                <button class="btn btn-link px-2">
                                                    <i class="fa-solid fa-x"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body p-4 d-flex justify-content-end">
                        <div class="col-lg-4 col-xl-3">
                            <div class="d-flex justify-content-between" style="font-weight: 500;">
                                <p class="mb-2">Subtotal</p>
                                <p class="mb-2"><?php echo @$bayar;  ?></p>
                            </div>

                            <!-- <div class="d-flex justify-content-between" style="font-weight: 500;">
                                <p class="mb-0">Shipping</p>
                                <p class="mb-0">$2.99</p>
                            </div> -->
                            <hr class="my-4">
                            <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                                <p class="mb-2">Total (tax included)</p>
                                <p class="mb-2"><?php echo @$bayar;  ?></p>
                            </div>
                            <button type="button" class="btn btn-primary btn-block btn-lg">
                                <div class="d-flex justify-content-between">
                                    <span>Checkout</span>
                                    <span><?php echo @$bayar;  ?></span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>