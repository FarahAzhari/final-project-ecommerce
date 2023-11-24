<?php
include"../../koneksi_farah.php";
$cus=$_GET['id'];
mysqli_query($conn,"DELETE FROM customer WHERE id_pembeli='$cus'");
header("location:indexAdmin.php?page=customer");
?>