<?php
session_start();
require "fpdf/fpdf.php";
require "connect.php";

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm',array(219,330));
$pdf->AddPage();

//set font to Times, bold, 12pt
	$pdf->SetFont('Times','B',12);
//Cell(width , height , text , border , end line , [align] )
	$pdf->Cell(164 ,6,'',0,0,'C');
	$pdf->Cell(25 ,6,' F-1.16 ',1,1,'C');
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(15 ,8,'',0,0,'C');
	$pdf->Cell(159 ,8,' FORMULIR PERMOHONAN PERUBAHAN KARTU KELUARGA (KK) WARGA NEGARA INDONESIA ',0,0,'C');
	$pdf->Cell(15 ,8,'',0,1,'C');
	$pdf->SetFont('Times','B',7);
	$pdf->Cell(15 ,3,'Perhatian:','LT',0,'C');
	$pdf->Cell(174 ,3,'','TR',1,'C');
	$pdf->SetFont('Times','',7);
	$pdf->Cell(189 ,3,'1. Harap diisi dengan huruf cetak dan menggunakan tinta hitam','LR',1,'L');
	$pdf->Cell(189 ,3,'2. Setelah formulir ini diisi dan ditandatangani, harap diserahkan kembali ke kantor Desa/Kelurahan','LBR',1,'L');
	$pdf->ln(3);
	$pdf->SetFont('Times','B',8);
	$pdf->Cell(60 ,4,'PEMERINTAH PROPINSI',0,0,'L');
	$pdf->SetFont('Times','',8);
	$pdf->Cell(5 ,4,' : ',0,0,'C');
	$pdf->Cell(5 ,4,' 3 ',1,0,'C');
	$pdf->Cell(5 ,4,' 4 ',1,0,'C');
	$pdf->Cell(15 ,4,'  ',0,0,'C');
	$pdf->Cell(80 ,4,' Daerah Istimewa Yogyakarta',1,0,'L');
	$pdf->Cell(19 ,4,'',0,1,'C');
	$pdf->SetFont('Times','B',8);
	$pdf->Cell(60 ,4,'PEMERINTAH KABUPATEN/KOTA',0,0,'L');
	$pdf->SetFont('Times','',8);
	$pdf->Cell(5 ,4,' : ',0,0,'C');
	$pdf->Cell(5 ,4,' 0 ',1,0,'C');
	$pdf->Cell(5 ,4,' 3 ',1,0,'C');
	$pdf->Cell(15 ,4,'  ',0,0,'C');
	$pdf->Cell(80 ,4,' Gunung Kidul',1,0,'L');
	$pdf->Cell(19 ,4,'',0,1,'C');
	$pdf->SetFont('Times','B',8);
	$pdf->Cell(60 ,4,'KECAMATAN',0,0,'L');
	$pdf->SetFont('Times','',8);
	$pdf->Cell(5 ,4,' : ',0,0,'C');
	$pdf->Cell(5 ,4,'  ',1,0,'C');
	$pdf->Cell(5 ,4,'  ',1,0,'C');
	$pdf->Cell(15 ,4,'  ',0,0,'C');
	$pdf->Cell(80 ,4,' ',1,0,'L');
	$pdf->Cell(19 ,4,'',0,1,'C');

	$pdf->SetFont('Times','B',8);
	$pdf->Cell(60 ,4,'KELURAHAN/DESA',0,0,'L');
	$pdf->SetFont('Times','',8);
	$pdf->Cell(5 ,4,' : ',0,0,'C');
	$pdf->Cell(5 ,4,'  ',1,0,'C');
	$pdf->Cell(5 ,4,'  ',1,0,'C');
	$pdf->Cell(5 ,4,'  ',1,0,'C');
	$pdf->Cell(5 ,4,'  ',1,0,'C');
	$pdf->Cell(5 ,4,'  ',0,0,'C');
	$pdf->Cell(80 ,4,' ',1,0,'L');
	$pdf->Cell(19 ,4,'',0,1,'C');
	$pdf->ln(2);

	

	$pdf->Cell(28 ,4,'Nama Lengkap Pemohon',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	for ($ul=1;$ul<=31;$ul++){
		$ul==31 ? $pdf->Cell(5 ,4,'',1,1,'L'):$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->ln(1);

	$pdf->Cell(28 ,4,'NIK Pemohon',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	for ($ul=1;$ul<=16;$ul++){
		$ul==16 ? $pdf->Cell(5 ,4,'',1,1,'L'):$pdf->Cell(5 ,4,'',1,0,'L');
	}
	
	$pdf->ln(1);
	$pdf->Cell(28 ,4,'Nama Kepala Keluarga',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	for ($ul=1;$ul<=31;$ul++){
		$ul==31 ? $pdf->Cell(5 ,4,'',1,1,'L'):$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->ln(1);

	$pdf->Cell(28 ,4,'No. KK',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	for ($ul=1;$ul<=16;$ul++){
		$ul==16 ? $pdf->Cell(5 ,4,'',1,1,'L'):$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->ln(1);
	$pdf->Cell(28 ,4,'Alamat',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	
	$pdf->Cell(105 ,4,'',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'RT ',0,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	for ($ul=1;$ul<=3;$ul++){
		$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->Cell(1 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'RW',0,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	for ($ul=1;$ul<=3;$ul++){
		$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->ln(5);
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'a. Desa/kelurahan ',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'',0,0,'L');
	$pdf->Cell( 60,4,'',1,0,'L');
	$pdf->Cell(3 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'b. Kecamatan ',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'',0,0,'L');
	$pdf->Cell( 60,4,'',1,0,'L');
	$pdf->ln(5);
	
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'c. Kabupaten/Kota ',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'',0,0,'L');
	$pdf->Cell( 60,4,'',1,0,'L');
	$pdf->Cell(3 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'d. Propinsi ',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'',0,0,'L');
	$pdf->Cell( 60,4,'',1,0,'L');
	$pdf->ln(5);
	
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'Kode Pos',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'',0,0,'L');
	for ($ul=1;$ul<=5;$ul++){
		$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->Cell(38 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'Telepon ',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'',0,0,'L');
	for ($ul=1;$ul<=9;$ul++){
		$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->ln(5);
	
	$pdf->ln(1);
	$pdf->Cell(35 ,4,'Nama Kepala Keluarga Lama',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	for ($ul=1;$ul<=30;$ul++){
		$ul==30 ? $pdf->Cell(5 ,4,'',1,1,'L'):$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->ln(1);
	
	$pdf->Cell(35 ,4,'No. KK Lama',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	for ($ul=1;$ul<=15;$ul++){
		$ul==15 ? $pdf->Cell(5 ,4,'',1,1,'L'):$pdf->Cell(5 ,4,'',1,0,'L');
	}
	
	$pdf->ln(1);
	$pdf->Cell(35 ,4,'Alamat Keluarga Lama',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	
	$pdf->Cell(100 ,4,'',1,0,'L');
	$pdf->ln(3);
	$pdf->ln(3);
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'a. Desa/kelurahan ',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'',0,0,'L');
	$pdf->Cell( 60,4,'',1,0,'L');
	$pdf->Cell(3 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'b. Kecamatan ',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'',0,0,'L');
	$pdf->Cell( 60,4,'',1,0,'L');
	$pdf->ln(5);
	
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'c. Kabupaten/Kota ',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'',0,0,'L');
	$pdf->Cell( 60,4,'',1,0,'L');
	$pdf->Cell(3 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'d. Propinsi ',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'',0,0,'L');
	$pdf->Cell( 60,4,'',1,0,'L');
	$pdf->ln(5);
	
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'Kode Pos',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'',0,0,'L');
	for ($ul=1;$ul<=5;$ul++){
		$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->Cell(38 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'Telepon ',0,0,'L');
	$pdf->Cell(8 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'',0,0,'L');
	for ($ul=1;$ul<=9;$ul++){
		$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->ln(5);
	
	$pdf->ln(1);
	$pdf->Cell(35 ,4,'Alasan Permohonan',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->SetFont('Times','',6);

	$pdf->Cell(0,0,'1.Karena Penambahan Anggota Keluarga (Kelahiran, Kedatangan)   3.Lainnya',0,0,'L');
	$pdf->ln(5);
	$pdf->SetFont('Times','',8);
	$pdf->Cell(42 ,4,'Jumlah Anggota Keluarga',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->ln(9);
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(159 ,8,' DAFTAR ANGGOTA KELUARGA PEMOHON ( hanya diisi anggota keluarga saja ) ',0,0,'L');
	$pdf->ln(9);
	
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell( 10,4,'NO',1,0,'C');
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell( 80,4,'NIK',1,0,'C');
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell( 87,4,'NAMA LENGKAP',1,0,'C');
	$pdf->ln(5);
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	for ($ul=1;$ul<=16;$ul++){
		$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell( 87,4,'',1,0,'C');
	$pdf->ln(5);
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	for ($ul=1;$ul<=16;$ul++){
		$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell( 87,4,'',1,0,'C');
	$pdf->ln(5);
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	for ($ul=1;$ul<=16;$ul++){
		$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell( 87,4,'',1,0,'C');
	$pdf->ln(5);
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	for ($ul=1;$ul<=16;$ul++){
		$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell( 87,4,'',1,0,'C');
	$pdf->ln(5);
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	for ($ul=1;$ul<=16;$ul++){
		$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell( 87,4,'',1,0,'C');
	$pdf->ln(5);
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	for ($ul=1;$ul<=16;$ul++){
		$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell( 87,4,'',1,0,'C');
	$pdf->ln(5);
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	for ($ul=1;$ul<=16;$ul++){
		$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell( 87,4,'',1,0,'C');
	$pdf->ln(5);
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell( 5,4,'',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	for ($ul=1;$ul<=16;$ul++){
		$pdf->Cell(5 ,4,'',1,0,'L');
	}
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell( 87,4,'',1,0,'C');
	$pdf->ln(10);
	
	$pdf->SetFont('Times','',8);
	$pdf->Cell(1,0,'          Kepala Dinas Kependudukan dan                              Mengetahui                                                                                               ...........,..................................20.......',0,1,'L');
	$pdf->ln(2);
	$pdf->Cell(3,6,'',0,0,'C');
	$pdf->Cell(-10,6,'Pencatatan Sipil Kabupaten Gunungkidul',0,0,'L');
	$pdf->Cell(59,6,'',0,0,'C');
	$pdf->Cell(55,6,'Camat...............................................',0,0,'L');
	$pdf->Cell(-12,6,'',0,0,'C');
	$pdf->Cell(5,6,'Kepala Desa/Lurah...........................................                      Pemohon',0,1,'L');
	$pdf->ln(15);
	$pdf->Cell(4,6,'',0,0,'C');
	$pdf->Cell(5,6,'     ____________________________       ____________________________            ____________________________             ____________________________',0,0,'L');
	$pdf->Cell(5,6,'',0,1,'L');
	$pdf->Cell(4,6,'',0,0,'C');
	$pdf->Cell(5,6,'      NIP.                                                      NIP.                                                              NIP.                                                            NIP.',0,0,'L');
	$pdf->ln(2);


//next page atau page 2

$pdf->AddPage('L');

$pdf->Image('logo.jpg',100,10,15,15);
$pdf->SetFont('Times','B',12);
$pdf->ln(2);
$pdf->Cell(310,6,'PEMERINTAH KABUPATEN GUNUNG KIDUL',0,1,'C');
$pdf->Cell(310,6,'KECAMATAN WONOSARI',0,1,'C');
$pdf->ln(4);
$pdf->SetFont('Times','B',8);
$pdf->Cell(160,4,'DATA KEPALA KELUARGA',0,0,'L');
$pdf->SetFont('Times','',8);
$pdf->Cell(45,4,'Kode-Nama Propinsi',0,0,'L');
$pdf->Cell(5,4,':',0,0,'C');
$pdf->Cell(9,4,'34',1,0,'L');
$pdf->Cell(1,4,'',0,0,'L');
$pdf->Cell(60,4,'Daerah Istimewa Yogyakarta',1,1,'L');
$pdf->ln(1);

$pdf->Cell(30,4,'Nama Kepala Keluarga',0,0,'L');
$pdf->Cell(5,4,' : ',0,0,'C');
$pdf->Cell(85,4,'WIDODO',1,0,'L');
$pdf->Cell(40,4,'',0,0,'C');
$pdf->Cell(45,4,'Kode-Nama Kabupaten',0,0,'L');
$pdf->Cell(5,4,':',0,0,'C');
$pdf->Cell(9,4,'03',1,0,'L');
$pdf->Cell(1,4,'',0,0,'L');
$pdf->Cell(60,4,'GUNUNG KIDUL',1,1,'L');
$pdf->ln(1);

$pdf->Cell(30,4,'Alamat',0,0,'L');
$pdf->Cell(5,4,' : ',0,0,'C');
$pdf->Cell(85,4,'NGELOREJO',1,0,'L');
$pdf->Cell(40,4,'',0,0,'C');
$pdf->Cell(45,4,'Kode-Nama Kecamatan',0,0,'L');
$pdf->Cell(5,4,':',0,0,'C');
$pdf->Cell(9,4,'01',1,0,'L');
$pdf->Cell(1,4,'',0,0,'L');
$pdf->Cell(60,4,'WONOSARI',1,1,'L');
$pdf->ln(1);

$pdf->Cell(30,4,'Kode Pos',0,0,'L');
$pdf->Cell(5,4,' : ',0,0,'C');
$pdf->Cell(10,4,'55851',1,0,'L');
$pdf->Cell(7,4,'RT',0,0,'L');
$pdf->Cell(8,4,'004',1,0,'L');
$pdf->Cell(7,4,'RW',0,0,'L');
$pdf->Cell(8,4,'018',1,0,'L');
$pdf->Cell(33,4,'Jumlah Anggota Keluarga',0,0,'L');
$pdf->Cell(5,4,'5',1,0,'L');
$pdf->Cell(7,4,'Orang',0,0,'L');
$pdf->Cell(40,4,'',0,0,'C');
$pdf->Cell(45,4,'Kode-Nama Desa/Kelurahan',0,0,'L');
$pdf->Cell(5,4,':',0,0,'C');
$pdf->Cell(9,4,'2004',1,0,'L');
$pdf->Cell(1,4,'',0,0,'L');
$pdf->Cell(60,4,'GARI',1,1,'L');
$pdf->ln(1);

$pdf->Cell(30,4,'Telepon',0,0,'L');
$pdf->Cell(5,4,' : ',0,0,'C');
$pdf->Cell(85,4,'',1,0,'L');
$pdf->Cell(40,4,'',0,0,'C');
$pdf->Cell(45,4,'Kode-Nama Dusun/Dukuh/Kampung',0,0,'L');
$pdf->Cell(5,4,':',0,0,'C');
$pdf->Cell(70,4,'NGELOREJO',1,1,'L');
$pdf->ln(2);

$pdf->SetFont('Times','B',8);
$pdf->Cell(155,4,'DATA KELUARGA',0,0,'L');
$pdf->Cell(155,4,'No. KK = 3403010911070911',0,1,'R');

//Header
$pdf->SetFont('Times','b',6);
$pdf->Cell(25,4,'NO',1,0,'C');
$pdf->Cell(50,4,'NAMA LENGKAP',1,0,'C');
$pdf->Cell(50,4,'NIK',1,0,'C');
$pdf->Cell(70,4,'ALAMAT SEBELUMNYA',1,0,'C');
$pdf->Cell(50,4,'NOMOR PASPOR',1,0,'C');
$pdf->Cell(65,4,'TANGGAL TERAKHIR PASPOR',1,1,'C');
//ISI TABEL
$pdf->SetFont('Times','',6);
for ($i=1; $i <=10 ; $i++) { 
	$pdf->Cell(25,3,$i,1,0,'C');
	$pdf->Cell(50,3,'',1,0,'C');
	$pdf->Cell(50,3,'',1,0,'C');
	$pdf->Cell(70,3,'',1,0,'C');
	$pdf->Cell(50,3,'',1,0,'C');
	$pdf->Cell(65,3,'',1,1,'C');
}
$pdf->ln(1);
$pdf->SetFont('Times','B',6);
$pdf->Cell(5,3,'','LTR',0,'C'); //no
$pdf->Cell(20,3,'','LTR',0,'C'); //jenis kelamin
$pdf->Cell(25,3,'','LTR',0,'C'); // tmp lahir
$pdf->Cell(25,3,'','LTR',0,'C'); // tgl lahir
$pdf->Cell(10,3,'','LTR',0,'C'); // umur
$pdf->Cell(15,3,'AKTA','LTR',0,'C'); // akta lahir
$pdf->Cell(25,3,'','LTR',0,'C'); //no akta lahir
$pdf->Cell(10,3,'','LTR',0,'C'); //gol darah
$pdf->Cell(15,3,'','LTR',0,'C'); // Agama
$pdf->Cell(18,3,'','LTR',0,'C'); // status perkawinan
$pdf->Cell(25,3,'','LTR',0,'C'); // akta perkawinan
$pdf->Cell(25,3,'','LTR',0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'','LTR',0,'C'); // tgl kawin
$pdf->Cell(30,3,'','LTR',0,'C'); // akta cerai
$pdf->Cell(25,3,'','LTR',0,'C'); // no akta cerai
$pdf->Cell(17,3,'','LTR',1,'C'); // tgl cerai
//
$pdf->Cell(5,3,'','LR',0,'C'); //no
$pdf->Cell(20,3,'','LR',0,'C'); //jenis kelamin
$pdf->Cell(25,3,'','LR',0,'C'); // tmp lahir
$pdf->Cell(25,3,'TANGGAL/BULAN','LR',0,'C'); // tgl lahir
$pdf->Cell(10,3,'','LR',0,'C'); // umur
$pdf->Cell(15,3,'LAHIR/','LR',0,'C'); // akta lahir
$pdf->Cell(25,3,'NOMOR AKTA','LR',0,'C'); //no akta lahir
$pdf->Cell(10,3,'','LR',0,'C'); //gol darah
$pdf->Cell(15,3,'','LR',0,'C'); // Agama
$pdf->Cell(18,3,'','LR',0,'C'); // status perkawinan
$pdf->Cell(25,3,'AKTA','LR',0,'C'); // akta perkawinan
$pdf->Cell(25,3,'NOMOR AKTA','LR',0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'','LR',0,'C'); // tgl kawin
$pdf->Cell(30,3,'','LR',0,'C'); // akta cerai
$pdf->Cell(25,3,'NOMOR/AKTA','LR',0,'C'); // no akta cerai
$pdf->Cell(17,3,'','LR',1,'C'); // tgl cerai
//
$pdf->Cell(5,3,'NO','LR',0,'C'); //no
$pdf->Cell(20,3,'JENIS','LR',0,'C'); //jenis kelamin
$pdf->Cell(25,3,'TEMPAT LAHIR','LR',0,'C'); // tmp lahir
$pdf->Cell(25,3,'/TAHUN','LR',0,'C'); // tgl lahir
$pdf->Cell(10,3,'UMUR','LR',0,'C'); // umur
$pdf->Cell(15,3,'SURAT','LR',0,'C'); // akta lahir
$pdf->Cell(25,3,'KELAHIRAN/','LR',0,'C'); //no akta lahir
$pdf->Cell(10,3,'GOL','LR',0,'C'); //gol darah
$pdf->Cell(15,3,'AGAMA','LR',0,'C'); // Agama
$pdf->Cell(18,3,'STATUS','LR',0,'C'); // status perkawinan
$pdf->Cell(25,3,'PERKAWINAN','LR',0,'C'); // akta perkawinan
$pdf->Cell(25,3,'PERKAWINAN/','LR',0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'TANGGAL','LR',0,'C'); // tgl kawin
$pdf->Cell(30,3,'AKTA CERAI/SURAT','LR',0,'C'); // akta cerai
$pdf->Cell(25,3,'PERCERAIAN','LR',0,'C'); // no akta cerai
$pdf->Cell(17,3,'TANGGAL','LR',1,'C'); // tgl cerai
//
$pdf->Cell(5,3,'','LR',0,'C'); //no
$pdf->Cell(20,3,'KELAMIN','LR',0,'C'); //jenis kelamin
$pdf->Cell(25,3,'','LR',0,'C'); // tmp lahir
$pdf->Cell(25,3,'LAHIR','LR',0,'C'); // tgl lahir
$pdf->Cell(10,3,'','LR',0,'C'); // umur
$pdf->Cell(15,3,'LAHIR','LR',0,'C'); // akta lahir
$pdf->Cell(25,3,'SURAT KELAHIRAN','LR',0,'C'); //no akta lahir
$pdf->Cell(10,3,'DARAH','LR',0,'C'); //gol darah
$pdf->Cell(15,3,'','LR',0,'C'); // Agama
$pdf->Cell(18,3,'PERKAWINAN','LR',0,'C'); // status perkawinan
$pdf->Cell(25,3,'BUKU NIKAH*)','LR',0,'C'); // akta perkawinan
$pdf->Cell(25,3,'BUKU NIKAH','LR',0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'PERKAWINAN','LR',0,'C'); // tgl kawin
$pdf->Cell(30,3,'CERAI','LR',0,'C'); // akta cerai
$pdf->Cell(25,3,'SURAT CERAI*)','LR',0,'C'); // no akta cerai
$pdf->Cell(17,3,'PERCERAIAN*)','LR',1,'C'); // tgl cerai
$pdf->Cell(5,3,'','LBR',0,'C'); //no
$pdf->Cell(20,3,'','LBR',0,'C'); //jenis kelamin
$pdf->Cell(25,3,'','LBR',0,'C'); // tmp lahir
$pdf->Cell(25,3,'','LBR',0,'C'); // tgl lahir
$pdf->Cell(10,3,'','LBR',0,'C'); // umur
$pdf->Cell(15,3,'','LBR',0,'C'); // akta lahir
$pdf->Cell(25,3,'','LBR',0,'C'); //no akta lahir
$pdf->Cell(10,3,'','LBR',0,'C'); //gol darah
$pdf->Cell(15,3,'','LBR',0,'C'); // Agama
$pdf->Cell(18,3,'','LBR',0,'C'); // status perkawinan
$pdf->Cell(25,3,'','LBR',0,'C'); // akta perkawinan
$pdf->Cell(25,3,'','LBR',0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'','LBR',0,'C'); // tgl kawin
$pdf->Cell(30,3,'','LBR',0,'C'); // akta cerai
$pdf->Cell(25,3,'','LBR',0,'C'); // no akta cerai
$pdf->Cell(17,3,'','LBR',1,'C'); // tgl cerai
//DATA
$pdf->SetFont('Times','',6);
for ($i=1;$i<=10;$i++){
	$pdf->Cell(5,3,$i,1,0,'C'); //no
	$pdf->Cell(20,3,'',1,0,'C'); //jenis kelamin
	$pdf->Cell(25,3,'',1,0,'C'); // tmp lahir
	$pdf->Cell(25,3,'',1,0,'C'); // tgl lahir
	$pdf->Cell(10,3,'',1,0,'C'); // umur
	$pdf->Cell(15,3,'',1,0,'C'); // akta lahir
	$pdf->Cell(25,3,'',1,0,'C'); //no akta lahir
	$pdf->Cell(10,3,'',1,0,'C'); //gol darah
	$pdf->Cell(15,3,'',1,0,'C'); // Agama
	$pdf->Cell(18,3,'',1,0,'C'); // status perkawinan
	$pdf->Cell(25,3,'',1,0,'C'); // akta perkawinan
	$pdf->Cell(25,3,'',1,0,'C'); // no akta perkawinan
	$pdf->Cell(20,3,'',1,0,'C'); // tgl kawin
	$pdf->Cell(30,3,'',1,0,'C'); // akta cerai
	$pdf->Cell(25,3,'',1,0,'C'); // no akta cerai
	$pdf->Cell(17,3,'',1,1,'C'); // tgl cerai
}
$pdf->ln(1);

//
$pdf->SetFont('Times','B',6);
$pdf->Cell(10,3,'','LTR',0,'C'); // no
$pdf->Cell(30,3,'STATUS HUB','LTR',0,'C'); // status hub
$pdf->Cell(30,3,'KELAINAN','LTR',0,'C'); // kelainan
$pdf->Cell(30,3,'PENYANDANG','LTR',0,'C'); // penyandang cacat
$pdf->Cell(20,3,'PENDIDIKAN','LTR',0,'C'); // pendidikan
$pdf->Cell(40,3,'','LTR',0,'C'); // pekerjaan
$pdf->Cell(35,3,'','LTR',0,'C'); // NIK ibu
$pdf->Cell(40,3,'','LTR',0,'C'); // Nama Ibu
$pdf->Cell(35,3,'','LTR',0,'C'); // NIK Ayah
$pdf->Cell(40,3,'','LTR',1,'C'); // Nama Ayah
$pdf->Cell(10,3,'NO','LBR',0,'C'); // no
$pdf->Cell(30,3,'DALAM KELUARGA','LBR',0,'C'); // status hub
$pdf->Cell(30,3,'FISIK & MENTAL','LBR',0,'C'); // kelainan
$pdf->Cell(30,3,'CACAT','LBR',0,'C'); // penyandang cacat
$pdf->Cell(20,3,'TERAKHIR','LBR',0,'C'); // pendidikan
$pdf->Cell(40,3,'PEKERJAAN','LBR',0,'C'); // pekerjaan
$pdf->Cell(35,3,'NIK IBU','LBR',0,'C'); // NIK ibu
$pdf->Cell(40,3,'NAMA LENGKAP IBU','LBR',0,'C'); // Nama Ibu
$pdf->Cell(35,3,'NIK AYAH','LBR',0,'C'); // NIK Ayah
$pdf->Cell(40,3,'NAMA LENKAP AYAH','LBR',1,'C'); // Nama Ayah
//data TABEL
$pdf->SetFont('Times','',8);
for ($i=1;$i<=10;$i++){
	$pdf->Cell(10,3,$i,1,0,'C'); // no
	$pdf->Cell(30,3,'',1,0,'C'); // status hub
	$pdf->Cell(30,3,'',1,0,'C'); // kelainan
	$pdf->Cell(30,3,'',1,0,'C'); // penyandang cacat
	$pdf->Cell(20,3,'',1,0,'C'); // pendidikan
	$pdf->Cell(40,3,'',1,0,'C'); // pekerjaan
	$pdf->Cell(35,3,'',1,0,'C'); // NIK ibu
	$pdf->Cell(40,3,'',1,0,'C'); // Nama Ibu
	$pdf->Cell(35,3,'',1,0,'C'); // NIK Ayah
	$pdf->Cell(40,3,'',1,1,'C'); // Nama Ayah
}
$pdf->ln(2);
$pdf->Cell(206,4,'',0,0,'C');
$pdf->Cell(104,4,'Gari, 10 Februari 2020',0,1,'C');
$pdf->Cell(103,4,'Kepala Desa Gari',0,0,'C');
$pdf->Cell(103,4,'Kecamatan Wonosari',0,0,'C');
$pdf->Cell(103,4,'Kepala Keluarga',0,1,'C');
$pdf->ln(9);
$pdf->Cell(103,4,'Nama Lengkap : ............................................................',0,0,'C');
$pdf->Cell(103,4,'Nama Lengkap : ............................................................',0,0,'C');
$pdf->Cell(104,4,'Nama Lengkap : ............................................................',0,1,'C');

//Halaman 3
$pdf->AddPage('P');

//koneksi ke database
$dbHost = "localhost";    
$dbUser = "root";    
$dbPass = "";    
$dbName = "kependudukan"; 
 
$connect = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$connect) die("Koneksi Gagal: " . mysqli_connect_error());
//akhir koneksi

#ambil data di tabel dan masukkan ke array
 
#setting judul laporan dan header tabelt
$judul = "PEMERINTAH KABUPATEN GUNUNGKIDUL";
$judul1 = "KECAMATAN WONOSARI";
$judul7 = "DESA GARI";
 
#tampilkan judul laporan
$pdf->Ln(13);
$pdf -> Image('logo.jpg',22,22,20);
$pdf->SetFont('Arial','B','14');
$pdf->Cell(0,5, $judul, '0',1, 'C');
$pdf->SetFont('Arial','B','14');
$pdf->Cell(0,7, $judul1, '0', 1, 'C');
$pdf->SetFont('Arial','B','18');
$pdf->Ln(2);
$pdf->Cell(0,5, $judul7, '0', 1, 'C');
$pdf->SetFont('Arial','B','14');
$pdf->Line(10,50,200,50);
$pdf->SetLineWidth(1);
$pdf->Ln(15);
$pdf->Cell(150,10, '                                              SURAT KETERANGAN ', '0', 1, 'C'); 
$pdf->Cell(150,-10, '                                             ___________________ ', '0', 1, 'C');

$pdf->SetFont('Arial','','12');
$pdf->Line(10,50,200,50);
$pdf->SetLineWidth(1);
$pdf->Ln(5);
$query = "SELECT *FROM warga,belum_menikah,staf,jabatan where warga.nik=belum_menikah.nik 
and staf.id_staf=jabatan.id_staf and belum_menikah.id_staf=staf.id_staf ";
$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
$row = mysqli_fetch_array($results);


$pdf->Cell(155,13, '                                              Nomor : '.$row['no_surat']. '', '0', 1, 'C'); 
$pdf->Ln(0.5);
$pdf->SetFont('Arial','','12');
$pdf->Cell(150,5, '                                             Yang bertanda tangan di bawah ini, Kepala Desa Gari, Kecamatan Wonosari, Kabupaten ', '0', 1, 'C');
$pdf->Cell(150,8, '      Gunungkidul, Daerah Istimewa Yogyakarta, dengan ini menerangkan sebagai berikut : ', '0', 1, 'L'); 
$pdf->Ln(10);
$pdf->Cell(150,5, '              Nama	                                :	'.$row['nama_warga']. '', '0', 1, 'L');
$pdf->Ln(2);  
$pdf->Cell(150,5, '              Tempat/tanggal lahir	         :	'.$row['tempat_lahir']. '/'.$row['tanggal_lahir']. ' ', '0', 1, 'L'); 
$pdf->Ln(2); 
$pdf->Cell(150,5, '               Agama	                              :	'.$row['agama']. ' ', '0', 1, 'L'); 
$pdf->Ln(2);
$pdf->Cell(150,5, '              Pekerjaan	                         :	'.$row['pekerjaan']. ' ', '0', 1, 'L'); 
$pdf->Ln(2); 
$pdf->Cell(150,5, '              Jenis Kelamin	                   :	'.$row['jenis_kelamin']. ' ', '0', 1, 'L');
$pdf->Ln(2); 
$pdf->Cell(150,5, '             Alamat	                               :	'.$row['alamat']. ', Kecamatan ', '0', 1, 'L');
$pdf->Ln(2); 

$pdf->Ln(3); 
$pdf->Cell(150,5, '             Bahwa orang yang tersebut di atas telah kehilangan KARTU TANDA PENDUDUK (KTP),  ', '0', 1, 'L'); 
$pdf->Ln(2); 
$pdf->Cell(150,5, '      di jalan Sambipitu-Wonosari  ', '0', 1, 'J');
$pdf->Ln(2); 
$pdf->Cell(150,5, '              Demikian  surat  keterangan  ini  kami  buat  dengan sebenarnya, untuk  dapat  dipergunakan   ', '0', 1, 'J'); 
$pdf->Ln(2); 
$pdf->Cell(150,5, '      sebagaimana mestinya. ', '0', 1, 'J');
$pdf->Ln(2);
$pdf->Cell(16,5, '                                                                                                         Gari, '.date('d-m-Y',strtotime($row["tanggal_permohonan"])).'', '0', 1, 'L'); 
$pdf->Ln(2);
$pdf->Cell(15,5, '                                                                                                         '.$row['nama_jabatan']. ' ', '0', 1, 'L'); 
$pdf->Ln(20);
$pdf->Cell(15,5, '                                                                                                 '.$row['nama_staf']. '', '0', 1, 'L'); 


#output file PDF
$pdf->Output();
?>