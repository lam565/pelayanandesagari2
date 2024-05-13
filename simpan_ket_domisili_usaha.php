<?php
include "connect.php";
session_start();
$no_surat=$_POST['no_surat'];
$nik=$_POST['NIK'];
$tanggal=date('Y-m-d');
$bidang_usaha=$_POST['bidang_usaha'];
$jenis_usaha=$_POST['jenis_usaha'];
$lokasi_usaha=$_POST['lokasi_usaha'];
$username=$_POST['username'];
$staf=$_POST['staf'];


$sql="insert into domisili_usaha values('$no_surat','$nik','$tanggal','$bidang_usaha','$jenis_usaha','$lokasi_usaha','$staf','$username','1')";
$results=mysqli_query($connect,$sql)or die("error:".mysqli_error($connect));
if ($results) {
    echo "<script>alert('Data Berhasil Disimpan'); window.location = 'tb_surat.php?err=0'</script>";
} else {
    echo "Terjadi Kesalahan Silahkan tekan Kembali";
}
?>