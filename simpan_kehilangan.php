<?php
include "connect.php";
session_start();
$no_surat=$_POST['no_surat'];
$nik=$_POST['NIK'];
$tanggal=date('Y-m-d');
$hari=$_POST['hari'];
$tanggal=$_POST['tanggal'];
$tempat=$_POST['tempat'];
$barang=$_POST['barang'];
$username=$_POST['username'];
$staf=$_POST['staf'];


$sql="insert into kehilangan values('$no_surat','$nik','$tanggal','$hari','$tanggal','$tempat','$barang','$staf','$username','1')";
$results=mysqli_query($connect,$sql)or die("error:".mysqli_error($connect));
if ($results) {
    echo "<script>alert('Data Berhasil Disimpan'); window.location = 'tb_surat.php?err=0'</script>";
} else {
    echo "Terjadi Kesalahan Silahkan tekan Kembali";
}
?>