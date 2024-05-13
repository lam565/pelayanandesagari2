<?php
session_start();
include "connect.php";

// Koneksi library FPDF
require_once ("fpdf/fpdf.php");
// Setting halaman PDF
$pdf = new FPDF('L','cm','A4');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',12);
// Membuat string
$pdf->Cell(28,1,'PEMERINTAH KABUPATEN GUNUNGKIDUL',0,1,'C');
$pdf->Cell(28,1,'KECAMATAN WONOSARI',0,1,'C');
$pdf->Cell(28,1,'Kalurahan GARI',0,1,'C');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(28,1,'Jl.Alternatif Karangmojo Gatak Gari Wonosari Pos : 55851',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(1,1,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(1,1,'NO',1,0,'C');
$pdf->Cell(2,1,'Tanggal',1,0,'C');
$pdf->Cell(5,1,'Nama',1,0,'C');
$pdf->Cell(3,1,'Jenis Kelamin',1,0,'C');
$pdf->Cell(3,1,'Tanggal Lahir',1,0,'C');
$pdf->Cell(2,1,'Agama',1,0,'C');
$pdf->Cell(4,1,'Pekerjaan',1,0,'C');
$pdf->Cell(3,1,'Alamat',1,0,'C');
$pdf->Cell(5,1,'Keterangan',1,1,'C');
 
$pdf->SetFont('Arial','',10);
$bln=$_POST['bln'];
$thn=$_POST['thn'];
$query = mysqli_query($connect, "SELECT * FROM register,biodata_wni,jenis_kelamin,agama,pekerjaan,data_keluarga
							where register.NIK=biodata_wni.NIK 
							and biodata_wni.JENIS_KLMIN=jenis_kelamin.JENIS_KLMIN 
							and biodata_wni.AGAMA=agama.AGAMA 
							and biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN
							and biodata_wni.NO_KK=data_keluarga.NO_KK
							and month(tanggal_reg)=$bln and year(tanggal_reg)=$thn
							ORDER BY register.id_reg DESC");
while ($row = mysqli_fetch_array($query)){
    $pdf->Cell(1,1,$row['id_reg'],1,0,'C');
    $pdf->Cell(2,1,$row['tanggal_reg'],1,0,'C');
    $pdf->Cell(5,1,$row['NAMA_LGKP'],1,0);
	$pdf->Cell(3,1,$row['jenis_kelamin'],1,0,'C');
    $pdf->Cell(3,1,$row['TMPT_LHR'],1,0,'C');
    $pdf->Cell(2,1,$row['nama_agama'],1,0,'C');
    $pdf->Cell(4,1,$row['pekerjaan'],1,0,'C');
	$pdf->Cell(3,1,$row['ALAMAT'],1,0,'C');
	$pdf->Cell(5,1,$row['ktrngan'],1,1,'C');
}

$pdf->Output();
?>