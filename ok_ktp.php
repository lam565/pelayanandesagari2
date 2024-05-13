<?php
include "connect.php";

if($_POST['permohonan']=='Baru'){	
$no_surat=$_POST['no_surat'];
$nik=$_POST['nik'];

$a="update suket_ektp set bc='2' where id_ektp='$no_surat' ";
$b=mysqli_query($connect,$a) or die ("error:".mysqli_error($connect));
echo "<script>window.location='cetak_permohonan.php?nik=$nik';</script>";
}

if($_POST['permohonan']=='Penggantian'){	
$no_surat=$_POST['no_surat'];
$nik=$_POST['nik'];

$a="update suket_ektp set bc='2' where id_ektp='$no_surat' ";
$b=mysqli_query($connect,$a) or die ("error:".mysqli_error($connect));
echo "<script>window.location='cetak_permohonan_ktp_hilang_rusak.php?nik=$nik';</script>";
}

if($_POST['permohonan']=='Perubahan'){	
$no_surat=$_POST['no_surat'];
$nik=$_POST['nik'];

$a="update suket_ektp set bc='2' where id_ektp='$no_surat' ";
$b=mysqli_query($connect,$a) or die ("error:".mysqli_error($connect));
echo "<script>window.location='cetak_permohonan_ktp_perubahan_status.php?nik=$nik';</script>";
}
?>