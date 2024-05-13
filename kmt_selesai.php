<?php
include "connect.php";

$id_kematian=$_GET['id'];

$a="update kematian set bc='3' where id_kematian='$id_kematian' ";
$b=mysqli_query($connect,$a) or die ("error:".mysqli_error($connect));
echo "<script>alert('Selesai');window.location='tb_kematian.php?id=$id_kematian';</script>";
?>