<?php
include "connect.php";

$id_kelahiran=$_GET['id'];

$a="update kelahiran set bc='3' where id_kelahiran='$id_kelahiran' ";
$b=mysqli_query($connect,$a) or die ("error:".mysqli_error($connect));
echo "<script>alert('Selesai');window.location='tb_kelahiran.php?id=$id_kelahiran';</script>";
?>