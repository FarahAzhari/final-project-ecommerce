<?php
include"../../koneksi_farah.php";
$a=$_POST['id_ketegori'];
$b=$_POST['kategori'];

 mysqli_query($conn,"UPDATE kategori SET   kategori='$b' WHERE id_ketegori='$a'");
 header("location:indexAdmin.php?page=kategori");
?>