<?php
include "connect.php";
session_start();
$no_surat=$_POST['no_surat'];
$nik=$_POST['NIK'];
$tanggal=date('Y-m-d');
$sekolah=$_POST['sekolah'];
$fakultas=$_POST['fakultas'];
$kelas=$_POST['kelas'];
$nama_ayah=$_POST['nama_ayah'];
$tempat_lahir=$_POST['tempat_lahir'];
$tanggal_lahir=$_POST['tanggal_lahir'];
$ALAMAT_1=$_POST['ALAMAT_1'];
$pekerjaan=$_POST['pekerjaan'];
$penghasilan=$_POST['penghasilan'];
$nama_ibu=$_POST['nama_ibu'];
$tempat_lahir_ibu=$_POST['tempat_lahir_ibu'];
$tanggal_lahir_ibu=$_POST['tanggal_lahir_ibu'];
$alamat_ibu=$_POST['alamat_ibu'];
$penghasilan_ibu=$_POST['penghasilan_ibu'];
$username=$_POST['username'];
$staf=$_POST['staf'];


$sql="insert into penghasilan values('$no_surat','$nik','$tanggal','$sekolah','$fakultas
','$kelas','$nama_ayah','$tempat_lahir','$tanggal_lahir','$ALAMAT_1','$pekerjaan','$penghasilan','$nama_ibu','$tempat_lahir_ibu','$tanggal_lahir_ibu','
$alamat_ibu','$penghasilan_ibu','$staf','$username','1')";
$results=mysqli_query($connect,$sql)or die("error:".mysqli_error($connect));if ($results) {
    echo "<script>alert('Data Berhasil Disimpan'); window.location = 'tb_surat.php?err=0'</script>";
} else {
    echo "Terjadi Kesalahan Silahkan tekan Kembali";
}
?>