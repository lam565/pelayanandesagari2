<?php
session_start();
require "fpdf/fpdf.php";
require "connect.php";

$pdf = new FPDF('P','mm',array(215,330));
$pdf->AddPage();

$pdf->ln(5);
$pdf->SetFont('Times','BU',12);
$pdf->Cell(195,6,'SURAT PERNYATAAN PERUBAHAN ELEMEN DATA KEPENDUDUKAN',0,1,'C');
$pdf->SetFont('Times','',11);
$pdf->Cell(50,5,'',0,0,'C');

$pdf->ln(6);
$text="Yang bertanda tangan di bawah ini:";
$pdf->Cell(2,5,'',0,0,'L');
$pdf->MultiCell(160,5,$text);
$pdf->ln(3);

$query = mysqli_query($connect, "SELECT * FROM biodata_wni, data_keluarga 
						WHERE biodata_wni.NO_KK=data_keluarga.NO_KK 
						AND biodata_wni.NIK='$_GET[nik]' AND biodata_wni.NO_KK='$_GET[no_kk]'");
$row = mysqli_fetch_array($query);

$pdf->Cell(5,5,'',0,0,'C');
$pdf->Cell(5,5,'Nama Lengkap ',0,0,'L');
$pdf->Cell(100,5,' : ',0,0,'C');
$pdf->Cell(1,5,$row['NAMA_LGKP'],0,1,'C');
$pdf->Cell(5,5,'',0,0,'C');
$pdf->Cell(5,5,'NIK ',0,0,'L');
$pdf->Cell(100,5,' : ',0,0,'C');
$pdf->Cell(1,5,$row['NIK'],0,1,'L');
$pdf->Cell(5,5,'',0,0,'C');
$pdf->Cell(5,5,'Nomor KK ',0,0,'L');
$pdf->Cell(100,5,' : ',0,0,'C');
$pdf->Cell(1,5,$row['NO_KK'],0,1,'L');
$pdf->Cell(5,5,'',0,0,'C');
$pdf->Cell(5,5,'Alamat Rumah ',0,0,'L');
$pdf->Cell(100,5,' : ',0,0,'C');
$pdf->Cell(1,5,$row['DUSUN'],0,1,'L');
$pdf->Cell(5,5,'',0,0,'C');
$pdf->ln(3);
$text="dengan rincian KK sebagai berikut:";
$pdf->Cell(2,5,'',0,0,'L');
$pdf->MultiCell(160,5,$text);
$pdf->ln(3);

$pdf->SetFont('Times','',10);
$pdf->Cell(15,6,'No',1,0,'C');
$pdf->Cell(55,6,'Nama',1,0,'C');
$pdf->Cell(45,6,'NIK',1,0,'C');
$pdf->Cell(40,6,'SHDK',1,0,'C');
$pdf->Cell(45,6,'Keterangan',1,0,'C');
$u=0;
$pr=mysqli_query($connect, "SELECT * FROM biodata_wni, data_keluarga, status_hubungan 
						WHERE biodata_wni.NO_KK=data_keluarga.NO_KK  and biodata_wni.STAT_HBKEL=status_hubungan.STAT_HBKEL
						AND biodata_wni.NO_KK='$_GET[no_kk]' ORDER BY biodata_wni.STAT_HBKEL ASC");
while($y=mysqli_fetch_array($pr)){
$pdf->ln(6);
$u++;
$pdf->Cell(15,6,$u,1,0,'C');
$pdf->Cell(55,6,$y['NAMA_LGKP'],1,0,'C');
$pdf->Cell(45,6,$y['NIK'],1,0,'C');
$pdf->Cell(40,6,$y['status_hubungan'],1,0,'C');
$pdf->Cell(45,6,'',1,0,'C');
}

$pdf->ln(8);
$text="Menyatakan bahwa elemen data kependudukan saya dan anggota keluarga saya telah berubah, dengan rincian:";
$pdf->Cell(2,5,'',0,0,'L');
$pdf->MultiCell(160,5,$text);
$pdf->ln(2);
$text="A. Pendidikan dan Pekerjaan:";
$pdf->Cell(2,5,'',0,0,'L');
$pdf->MultiCell(160,5,$text);

$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(45,6,'Pendidikan Terakhir (Semula)',1,0,'C');
$pdf->Cell(45,6,'Pendidikan Terakhir (Menjadi)',1,0,'C');
$pdf->Cell(25,6,'Dasar Perubahan',1,0,'C');
$pdf->Cell(30,6,'Pekerjaan (Semula)',1,0,'C');
$pdf->Cell(30,6,'Pekerjaan (Menjadi)',1,0,'C');
$pdf->Cell(25,6,'Dasar Perubahan',1,0,'C');
$pdf->ln(8);

$text="B. Agama dan Perubahan Lainnya:";
$pdf->Cell(2,5,'',0,0,'L');
$pdf->MultiCell(160,5,$text);

$pdf->SetFont('Times','',10);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(40,6,'Agama (Semula)',1,0,'C');
$pdf->Cell(40,6,'Agama (Menjadi)',1,0,'C');
$pdf->Cell(26,6,'Dasar Perubahan',1,0,'C');
$pdf->Cell(30,6,'Lainnya (Semula)',1,0,'C');
$pdf->Cell(30,6,'Lainnya (Menjadi)',1,0,'C');
$pdf->Cell(26,6,'Dasar Perubahan',1,0,'C');
$pdf->ln(8);
$text="Terlampir disampaikan fotokopi berkas-berkas yang terikat dengan perubahan elemen data tersebut.";
$pdf->Cell(2,5,'',0,0,'L');
$pdf->MultiCell(160,5,$text);
$pdf->Cell(5,5,'',0,0,'C');
$pdf->Cell(5,5,'Demikian surat pernyataan ini saya buat dengan sebenarnya, apabila dalam keterangan yang saya berikan terdapat hal-hal yang tidak',0,0,'L');
$pdf->ln(5);
$pdf->Cell(10,5,'berdasarkan keadaan yang sebenarnya, saya bersedia dikenakan sanksi sesuai ketentuan perundang undangan yang berlaku.',0,0,'L');
$pdf->ln(20);

$pdf->Cell(120,4,'',0,0,'C');
$pdf->Cell(70,4,'Gari, '.date("d-M-Y"),0,1,'C');
$pdf->ln(3);
$pdf->Cell(103,4,'',0,0,'C');
$pdf->Cell(103,4,'Yang membuat pernyataan',0,0,'C');
$pdf->ln(25);
$pdf->Cell(103,4,'',0,0,'C');
$pdf->Cell(103,4,'(............................................................)',0,0,'C');
$pdf->ln(5);
$text="Keterangan :";
$pdf->Cell(2,5,'',0,0,'L');
$pdf->MultiCell(160,5,$text);
$text="Perubahan lainnya ini, juga dapat digunakan untuk merubah data kependudukan yang diakibatkan adanya kesalahan pada waktu pengisian formulir biodata maupun kesalahan pada saat entry-an biodata penduduk dimaksud  ";
$pdf->Cell(2,5,'',0,0,'L');
$pdf->MultiCell(150,5,$text);

$pdf->Output();

?>