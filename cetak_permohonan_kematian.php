<?php
session_start();
require "fpdf/fpdf.php";
require "connect.php";

$id_kematian=$_GET['id'];

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm',array(219,330));
$pdf->AddPage();



	//set font to Times, bold, 12pt
	$pdf->SetFont('Times','',7);
//Cell(width , height , text , border , end line , [align] )
	$pdf->Cell(164 ,6,'',0,0,'C');
	$pdf->Cell(25 ,6,'KODE F-2.28 ',1,0,'C');
	$pdf->SetFont('Times','',8);
	
	$pdf->Cell(159 ,8,' Kalurahan                   : Gari',0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(159 ,8,' Kecamatan         : Wonosari',0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(159 ,8,' Kabupaten          : Gunungkidul',0,0,'L');
	$pdf->Cell(15 ,8,'',0,0,'C');
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(15 ,3,'                                                                                                                                                                                        FORMULIR PELAPORAN KEMATIAN','LT',0,'C');
	$pdf->Cell(174 ,3,'','',0,'C');
	$pdf->SetFont('Times','',10);
	
	$id=$_GET['id'];
	$query=mysqli_query($connect,"SELECT * FROM kematian,biodata_wni,data_keluarga,pekerjaan,jenis_kelamin,agama 
	WHERE kematian.NIK=biodata_wni.NIK 
	AND data_keluarga.NO_KK=biodata_wni.NO_KK
	AND biodata_wni.JENIS_KLMIN=jenis_kelamin.JENIS_KLMIN
	AND biodata_wni.AGAMA=agama.AGAMA
	AND pekerjaan.JENIS_PKRJN=biodata_wni.JENIS_PKRJN	
	AND kematian.id_kematian='$id'");
	$ja=mysqli_fetch_array($query);
	$j='RT'.$ja['NO_RT'].'/RW'.$ja['NO_RW'].', Gari, Wonosari, Gunungkidul';
	$pdf->Ln(15);
	$fs=3.5;
	$pdf->SetFont("Times","B",12);
	$pdf->Cell(5,$fs,"","LT",0,"C");
	$pdf->Cell(190,4,"Yang bertanda tangan dibawah ini","TR",1,"L");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"  ",0,0,"C");
	$pdf->Cell(130,5,'',0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->SetFont("Times","",10);
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Nama Lengkap",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$ja['nama_pelapor'],0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"NIK",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$ja['nik_pelapor'],0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	
	$s=mysqli_query($connect,"SELECT * FROM biodata_wni WHERE NIK='$ja[nik_pelapor]'");
	$x=mysqli_fetch_array($s);
	
	$z1=substr($x['TGL_LHR'],0,4);
	$w1=substr(date('Y-m-d'),0,4);
	$r1=$w1-$z1;
	
	$pdf->Cell(45,$fs,"Umur",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$r1,0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Pekerjaan",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$ja['pekerjaan_pelapor'],0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Hubungan dengan yang mati",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$ja['hubungan'],0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"  ",0,0,"C");
	$pdf->Cell(130,5,'',0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Melaporkan bahwa",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,'',0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"  ",0,0,"C");
	$pdf->Cell(130,5,'',0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Nama Lengkap",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$ja['NAMA_LGKP'],0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"NIK",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$ja['NIK'],0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Jenis Kelamin",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$ja['jenis_kelamin'],0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Tanggal Lahir",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$ja['TGL_LHR'],0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	
	
	
	$z=substr($ja['TGL_LHR'],0,4);
	$w=substr(date('Y-m-d'),0,4);
	$r=$w-$z;
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Umur",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$r,0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Agama",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$ja['nama_agama'],0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Alamat",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$j,0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"  ",0,0,"C");
	$pdf->Cell(130,5,'',0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Telah Meninggal dunia pada",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,'',0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"  ",0,0,"C");
	$pdf->Cell(130,5,'',0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Hari",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$ja['hari'],0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Tanggal Kematian",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$ja['tanggal_kematian'],0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Pukul",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$ja['jam'],0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Bertempat di",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$ja['tempat_kematian'],0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Penyebab Kematian",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$ja['sebab'],0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"Yang Menerangkan",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(130,5,$ja['yang_menerangkan'],0,0,'J');
	$pdf->Cell(10,$fs,"","R",1,"C");
	$pdf->Cell(195,$fs,"","LBR",1,"C");
	
	$pdf->Ln(2);
	$pdf->Cell(16,5, '                                                                                                                                                                             Gari, '.date('d-m-Y',strtotime(date('d-m-Y'))).'', '0', 1, 'L'); 
	$pdf->Ln(2);
	$pdf->Cell(15,5, '                                                                                                                                                                                   Pelapor ', '0', 1, 'L'); 
	$pdf->Ln(15);
	$pdf->Cell(15,5, '                                                                                                                                                                     '.$ja['nama_pelapor'].'', '0', 1, 'L'); 

$pdf->AddPage('P');
$pdf->SetFont('Times','',7);
//Cell(width , height , text , border , end line , [align] )
	$pdf->Cell(164 ,6,'',0,0,'C');
	$pdf->Cell(25 ,4,'KODE F-2.29 ',1,1,'C');
	$pdf->SetFont('Times','',7);
	
	$pdf->Cell(159 ,8,' Kalurahan                   : Gari',0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(159 ,8,' Kecamatan         : Wonosari',0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(159 ,8,' Kabupaten          : Gunungkidul',0,0,'L');
	$pdf->Ln(7);
	
$pdf->Cell(29,5,'Kode Wilayah     : ',0,0,'J');
$pdf->Cell(20 ,4,'3403012004 ',1,0,'C');

$pdf->ln(3);
$pdf->SetFont('Times','B',8);
$pdf->Cell(199,5,"SURAT KETERANGAN KEMATIAN",0,0,"C");
$pdf->ln(5);
$pdf->Cell(199,5,"No." .$ja['id_kematian'],0,0,"C");
$pdf->ln(3);
$pdf->SetFont('Times','',8);
	
	$pdf->Cell(159 ,8,' Nama Kepala Keluarga                 : Gari',0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(159 ,8,' Nomor Kepala Keluarga               : Wonosari',0,0,'L');
$pdf->Cell(190,5,"No.",0,0,"C");
$pdf->SetFont('Times','',12);
//Data Ayah
	$fs=3.5;
	$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(1);
$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","LT",0,"C");
$pdf->Cell(197,4,"J E N A Z A H","TR",1,"L");
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['NIK'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['NAMA_LGKP'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
if($ja['jenis_kelamin']=='Perempuan'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'3.  Jenis Kelamin','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'2 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Laki-laki 2.Perempuan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}else{
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'3.  Jenis Kelamin','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'1 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Laki-laki 2.Perempuan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
$pdf->Cell(5,$fs,"","L",0,"C");
$z2=substr($ja['TGL_LHR'],0,4);
$w2=substr(date('Y-m-d'),0,4);
$r2=$w2-$z2;
$z3=substr($ja['TGL_LHR'],5,2);
$z5=substr($ja['TGL_LHR'],8,2);
$z7=substr($ja['TGL_LHR'],0,4);
$pdf->Cell(59,$fs,'4.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z5,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z3,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z7,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r2,1,'C');
$pdf->Cell(69 ,$fs,'',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Tempat Lahir','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(30 ,$fs,$ja['TMPT_LHR'],1,0,'C');
$pdf->Cell(20,$fs,'Kode Prov.',0,0,'J');
$pdf->Cell(5 ,$fs,'34 ',1,0,'C');
$pdf->Cell(20,$fs,'Kode Kab.',0,0,'J');
$pdf->Cell(5 ,$fs,'3 ',1,0,'C');
$pdf->Cell(39 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
if($ja['nama_agama']=='Islam'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'1 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Kristen'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'2 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Katholik'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'3 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Hindu'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'4 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Budha'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'5 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Kong Hu Chu'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'6 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Aliran Kepercayaan'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'7 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'7.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['pekerjaan'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'8.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['ALAMAT'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'9.  Anak Ke','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,$ja['anak_ke'],1,0,'C');
$pdf->Cell(114,5,'1,2,3,4,....',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$z8=substr($ja['TGL_LHR'],0,4);
$w9=substr(date('Y-m-d'),0,4);
$r10=$w9-$z8;
$z11=substr($ja['tanggal_kematian'],5,2);
$z12=substr($ja['tanggal_kematian'],8,2);
$z13=substr($ja['tanggal_kematian'],0,4);
$pdf->Cell(59,$fs,'10.  Tanggal Kematian','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z12,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z11,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z13,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r10,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'11.  Pukul','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['jam'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'12.  Sebab Kematian','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['sebab'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'13.  Tempat Kematian','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['tempat_kematian'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'14.  Yang Menerangkan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['yang_menerangkan'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"A Y A H ",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_AYAH]'";
	$re = mysqli_query($connect,$qs);
	$r = mysqli_fetch_array($re);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r['NIK'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r['NAMA_LGKP'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z15=substr($r['TGL_LHR'],0,4);
$w17=substr(date('Y-m-d'),0,4);
$r18=$w17-$z15;
$z19=substr($r['TGL_LHR'],5,2);
$z20=substr($r['TGL_LHR'],8,2);
$z21=substr($r['TGL_LHR'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z20,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z19,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z21,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r18,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$r['pekerjaan'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['ALAMAT'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"I B U ",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs1 = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_IBU]'";
	$re1 = mysqli_query($connect,$qs1);
	$r1 = mysqli_fetch_array($re1);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r1['NIK'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r1['NAMA_LGKP'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z22=substr($r1['TGL_LHR'],0,4);
$w23=substr(date('Y-m-d'),0,4);
$r25=$w23-$z22;
$z27=substr($r1['TGL_LHR'],5,2);
$z28=substr($r1['TGL_LHR'],8,2);
$z29=substr($r1['TGL_LHR'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z28,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z27,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z29,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r25,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$r1['pekerjaan'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$r1['ALAMAT'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"PELAPOR",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nik_pelapor'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nama_pelapor'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z30=substr($ja['tangal_lahir_pelapor'],0,4);
$w31=substr(date('Y-m-d'),0,4);
$r32=$w31-$z15;
$z33=substr($ja['tangal_lahir_pelapor'],5,2);
$z35=substr($ja['tangal_lahir_pelapor'],8,2);
$z37=substr($ja['tangal_lahir_pelapor'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z35,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z33,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z37,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r32,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$ja['pekerjaan_pelapor'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['alamat_pelapor'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"SAKSI I",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs1 = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_IBU]'";
	$re1 = mysqli_query($connect,$qs1);
	$r1 = mysqli_fetch_array($re1);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nik_saksi1'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nama_saksi1'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z38=substr($ja['tangal_lahir_pelapor'],0,4);
$w39=substr(date('Y-m-d'),0,4);
$r51=$w39-$z38;
$z52=substr($ja['tangal_lahir_pelapor'],5,2);
$z53=substr($ja['tangal_lahir_pelapor'],8,2);
$z55=substr($ja['tangal_lahir_pelapor'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z53,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z52,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z55,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r51,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$ja['pekerjaan_saksi1'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['alamat_saksi1'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"SAKSI II",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs1 = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_IBU]'";
	$re1 = mysqli_query($connect,$qs1);
	$r1 = mysqli_fetch_array($re1);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nik_saksi2'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nama_saksi2'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z57=substr($ja['tangal_lahir_pelapor'],0,4);
$w58=substr(date('Y-m-d'),0,4);
$r59=$w58-$z57;
$z71=substr($ja['tangal_lahir_pelapor'],5,2);
$z72=substr($ja['tangal_lahir_pelapor'],8,2);
$z73=substr($ja['tangal_lahir_pelapor'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z72,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z71,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z73,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r59,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$ja['pekerjaan_saksi2'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['alamat_saksi2'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");
$pdf->Cell(16,5, '                                                                                                                                                                                                                                               Gari, '.date('d-m-Y',strtotime(date('d-m-Y'))).'', '0', 1, 'L'); 

$pdf->AddPage('P');
$pdf->SetFont('Times','',7);
//Cell(width , height , text , border , end line , [align] )
	$pdf->Cell(164 ,6,'',0,0,'C');
	$pdf->Cell(25 ,4,'KODE F-2.29 ',1,1,'C');
	$pdf->SetFont('Times','',7);
	
	$pdf->Cell(159 ,8,' Kalurahan                   : Gari',0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(159 ,8,' Kecamatan         : Wonosari',0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(159 ,8,' Kabupaten          : Gunungkidul',0,0,'L');
	$pdf->Ln(7);
	
$pdf->Cell(29,5,'Kode Wilayah     : ',0,0,'J');
$pdf->Cell(20 ,4,'3403012004 ',1,0,'C');

$pdf->ln(3);
$pdf->SetFont('Times','B',8);
$pdf->Cell(199,5,"SURAT KETERANGAN KEMATIAN",0,0,"C");
$pdf->ln(5);
$pdf->Cell(199,5,"No." .$ja['id_kematian'],0,0,"C");
$pdf->ln(3);
$pdf->SetFont('Times','',8);
	
	$pdf->Cell(159 ,8,' Nama Kepala Keluarga                 : Gari',0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(159 ,8,' Nomor Kepala Keluarga               : Wonosari',0,0,'L');
$pdf->Cell(190,5,"No.",0,0,"C");
$pdf->SetFont('Times','',12);
//Data Ayah
	$fs=3.5;
	$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(1);
$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","LT",0,"C");
$pdf->Cell(197,4,"J E N A Z A H","TR",1,"L");
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['NIK'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['NAMA_LGKP'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
if($ja['jenis_kelamin']=='Perempuan'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'3.  Jenis Kelamin','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'2 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Laki-laki 2.Perempuan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}else{
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'3.  Jenis Kelamin','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'1 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Laki-laki 2.Perempuan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
$pdf->Cell(5,$fs,"","L",0,"C");
$z2=substr($ja['TGL_LHR'],0,4);
$w2=substr(date('Y-m-d'),0,4);
$r2=$w2-$z2;
$z3=substr($ja['TGL_LHR'],5,2);
$z5=substr($ja['TGL_LHR'],8,2);
$z7=substr($ja['TGL_LHR'],0,4);
$pdf->Cell(59,$fs,'4.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z5,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z3,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z7,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r2,1,'C');
$pdf->Cell(69 ,$fs,'',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Tempat Lahir','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(30 ,$fs,$ja['TMPT_LHR'],1,0,'C');
$pdf->Cell(20,$fs,'Kode Prov.',0,0,'J');
$pdf->Cell(5 ,$fs,'34 ',1,0,'C');
$pdf->Cell(20,$fs,'Kode Kab.',0,0,'J');
$pdf->Cell(5 ,$fs,'3 ',1,0,'C');
$pdf->Cell(39 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
if($ja['nama_agama']=='Islam'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'1 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Kristen'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'2 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Katholik'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'3 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Hindu'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'4 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Budha'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'5 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Kong Hu Chu'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'6 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Aliran Kepercayaan'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'7 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'7.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['pekerjaan'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'8.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['ALAMAT'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'9.  Anak Ke','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,$ja['anak_ke'],1,0,'C');
$pdf->Cell(114,5,'1,2,3,4,....',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$z8=substr($ja['TGL_LHR'],0,4);
$w9=substr(date('Y-m-d'),0,4);
$r10=$w9-$z8;
$z11=substr($ja['tanggal_kematian'],5,2);
$z12=substr($ja['tanggal_kematian'],8,2);
$z13=substr($ja['tanggal_kematian'],0,4);
$pdf->Cell(59,$fs,'10.  Tanggal Kematian','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z12,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z11,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z13,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r10,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'11.  Pukul','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['jam'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'12.  Sebab Kematian','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['sebab'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'13.  Tempat Kematian','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['tempat_kematian'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'14.  Yang Menerangkan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['yang_menerangkan'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"A Y A H ",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_AYAH]'";
	$re = mysqli_query($connect,$qs);
	$r = mysqli_fetch_array($re);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r['NIK'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r['NAMA_LGKP'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z15=substr($r['TGL_LHR'],0,4);
$w17=substr(date('Y-m-d'),0,4);
$r18=$w17-$z15;
$z19=substr($r['TGL_LHR'],5,2);
$z20=substr($r['TGL_LHR'],8,2);
$z21=substr($r['TGL_LHR'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z20,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z19,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z21,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r18,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$r['pekerjaan'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['ALAMAT'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"I B U ",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs1 = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_IBU]'";
	$re1 = mysqli_query($connect,$qs1);
	$r1 = mysqli_fetch_array($re1);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r1['NIK'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r1['NAMA_LGKP'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z22=substr($r1['TGL_LHR'],0,4);
$w23=substr(date('Y-m-d'),0,4);
$r25=$w23-$z22;
$z27=substr($r1['TGL_LHR'],5,2);
$z28=substr($r1['TGL_LHR'],8,2);
$z29=substr($r1['TGL_LHR'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z28,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z27,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z29,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r25,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$r1['pekerjaan'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$r1['ALAMAT'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"PELAPOR",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nik_pelapor'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nama_pelapor'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z30=substr($ja['tangal_lahir_pelapor'],0,4);
$w31=substr(date('Y-m-d'),0,4);
$r32=$w31-$z15;
$z33=substr($ja['tangal_lahir_pelapor'],5,2);
$z35=substr($ja['tangal_lahir_pelapor'],8,2);
$z37=substr($ja['tangal_lahir_pelapor'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z35,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z33,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z37,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r32,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$ja['pekerjaan_pelapor'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['alamat_pelapor'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"SAKSI I",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs1 = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_IBU]'";
	$re1 = mysqli_query($connect,$qs1);
	$r1 = mysqli_fetch_array($re1);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nik_saksi1'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nama_saksi1'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z38=substr($ja['tangal_lahir_pelapor'],0,4);
$w39=substr(date('Y-m-d'),0,4);
$r51=$w39-$z38;
$z52=substr($ja['tangal_lahir_pelapor'],5,2);
$z53=substr($ja['tangal_lahir_pelapor'],8,2);
$z55=substr($ja['tangal_lahir_pelapor'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z53,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z52,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z55,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r51,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$ja['pekerjaan_saksi1'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['alamat_saksi1'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"SAKSI II",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs1 = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_IBU]'";
	$re1 = mysqli_query($connect,$qs1);
	$r1 = mysqli_fetch_array($re1);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nik_saksi2'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nama_saksi2'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z57=substr($ja['tangal_lahir_pelapor'],0,4);
$w58=substr(date('Y-m-d'),0,4);
$r59=$w58-$z57;
$z71=substr($ja['tangal_lahir_pelapor'],5,2);
$z72=substr($ja['tangal_lahir_pelapor'],8,2);
$z73=substr($ja['tangal_lahir_pelapor'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z72,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z71,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z73,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r59,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$ja['pekerjaan_saksi2'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['alamat_saksi2'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");
$pdf->Cell(16,5, '                                                                                                                                                                                                                                               Gari, '.date('d-m-Y',strtotime(date('d-m-Y'))).'', '0', 1, 'L'); 

$pdf->AddPage('P');
$pdf->SetFont('Times','',7);
//Cell(width , height , text , border , end line , [align] )
	$pdf->Cell(164 ,6,'',0,0,'C');
	$pdf->Cell(25 ,4,'KODE F-2.29 ',1,1,'C');
	$pdf->SetFont('Times','',7);
	
	$pdf->Cell(159 ,8,' Kalurahan                   : Gari',0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(159 ,8,' Kecamatan         : Wonosari',0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(159 ,8,' Kabupaten          : Gunungkidul',0,0,'L');
	$pdf->Ln(7);
	
$pdf->Cell(29,5,'Kode Wilayah     : ',0,0,'J');
$pdf->Cell(20 ,4,'3403012004 ',1,0,'C');

$pdf->ln(3);
$pdf->SetFont('Times','B',8);
$pdf->Cell(199,5,"SURAT KETERANGAN KEMATIAN",0,0,"C");
$pdf->ln(5);
$pdf->Cell(199,5,"No." .$ja['id_kematian'],0,0,"C");
$pdf->ln(3);
$pdf->SetFont('Times','',8);
	
	$pdf->Cell(159 ,8,' Nama Kepala Keluarga                 : Gari',0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(159 ,8,' Nomor Kepala Keluarga               : Wonosari',0,0,'L');
$pdf->Cell(190,5,"No.",0,0,"C");
$pdf->SetFont('Times','',12);
//Data Ayah
	$fs=3.5;
	$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(1);
$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","LT",0,"C");
$pdf->Cell(197,4,"J E N A Z A H","TR",1,"L");
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['NIK'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['NAMA_LGKP'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
if($ja['jenis_kelamin']=='Perempuan'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'3.  Jenis Kelamin','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'2 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Laki-laki 2.Perempuan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}else{
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'3.  Jenis Kelamin','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'1 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Laki-laki 2.Perempuan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
$pdf->Cell(5,$fs,"","L",0,"C");
$z2=substr($ja['TGL_LHR'],0,4);
$w2=substr(date('Y-m-d'),0,4);
$r2=$w2-$z2;
$z3=substr($ja['TGL_LHR'],5,2);
$z5=substr($ja['TGL_LHR'],8,2);
$z7=substr($ja['TGL_LHR'],0,4);
$pdf->Cell(59,$fs,'4.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z5,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z3,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z7,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r2,1,'C');
$pdf->Cell(69 ,$fs,'',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Tempat Lahir','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(30 ,$fs,$ja['TMPT_LHR'],1,0,'C');
$pdf->Cell(20,$fs,'Kode Prov.',0,0,'J');
$pdf->Cell(5 ,$fs,'34 ',1,0,'C');
$pdf->Cell(20,$fs,'Kode Kab.',0,0,'J');
$pdf->Cell(5 ,$fs,'3 ',1,0,'C');
$pdf->Cell(39 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
if($ja['nama_agama']=='Islam'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'1 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Kristen'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'2 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Katholik'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'3 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Hindu'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'4 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Budha'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'5 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Kong Hu Chu'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'6 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Aliran Kepercayaan'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'7 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'7.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['pekerjaan'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'8.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['ALAMAT'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'9.  Anak Ke','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,$ja['anak_ke'],1,0,'C');
$pdf->Cell(114,5,'1,2,3,4,....',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$z8=substr($ja['TGL_LHR'],0,4);
$w9=substr(date('Y-m-d'),0,4);
$r10=$w9-$z8;
$z11=substr($ja['tanggal_kematian'],5,2);
$z12=substr($ja['tanggal_kematian'],8,2);
$z13=substr($ja['tanggal_kematian'],0,4);
$pdf->Cell(59,$fs,'10.  Tanggal Kematian','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z12,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z11,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z13,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r10,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'11.  Pukul','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['jam'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'12.  Sebab Kematian','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['sebab'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'13.  Tempat Kematian','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['tempat_kematian'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'14.  Yang Menerangkan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['yang_menerangkan'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"A Y A H ",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_AYAH]'";
	$re = mysqli_query($connect,$qs);
	$r = mysqli_fetch_array($re);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r['NIK'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r['NAMA_LGKP'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z15=substr($r['TGL_LHR'],0,4);
$w17=substr(date('Y-m-d'),0,4);
$r18=$w17-$z15;
$z19=substr($r['TGL_LHR'],5,2);
$z20=substr($r['TGL_LHR'],8,2);
$z21=substr($r['TGL_LHR'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z20,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z19,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z21,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r18,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$r['pekerjaan'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['ALAMAT'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"I B U ",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs1 = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_IBU]'";
	$re1 = mysqli_query($connect,$qs1);
	$r1 = mysqli_fetch_array($re1);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r1['NIK'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r1['NAMA_LGKP'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z22=substr($r1['TGL_LHR'],0,4);
$w23=substr(date('Y-m-d'),0,4);
$r25=$w23-$z22;
$z27=substr($r1['TGL_LHR'],5,2);
$z28=substr($r1['TGL_LHR'],8,2);
$z29=substr($r1['TGL_LHR'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z28,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z27,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z29,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r25,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$r1['pekerjaan'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$r1['ALAMAT'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',Kalurahan,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"PELAPOR",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nik_pelapor'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nama_pelapor'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z30=substr($ja['tangal_lahir_pelapor'],0,4);
$w31=substr(date('Y-m-d'),0,4);
$r32=$w31-$z15;
$z33=substr($ja['tangal_lahir_pelapor'],5,2);
$z35=substr($ja['tangal_lahir_pelapor'],8,2);
$z37=substr($ja['tangal_lahir_pelapor'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z35,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z33,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z37,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r32,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$ja['pekerjaan_pelapor'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['alamat_pelapor'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"SAKSI I",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs1 = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_IBU]'";
	$re1 = mysqli_query($connect,$qs1);
	$r1 = mysqli_fetch_array($re1);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nik_saksi1'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nama_saksi1'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z38=substr($ja['tangal_lahir_pelapor'],0,4);
$w39=substr(date('Y-m-d'),0,4);
$r51=$w39-$z38;
$z52=substr($ja['tangal_lahir_pelapor'],5,2);
$z53=substr($ja['tangal_lahir_pelapor'],8,2);
$z55=substr($ja['tangal_lahir_pelapor'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z53,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z52,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z55,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r51,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$ja['pekerjaan_saksi1'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['alamat_saksi1'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"SAKSI II",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs1 = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_IBU]'";
	$re1 = mysqli_query($connect,$qs1);
	$r1 = mysqli_fetch_array($re1);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nik_saksi2'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nama_saksi2'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z57=substr($ja['tangal_lahir_pelapor'],0,4);
$w58=substr(date('Y-m-d'),0,4);
$r59=$w58-$z57;
$z71=substr($ja['tangal_lahir_pelapor'],5,2);
$z72=substr($ja['tangal_lahir_pelapor'],8,2);
$z73=substr($ja['tangal_lahir_pelapor'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z72,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z71,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z73,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r59,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$ja['pekerjaan_saksi2'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['alamat_saksi2'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");
$pdf->Cell(16,5, '                                                                                                                                                                                                                                               Gari, '.date('d-m-Y',strtotime(date('d-m-Y'))).'', '0', 1, 'L'); 

$pdf->AddPage('P');
$pdf->SetFont('Times','',7);
//Cell(width , height , text , border , end line , [align] )
	$pdf->Cell(164 ,6,'',0,0,'C');
	$pdf->Cell(25 ,4,'KODE F-2.29 ',1,1,'C');
	$pdf->SetFont('Times','',7);
	
	$pdf->Cell(159 ,8,' Kalurahan                   : Gari',0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(159 ,8,' Kecamatan         : Wonosari',0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(159 ,8,' Kabupaten          : Gunungkidul',0,0,'L');
	$pdf->Ln(7);
	
$pdf->Cell(29,5,'Kode Wilayah     : ',0,0,'J');
$pdf->Cell(20 ,4,'3403012004 ',1,0,'C');

$pdf->ln(3);
$pdf->SetFont('Times','B',8);
$pdf->Cell(199,5,"SURAT KETERANGAN KEMATIAN",0,0,"C");
$pdf->ln(5);
$pdf->Cell(199,5,"No." .$ja['id_kematian'],0,0,"C");
$pdf->ln(3);
$pdf->SetFont('Times','',8);
	
	$pdf->Cell(159 ,8,' Nama Kepala Keluarga                 : Gari',0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(159 ,8,' Nomor Kepala Keluarga               : Wonosari',0,0,'L');
$pdf->Cell(190,5,"No.",0,0,"C");
$pdf->SetFont('Times','',12);
//Data Ayah
	$fs=3.5;
	$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(1);
$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","LT",0,"C");
$pdf->Cell(197,4,"J E N A Z A H","TR",1,"L");
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['NIK'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['NAMA_LGKP'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
if($ja['jenis_kelamin']=='Perempuan'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'3.  Jenis Kelamin','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'2 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Laki-laki 2.Perempuan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}else{
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'3.  Jenis Kelamin','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'1 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Laki-laki 2.Perempuan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
$pdf->Cell(5,$fs,"","L",0,"C");
$z2=substr($ja['TGL_LHR'],0,4);
$w2=substr(date('Y-m-d'),0,4);
$r2=$w2-$z2;
$z3=substr($ja['TGL_LHR'],5,2);
$z5=substr($ja['TGL_LHR'],8,2);
$z7=substr($ja['TGL_LHR'],0,4);
$pdf->Cell(59,$fs,'4.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z5,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z3,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z7,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r2,1,'C');
$pdf->Cell(69 ,$fs,'',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Tempat Lahir','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(30 ,$fs,$ja['TMPT_LHR'],1,0,'C');
$pdf->Cell(20,$fs,'Kode Prov.',0,0,'J');
$pdf->Cell(5 ,$fs,'34 ',1,0,'C');
$pdf->Cell(20,$fs,'Kode Kab.',0,0,'J');
$pdf->Cell(5 ,$fs,'3 ',1,0,'C');
$pdf->Cell(39 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
if($ja['nama_agama']=='Islam'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'1 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Kristen'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'2 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Katholik'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'3 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Hindu'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'4 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Budha'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'5 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Kong Hu Chu'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'6 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
if($ja['nama_agama']=='Aliran Kepercayaan'){
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'6.  Agama','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,'7 ',1,0,'C');
$pdf->Cell(114,$fs,'1.Islam 2.Kristen 3.Katholik 4.Hindu 5.Budha 6.Kong Hu Chu 7.Aliran Kepercayaan',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
}
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'7.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['pekerjaan'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'8.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['ALAMAT'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'9.  Anak Ke','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(5 ,$fs,$ja['anak_ke'],1,0,'C');
$pdf->Cell(114,5,'1,2,3,4,....',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$z8=substr($ja['TGL_LHR'],0,4);
$w9=substr(date('Y-m-d'),0,4);
$r10=$w9-$z8;
$z11=substr($ja['tanggal_kematian'],5,2);
$z12=substr($ja['tanggal_kematian'],8,2);
$z13=substr($ja['tanggal_kematian'],0,4);
$pdf->Cell(59,$fs,'10.  Tanggal Kematian','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z12,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z11,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z13,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r10,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'11.  Pukul','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['jam'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'12.  Sebab Kematian','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['sebab'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'13.  Tempat Kematian','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['tempat_kematian'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'14.  Yang Menerangkan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['yang_menerangkan'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"A Y A H ",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_AYAH]'";
	$re = mysqli_query($connect,$qs);
	$r = mysqli_fetch_array($re);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r['NIK'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r['NAMA_LGKP'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z15=substr($r['TGL_LHR'],0,4);
$w17=substr(date('Y-m-d'),0,4);
$r18=$w17-$z15;
$z19=substr($r['TGL_LHR'],5,2);
$z20=substr($r['TGL_LHR'],8,2);
$z21=substr($r['TGL_LHR'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z20,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z19,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z21,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r18,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$r['pekerjaan'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['ALAMAT'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"I B U ",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs1 = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_IBU]'";
	$re1 = mysqli_query($connect,$qs1);
	$r1 = mysqli_fetch_array($re1);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r1['NIK'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$r1['NAMA_LGKP'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z22=substr($r1['TGL_LHR'],0,4);
$w23=substr(date('Y-m-d'),0,4);
$r25=$w23-$z22;
$z27=substr($r1['TGL_LHR'],5,2);
$z28=substr($r1['TGL_LHR'],8,2);
$z29=substr($r1['TGL_LHR'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z28,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z27,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z29,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r25,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$r1['pekerjaan'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$r1['ALAMAT'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"PELAPOR",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nik_pelapor'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nama_pelapor'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z30=substr($ja['tangal_lahir_pelapor'],0,4);
$w31=substr(date('Y-m-d'),0,4);
$r32=$w31-$z15;
$z33=substr($ja['tangal_lahir_pelapor'],5,2);
$z35=substr($ja['tangal_lahir_pelapor'],8,2);
$z37=substr($ja['tangal_lahir_pelapor'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z35,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z33,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z37,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r32,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$ja['pekerjaan_pelapor'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['alamat_pelapor'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"SAKSI I",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs1 = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_IBU]'";
	$re1 = mysqli_query($connect,$qs1);
	$r1 = mysqli_fetch_array($re1);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nik_saksi1'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nama_saksi1'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z38=substr($ja['tangal_lahir_pelapor'],0,4);
$w39=substr(date('Y-m-d'),0,4);
$r51=$w39-$z38;
$z52=substr($ja['tangal_lahir_pelapor'],5,2);
$z53=substr($ja['tangal_lahir_pelapor'],8,2);
$z55=substr($ja['tangal_lahir_pelapor'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z53,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z52,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z55,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r51,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$ja['pekerjaan_saksi1'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['alamat_saksi1'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");

$pdf->SetFont('Times','B',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(40,5,"SAKSI II",0,0,"L");
$pdf->Cell(148,$fs,'',0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");

$qs1 = "SELECT * FROM biodata_wni,data_keluarga,pekerjaan
	WHERE biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN 
	AND biodata_wni.NO_KK=data_keluarga.NO_KK 
	AND biodata_wni.NIK='$ja[NIK_IBU]'";
	$re1 = mysqli_query($connect,$qs1);
	$r1 = mysqli_fetch_array($re1);
	
$pdf->SetFont('Times','',7);
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'1.  NIK','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nik_saksi2'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'2.  Nama Lengkap','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119,$fs,$ja['nama_saksi2'],0,0,'J');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");

$z57=substr($ja['tangal_lahir_pelapor'],0,4);
$w58=substr(date('Y-m-d'),0,4);
$r59=$w58-$z57;
$z71=substr($ja['tangal_lahir_pelapor'],5,2);
$z72=substr($ja['tangal_lahir_pelapor'],8,2);
$z73=substr($ja['tangal_lahir_pelapor'],0,4);

$pdf->Cell(59,$fs,'3.  Tanggal Lahir/Umur','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(7,$fs,'tgl',0,0,'J');
$pdf->Cell(5 ,$fs,$z72,1,0,'C');
$pdf->Cell(7,$fs,'bln',0,0,'J');
$pdf->Cell(5 ,$fs,$z71,1,0,'C');
$pdf->Cell(7,$fs,'thn',0,0,'J');
$pdf->Cell(5 ,$fs,$z73,1,0,'C');
$pdf->Cell(9,$fs,'umur',0,0,'J');
$pdf->Cell(5 ,$fs,$r59,1,0,'C');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'4.  Pekerjaan','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(50 ,$fs,$ja['pekerjaan_saksi2'],1,0,'L');
$pdf->Cell(69 ,$fs,' ',0,0,'C');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(59,$fs,'5.  Alamat','',0,'L');
$pdf->Cell(10,$fs,': ',0,0,'J');
$pdf->Cell(119 ,$fs,$ja['alamat_saksi2'],1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'a.Kalurahan',0,0,'J');
$pdf->Cell(20 ,$fs,'GARI ',1,0,'L');
$pdf->Cell(20,$fs,'c.Kabupaten',0,0,'J');
$pdf->Cell(60 ,$fs,'GUNUNGKIDUL ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(5,$fs,"","L",0,"C");
$pdf->Cell(68,$fs,'','',0,'L');
$pdf->Cell(20,$fs,'b.Kecamatan',0,0,'J');
$pdf->Cell(20 ,$fs,'WONOSARI ',1,0,'L');
$pdf->Cell(20,$fs,'b.Provinsi',0,0,'J');
$pdf->Cell(60 ,$fs,'DAERAH ISTIMEWA YOGYAKARTA ',1,0,'L');
$pdf->Cell(9,$fs,"","R",1,"C");
$pdf->Cell(202,$fs,"","LBR",1,"C");
$pdf->Cell(16,5, '                                                                                                                                                                                                                                               Gari, '.date('d-m-Y',strtotime(date('d-m-Y'))).'', '0', 1, 'L'); 

$pdf->AddPage();
$pdf->SetFont('Times','B',12);
//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(164 ,6,'',0,0,'C');
$pdf->Cell(25 ,6,' F-1.16 ',1,1,'C');
$pdf->ln(5);
$pdf->SetFont('Times','B',11);
$pdf->Cell(195,5,"FORMULIR PERMOHONAN PERUBAHAN KARTU KELUARGA (KK) WARGA NEGARA INDONESIA",0,1,"C");
$pdf->ln(3);
$pdf->SetFont("Times","",10);
$fs=4;
$pdf->Cell(5,2,"","LT");
$pdf->Cell(185,2,"","T",0,"L");
$pdf->Cell(5,2,"","RT",1);
$pdf->SetFont("Times","B",10);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(185,$fs,"Perhatian:",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);
$pdf->SetFont("Times","",10);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(185,$fs,"1. Harap diisi dengan huruf cetak dan menggunakan tinta hitam",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(185,$fs,"2. Setelah formulir diisi dan ditandatangani, harap diserahkan kembali ke Kantor Kelurahan ",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);
$pdf->Cell(5,2,"","LB");
$pdf->Cell(185,2,"","B",0,"L");
$pdf->Cell(5,2,"","RB",1);
$pdf->Cell(5,2,"","LT");
$pdf->Cell(185,2,"","T",0,"L");
$pdf->Cell(5,2,"","RT",1);

$pdf->SetFont("Times","B",10);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(60,$fs,"PEMERINTAH PROPINSI",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"L");
strlen($ja['NO_PROP']) <2 ? $noprop="0".$ja['NO_PROP'] : $noprop=$ja['NO_PROP'];
	$kprop=str_split($noprop);
	for ($i=0;$i<2;$i++){
		$pdf->Cell(5 ,4,$kprop[$i],1,0,'C');	
	}	
$pdf->Cell(15,$fs,"",0,0,"L");
$pdf->Cell(65,$fs,"DAERAH ISTIMEWA YOGYAKARTA",1,0,"L");
$pdf->Cell(34,$fs,"",0,0,"L");
$pdf->Cell(1,$fs,"","R",1);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(60,$fs,"PEMERINTAH KABUPATEN/KOTA",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"L");
strlen($ja['NO_KAB'])<2 ? $nokab="0".$ja['NO_KAB'] : $nokab=$ja['NO_KAB'];
	$kkab=str_split($nokab);
	for ($i=0;$i<2;$i++){
		$pdf->Cell(5 ,4,$kprop[$i],1,0,'C');	
	}
$pdf->Cell(15,$fs,"",0,0,"L");
$pdf->Cell(60,$fs,"GUNUNGKIDUL",1,0,"L");
$pdf->Cell(35,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(60,$fs,"KECAMATAN",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"L");
strlen($ja['NO_KEC'])<2 ? $nokec="0".$ja['NO_KEC'] : $nokec=$ja['NO_KEC'];
	$kkec=str_split($nokec);
	for ($i=0;$i<2;$i++){
		$pdf->Cell(5 ,4,$kkec[$i],1,0,'C');	
	}
$pdf->Cell(15,$fs,"",0,0,"L");
$pdf->Cell(60,$fs,"WONOSARI",1,0,"L");
$pdf->Cell(35,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(60,$fs,"KELURAHAN",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"L");
strlen($ja['NO_KEL'])<2 ? $nokel="0".$ja['NO_KEL'] : $nokel=$ja['NO_KEL'];
	$kkel=str_split($nokel);
	for ($i=0;$i<4;$i++){
		$pdf->Cell(5 ,4,$kkel[$i],1,0,'C');	
	}
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(60,$fs,"GARI",1,0,"L");
$pdf->Cell(35,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);

$pdf->Cell(5,2,"","LB");
$pdf->Cell(185,2,"","B",0,"L");
$pdf->Cell(5,2,"","RB",1);
$pdf->Cell(5,2,"","LT");
$pdf->Cell(185,2,"","T",0,"L");
$pdf->Cell(5,2,"","RT",1);

$q=mysqli_query($connect,"SELECT NO_KK FROM biodata_wni WHERE NIK='$ja[NIK]'");
$dt=mysqli_fetch_array($q);
$q1=mysqli_query($connect,"SELECT * FROM biodata_wni WHERE NO_KK='$ja[NO_KK]' AND STAT_HBKEL!='1'");
$dtkp1=mysqli_fetch_array($q1);
$jm1=mysqli_num_rows($q1);

$q=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NO_KK='$dt[NO_KK]' AND biodata_wni.STAT_HBKEL='1'");
$dtkp=mysqli_fetch_array($q);

$pkjn=mysqli_fetch_array(mysqli_query($connect,"SELECT pekerjaan FROM pekerjaan WHERE JENIS_PKRJN='$dtkp[JENIS_PKRJN]'"));
$jpkjn=$pkjn['pekerjaan'];

$pdf->SetFont("Times","",10);
$pdf->Cell(1,$fs,"","L");
$pdf->Cell(40,$fs,"Nama Lengkap Pemohon",1,0,"L");
$pdf->Cell(2,$fs,"");
$arr=str_split($dtkp['NAMA_LGKP']);
$li=1;
foreach ($arr as $key) {
	$pdf->Cell(5,$fs,$key,1,0,"C");
	$li++;
}
for ($ul=$li;$ul<=30;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"C");
}
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);
$pdf->Cell(1,$fs,"","L");
$pdf->Cell(40,$fs,"NIK Pemohon",1,0,"L");
$pdf->Cell(2,$fs,"");
$arr=str_split($dtkp['NIK']);
$li=1;
foreach ($arr as $key) {
	$pdf->Cell(5,$fs,$key,1,0,"C");
	$li++;
}
for ($ul=$li;$ul<16;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"L");
}
$pdf->Cell(70,$fs,"",0);
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);

$pdf->Cell(1,$fs,"","L");
$pdf->Cell(40,$fs,"Nama Kepala Pemohon",1,0,"L");
$pdf->Cell(2,$fs,"");
$arr=str_split($dtkp['NAMA_KEP']);
$li=1;
foreach ($arr as $key) {
	$pdf->Cell(5,$fs,$key,1,0,"C");
	$li++;
}
for ($ul=$li;$ul<=30;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"L");
}
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);
$pdf->Cell(1,$fs,"","L");
$pdf->Cell(40,$fs,"No. KK",1,0,"L");
$pdf->Cell(2,$fs,"");
$arr=str_split($dtkp['NO_KK']);
$li=1;
foreach ($arr as $key) {
	$pdf->Cell(5,$fs,$key,1,0,"C");
	$li++;
}
for ($ul=$li;$ul<16;$ul++){
	$pdf->Cell(5,$fs,"",1,0,"L");
}
$pdf->Cell(70,$fs,"",0);
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);

$pdf->Cell(1,$fs,"","L");
$pdf->Cell(40,$fs,"Alamat",1,0,"L");
$pdf->Cell(2,$fs,"");
$pdf->Cell(100,$fs,$dtkp['ALAMAT'],1,0,"L");
$pdf->Cell(10,$fs,"RT",0,0,"C");
$no=sprintf("%03d",$dtkp['NO_RT']);
$arr=str_split($no);
for ($ul=0;$ul<3;$ul++){
	$pdf->Cell(5,$fs,$arr[$ul],1,0,"L");
}
$pdf->Cell(10,$fs,"RW",0,0,"C");
$no=sprintf("%03d",$dtkp['NO_RW']);
$arr=str_split($no);
for ($ul=0;$ul<3;$ul++){
	$pdf->Cell(5,$fs,$arr[$ul],1,0,"L");
}
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);

$pdf->Cell(23,$fs,"","L",0,"C");
$pdf->Cell(30,$fs,"a. Kelurahan",0,0,"L");
$pdf->Cell(50,$fs,'GARI',1,0,"C");
$pdf->Cell(15,$fs,"",0,0,"C");
$pdf->Cell(25,$fs,"b. Kecamatan",0,0,"L");
$pdf->Cell(50,$fs,'WONOSARI',1,0,"C");
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);

$pdf->Cell(23,$fs,"","L",0,"C");
$pdf->Cell(30,$fs,"c. Kabupaten/Kota",0,0,"L");
$pdf->Cell(50,$fs,'GUNUNGKIDUL',1,0,"C");
$pdf->Cell(15,$fs,"",0,0,"C");
$pdf->Cell(25,$fs,"d. Propinsi",0,0,"L");
$pdf->Cell(50,$fs,'DIY',1,0,"C");
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);

$pdf->Cell(23,$fs,"","L",0,"C");
$pdf->Cell(30,$fs,"Kode Pos",0,0,"L");
$arr=str_split($dtkp['KODE_POS']);
for ($ul=0;$ul<5;$ul++){
	$pdf->Cell(5,$fs,$arr[$ul],1,0,"C");
}
$pdf->Cell(40,$fs,"",0,0,"C");
$pdf->Cell(25,$fs,"Telepon",0,0,"L");
$pdf->Cell(50,$fs,'',1,0,"C");
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);

$pdf->Cell(1,$fs,"","L");
$pdf->Cell(40,$fs,"Alasan Permohonan",1,0,"L");
$pdf->Cell(2,$fs,"");
$pdf->Cell(5,$fs,"2",1,0,"L");
$pdf->SetFont("Times","",7);
$pdf->Cell(147,2,"1. Karena penambahan anggota keluarga (Kelahiran, Kedatangan)     3. Lainnya","R",1,"L");
$pdf->Cell(48,2,"");
$pdf->Cell(147,2,"2. Karena pengurangan anggota (Kematian, Kepindahan)","R",1,"L");
$pdf->Cell(195,1,"","LR",1);

$pdf->SetFont("Times","",10);
$pdf->Cell(1,$fs,"","L");

$qkel1=mysqli_query($connect,"select * from kematian WHERE id_kematian='$_GET[id]'");
$d=mysqli_fetch_array($qkel1);

$qkel=mysqli_query($connect,"SELECT * FROM biodata_wni 
WHERE 
STAT_HBKEL!='1' 
AND NIK != '$r[NIK_AYAH]' 
AND NIK != '$d[NIK]'
AND NO_KK='$ja[NO_KK]' 
ORDER BY STAT_HBKEL");

$pdf->Cell(40,$fs,"Jumlah Anggota Keluarga",1,0,"L");
$pdf->Cell(2,$fs,"");
$pdf->Cell(10,$fs,$jm1,1,0,"L");
$pdf->Cell(142,$fs,"Orang","R",1,"L");

$pdf->Cell(5,2,"","LB");
$pdf->Cell(185,2,"","B",0,"L");
$pdf->Cell(5,2,"","RB",1);

$pdf->ln(3);
$pdf->SetFont("Times","B",11);

$pdf->Cell(3,$fs,"");
$pdf->Cell(192,$fs,"DAFTAR ANGGOTA KELUARGA PEMOHON (hanya diisi anggota keluarga saja)",0,1);
$pdf->ln(3);

$pdf->Cell(10,$fs,"NO",1,0,"C");
$pdf->Cell(5,$fs,"");
$pdf->Cell(80,$fs,"NIK",1,0,"C");
$pdf->Cell(5,$fs,"");
$pdf->Cell(95,$fs,"NAMA LENGKAP",1,1,"C");
$pdf->SetFont("Times","",11);
$pdf->ln(1);
$jd=1;
while ($angkel=mysqli_fetch_array($qkel)) {
	$arr=str_split(sprintf("%02d",$jd));
	for ($ul=0;$ul<2;$ul++){
		$pdf->Cell(5,$fs,$arr[$ul],1);
	}
	$pdf->Cell(5,$fs,"");
	$n=1;
	$qang=mysqli_query($connect,"SELECT * FROM biodata_wni WHERE NIK='$angkel[NIK]'");
	$ang=mysqli_fetch_array($qang);
	$arr=str_split($ang['NIK']);
	foreach ($arr as $key) {
		$pdf->Cell(5,$fs,$key,1);
		$n++;
	}
	for ($ul=$n;$ul<16;$ul++){
		$pdf->Cell(5,$fs,"",1);
	}
	$pdf->Cell(5,$fs,"");
	$pdf->Cell(95,$fs,$ang['NAMA_LGKP'],1,1);
	$pdf->ln(1);
	$jd++;
}
for ($li=$jd;$li<=8;$li++){
	for ($ul=0;$ul<2;$ul++){
		$pdf->Cell(5,$fs,"",1);
	}
	$pdf->Cell(5,$fs,"");
	for ($ul=0;$ul<16;$ul++){
		$pdf->Cell(5,$fs,"",1);
	}
	$pdf->Cell(5,$fs,"");
	$pdf->Cell(95,$fs,"",1,1);
	$pdf->ln(1);	
}
$pdf->SetFont("Times","",9);
$pdf->ln(5);
$pdf->Cell(55,$fs,"Kepala Dinas Kependudukan dan",0,0,"C");
$pdf->Cell(45,$fs,"mengetahui,",0,0,"C");
$pdf->Cell(50,$fs,"",0,0,"C");
$pdf->Cell(45,$fs,"Gari,". date('d-m-Y',strtotime(date('d-m-Y'))),0,1,"C");
$pdf->Cell(55,$fs,"Pencatatan Sipil Kabupaten Gunungkidul",0,0,"C");
$pdf->Cell(45,$fs,"Camat Wonosari",0,0,"C");
$pdf->Cell(50,$fs,"Kepala Dusun/Lurah Gari",0,0,"C");
$pdf->Cell(45,$fs,"Pemohon",0,1,"C");
$pdf->ln(13);
$pdf->SetFont("Times","BU",9);
$pdf->Cell(55,$fs,".......................................................",0,0,"C");
$pdf->Cell(45,$fs,"..................................................",0,0,"C");
$pdf->Cell(50,$fs,"WIDODO SIP",0,0,"C");
$pdf->Cell(45,$fs,$ja['nama_pelapor'],0,1,"C");
$pdf->SetFont("Times","B",9);
$pdf->Cell(55,$fs,"      NIP :",0,0,"L");
$pdf->Cell(45,$fs,"   NIP :",0,0,"L");
$pdf->Cell(55,$fs,"        NIP :",0,0,"L");
$pdf->Cell(45,$fs,"NIP :",0,1,"L");
$pdf->SetFont("Times","",9);
$pdf->ln(5);
$pdf->Cell(120,$fs,"");
$pdf->Cell(75,$fs,"Tanggal Pemasukkan Data",0,1,"L");
$pdf->Cell(120,$fs,"");
$pdf->Cell(10,$fs,"Tgl",0,0,"L");
$pdf->Cell(5,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(10,$fs,"Bln",0,0,"L");
$pdf->Cell(5,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(10,$fs,"Thn",0,0,"L");
$pdf->Cell(5,$fs,"",1,0,"L");
$pdf->Cell(5,$fs,"",1,1,"L");
$pdf->ln(1);
$pdf->Cell(120,$fs,"");
$pdf->Cell(20,$fs,"Paraf",0,0,"L");
$pdf->Cell(10,$fs,"",0,0,"L");
$pdf->Cell(30,$fs,"",1,1,"L");

$pdf->AddPage('L');

$pdf->Image('logo.jpg',100,10,15,15);
$pdf->SetFont('Times','B',10);
$pdf->ln(2);
$pdf->Cell(310,6,'PEMERINTAH KABUPATEN GUNUNG KIDUL',0,1,'C');
$pdf->Cell(310,6,'KECAMATAN WONOSARI',0,1,'C');
$pdf->ln(4);
$pdf->SetFont('Times','B',6);
$pdf->Cell(160,4,'DATA KEPALA KELUARGA',0,0,'L');
$pdf->SetFont('Times','',6);
$pdf->Cell(45,4,'Kode-Nama Propinsi',0,0,'L');
$pdf->Cell(5,4,':',0,0,'C');
$pdf->Cell(9,4,'34',1,0,'L');
$pdf->Cell(1,4,'',0,0,'L');
$pdf->Cell(60,4,'Daerah Istimewa Yogyakarta',1,1,'L');
$pdf->ln(1);

$pdf->Cell(30,4,'Nama Kepala Keluarga',0,0,'L');
$pdf->Cell(5,4,' : ',0,0,'C');
$query=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga,kematian WHERE kematian.id_kematian='$_GET[id]' 
AND data_keluarga.NO_KK=biodata_wni.NO_KK 
AND kematian.NIK=biodata_wni.NIK");
$data=mysqli_fetch_array($query);

$q=mysqli_query($connect,"SELECT * FROM data_keluarga,biodata_wni,jenis_kelamin,agama,status_perkawinan
 WHERE data_keluarga.NO_KK=biodata_wni.NO_KK 
 AND jenis_kelamin.JENIS_KLMIN=biodata_wni.JENIS_KLMIN 
 AND agama.AGAMA=biodata_wni.AGAMA 
 AND status_perkawinan.STAT_KWN=biodata_wni.STAT_KWN 
 AND biodata_wni.nik != '$d[NIK]'
 AND data_keluarga.NO_KK='$data[NO_KK]' ORDER BY biodata_wni.STAT_HBKEL ");
$j=mysqli_num_rows($q);

$pdf->Cell(85,4,$data['NAMA_KEP'],1,0,'L');
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
$pdf->Cell(5,4,$j,1,0,'L');
$pdf->Cell(7,4,'Orang',0,0,'L');
$pdf->Cell(40,4,'',0,0,'C');
$pdf->Cell(45,4,'Kode-Nama Kelurahan',0,0,'L');
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

$pdf->SetFont('Times','B',6);
$pdf->Cell(155,4,'DATA KELUARGA',0,0,'L');
$pdf->Cell(155,4,'No. KK = '.$data['NO_KK'],0,1,'R');

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
$u=0;
while ($dt=mysqli_fetch_array($q)){
	$u++;
	$pdf->Cell(25,3,$u,1,0,'C');
	$pdf->Cell(50,3,$dt['NAMA_LGKP'],1,0,'C');
	$pdf->Cell(50,3,$dt['NIK'],1,0,'C');
	$pdf->Cell(70,3,$dt['ALAMAT'],1,0,'C');
	$pdf->Cell(50,3,$dt['NO_PASPOR'],1,0,'C');
	$pdf->Cell(65,3,$dt['TGL_AKH_PASPOR'],1,1,'C');
}
for ($i=$u; $i <=10 ; $i++) { 
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
$qq=mysqli_query($connect,"SELECT * FROM data_keluarga,biodata_wni,jenis_kelamin,agama,status_perkawinan,status_hubungan
 WHERE data_keluarga.NO_KK=biodata_wni.NO_KK 
 AND jenis_kelamin.JENIS_KLMIN=biodata_wni.JENIS_KLMIN 
 AND agama.AGAMA=biodata_wni.AGAMA 
 AND status_perkawinan.STAT_KWN=biodata_wni.STAT_KWN 
 AND status_hubungan.STAT_HBKEL=biodata_wni.STAT_HBKEL 
 AND biodata_wni.NIK != '$d[NIK]'
 AND data_keluarga.NO_KK='$data[NO_KK]' ORDER BY biodata_wni.STAT_HBKEL ");
$jj=mysqli_num_rows($qq);


$pdf->SetFont('Times','',6);
$u1=0;
while ($dtt=mysqli_fetch_array($qq)){
	$u1++;
	$pdf->Cell(5,3,$u1,1,0,'C');
	$pdf->Cell(20,3,$dtt['jenis_kelamin'],1,0,'C'); //jenis kelamin
	$pdf->Cell(25,3,$dtt['TMPT_LHR'],1,0,'C'); // tmp lahir
	$pdf->Cell(25,3,$dtt['TGL_LHR'],1,0,'C'); // tgl lahir
	$pdf->Cell(10,3,$dtt['NO_PASPOR'],1,0,'C'); // umur
	$pdf->Cell(15,3,$dtt['AKTA_LHR'],1,0,'C'); // akta lahir
	$pdf->Cell(25,3,$dtt['NO_AKTA_LHR'],1,0,'C'); //no akta lahir
	$pdf->Cell(10,3,$dtt['GOL_DRH'],1,0,'C'); //gol darah
	$pdf->Cell(15,3,$dtt['nama_agama'],1,0,'C'); // Agama
	$pdf->Cell(18,3,$dtt['status_perkawinan'],1,0,'C'); // status perkawinan
	$pdf->Cell(25,3,$dtt['AKTA_KWN'],1,0,'C'); // akta perkawinan
	$pdf->Cell(25,3,$dtt['NO_AKTA_KWN'],1,0,'C'); // no akta perkawinan
	$pdf->Cell(20,3,$dtt['TGL_KWN'],1,0,'C'); // tgl kawin
	$pdf->Cell(30,3,$dtt['AKTA_CRAI'],1,0,'C'); // akta cerai
	$pdf->Cell(25,3,$dtt['NO_AKTA_CRAI'],1,0,'C'); // no akta cerai
	$pdf->Cell(17,3,$dtt['TGL_CRAI'],1,1,'C'); // tgl cerai
	
}
for ($i=$u1; $i <=10 ; $i++) { 
	$pdf->Cell(5,3,$i,1,0,'C'); //no
	$pdf->Cell(20,3,$dtt['jenis_kelamin'],1,0,'C'); //jenis kelamin
	$pdf->Cell(25,3,$dtt['TMPT_LHR'],1,0,'C'); // tmp lahir
	$pdf->Cell(25,3,$dtt['TGL_LHR'],1,0,'C'); // tgl lahir
	$pdf->Cell(10,3,$dtt['NO_PASPOR'],1,0,'C'); // umur
	$pdf->Cell(15,3,$dtt['AKTA_LHR'],1,0,'C'); // akta lahir
	$pdf->Cell(25,3,$dtt['NO_AKTA_LHR'],1,0,'C'); //no akta lahir
	$pdf->Cell(10,3,$dtt['GOL_DRH'],1,0,'C'); //gol darah
	$pdf->Cell(15,3,$dtt['nama_agama'],1,0,'C'); // Agama
	$pdf->Cell(18,3,$dtt['status_perkawinan'],1,0,'C'); // status perkawinan
	$pdf->Cell(25,3,$dtt['AKTA_KWN'],1,0,'C'); // akta perkawinan
	$pdf->Cell(25,3,$dtt['NO_AKTA_KWN'],1,0,'C'); // no akta perkawinan
	$pdf->Cell(20,3,$dtt['TGL_KWN'],1,0,'C'); // tgl kawin
	$pdf->Cell(30,3,$dtt['AKTA_CRAI'],1,0,'C'); // akta cerai
	$pdf->Cell(25,3,$dtt['NO_AKTA_CRAI'],1,0,'C'); // no akta cerai
	$pdf->Cell(17,3,$dtt['TGL_CRAI'],1,1,'C'); // tgl cerai
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
$pdf->SetFont('Times','',6);
$q3=mysqli_query($connect,"SELECT * FROM data_keluarga,biodata_wni,pekerjaan,pendidikan_terakhir,status_hubungan,kelainan_fisik
 WHERE data_keluarga.NO_KK=biodata_wni.NO_KK AND
 biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN AND
 pendidikan_terakhir.PDDK_AKH=biodata_wni.PDDK_AKH AND
 status_hubungan.STAT_HBKEL=biodata_wni.STAT_HBKEL AND
 kelainan_fisik.KLAIN_FSK=biodata_wni.KLAIN_FSK 
  AND biodata_wni.nik != '$d[NIK]'
  AND data_keluarga.NO_KK='$data[NO_KK]' ORDER BY biodata_wni.STAT_HBKEL");
$u2=0;
while ($d=mysqli_fetch_array($q3)){
	$u2++;
	$pdf->Cell(10,3,$u2,1,0,'C');
	$pdf->Cell(30,3,$d['status_hubungan'],1,0,'C'); // status hub
	$pdf->Cell(30,3,$d['kelainan_fisik'],1,0,'C'); // kelainan
	$pdf->Cell(30,3,'',1,0,'C'); // penyandang cacat
	$pdf->Cell(20,3,$d['pendidikan'],1,0,'C'); // pendidikan
	$pdf->Cell(40,3,$d['pekerjaan'],1,0,'C'); // pekerjaan
	$pdf->Cell(35,3,$d['NIK_IBU'],1,0,'C'); // NIK ibu
	$pdf->Cell(40,3,$d['NAMA_LGKP_IBU'],1,0,'C'); // Nama Ibu
	$pdf->Cell(35,3,$d['NIK_AYAH'],1,0,'C'); // NIK Ayah
	$pdf->Cell(40,3,$d['NAMA_LGKP_AYAH'],1,1,'C'); // Nama Ayah
	
}

for ($i=$u2; $i <=10 ; $i++) { 
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

$pdf->Cell(206,4,'',0,0,'C');
$pdf->Cell(104,4,'Gari,'.date('d-m-Y',strtotime(date('d-m-Y'))),0,1,'C');
$pdf->Cell(103,4,'Kepala Kalurahan Gari',0,0,'C');
$pdf->Cell(103,4,'Kecamatan Wonosari',0,0,'C');
$pdf->Cell(103,4,'Kepala Keluarga',0,1,'C');
$pdf->ln(2);
$pdf->Cell(103,4,'Nama Lengkap : WIDODO SIP',0,0,'C');
$pdf->Cell(103,4,'Nama Lengkap : ............................................................',0,0,'C');
$pdf->Cell(104,4,'Nama Lengkap : '.$data['NAMA_KEP'].'',0,1,'C');
$pdf->Output("berkas_permohonan_ktp.pdf","I");


?>