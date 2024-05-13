<?php
include "connect.php";

$arrctk= array (
	"skck" => "skck",
	"domisili" => "domisili",
	"kia" => "kia",
	"keramaian" => "surat_izin_keramaian",
	"beda_nama" => "surat_ket_beda_nama",
	"belum_menikah" => "surat_ket_belum_nikah",
	"domisili_usaha" => "surat_ket_domisili_usaha",
	"kehilangan" => "surat_ket_kehilangan",
	"pengantar" => "surat_ket_pengantar",
	"sktm" => "surat_keterangan_miskin",
	"penghasilan" => "surat_keterangan_penghasilan",
	"jasaraharja" => "surat_pengantar_jasaraharja",
	"jejaka" => "surat_pernyataan_jejaka"
);
$no_surat=$_GET['no_surat'];
$jenis_surat=$_GET['jenis_surat'];
$ctk=$arrctk[$jenis_surat];

$query="select * from $jenis_surat where no_surat='$no_surat'";
$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
$data = mysqli_fetch_array($results);	

$a="update ".$jenis_surat." set bc='2' where no_surat='$no_surat' ";
$b=mysqli_query($connect,$a) or die ("error:".mysqli_error($connect));
header("location:surat/$ctk.php?nik=$data[NIK]&tgl=$data[tanggal_permohonan]");
?>