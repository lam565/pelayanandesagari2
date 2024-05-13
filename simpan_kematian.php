<?php
include "connect.php";

$no_surat=$_POST['no_surat'];

$nik_jenazah=$_POST['NIK'];
$tanggal_meninggal=$_POST['tanggal_kematian'];
$tempat_meninggal=$_POST['tempat'];
$jam=$_POST['pukul'];
$sebab_meninggal=$_POST['sebab'];
$yang_menerangkan=$_POST['menerangkan'];
$anak_ke=$_POST['anak'];

$nik_pelapor=$_POST['NIK1'];
$nama_pelapor=$_POST['nama1'];
$tanggal_lahir=$_POST['TGL_LHR1'];
$pekerjaan=$_POST['pekerjaan1'];
$alamat=$_POST['ALAMAT1'];

$username=$_POST['username'];
$tanggal_lapor=date('Y-m-d');

$nik7=$_POST['NIK7'];
$nama7=$_POST['nama7'];
$tanggal_lahir7=$_POST['TGL_LHR7'];
$pekerjaan7=$_POST['pekerjaan7'];
$alamat7=$_POST['ALAMAT7'];

$nik8=$_POST['NIK8'];
$nama8=$_POST['nama8'];
$tanggal_lahir8=$_POST['TGL_LHR8'];
$pekerjaan8=$_POST['pekerjaan8'];
$alamat8=$_POST['ALAMAT8'];

$hubungan=$_POST['hubungan'];
$hari=$_POST['hari'];

$sql="insert into kematian values('$no_surat','$nik_jenazah','$tanggal_meninggal','$hari','$tempat_meninggal','$jam','$sebab_meninggal','$yang_menerangkan','$nik_pelapor',
'$nama_pelapor','$tanggal_lahir','$pekerjaan','$alamat','$tanggal_lapor','$nik7','$nama7','$tanggal_lahir7','$pekerjaan7','$alamat7','$nik8','$nama8','$pekerjaan8',
'$tanggal_lahir8','$alamat8','$anak_ke','$hubungan','$username','1')";
$results=mysqli_query($connect,$sql)or die("error:".mysqli_error($connect));

$sql2="insert into register values('','$tanggal_lapor','$nik_pelapor','permohonan Surat Kematian')";
$results2=mysqli_query($connect,$sql2)or die("error:".mysqli_error($connect));

$sql1="insert into berkas values ('','','$no_surat','','','','Y','Y','Y','','','','','','','','','')";
$results1=mysqli_query($connect,$sql1)or die("error:".mysqli_error($connect));

header("location:gari.php");
?>