<?php
error_reporting(1);
include "connect.php";
session_start();
			
$nik=$_POST['NIK'];
$tanggal=date('Y-m-d');
$no_surat=$_POST['no_surat'];
$username=$_POST['username'];
$pendidikan=$_POST['menjadi1'];
$pekerjaan=$_POST['menjadi2'];
$status_perkawinan=$_POST['menjadi4'];
$agama=$_POST['menjadi3'];
$golongan_darah=$_POST['menjadi5'];
$kelainan_fisik=$_POST['menjadi6'];
$akta_kelahiran=$_POST['menjadi7'];
$nama_lengkap=$_POST['menjadi8'];
$tanggal_lahir=$_POST['menjadi9'];
$tempat_lahir=$_POST['menjadi10'];
$alamat=$_POST['menjadi11'];

$dokumen1=$_POST['dokumen1'];
$dokumen2=$_POST['dokumen2'];
$dokumen3=$_POST['dokumen3'];
$dokumen4=$_POST['dokumen4'];
$dokumen5=$_POST['dokumen5'];
$dokumen6=$_POST['dokumen6'];
$dokumen7=$_POST['dokumen7'];
$dokumen8=$_POST['dokumen8'];
$dokumen9=$_POST['dokumen9'];
$dokumen10=$_POST['dokumen10'];
$dokumen11=$_POST['dokumen11'];

$no_dokumen1=$_POST['no1'];
$no_dokumen2=$_POST['no2'];
$no_dokumen3=$_POST['no3'];
$no_dokumen4=$_POST['no4'];
$no_dokumen5=$_POST['no5'];
$no_dokumen6=$_POST['no6'];
$no_dokumen7=$_POST['no7'];
$no_dokumen8=$_POST['no8'];
$no_dokumen9=$_POST['no9'];
$no_dokumen10=$_POST['no10'];
$no_dokumen11=$_POST['no11'];

$tgl_dokumen1=$_POST['tgl1'];
$tgl_dokumen2=$_POST['tgl2'];
$tgl_dokumen3=$_POST['tgl3'];
$tgl_dokumen4=$_POST['tgl4'];
$tgl_dokumen5=$_POST['tgl5'];
$tgl_dokumen6=$_POST['tgl6'];
$tgl_dokumen7=$_POST['tgl7'];
$tgl_dokumen8=$_POST['tgl8'];
$tgl_dokumen9=$_POST['tgl9'];
$tgl_dokumen10=$_POST['tgl10'];
$tgl_dokumen11=$_POST['tgl11'];

$permohonan=$_POST['permohonan'];
$dtberkas=$_POST['berkas'];
$berkas="";

foreach ($dtberkas as $lamp) {
	$berkas.=",".$lamp;
}
$berkasnya=substr($berkas, 1);

$sql="insert into suket_ektp values('$no_surat','$nik','$tanggal','$permohonan','$username','1','$pendidikan','$pekerjaan','$agama','$status_perkawinan','$golongan_darah','$kelainan_fisik','$akta_kelahiran','$nama_lengkap','$tanggal_lahir','$tempat_lahir','$alamat','$dokumen1','$dokumen2','$dokumen3','$dokumen4','$dokumen5','$dokumen6','$dokumen7','$dokumen8','$dokumen9','$dokumen10','$dokumen11','$no_dokumen1','$no_dokumen2','$no_dokumen3','$no_dokumen4','$no_dokumen5','$no_dokumen6','$no_dokumen7','$no_dokumen8','$no_dokumen9','$no_dokumen10','$no_dokumen11','$tgl_dokumen1','$tgl_dokumen2','$tgl_dokumen3','$tgl_dokumen4','$tgl_dokumen5','$tgl_dokumen6','$tgl_dokumen7','$tgl_dokumen8','$tgl_dokumen9','$tgl_dokumen10','$tgl_dokumen11','$berkasnya')";
$results=mysqli_query($connect,$sql)or die("error:".mysqli_error($connect));
$sql2="insert into register values('','$tanggal','$nik','permohonan KTP $permohonan')";
$results2=mysqli_query($connect,$sql2)or die("error:".mysqli_error($connect));
echo "<script>window.location='form_ktp.php';</script>";
?>