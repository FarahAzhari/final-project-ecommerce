<?php
include"../../koneksi_farah.php";
	$kat = $_POST['kat'];
	$judul = $_POST['judul'];
	$description = $_POST['description'];
	$volume = $_POST['volume'];
	$expired = $_POST['expired'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$qryid = mysqli_query($conn,"SELECT * FROM kategori where kategori='$kat'");
	$data = mysqli_fetch_assoc($qryid);
	$id_kategori = $data['id_ketegori'];

@$message		= '';
$valid_file		= true;
$max_size		= 1024000; 

// mysqli_query($conn,"INSERT into drink set judul='$judul',id_ketegori='$id_kategori',volume='$volume',description='$description',expired='$expired',harga='$harga', gambar='$nama_file_baru', stok='$stok'");	
// header("location:indexAdmin.php?page=drink");


if($_FILES['gambar']['name']){
	
	if(!$_FILES['gambar']['error']){

		
		$new_file_name = strtolower($_FILES['gambar']['tmp_name']); 
		if($_FILES['gambar']['size'] > $max_size) 
		{
			$valid_file	= false;
			$message	= 'Maaf, file terlalu besar. Max: 1MB';
		}
	


		
		$image_path = pathinfo($_FILES['gambar']['name'],PATHINFO_EXTENSION); 
		$extension = strtolower($image_path); 

		if($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "gif" ) {
			$valid_file = false;
			$message	= "Maaf, file yang diijinkan hanya format JPG, JPEG, PNG & GIF. #".$extension;
		}



		
		if($valid_file == true)
		{
			
			$rename_nama_file	= date('YmdHis');
			$nama_file_baru		= $rename_nama_file.'.'.$extension;

			
			
			mysqli_query($conn,"INSERT into drink set judul='$judul',id_ketegori='$id_kategori',volume='$volume',description='$description',expired='$expired',harga='$harga', gambar='$nama_file_baru', stok='$stok'");
			
			move_uploaded_file($_FILES['gambar']['tmp_name'], '../../assets/images/'.$nama_file_baru);
			header("location:indexAdmin.php?page=drink");
		}
	}
	
	else
	{
		
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['gambar']['error'];
	}
}
?>