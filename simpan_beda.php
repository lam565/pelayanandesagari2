<?php
include "connect.php";
session_start();

$nik=$_POST['NIK'];
$tanggal=date('Y-m-d');
$no_surat=$_POST['no_surat'];
$username=$_POST['username'];
$staf=$_POST['staf'];

$nama_id=$_POST['nama_id'];
$nomor=$_POST['nomor'];
$nama=$_POST['nama'];
$tempat=$_POST['tempat'];
$tgl=$_POST['tgl'];
$jk=$_POST['jk'];

$sql="insert into beda_nama values('$no_surat','$nik','$tanggal','$staf','$username','$nama_id','$nomor','$nama','$tempat','$tgl','$jk','1')";
$results=mysqli_query($connect,$sql)or die("error:".mysqli_error($connect));

if ($results) {
    echo "<script>alert('Data Berhasil Disimpan'); window.location = 'tb_surat.php?err=0'</script>";
} else {
    echo "Terjadi Kesalahan Silahkan tekan Kembali";
}
?>