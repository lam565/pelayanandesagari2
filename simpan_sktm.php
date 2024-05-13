<?php
include "connect.php";
session_start();

$nik=$_POST['NIK'];
$tanggal=date('Y-m-d');
$no_surat=$_POST['no_surat'];
$username=$_POST['username'];
$staf=$_POST['staf'];


$sql="insert into sktm values('$no_surat','$nik','$tanggal','$username','$staf','1')";
$results=mysqli_query($connect,$sql)or die("error:".mysqli_error($connect));

if ($results) {
    echo "<script>alert('Data Berhasil Disimpan'); window.location = 'form_s_miskin.php'</script>";
} else {
    echo "Terjadi Kesalahan Silahkan tekan Kembali";
}
//header("location:surat/skck.php?nik=$nik&tgl=$tanggal");
?>