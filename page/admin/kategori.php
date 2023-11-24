<?php
include "../../koneksi_farah.php";
$no = 1;
$qry_kategori = mysqli_query($conn, "SELECT * from kategori");
?>
<div class="bg-dark" style="margin-top:30px;width:100%;height:50px;text-align:center;background:#0000ff;color:#fff;line-height:60px;font-size:20px; margin-bottom:25px;">
	<b>Data Kategori</b>
</div>
<a href="indexAdmin.php?page=kategori&aksi=input" class="btn btn-success" style="margin:17px;"><i class="fa-solid fa-plus"></i><span> TAMBAH KATEGORI</span></a>
<?php
@$aksi = $_GET['aksi'];
if ($aksi == "input") {
	include("input_kat.php");
} else if ($aksi == "edit") {
	include("edit.php");
}
?>
<div class="th">
	<table class="table table-bordered" style="margin-top:15px;margin-left:17px; width:96%;">

		<th style=" background: #E6E6FA;">
			<center>No</center>
		</th>
		<th style=" background: #E6E6FA;">
			<center>Kategori</center>
		</th>
		<th style=" background: #E6E6FA;">
			<center>Aksi</center>
		</th>
		<?php
		while ($data = mysqli_fetch_assoc($qry_kategori)) { ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $data['kategori'] ?></td>
				<td><a href="indexAdmin.php?page=kategori&aksi=edit&id=<?php echo $data['id_ketegori']; ?>" style="text-decoration: none;">
						<center>| <i class="fa-solid fa-pen-to-square"></i><span></span>
					</a> | | <a href="hapus_kat.php?id=<?php echo $data['id_ketegori']; ?>" style="text-decoration: none;"><i class="fa-solid fa-trash"></i><span></span> |</center></a></td>
			</tr>
		<?php } ?>
	</table>
</div>