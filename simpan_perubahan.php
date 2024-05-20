<?php
error_reporting(1);
include "connect.php";
session_start();

$nik_pemohon = $_POST['nik_pemohon'];
$no_kk = $_POST['no_kk'];



// $nik=$_POST['nik_pemohon'];
// $no_kk=$_POST['no_kk'];

// $pendidikan=$_POST['pendidikan'];
// $dasar=$_POST['dasar'];
// $nikk=$_POST['nik'];

// $sql2="update biodata_wni set PDDK_AKH='$pendidikan' where NIK='$nikk'";
// $results2=mysqli_query($connect,$sql2)or die("error:".mysqli_error($connect));

echo "<script>window.location='pdf_perubahan.php?nik=$nik_pemohon&no_kk=$no_kk';</script>";
?>