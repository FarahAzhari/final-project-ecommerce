<?php
include"../../koneksi_farah.php";
$bk=$_GET['id'];
mysqli_query($conn,"DELETE from drink WHERE id_drink='$bk'");
header("location:indexAdmin.php?page=drink");
 ?>