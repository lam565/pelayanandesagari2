<?php
include "connect.php";
session_start();

$nik=$_POST['NIK'];
$tanggal=date('Y-m-d');
$no_surat=$_POST['no_surat'];
$saksi_1=$_POST['saksi_1'];
$saksi_2=$_POST['saksi_2'];
$staf=$_POST['staf'];
$username=$_POST['username'];


$sql="insert into jejaka values('$no_surat','$nik','$tanggal','$saksi_1','$saksi_2','$staf','$username','1')";
$results=mysqli_query($connect,$sql)or die("error:".mysqli_error($connect));
if ($results) {
    echo "<script>alert('Data Berhasil Disimpan'); window.location = 'tb_surat.php?err=0'</script>";
} else {
    echo "Terjadi Kesalahan Silahkan tekan Kembali";
}
?>