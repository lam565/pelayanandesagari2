<?php
include "connect.php";
$nik=$_POST['pr'];
$username=$_POST['us'];
$nama_pegawai=$_POST['nama_pegawai'];
$tempat=$_POST['tempat'];
$tanggal=$_POST['tanggal'];
$jabatan=$_POST['jabatan'];
$alamat=$_POST['alamat'];
$jenis_kelamin=$_POST['jk'];

$sql= "UPDATE pegawai SET username='$username',nama_pegawai='$nama_pegawai',tempat_lahir='$tempat',
tanggal_lahir='$tanggal',jabatan='$jabatan',alamat='$alamat',jenis_kelamin='$jenis_kelamin' WHERE nip='$nik' ";
$result = mysqli_query ($connect, $sql) or die ("Error : ".mysqli_error($connect));
header("location:tabel_pegawai.php");
?>