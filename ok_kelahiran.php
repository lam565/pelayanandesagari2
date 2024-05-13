<?php
include "connect.php";

$no_surat=$_POST['no_surat'];

$a="update kelahiran set bc='2' where id_kelahiran='$no_surat' ";
$b=mysqli_query($connect,$a) or die ("error:".mysqli_error($connect));
header("location:cetak_perm_kelahiran.php?id_kelahiran=$no_surat");
?>