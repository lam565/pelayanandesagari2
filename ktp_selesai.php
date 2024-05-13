<?php
include "connect.php";

$id_ektp=$_GET['id'];

$a="update suket_ektp set bc='3' where id_ektp='$id_ektp' ";
$b=mysqli_query($connect,$a) or die ("error:".mysqli_error($connect));
echo "<script>alert('Selesai');window.location='tb_ktp.php?id=$id_ektp';</script>";
?>