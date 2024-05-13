<?php
session_start();
require "fpdf/fpdf.php";
require "connect.php";
require "assets/fwilayah.php";

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 215-(10*2)=195mm

$pdf = new FPDF('L','mm',array(310,330));

$pdf->AddPage();
$pdf->SetFont('Times','B',12);
//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(280 ,6,'',0,0,'C');
$pdf->Cell(25 ,6,' F-1.03 ',1,1,'C');
$pdf->ln(5);
$pdf->SetFont('Times','B',12);
$pdf->Cell(310,13,"FORMULIR PENDAFTARAN PERPINDAHAN PENDUDUK",1,1,"C");
$pdf->ln(3);
$pdf->SetFont("Times","",10);
$fs=4;
$pdf->SetFont("Times","B",10);
$pdf->Cell(185,$fs,"Perhatian:",0,0,"L");
$pdf->ln(3);
$pdf->Cell(100,$fs,"  Harap diisi dengan huruf cetak dan menggunakan tinta hitam",0,0,"L");
$pdf->ln(7);

$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"1. No KK",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(140,$fs,'a',1,0,"L");
$pdf->Cell(2,0,"","",1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(5);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"2. Nama Lengkap Pemohon",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(140,$fs,'a',1,0,"L");
$pdf->Cell(2,0,"","",1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(5);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"3. NIK",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(140,$fs,'a',1,0,"L");
$pdf->Cell(2,0,"","",1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(5);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"4. Jenis Permohonan",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(5,0,"");
$pdf->Cell(3,$fs,'',1,0,"L");
$pdf->SetFont("Times","B",8);
$pdf->Cell(2,3,"D. SURAT KETERANGAN KEPENDUDUKAN","",1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(2);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"",0,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,"",0,0,"L");
$pdf->Cell(9,0,"");
$pdf->Cell(5,$fs,'',1,0,"L");
$pdf->SetFont("Times","",8);
$pdf->Cell(2,3,"Surat Keterangan Pindah","",1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(2);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"",0,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,"",0,0,"L");
$pdf->Cell(9,0,"");
$pdf->Cell(5,$fs,'',1,0,"L");
$pdf->SetFont("Times","",8);
$pdf->Cell(2,3,"Surat Keterangan Pindah Luar Negeri (SKPLN)","",1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(2);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"",0,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,"",0,0,"L");
$pdf->Cell(9,0,"");
$pdf->Cell(5,$fs,'',1,0,"L");
$pdf->SetFont("Times","",8);
$pdf->Cell(2,3,"Surat Keterangan Pindah Tempat Tinggal (SKTT) Bagi Orang Asing Tinggal Terbatas",200,1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(5);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"5. Alamat Asal",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(140,$fs,'',1,0,"L");
$pdf->SetFont("Times","",8);
$pdf->Cell(10,$fs,"RT",0,0,"C");
$pdf->Cell(15,$fs,'',1,0,"L");
$pdf->Cell(10,$fs,"RW",0,0,"C");
$pdf->Cell(15,$fs,'',1,0,"L");
$pdf->Cell(2,$fs,"","",1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(2);
$pdf->SetFont("Times","",8);
$pdf->Cell(58,$fs,'',0,0,"L");
$pdf->Cell(20,$fs,"Desa/Kelurahan",0,0,"L");
$pdf->Cell(60,$fs,'',1,0,"C");
$pdf->Cell(5,$fs,'',0,0,"C");
$pdf->Cell(15,$fs,"Kecamatan",0,0,"L");
$pdf->Cell(60,$fs,'',1,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",8);
$pdf->Cell(58,$fs,'',0,0,"L");
$pdf->Cell(20,$fs,"Kabupaten/Kota",0,0,"L");
$pdf->Cell(60,$fs,'',1,0,"C");
$pdf->Cell(5,$fs,'',0,0,"C");
$pdf->Cell(15,$fs,"Provinsi",0,0,"L");
$pdf->Cell(60,$fs,'',1,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",8);
$pdf->Cell(58,$fs,'',0,0,"L");
$pdf->Cell(20,$fs,"Kode Pos",0,0,"L");
$pdf->Cell(20,$fs,'',1,0,"C");

$pdf->ln(6);
$pdf->SetFont("Times","",8);
$pdf->Cell(58,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(20,$fs,"Dalam satu desa/kelurahan atau yang disebut dengan nama lain",0,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",8);
$pdf->Cell(58,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(20,$fs,"Antar desa/kelurahan atau yang disebut dengan nama lain dalam satu kecamatan",0,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",8);
$pdf->Cell(58,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(20,$fs,"Antar kecamatan atau yang disebut dengan nama lain dalam satu Kabupaten/Kota",0,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",8);
$pdf->Cell(58,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(20,$fs,"Antar Kabupaten/Kota dalam satu provinsi",0,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",8);
$pdf->Cell(58,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(20,$fs,"Antar provinsi",0,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"6. Alamat Pindah",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(140,$fs,'',1,0,"L");
$pdf->SetFont("Times","",8);
$pdf->Cell(10,$fs,"RT",0,0,"C");
$pdf->Cell(15,$fs,'',1,0,"L");
$pdf->Cell(10,$fs,"RW",0,0,"C");
$pdf->Cell(15,$fs,'',1,0,"L");
$pdf->Cell(2,$fs,"","",1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(2);
$pdf->SetFont("Times","",8);
$pdf->Cell(58,$fs,'',0,0,"L");
$pdf->Cell(20,$fs,"Desa/Kelurahan",0,0,"L");
$pdf->Cell(60,$fs,'',1,0,"C");
$pdf->Cell(5,$fs,'',0,0,"C");
$pdf->Cell(15,$fs,"Kecamatan",0,0,"L");
$pdf->Cell(60,$fs,'',1,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",8);
$pdf->Cell(58,$fs,'',0,0,"L");
$pdf->Cell(20,$fs,"Kabupaten/Kota",0,0,"L");
$pdf->Cell(60,$fs,'',1,0,"C");
$pdf->Cell(5,$fs,'',0,0,"C");
$pdf->Cell(15,$fs,"Provinsi",0,0,"L");
$pdf->Cell(60,$fs,'',1,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",8);
$pdf->Cell(58,$fs,'',0,0,"L");
$pdf->Cell(20,$fs,"Kode Pos",0,0,"L");
$pdf->Cell(20,$fs,'',1,0,"C");

$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"7. Alasan Pindah",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->SetFont("Times","",8);
$pdf->Cell(1,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(20,$fs,"Pekerjaan",0,0,"L");
$pdf->Cell(20,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(15,$fs,"Keamanan",0,0,"L");
$pdf->Cell(20,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(15,$fs,"Perumahan",0,0,"L");
$pdf->Cell(20,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(15,$fs,"Lainnya",0,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",8);
$pdf->Cell(57,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(20,$fs,"Pendidikan",0,0,"L");
$pdf->Cell(20,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(15,$fs,"Kesehatan",0,0,"L");
$pdf->Cell(20,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(15,$fs,"Keluarga",0,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"8. Jenis Kepindahan",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->SetFont("Times","",8);
$pdf->Cell(1,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(20,$fs,"Kepala Keluarga",0,0,"L");
$pdf->Cell(40,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(15,$fs,"Kepala Keluarga dan sebagian anggota keluarga",0,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",8);
$pdf->Cell(57,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(20,$fs,"Kepala Keluarga dan semua anggota keluarga",0,0,"L");
$pdf->Cell(40,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(15,$fs,"anggota keluarga",0,0,"L");

$fq=5;
$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fq,"9. Anggota Keluarga Tidak Pindah",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->SetFont("Times","",8);
$pdf->Cell(1,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(20,$fs,"Numpang KK",0,0,"L");
$pdf->Cell(40,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(15,$fs,"Membuat KK Baru",0,0,"L");

$fq=5;
$pdf->ln(8);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fq,"10. Anggota Keluarga yang Pindah",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->SetFont("Times","",8);
$pdf->Cell(1,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(20,$fs,"Numpang KK",0,0,"L");
$pdf->Cell(40,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(15,$fs,"Membuat KK Baru",0,0,"L");

$pdf->ln(8);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(80,$fq,"11. Daftar anggota keluarga yang pindah",1,0,"L");
$pdf->Cell(2,0,"");

$pdf->ln(8);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(13,$fq,"NO",1,0,"C");
$pdf->Cell(2,0,"","");
$pdf->Cell(111,$fq,"NIK",1,0,"C");
$pdf->Cell(2,0,"","");
$pdf->Cell(160,$fq,"NAMA LENGKAP )*",1,0,"C");
$pdf->Cell(2,0,"","");
$pdf->Cell(13,$fq,"SHDK",1,0,"C");

$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(160,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");

$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
//=================================
$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(160,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");

$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
//=================================
$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(160,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");

$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
//=================================
$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(160,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");

$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
//=================================
$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(160,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");

$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
//=================================
$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(160,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");

$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
//=================================
$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(160,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");

$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
//=================================
$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(160,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");

$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
//=================================
$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(160,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");

$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
//=================================
$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");

$pdf->Cell(2,0,"","");
$pdf->Cell(160,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");

$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
$pdf->Cell(1,0,"","");
$pdf->Cell(6,$fq,"",1,0,"C");
//=================================

$pdf->AddPage('L');
$pdf->SetFont("Times","B",10);
$pdf->Cell(2,3,"Diisi oleh penduduk (Orang Asing) pemegang ITAS yang Mengajukan SKTT dan OA Pemegang ITAP yang Mengajukan Surat Keterangan Kependudukan Lainnya",200,1);

$pdf->ln(3);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"12. Nama Sponsor",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(1,0,"");
$pdf->Cell(140,$fs,'',1,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"13. Tipe Sponsor",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->SetFont("Times","",8);
$pdf->Cell(1,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(20,$fs,"Organisasi Internasional",0,0,"L");
$pdf->Cell(40,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(15,$fs,"Pemerintah",0,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",8);
$pdf->Cell(57,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(20,$fs,"Perorangan",0,0,"L");
$pdf->Cell(40,$fs,'',0,0,"L");
$pdf->Cell(5,$fs,'',1,0,"C");
$pdf->Cell(15,$fs,"Tanpa Sponsor",0,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"14. Alamat Sponsor",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(1,0,"");
$pdf->Cell(140,$fs,'',1,0,"L");
$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"",0,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,"",0,0,"L");
$pdf->Cell(1,0,"");
$pdf->Cell(140,$fs,'',1,0,"L");
$fq=8;
$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(60,$fq,"15. Nomor & Tanggal KITAS & KITAP",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(1,0,"");
$pdf->Cell(50,$fq,'',1,0,"L");
$pdf->Cell(10,0,"");
$pdf->Cell(50,$fq,'',1,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(90,0,"","");
$pdf->Cell(5,$fq,"Nomor",0,0,"L");
$pdf->Cell(40,0,"","");
$pdf->Cell(3,$fq,"Tanggal Masa Berlaku",0,0,"L");

$pdf->ln(15);
$pdf->SetFont("Times","B",10);
$pdf->Cell(2,3,"Diisi Oleh Penduduk Yang Mengajukan Surat Keterangan Pindah Luar Negeri",200,1);
$pdf->ln(3);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"16. Negara Tujuan",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(1,0,"");
$pdf->Cell(140,$fs,'',1,0,"L");
$pdf->Cell(30,0,"");
$pdf->Cell(20,$fs,'',1,0,"L");
$pdf->ln(3);
$pdf->Cell(227,0,"","");
$pdf->Cell(3,$fq,"Kode Negara",0,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"17. Alamat Tujuan",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(1,0,"");
$pdf->Cell(140,$fs,'',1,0,"L");
$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"",0,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,"",0,0,"L");
$pdf->Cell(1,0,"");
$pdf->Cell(140,$fs,'',1,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"17. Penanggung Jawab",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(1,0,"");
$pdf->Cell(140,$fs,'',1,0,"L");

$pdf->ln(6);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"18. Rencana Pindah Tanggal",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(7,$fs,"Tgl",0,0,"L");
$pdf->Cell(1,0,"");
$pdf->Cell(20,$fs,'',1,0,"L");

$pdf->Cell(7,0,"");
$pdf->Cell(7,$fs,"Bln",0,0,"L");
$pdf->Cell(1,0,"");
$pdf->Cell(20,$fs,'',1,0,"L");

$pdf->Cell(7,0,"");
$pdf->Cell(7,$fs,"Thn",0,0,"L");
$pdf->Cell(1,0,"");
$pdf->Cell(20,$fs,'',1,0,"L");





$pdf->Output();

?>