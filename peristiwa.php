<?php
session_start();
require "fpdf/fpdf.php";
require "connect.php";

$pdf = new FPDF('P','mm',array(280,330));
$pdf->AddPage();

$pdf->ln(5);
$pdf->SetFont('Times','BU',14);
$pdf->Cell(250,6,'FORMULIR PENDAFTARAN PERISTIWA KEPENDUDUKAN',0,1,'C');
$pdf->SetFont('Times','',11);
$pdf->Cell(50,5,'',0,0,'C');

$pdf->ln(6);
$text="I. DATA PEMOHON:";
$pdf->Cell(2,5,'',0,0,'L');
$pdf->MultiCell(160,5,$text);
$pdf->ln(3);
$a=$_GET['id'];
$b=$_GET['b'];
$b=$_GET['c'];
$query = mysqli_query($connect, "SELECT * FROM peristiwa, biodata_wni,det_peristiwa 
						WHERE peristiwa.NIK=biodata_wni.NIK and peristiwa.id_peristiwa=det_peristiwa.id_peristiwa
						AND peristiwa.id_peristiwa='$a' AND det_peristiwa.id_peristiwa='$a'");
$row = mysqli_fetch_array($query);

$pdf->Cell(5,5,'',0,0,'C');
$pdf->Cell(5,5,'1. Nama Lengkap ',0,0,'L');
$pdf->Cell(100,5,' : ',0,0,'C');
$pdf->Cell(1,5,$row['NAMA_LGKP'],0,1,'L');
$pdf->Cell(5,5,'',0,0,'C');
$pdf->Cell(5,5,'2. No. Induk Kependudukan ',0,0,'L');
$pdf->Cell(100,5,' : ',0,0,'C');
$pdf->Cell(1,5,$row['NIK'],0,1,'L');
$pdf->Cell(5,5,'',0,0,'C');
$pdf->Cell(5,5,'3. Nomor Kartu Keluarga ',0,0,'L');
$pdf->Cell(100,5,' : ',0,0,'C');
$pdf->Cell(1,5,$row['NO_KK'],0,1,'L');
$pdf->Cell(5,5,'',0,0,'C');
$pdf->ln(3);
$text="II. JENIS PERMOHONAN:";
$pdf->Cell(2,5,'',0,0,'L');
$pdf->MultiCell(160,5,$text);
$pdf->ln(3);

$query2 = mysqli_query($connect, "SELECT * FROM peristiwa,det_peristiwa 
						WHERE peristiwa.id_peristiwa=det_peristiwa.id_peristiwa
						AND peristiwa.id_peristiwa='$a'");
$row2 = mysqli_fetch_array($query2);


$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'I.',1,0,'L');
$pdf->Cell(65,6,'KARTU KELUARGA',1,0,'L');
$pdf->Cell(8,6,'II.',1,0,'L');
$pdf->Cell(78,6,'KTP-el',1,0,'L');
$pdf->Cell(8,6,'III.',1,0,'L');
$pdf->Cell(50,6,'KARTU IDENTITAS ANAK',1,0,'L');
$pdf->Cell(8,6,'IV.',1,0,'L');
$pdf->Cell(40,6,'PERUBAHAN DATA',1,0,'L');

$pdf->ln(6);
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'A',1,0,'L');
$pdf->Cell(65,6,'BARU',1,0,'L');
if ($row2['jenis_permohonan']==12) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'A',1,0,'L');
$pdf->Cell(78,6,'BARU',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'A',1,0,'L');
$pdf->Cell(78,6,'BARU',1,0,'L');
}
if ($row2['jenis_permohonan']==20) {
$pdf->SetFont('Times','B',10);	
$pdf->Cell(8,6,'A',1,0,'L');
$pdf->Cell(50,6,'BARU',1,0,'L');
} else {
$pdf->SetFont('Times','',10);	
$pdf->Cell(8,6,'A',1,0,'L');
$pdf->Cell(50,6,'BARU',1,0,'L');	
}	
if ($row2['jenis_permohonan']==25) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'A',1,0,'L');
$pdf->Cell(40,6,'KK',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'A',1,0,'L');
$pdf->Cell(40,6,'KK',1,0,'L');
}
	
$pdf->ln(6);
if ($row2['jenis_permohonan']==1) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'1.',1,0,'L');
$pdf->Cell(65,6,'Membentuk Keluarga Baru',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'1.',1,0,'L');
$pdf->Cell(65,6,'Membentuk Keluarga Baru',1,0,'L');
}
$pdf->Cell(8,6,'',1,0,'L');
$pdf->Cell(78,6,'',1,0,'L');
$pdf->Cell(8,6,'',1,0,'L');
$pdf->Cell(50,6,'',1,0,'L');
$pdf->Cell(8,6,'',1,0,'L');
$pdf->Cell(40,6,'',1,0,'L');

$pdf->ln(6);
if ($row2['jenis_permohonan']==2) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'2.',1,0,'L');
$pdf->Cell(65,6,'Penggantian Kepala Keluarga',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'2.',1,0,'L');
$pdf->Cell(65,6,'Penggantian Kepala Keluarga',1,0,'L');
}
if ($row2['jenis_permohonan']==13) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'B',1,0,'L');
$pdf->Cell(78,6,'PINDAH DATANG',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'B',1,0,'L');
$pdf->Cell(78,6,'PINDAH DATANG',1,0,'L');
}	
$pdf->Cell(8,6,'B',1,0,'L');
$pdf->Cell(50,6,'HILANG/RUSAK',1,0,'L');
if ($row2['jenis_permohonan']==26) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'B',1,0,'L');
$pdf->Cell(40,6,'KTP-el',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'B',1,0,'L');
$pdf->Cell(40,6,'KTP-el',1,0,'L');
}

$pdf->ln(6);
if ($row2['jenis_permohonan']==3) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'3.',1,0,'L');
$pdf->Cell(65,6,'Pisah KK',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'3.',1,0,'L');
$pdf->Cell(65,6,'Pisah KK',1,0,'L');
}	
$pdf->Cell(8,6,'',1,0,'L');
$pdf->Cell(78,6,'',1,0,'L');
if ($row2['jenis_permohonan']==21) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'1.',1,0,'L');
$pdf->Cell(50,6,'Hilang',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'1.',1,0,'L');
$pdf->Cell(50,6,'Hilang',1,0,'L');
}
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(40,6,'',1,0,'C');

$pdf->ln(6);
if ($row2['jenis_permohonan']==4) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'4.',1,0,'L');
$pdf->Cell(65,6,'Pindah Datang',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'4.',1,0,'L');
$pdf->Cell(65,6,'Pindah Datang',1,0,'L');
}	
$pdf->Cell(8,6,'C.',1,0,'L');
$pdf->Cell(78,6,'HILANG/RUSAK',1,0,'L');
if ($row2['jenis_permohonan']==22) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'2.',1,0,'L');
$pdf->Cell(50,6,'Rusak',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'2.',1,0,'L');
$pdf->Cell(50,6,'Rusak',1,0,'L');
}	
if ($row2['jenis_permohonan']==27) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'C.',1,0,'L');
$pdf->Cell(40,6,'KIA',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'C.',1,0,'L');
$pdf->Cell(40,6,'KIA',1,0,'L');
}
	
$pdf->ln(6);
if ($row2['jenis_permohonan']==5) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'5.',1,0,'L');
$pdf->Cell(65,6,'WNI Dari LN Karena Pindah',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'5.',1,0,'L');
$pdf->Cell(65,6,'WNI Dari LN Karena Pindah',1,0,'L');
}
if ($row2['jenis_permohonan']==14) {	
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'1.',1,0,'L');
$pdf->Cell(78,6,'Hilang',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'1.',1,0,'L');
$pdf->Cell(78,6,'Hilang',1,0,'L');
}	
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(50,6,'',1,0,'C');
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(40,6,'',1,0,'C');

$pdf->ln(6);
if ($row2['jenis_permohonan']==6) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'6.',1,0,'L');
$pdf->Cell(65,6,'Rentan Adminduk',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'6.',1,0,'L');
$pdf->Cell(65,6,'Rentan Adminduk',1,0,'L');
}	
if ($row2['jenis_permohonan']==15) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'2.',1,0,'L');
$pdf->Cell(78,6,'Rusak',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'2.',1,0,'L');
$pdf->Cell(78,6,'Rusak',1,0,'L');
}
if ($row2['jenis_permohonan']==23) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'C.',1,0,'L');
$pdf->Cell(50,6,'Perpanjangan ITAP',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'C.',1,0,'L');
$pdf->Cell(50,6,'Perpanjangan ITAP',1,0,'L');
}	
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(40,6,'',1,0,'C');

$pdf->ln(6);
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'B.',1,0,'L');
$pdf->Cell(65,6,'PERUBAHAN DATA',1,0,'L');
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(78,6,'',1,0,'C');
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(50,6,'',1,0,'C');
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(40,6,'',1,0,'C');

$pdf->ln(6);
if ($row2['jenis_permohonan']==7) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'1.',1,0,'L');
$pdf->Cell(65,6,'Menumpang Dalam KK',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'1.',1,0,'L');
$pdf->Cell(65,6,'Menumpang Dalam KK',1,0,'L');
}	
if ($row2['jenis_permohonan']==16) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'D',1,0,'L');
$pdf->Cell(78,6,'PERPANJANGAN ITAP',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'D',1,0,'L');
$pdf->Cell(78,6,'PERPANJANGAN ITAP',1,0,'L');
}	
if ($row2['jenis_permohonan']==24) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'D',1,0,'L');
$pdf->Cell(50,6,'Lainnya',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'D',1,0,'L');
$pdf->Cell(50,6,'Lainnya',1,0,'L');
}
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(40,6,'',1,0,'C');

$pdf->ln(6);
if ($row2['jenis_permohonan']==8) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'2.',1,0,'L');
$pdf->Cell(65,6,'Peristiwa Penting',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'2.',1,0,'L');
$pdf->Cell(65,6,'Peristiwa Penting',1,0,'L');
}	
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(78,6,'',1,0,'C');
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(50,6,'',1,0,'C');
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(40,6,'',1,0,'C');

$pdf->ln(6);
if ($row2['jenis_permohonan']==9) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'3.',1,0,'L');
$pdf->Cell(65,6,'Perubahan elemen data yg tercantum di KK',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'3.',1,0,'L');
$pdf->Cell(65,6,'Perubahan elemen data yg tercantum di KK',1,0,'L');
}	
if ($row2['jenis_permohonan']==17) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'E',1,0,'L');
$pdf->Cell(78,6,'PERUBAHAN STATUS KEWARGANEGARAAN',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'E',1,0,'L');
$pdf->Cell(78,6,'PERUBAHAN STATUS KEWARGANEGARAAN',1,0,'L');
}	
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(50,6,'',1,0,'C');
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(40,6,'',1,0,'C');

$pdf->ln(6);
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'C',1,0,'L');
$pdf->Cell(65,6,'HILANG/RUSAK',1,0,'L');
if ($row2['jenis_permohonan']==18) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'F',1,0,'L');
$pdf->Cell(78,6,'LUAR DOMISILI',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'F',1,0,'L');
$pdf->Cell(78,6,'LUAR DOMISILI',1,0,'L');
}	
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(50,6,'',1,0,'C');
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(40,6,'',1,0,'C');

$pdf->ln(6);
if ($row2['jenis_permohonan']==10) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'1.',1,0,'L');
$pdf->Cell(65,6,'Hilang',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'1.',1,0,'L');
$pdf->Cell(65,6,'Hilang',1,0,'L');
}	
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(78,6,'',1,0,'C');
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(50,6,'',1,0,'C');
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(40,6,'',1,0,'C');

$pdf->ln(6);
if ($row2['jenis_permohonan']==11) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'2.',1,0,'L');
$pdf->Cell(65,6,'Rusak',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'2.',1,0,'L');
$pdf->Cell(65,6,'Rusak',1,0,'L');
}	
if ($row2['jenis_permohonan']==19) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'G',1,0,'L');
$pdf->Cell(78,6,'TRANSMIGRASI',1,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'G',1,0,'L');
$pdf->Cell(78,6,'TRANSMIGRASI',1,0,'L');
}
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(50,6,'',1,0,'C');
$pdf->Cell(8,6,'',1,0,'C');
$pdf->Cell(40,6,'',1,0,'C');
$pdf->ln(9);

$text="III. PERSYARATAN YANG DILAMPIRKAN:";
$pdf->Cell(2,5,'',0,0,'C');
$pdf->MultiCell(160,5,$text);
$pdf->ln(3);

$query1 = mysqli_query($connect, "SELECT * FROM peristiwa,det_peristiwa 
						WHERE peristiwa.id_peristiwa=det_peristiwa.id_peristiwa
						AND det_peristiwa.persyaratan='$_GET[c]'");
$row1 = mysqli_fetch_array($query1);

if ($row1['persyaratan']==1) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(70,6,'KK Lama / KK rusak',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(70,6,'KK Lama / KK rusak',0,0,'L');
}

if ($row1['persyaratan']==9) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(130,6,'Surat keterangan bukti perubahan peristiwa kependudukan dan peristiwa penting',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(130,6,'Surat keterangan bukti perubahan peristiwa kependudukan dan peristiwa penting',0,0,'L');
}
	
$pdf->ln(6);
if ($row1['persyaratan']==2) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(70,6,'Buku nikah/kutipan akta perkawinan',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(70,6,'Buku nikah/kutipan akta perkawinan',0,0,'L');
}

if ($row1['persyaratan']==10) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(130,6,'SPTJM Perkawinan/perceraian belum tercatat',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(130,6,'SPTJM Perkawinan/perceraian belum tercatat',0,0,'L');
}
	
$pdf->ln(6);
if ($row1['persyaratan']==3) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(70,6,'Kutipan Akta Perceraian',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(70,6,'Kutipan Akta Perceraian',0,0,'L');
}

if ($row1['persyaratan']==11) {	
$pdf->SetFont('Times','B',10);
$pdf->Cell(130,6,'Akta Kematian',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(130,6,'Akta Kematian',0,0,'L');
}
	
$pdf->ln(6);
if ($row1['persyaratan']==4) {	
$pdf->SetFont('Times','B',10);
$pdf->Cell(70,6,'Surat keterangan pindah',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(70,6,'Surat keterangan pindah',0,0,'L');
}

if ($row1['persyaratan']==12) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(130,6,'Surat pernyataan penyebab terjadinya hilang atau rusak',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(130,6,'Surat pernyataan penyebab terjadinya hilang atau rusak',0,0,'L');
}
	
$pdf->ln(6);
if ($row1['persyaratan']==5) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(70,6,'Surat keterangan pindah luar negeri',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(70,6,'Surat keterangan pindah luar negeri',0,0,'L');
}

if ($row1['persyaratan']==13) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(130,6,'Surat keterangan pindah dari perwakilan RI',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(130,6,'Surat keterangan pindah dari perwakilan RI',0,0,'L');
}
$pdf->ln(6);
if ($row1['persyaratan']==6) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(70,6,'KTP-el rusak',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(70,6,'KTP-el rusak',0,0,'L');
}

if ($row1['persyaratan']==14) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(130,6,'Surat pernyataan bersedia menerima sebagai anggota keluarga',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(130,6,'Surat pernyataan bersedia menerima sebagai anggota keluarga',0,0,'L');
}
	
$pdf->ln(6);
if ($row1['persyaratan']==7) {
$pdf->SetFont('Times','B',10);
$pdf->Cell(70,6,'Dokumen perjalanan',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(70,6,'Dokumen perjalanan',0,0,'L');
}

if ($row1['persyaratan']==15) {	
$pdf->SetFont('Times','B',10);
$pdf->Cell(130,6,'Surat kuasa pengasuhan anak dari orang tua/wali',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(130,6,'Surat kuasa pengasuhan anak dari orang tua/wali',0,0,'L');
}
	
$pdf->ln(6);
if ($row1['persyaratan']==8) {	
$pdf->SetFont('Times','B',10);
$pdf->Cell(70,6,'Surat keterangan hilang dari kepolisian',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(70,6,'Surat keterangan hilang dari kepolisian',0,0,'L');
}

if ($row1['persyaratan']==16) {	
$pdf->SetFont('Times','B',10);
$pdf->Cell(130,6,'Kartu izin tinggal tetap',0,0,'L');
} else {
$pdf->SetFont('Times','',10);
$pdf->Cell(130,6,'Kartu izin tinggal tetap',0,0,'L');
}	
$pdf->ln(20);

$pdf->Cell(120,4,'',0,0,'C');
$pdf->Cell(200,4,'Gari, '.date("d-M-Y"),0,1,'C');
$pdf->ln(10);
$pdf->Cell(103,4,'Petugas',0,0,'C');
$pdf->Cell(230,4,'Pemohon',0,0,'C');
$pdf->ln(20);
$pdf->Cell(103,4,'(............................................................)',0,0,'C');
$pdf->SetFont('Times','B',10);
$pdf->Cell(230,4,'('.$row['NAMA_LGKP'].')',0,0,'C');

$pdf->Output();
$pdf->Output("peristiwa_kependudukan.pdf","D");

?>