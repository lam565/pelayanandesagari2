<?php
include "connect.php";
session_start();

$nik=$_POST['NIK'];
$tanggal=date('Y-m-d');
$no_surat=$_POST['no_surat'];
$username=$_POST['username'];
$staf=$_POST['staf'];

$hari=$_POST['hari'];
$tanggal=$_POST['tanggal'];
$waktu=$_POST['waktu'];
$jenis=$_POST['jenis'];
$lokasi=$_POST['lokasi'];

$sql="insert into keramaian values('$no_surat','$nik','$tanggal','$staf','$username','$hari','$tanggal','$waktu','$jenis','$lokasi','1')";
$results=mysqli_query($connect,$sql)or die("error:".mysqli_error($connect));

if ($results) {
    echo "<script>alert('Data Berhasil Disimpan'); window.location = 'tb_surat.php?err=0'</script>";
} else {
    echo "Terjadi Kesalahan Silahkan tekan Kembali";
}
?>