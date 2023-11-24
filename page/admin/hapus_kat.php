<?php
include"../../koneksi_farah.php";
$bk=$_GET['id'];
mysqli_query($conn,"DELETE FROM kategori WHERE id_ketegori='$bk'");
header("location:indexAdmin.php?page=kategori");
 ?>