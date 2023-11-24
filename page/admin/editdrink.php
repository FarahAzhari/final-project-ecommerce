<link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
<?php
include "../../koneksi_farah.php";
$e = $_GET['id'];
$edit = mysqli_query($conn, "SELECT * from drink WHERE id_drink='$e'");
$book = mysqli_fetch_assoc($edit);
?>
<div class="bg-dark" style="margin-top:30px;width:100%;height:50px;text-align:center;background:#0000ff;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
	Edit Minuman
</div>
<form action="e_drink.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id_drink" class="form-control" value=" <?php echo $book['id_drink']; ?>">
	<b>Kategori Minuman :</b><select name="kategori" class="form-control">
		<?php
		$d = mysqli_query($conn, "SELECT * from kategori");
		while ($data = mysqli_fetch_assoc($d)) { ?>;
		<option> <?php echo $data['kategori']; ?> </option>
	<?php } ?>
	</select><br>
	<b>Nama Minuman :</b> <input type="text" name="judul" class="form-control" value="<?php echo $book['judul']; ?>"><br>
	<b>Deskripsi :</b><input type="text" name="description" class="form-control" value="<?php echo $book['description']; ?>"><br>
	<b>Volume : </b><input type="text" name="volume" class="form-control" value="<?php echo $book['volume']; ?>"><br>
	<b>Gambar : </b><input type="file" name="gambar" class="form-control" value="<?php echo $book['gambar']; ?>"><br>
	<b>Expired : </b><input type="text" name="expired" class="form-control" value="<?php echo $book['expired']; ?>"><br>
	<b>Harga : </b><input type="text" name="harga" class="form-control" value="<?php echo $book['harga']; ?>"><br>
	<b>Stok : </b><input type="text" name="stok" class="form-control" value="<?php echo $book['stok']; ?>"><br>
	<td><input type="submit" class="btn btn-success" value="Simpan">
</form>