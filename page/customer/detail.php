<?php
include "../../koneksi_farah.php";
@$kd = $_GET['id'];
$qry = mysqli_query($conn, "SELECT * from drink where id_drink='$kd'");
$data = mysqli_fetch_assoc($qry);
// session_start();
// if (!isset($_SESSION['username'])) {
//   header("location:../../login.php");
// }
// $nama = $_SESSION['nama'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product - POP - Soda Pop</title>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/jquery.min.js"></script>

  <link rel="stylesheet" href="../../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../../assets/css/all.css">
  <link rel="stylesheet" href="../../assets/css/detail.css">
</head>

<body>

  <?php include "navbarCus.php" ?>
  <?php
  @$aksi = $_GET['aksi'];
  $tanggal = date("d-m-Y");
  if ($aksi == "checkout") { ?>
    <div style="margin-top: 100px; width:100%;height:50px;text-align:center;background:green;color:#fff;line-height:60px;font-size:20px;">
      <b>Checkout</b>
    </div><br>
    <form action="proses_chekout.php" method="post">
      <label>Nama Penerima</label>
      <input type="text" name="nama" placeholder="Nama Anda" class="form-control">
      <label>Alamat Lengkap</label>
      <input type="text" name="alamat" placeholder="jalan/Dusun/Desa/Kecamatan/Kabupaten/Provinsi/kode pos" class="form-control"><br>
      <label>Nomor Telepon</label>
      <input type="text" name="nomor_tlp" placeholder="Nomor Telepon Anda" class="form-control"><br>
      <label>Tanggal</label>
      <input type="text" name="tanggal" class="form-control" value="<?php echo $tanggal; ?>" readonly>
      <input type="submit" class="btn" value="Selesai" style="background-color: green; color: white;">
    </form>
    <?php } else {
    @$page = $_GET['page'];
    if ($page == "keranjang") {
      include("keranjang.php");
    } else if ($page == "") {
    ?>

      <!-- Details Product -->
      <section>
        <div class="container-details flex">
          <div class="left mx-auto">
            <div class="main_image">
              <img src="../../assets/images/<?php echo $data['gambar']; ?>" style="max-height: 500px;" class="img-fluid mx-auto d-block">
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
            <form action="tambah_keranjang.php" method="post">
              <div class="input-group" style="width: 150px;">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="qty">
                    <span><i class="fa-solid fa-minus" style="color: #14433c;"></i></span>
                  </button>
                </span>
                <input type="text" name="qty" class="form-control input-number text-center add-input" value="1" min="1" max="<?php echo $data['stok']; ?>">
                <input type="hidden" name='harga' value="<?php echo $data['harga']; ?>">
                <input type="hidden" name='id_drink' value="<?php echo $data['id_drink']; ?>">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-danger btn-number" data-type="plus" data-field="qty">
                    <span><i class="fa-solid fa-plus" style="color: #14433c;"></i></span>
                  </button>
                </span>
              </div>
              <?php if ($data['stok'] == 0) { ?>
                <button type="submit" class="add-btn" style="background-color: red;">Out of Stock!</button>
              <?php } else { ?>
                <!-- <button type="submit" class="btn btn-success">Beli</button> -->
                <button type="submit" class="add-btn">Add to Cart</button>
              <?php } ?>
            </form>
          </div>
        </div>
      </section>
      <!-- End of Details Product -->

    <?php } ?>

    <!-- Our Products -->
    <h2 class="pt-5 pb-2 text-center text-secondary">Our Products</h2>
    <div class="container p-5">
      <div class="row">
        <?php
        include "../../koneksi_farah.php";
        $qrydrink = mysqli_query($conn, "SELECT * from drink");
        while ($drink = mysqli_fetch_assoc($qrydrink)) {
        ?>
          <div class="col-md-3" style="margin-top:20px;">
            <div class="drink">
              <center><img src="../../assets/images/<?php echo $drink['gambar'] ?>" style="margin-top:20px; height:190px;"></center>
              <h5 style="text-align:center; color:#14433c;"><?php echo $drink['judul'] ?></h5>
              <center style="color: green;"><b>Harga</b> Rp<?php echo number_format($drink['harga'],0,',','.'); ?></center>
              <center style="color: red;"><b>Stok</b> (<?php echo $drink['stok']; ?>)</center>
              <center><a class="btn btn-secondary" href="detail.php?id=<?php echo $drink['id_drink'] ?>" role="button" style="margin-top:10px;">View details &raquo;</a></center>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <!-- End of Our Products -->

    <?php } ?>
    
    <?php 
    include "../../footer.php"
    ?>
    
    <script src="../../assets/js/detail.js"></script>
</body>

</html>