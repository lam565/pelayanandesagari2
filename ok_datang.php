<?php
include "connect.php";

$no_surat=$_POST['no_surat'];

$a="update pindah_datang set bc='2' where id_datang='$no_surat' ";
$b=mysqli_query($connect,$a) or die ("error:".mysqli_error($connect));
header("location:cetak_perm_datang.php?id=$no_surat");
?>