<?php
include"../../koneksi_farah.php";
$qry_kategori = mysqli_query($conn,"SELECT * from kategori");

	?>
	<div class="bg-dark" style="margin-top:30px;width:100%;height:50px;text-align:center;background:#0000ff;color:#fff;line-height:60px;font-size:20px;">
Tambah Minuman
</div>
<form method="post" class="form-group" action="tambah_drink.php" enctype="multipart/form-data" style="margin-top:20px;">
	<select name="kat" class="form-control">
	<?php 
	while($kategori=mysqli_fetch_assoc($qry_kategori)){
	?>
			<option><?php echo $kategori['kategori']; ?></option>
			<?php } ?>
	</select><br>
	<input type="text" name="judul" placeholder="Nama Minuman" class="form-control"><br>
	<input type="text" name="description" placeholder="Deskripsi" class="form-control"><br>
	<input type="text" name="volume" placeholder="Volume" class="form-control"><br>
	<input type="file" name="gambar" placeholder="Gambar" class="form-control"><br>
	<input type="text" name="expired" placeholder="Expired" class="form-control"><br>
	<input type="text" name="harga" placeholder="Harga" class="form-control"><br>
	<input type="text" name="stok" placeholder="Stok" class="form-control"><br>
	<input type="submit" name="simpan" value="Simpan" class="btn btn-success"><br>
	</form>