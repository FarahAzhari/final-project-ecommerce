<?php
include"../../koneksi_farah.php";
$id = $_GET['id'];
mysqli_query($conn,"UPDATE chekout set status_terima='sudah diterima' where id_pembeli='$id'");
header("location:indexCus.php?pesan=suwon");
?>