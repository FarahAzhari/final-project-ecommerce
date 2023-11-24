<div style="margin-top: 100px; width:100%;height:50px;text-align:center;background:green;color:#fff;line-height:60px;font-size:20px;">
<b>Pembelian Selesai</b>
</div>
<?php
include"../../koneksi_farah.php";
$id_pembeli = $_SESSION['id_pembeli'];
$query_checkout = mysqli_query($conn,"SELECT * from  chekout where id_pembeli='$id_pembeli'");
$data_chekout = mysqli_fetch_assoc($query_checkout);
?>
<h3><b>Data Penerima :</b></h3>
<table>
	<tr>
		<td><p><b>Nama</b></p></td>  	<td>: <?php echo $data_chekout['nama']; ?></td>
	</tr>

	<tr>
		<td><p><b>Alamat</b></p></td>	<td>: <?php echo $data_chekout['alamat']; ?></td>
	</tr>

	<tr>
		<td><p><b>Nomor Telepon</b></p></td>	<td>: <?php echo $data_chekout['nomor_tlp']; ?></td>
	</tr>
</table>
<h3><b>Data Order</b></h3>
<?php
$qry = mysqli_query($conn,"SELECT * from keranjang where id_pembeli='$id_pembeli'");
?>
<div class="jumbotron">
<table class="table table-bordered">
	<th>Nama Minuman</th><th>Harga</th><th>Qty</th><th>Total Harga</th>
	<?php while($keranjang=mysqli_fetch_assoc($qry)){?>
		<tr>
		<td><?php
		$q = mysqli_query($conn,"SELECT * from drink where id_drink='$keranjang[id_drink]'");
		$d = mysqli_fetch_assoc($q);
		$judul = $d['judul']; echo $judul;
		$qbyar = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_harga) as total_bayar from keranjang where id_pembeli='$id_pembeli'"));
		$bayar = $qbyar['total_bayar'];
		?>
			
		</td>
		<td><?php echo $keranjang['harga'] ?></td>
		<td><?php echo $keranjang['qty']?></td>
		<td><?php echo $keranjang['total_harga']?></td>
		</tr>
<?php } ?>
<tr>
	<td colspan="3">Total harga keseluruhan</td><td><?php echo $bayar;  ?></td>
</tr>
<tr>
	<td colspan="3">Ongkos Kirim (Paten)</td><td>Rp.20,000,00</td>
</tr>
<tr>	
	<td colspan="3">Total Bayar</td><td>Rp.<?php $t_bayar=$bayar+20000; echo number_format($t_bayar); ?>,00</td>
</tr>
</table>
<p>Selanjutnya anda harus mengirimkan uang yang tertera pada total bayar ke <b>No Rek 00112233</b> atas nama <b>Farah Azhari</b>. Setelah melakukan pembayaran anda bisa mengkonfirmasi melalui <a href="https://wa.me/62850000099?text=Halo, saya ingin konfirmasi pembayaran pesanan atas nama" style="color: blue;"><b>WA. +62850000099</b></a>. <a href="indexCus.php" class="btn" style="background-color: green; color: white;"> Selesai</a> </p>
</div>