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
<div class="jumbotron" style="margin-top: 10%;">
	<table class="table table-bordered">
		<th>Nama Minuman</th>
		<th>Harga</th>
		<th>QTY</th>
		<th>Total Harga</th>
		<th>Aksi</th>
		<?php while ($keranjang = mysqli_fetch_assoc($qry)) { ?>
			<tr>
				<td><?php
					$q = mysqli_query($conn, "SELECT * from drink where id_drink='$keranjang[id_drink]'");
					$d = mysqli_fetch_assoc($q);
					$judul = $d['judul'];
					echo $judul;
					$qbyar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_harga) as total_bayar from keranjang where id_pembeli='$id_pembeli'"));
					$bayar = $qbyar['total_bayar'];
					?></td>
				<td><?php echo $keranjang['harga'] ?></td>
				<td><?php echo $keranjang['qty'] ?></td>
				<td><?php echo $keranjang['total_harga'] ?></td>
				<td><a href="keranjang.php?aksi=hapus&id=<?php echo $keranjang['id_keranjang']; ?>">
						<center><span><i class="fa-solid fa-trash" style="color: #14433c;"></i></span>
					</a>
			</tr>
		<?php } ?>
		<tr>
			<td colspan="3"><b>Total Bayar</b></td>
			<td><?php echo @$bayar;  ?></td>
			<td>
				<center><a href="detail.php?aksi=checkout" class="btn btn-secondary">checkout</a></center>
			</td>
		</tr>
	</table>
</div>