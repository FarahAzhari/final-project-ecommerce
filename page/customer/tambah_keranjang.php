<?php
include"../../koneksi_farah.php";
session_start();
$id_pembeli = $_SESSION['id_pembeli'];
$q_aman = mysqli_query($conn,"SELECT * from chekout where id_pembeli='$id_pembeli'");
$aman = mysqli_num_rows($q_aman);
if($aman==0)

{
$id_drink = $_POST['id_drink'];
$qty = $_POST['qty'];
$harga = $_POST['harga'];
$total_harga = $qty*$harga;
$qrydrink = mysqli_query($conn,"SELECT * from keranjang where id_drink='$id_drink'");
$q_stok = mysqli_query($conn,"SELECT * from drink where id_drink='$id_drink'");
$d_stok = mysqli_fetch_assoc($q_stok);
$stok = $d_stok['stok'];
$siso_stok = $stok-$qty;
mysqli_query($conn,"update drink set stok='$siso_stok' where id_drink='$id_drink'");
$data = mysqli_fetch_assoc($qrydrink);
$idbuk = $data['id_drink'];
if($id_drink==$idbuk)
{
	$q_qty = mysqli_query($conn,"SELECT * from keranjang where id_drink='$id_drink'");
	$data_qty = mysqli_fetch_assoc($q_qty);
	$qty1 = $data_qty['qty'];
	$qty2 = intval($qty1) + intval($qty);
	$tot = $harga * $qty2;
mysqli_query($conn,"UPDATE keranjang set id_pembeli='$id_pembeli',id_drink='$id_drink',qty='$qty2',harga='$harga',total_harga='$tot' where id_drink='$id_drink'");
header("location:detail.php?page=keranjang");
}

else{
mysqli_query($conn,"INSERT into keranjang set id_pembeli='$id_pembeli',id_drink='$id_drink',qty='$qty',harga='$harga',total_harga='$total_harga'");
header("location:detail.php?page=keranjang");
}
}
else if($aman>=1)
{
	header("location:indexCus.php?pesan=blok");
}
?>