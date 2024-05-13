<?php
include "connect.php";

$no_surat=$_POST['no_surat'];

$a="update pindah_keluar set bc='2' where id_keluar='$no_surat' ";
$b=mysqli_query($connect,$a) or die ("error:".mysqli_error($connect));
header("location:cetak_perm_pindah.php?id=$no_surat");
?>