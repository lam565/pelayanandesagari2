<?php
error_reporting(1);
include "connect.php";
session_start();

$nik=$_POST['nik_pemohon'];
$no_kk=$_POST['no_kk'];
$dtberkas=$_POST['permohonan'];
$permohonan="";
foreach ($dtberkas as $lamp) {
	$permohonan.=",".$lamp;
}

$berkasnya=substr($permohonan, 1);

$dtberkas1=$_POST['berkas'];
$berkas="";
foreach ($dtberkas1 as $lamp1) {
	$berkas.=",".$lamp1;
}

$berkasnya1=substr($berkas, 1);

$sql2="insert into peristiwa values('','$nik','$no_kk','$berkasnya')";
$results2=mysqli_query($connect,$sql2)or die("error:".mysqli_error($connect));
$cc=mysqli_fetch_array($results2);

$a="select * from peristiwa where no_kk='$no_kk'";
$b=mysqli_query($connect,$a) or die ("error:".mysqli_error($connect));
$c=mysqli_fetch_array($b);


$sql2="insert into det_peristiwa values('','$c[id_peristiwa]','$berkasnya1')";
$results2=mysqli_query($connect,$sql2)or die("error:".mysqli_error($connect));

echo "<script>window.location='peristiwa.php?id=$c[id_peristiwa]&&b=$berkasnya&&c=$berkasnya1';</script>";

?>