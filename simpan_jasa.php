<?php
include "connect.php";
session_start();

$nik=$_POST['NIK'];
$tanggal=date('Y-m-d');
$no_surat=$_POST['no_surat'];
$tanggal_kejadian=$_POST['tanggal_kejadian'];
$tempat_kejadian=$_POST['tempat_kejadian'];
$keterangan=$_POST['keterangan'];
$staf=$_POST['staf'];
$username=$_POST['username'];


$sql="insert into jasaraharja values('$no_surat','$nik','$tanggal','$tanggal_kejadian','$tempat_kejadian','$keterangan','$staf','$username','1')";
$results=mysqli_query($connect,$sql)or die("error:".mysqli_error($connect));
if ($results) {
    echo "<script>alert('Data Berhasil Disimpan'); window.location = 'tb_surat.php?err=0'</script>";
} else {
    echo "Terjadi Kesalahan Silahkan tekan Kembali";
}
?>