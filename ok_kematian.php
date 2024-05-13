<?php
include "connect.php";

$no_surat=$_POST['no_surat'];

$a="update kematian set bc='2' where id_kematian='$no_surat' ";
$b=mysqli_query($connect,$a) or die ("error:".mysqli_error($connect));
header("location:cetak_permohonan_kematian.php?id=$no_surat");
?>