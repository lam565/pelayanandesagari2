<?php
include "connect.php";
$nik=$_POST['nik'];
$nama=$_POST['nama'];
$tempat_lahir=$_POST['tempat_lahir'];
$tanggal_lahir=$_POST['tanggal_lahir'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$gol_darah=$_POST['gol_darah'];
$pendidikan=$_POST['pendidikan'];
$pekerjaan=$_POST['pekerjaan'];
$Agama=$_POST['Agama'];
$status_perkawinan=$_POST['status_perkawinan'];


$sql="insert into warga values('$nik','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$gol_darah','$pendidikan','$Agama
','$status_perkawinan','$pekerjaan')";
$results=mysqli_query($connect,$sql) or die("error:".mysqli_error($connect));
header("location:tabel_warga.php");
?>

