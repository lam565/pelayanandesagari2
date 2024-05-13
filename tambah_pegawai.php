<?php
include "connect.php";
$nik=$_POST['nik'];
$username=$_POST['username'];
$nama_pegawai=$_POST['nama_pegawai'];
$tempat=$_POST['tempat'];
$tanggal=$_POST['tanggal'];
$jabatan=$_POST['jabatan'];
$alamat=$_POST['alamat'];
$jenis_kelamin=$_POST['jenis_kelamin'];

$a1="select * from pegawai where jabatan='$jabatan'";
$b1=mysqli_query($connect,$a1) or die("Error: ".mysqli_error($connect));
$c1=mysqli_num_rows($b1);
if ($c1>0){
	echo "<script>alert('Yang menjabat posisi tersebut sudah ada!!!');window.location='form_pegawai.php';</script>";
}else{
$sql="insert into pegawai values('$nik','$username','$nama_pegawai','$tempat','$tanggal','$jabatan','$alamat','$jenis_kelamin')";
$results=mysqli_query($connect,$sql) or die("error:".mysqli_error($connect));
header("location:tabel_pegawai.php");
}


?>

 