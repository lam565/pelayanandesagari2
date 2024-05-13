<?php
include "connect.php";
session_start();

$nik=$_POST['NIK'];
$tanggal=date('Y-m-d');
$no_surat=$_POST['no_surat'];
$username=$_POST['username'];
$staf=$_POST['staf'];

$sql="insert into kia values('$no_surat','$nik','$tanggal','$staf','$username','1')";
$results=mysqli_query($connect,$sql);
if ($results) {
    echo "<script>alert('Data Berhasil Disimpan'); window.location = 'tb_surat.php?err=0'</script>";
} else {
    echo "Terjadi Kesalahan Silahkan tekan Kembali";
}
?>