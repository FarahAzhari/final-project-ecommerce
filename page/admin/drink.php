<?php
include "../../koneksi_farah.php";
$no = 1;
$qry_drink = mysqli_query($conn, "SELECT * from drink");
?>
<div class="bg-dark" style="margin-top:30px;width:100%;height:50px;text-align:center;background:#0000ff;color:#fff;line-height:60px;font-size:20px;">
	<b>Data Minuman</b>
</div>
<a href="indexAdmin.php?page=input_drink" class="btn btn-success" style="margin-top:20px;"><i class="fa-solid fa-add"></i><span> TAMBAH MINUMAN</span></a>
<?php
@$aksi = $_GET['aksi'];
if ($aksi == "input") {
	include("input_drink.php");
}
?>
<div class="th">
	<table class="table table-bordered" style="margin-top:20px;">

		<th style=" background: #E6E6FA;">
			<center>No</center>
		</th>
		<th style=" background: #E6E6FA;">
			<center>Nama</center>
		</th>
		<th style=" background: #E6E6FA;">
			<center>Deskripsi</center>
		</th>
		<th style=" background: #E6E6FA;">
			<center>Volume</center>
		</th>
		<th style=" background: #E6E6FA;">
			<center>Gambar</center>
		</th>
		<th style=" background: #E6E6FA;">
			<center>Expired</center>
		</th>
		<th style=" background: #E6E6FA;">
			<center>Harga</center>
		</th>
		<th style=" background: #E6E6FA;">
			<center>Stok</center>
		</th>
		<th style=" background: #E6E6FA;">
			<center>Aksi</center>
		</th>
		<?php while ($data = mysqli_fetch_assoc($qry_drink)) { ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $data['judul'] ?></td>
				<td><?php echo $data['description'] ?></td>
				<td><?php echo $data['volume'] ?></td>
				<td>
					<center><img src="../../assets/images/<?php echo $data['gambar'] ?>" style="width:100px;"></center>
				</td>
				<td><?php echo $data['expired'] ?></td>
				<td>Rp.<?php echo number_format($data['harga']); ?>,-</td>
				<td><?php echo $data['stok'] ?></td>
				<td><a href="indexAdmin.php?page=editdrink&id=<?php echo $data['id_drink']; ?>" style="text-decoration: none;">
						<center>| <i class="fa-solid fa-pen-to-square"></i><span></span>
					</a> | | <a href="hapus_book.php?id=<?php echo $data['id_drink']; ?>" style="text-decoration: none;"><i class="fa-solid fa-trash"></i><span></span> |</center></a></td>
			</tr>
		<?php } ?>
	</table>
</div>