<?php
include "connect.php";

$nik_pemohon=$_POST['nik_pemohon'];
$no_kk=$_POST['no_kk'];

	echo "<script>alert('Proses Data Ini'); window.location = 'form_element_kependudukan.php?nik_pemohon=$nik_pemohon&&no_kk=$no_kk'</script>";


?>