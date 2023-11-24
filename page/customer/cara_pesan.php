<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Jumbotron Template for Bootstrap</title>
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/style.css" rel="stylesheet">
</head>

<body>
  <!-- Navbar -->
  <?php include "navbarCus.php" ?>
  <!-- End of Navbar -->


  <?php
  @$page = $_GET['page'];
  if ($page == "pembelian_selesai") {
    include("pembelian_selesai.php");
  } else if ($page == "konfirmasi") {
    include("konfirmasi.php");
  } else {
  ?>

    <div class="bg-secondary" style="margin-top:100px;width:100%;height:50px;text-align:center;background:#d74b35;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
      How to Order
    </div>
    <p>
    <h3><b>1. Pembayaran dilakukan dalam jangka waktu 1x24 jam setelah melakukan pemesanan.<br>
        2. Pembayaran dapat dilakukan melalui transfer ke Rekening kami. Melalui Konfirmasi Pembayaran.<br>
        3. Setelah melakukan pembayaran, konfirmasi pembayaran dikirim ke-<br>
        <br>
        <p style="color:#0000ff;">Farah Azhari,
          BCA,
          No Rek 00112233</p>
        <br>
        4. Selanjutnya minuman yang telah dipesan akan dikirimkan dalam waktu maksimal 7 Hari.<br>
        5.Kami mengirimkan barang dengan menggunakan jasa pengiriman barang via POS<br><br>
      </b></p>
      <p style="color:red;">* Harga minuman belum termasuk ongkos kirim, dan ongkos kirim akan disesuaikan dengan tujuan pengiriman.</p>
    </h3>
    
  <?php } ?>
  </div>
    <!-- Footer -->
    <?php include "../../footer.php" ?>
    <!-- End of Footer -->
</body>

</html>