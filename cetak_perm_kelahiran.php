<?php
session_start();
require "fpdf/fpdf.php";
require "connect.php";

$qdatakelahiran=mysqli_query($connect,"SELECT * FROM kelahiran,detail_kelahiran WHERE kelahiran.id_kelahiran=detail_kelahiran.id_kelahiran AND kelahiran.id_kelahiran='$_GET[id_kelahiran]'");
$kelahiran=mysqli_fetch_array($qdatakelahiran);

$nik_ayah=$kelahiran['nik_ayah'];
$nik_ibu=$kelahiran['nik_ibu'];
$nik_pelapor=$kelahiran['nik_pelapor'];
$nik_saksi1=$kelahiran['nik_saksi1'];
$nik_saksi2=$kelahiran['nik_saksi2'];
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 215-(10*2)=195mm

$pdf = new FPDF('P','mm',array(215,330));
$pdf->AddPage();

$pdf->Image('logo.jpg',20,10,20,23);
$pdf->SetFont('Times','B',14);
$pdf->ln(2);
$pdf->Cell(195,6,'PEMERINTAH KABUPATEN GUNUNG KIDUL',0,1,'C');
$pdf->Cell(195,6,'KECAMATAN WONOSARI',0,1,'C');
$pdf->SetFont('Times','B',16);
$pdf->Cell(195,6,'KALURAHAN GARI',0,1,'C');
$pdf->ln(4);
$pdf->Line(10,33,195,33); 
$pdf->SetLineWidth(0.1);
$pdf->Line(10,33.5,195,33.5); 
$pdf->SetLineWidth(0.1);

$pdf->ln(5);
$pdf->SetFont('Times','BU',14);
$pdf->Cell(195,6,'SURAT PENGANTAR AKTA KELAHIRAN',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(95,5,'Nomor : '.$kelahiran['id_kelahiran'],0,0,'C');
$pdf->Cell(50,5,'',0,1,'C');

$pdf->ln(6);
$text="Yang bertanda tangan di bawah ini kami Kepala Kalurahan Gari Kecamatan Wonosari Kabupaten Gunung kidul Daerah Istimewa Yogyakarta menerangkan bahwa:";
$pdf->Cell(15,5,'',0,0,'C');
$pdf->MultiCell(170,5,$text);
$pdf->ln(3);
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Nama ',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$pdf->Cell(120,5,'WIDODO',0,1,'L');
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Tempat, Tgl. Lahir ',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$pdf->Cell(120,5,'Gunung Kidul, 11-11-1975',0,1,'L');
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Pekerjaan ',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$pdf->Cell(120,5,'Perangkat Kalurahan',0,1,'L');
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Alamat ',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$pdf->Cell(120,5,'Ngalorejo, Gari, Wonosari, Gunung Kidul',0,1,'L');
$pdf->ln(3);
$text="Nama tersebut di atas bermaksud mengajukan permohonan Akte Kelahiran umum/terlambat/dispensasi bagi anak yang bernama:";
$pdf->Cell(15,5,'',0,0,'C');
$pdf->MultiCell(170,5,$text);
$pdf->ln(3);
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Nama ',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$pdf->Cell(120,5,$kelahiran['nama_anak'],0,1,'L');
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Tempat, Tgl. Lahir',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$pdf->Cell(120,5,$kelahiran['tempat_lahir'].", ".date("d-M-Y",strtotime($kelahiran['tanggal_lahir'])),0,1,'L');
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Anak ke ',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$pdf->Cell(120,5,$kelahiran['lahir_ke'],0,1,'L');
$pdf->Cell(25,5,'',0,0,'C');
$pdf->Cell(35,5,'Jenis Kelamin ',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'C');
$kelahiran['jenis_kelamin']=='2' ? $jk='Perempuan' : $jk='Laki-laki';
$pdf->Cell(120,5,$jk,0,1,'L');
$pdf->ln(3);
$text="Demikian Surat Keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.";
$pdf->Cell(15,5,'',0,0,'C');
$pdf->MultiCell(170,5,$text);

$pdf->ln(10);
$tgl=date('d-M-Y');
$pdf->Cell(110,5,'',0,0,'J');
$pdf->Cell(85,5,'Gari, '.$tgl,0,1,'C');
$pdf->Cell(110,5,'',0,0,'J');
$qpetugas=mysqli_query($connect,"SELECT jabatan.nama_jabatan,staf.nama_staf,staf.id_staf FROM staf,jabatan WHERE staf.id_staf=jabatan.id_staf AND staf.id_staf='$kelahiran[ttd]'");
$petugas=mysqli_fetch_array($qpetugas);
if ($petugas['id_staf']==1) {
	$pdf->Cell(85,5,'Kepala Kalurahan Gari',0,1,'C');
	$pdf->ln(10);
	$pdf->Cell(110,5,'',0,0,'J');
	$pdf->Cell(85,5,'('.$petugas['nama_staf'].')',0,1,'C');
} else {
	$pdf->Cell(85,5,'A/n Kepala Kalurahan Gari',0,1,'C');
	$pdf->Cell(110,5,'',0,0,'J');
	$pdf->Cell(85,5,$petugas['nama_jabatan'],0,1,'C');
	$pdf->ln(10);
	$pdf->Cell(110,5,'',0,0,'J');
	$pdf->Cell(85,5,'(..........................)',0,1,'C');
}

$pdf->ln(10);

$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->Cell(195,5,"PEMERINTAH KABUPATEN GUNUNG KIDUL",0,1,"L");
$pdf->Cell(120,5,"DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL",0,0,"L");
$pdf->SetFont('Times','',12);
$pdf->Cell(30,5,"Nomor Akta ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(40,5,"....................................",0,1,"L");
$pdf->SetFont('Times','',11);
$pdf->Cell(120,5,"Alamat: Jl. Ksatrian No. 36, Wonosari, Gunung Kidul, Kode Pos 55813",0,0,"L");
$pdf->SetFont('Times','',12);
$pdf->Cell(30,5,"Tanggal ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(40,5,$tgl,0,1,"L");
$pdf->SetFont('Times','',11);
$pdf->Cell(120,5,"Telp: (0274) 391287, Fax: (0274) 391287",0,0,"L");
$pdf->SetFont('Times','',12);
$pdf->Cell(30,5,"Nomor Urut ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(40,5,"....................................",0,1,"L");
$pdf->ln(2);
$pdf->SetFont('Times','BU',12);
$pdf->Cell(120,5,"LAPORAN KELAHIRAN : UMUM",0,0,"R");
$pdf->SetFont('Times','',12);
$pdf->Cell(75,5,"  *) ",0,1,"L");
$pdf->ln(2);
//Data Ayah
$nik=$kelahiran['nik_ayah'];
$q=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NIK='$nik'");
$dt=mysqli_fetch_array($q);
$pdf->Cell(40,5,"Nama Ayah",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
$pecah=str_split($dt['NAMA_LGKP']);
$jh=count($pecah);
if ($jh>18) {
	$str=substr($dt['NAMA_LGKP'], 0,18);
	$pecah=str_split($str);
}
$hi=0;
foreach ($pecah as $huruf) {
	$pdf->Cell(6,5,$huruf,1,0,"L");
	$hi++;
}
for ($ul=$hi;$ul<18;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(10,5,"",0,0,"L");
$pdf->Cell(15,5,"Umur  ",0,0,"R");
$qum=mysqli_query($connect,"SELECT YEAR(curdate()) - YEAR(TGL_LHR) AS usia FROM biodata_wni WHERE NIK='$nik'");
$umr=mysqli_fetch_array($qum);
$umur=sprintf("%02d",$umr['usia']);
$ar_umur=str_split($umur);
foreach ($ar_umur as $usia) {
	$pdf->Cell(5,5,$usia,1,0,"L");
} 
$pdf->Cell(5,5,"th",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"L");
if ($jh>18) {
	$str=substr($dt['NAMA_LGKP'], 18,18);
	$pecah=str_split($str);
	$hi=0;
	foreach ($pecah as $huruf) {
		$pdf->Cell(6,5,$huruf,1,0,"L");
		$hi++;
	}
	for ($ul=$hi;$ul<18;$ul++){
		$pdf->Cell(6,5,"",1,0,"L");	
	}
} else {
	for ($ul=0;$ul<18;$ul++){
		$pdf->Cell(6,5,"",1,0,"L");	
	}
}

$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"NIK ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
$pecah=str_split($dt['NIK']);
$hi=0;
foreach ($pecah as $huruf) {
	$pdf->Cell(6,5,$huruf,1,0,"L");
	$hi++;
}
for ($ul=$hi;$ul<16;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Pekerjaan ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pkjn=mysqli_fetch_array(mysqli_query($connect,"SELECT pekerjaan FROM pekerjaan WHERE JENIS_PKRJN='$dt[JENIS_PKRJN]'"));
$jpkjn=$pkjn['pekerjaan'];
$pdf->Cell(110,5,$jpkjn,0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Alamat Rumah",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(60,5,"Padukuhan : ".$dt['ALAMAT'],0,0,"L");
$pdf->Cell(10,5," RT ",0,0,"C");
$rt=sprintf('%02d',$dt['NO_RT']);
$prt=str_split($rt);
foreach ($prt as $krt) {
	$pdf->Cell(6,5,$krt,1,0,"L");	
}
$pdf->Cell(10,5," RW ",0,0,"C");
$rt=sprintf('%02d',$dt['NO_RW']);
$prt=str_split($rt);
foreach ($prt as $krt) {
	$pdf->Cell(6,5,$krt,1,0,"L");	
}
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(1);
$pdf->Cell(40,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");

$pdf->Cell(50,5,"Kalurahan: ".$dt['NO_KEL'],0,0,"L");
$pdf->Cell(50,5,"Kecamatan: ".$dt['NO_KEC'],0,0,"L");
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(1);

//Data Ibu
$nik=$kelahiran['nik_ibu'];
$q=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NIK='$nik'");
$dti=mysqli_fetch_array($q);
$pdf->Cell(40,5,"Nama Istri/Ibu",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
$pecah=str_split($dti['NAMA_LGKP']);
if (count($pecah)>18) {
	$str=substr($dti['NAMA_LGKP'], 0,18);
	$pecah=str_split($str);
}
$hi=0;
foreach ($pecah as $huruf) {
	$pdf->Cell(6,5,$huruf,1,0,"L");
	$hi++;
}
for ($ul=$hi;$ul<18;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(10,5,"",0,0,"L");
$pdf->Cell(15,5,"Umur  ",0,0,"R");
$qum=mysqli_query($connect,"SELECT YEAR(curdate()) - YEAR(TGL_LHR) AS usia FROM biodata_wni WHERE NIK='$nik'");
$umr=mysqli_fetch_array($qum);
$umur=sprintf("%02d",$umr['usia']);
$ar_umur=str_split($umur);
foreach ($ar_umur as $usia) {
	$pdf->Cell(5,5,$usia,1,0,"L");
} 
$pdf->Cell(5,5,"th",0,1,"L");
$pdf->Cell(40,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"L");
if (count(str_split($dti['NAMA_LGKP']))>18) {
	$str=substr($dti['NAMA_LGKP'], 18,18);
	$pecah=str_split($str);
	$hi=0;
	foreach ($pecah as $huruf) {
		$pdf->Cell(6,5,$huruf,1,0,"L");
		$hi++;
	}
	for ($ul=$hi;$ul<18;$ul++){
		$pdf->Cell(6,5,"",1,0,"L");	
	}
} else {
	for ($ul=0;$ul<18;$ul++){
		$pdf->Cell(6,5,"",1,0,"L");	
	}
}

$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"NIK ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
$pecah=str_split($dti['NIK']);
$hi=0;
foreach ($pecah as $huruf) {
	$pdf->Cell(6,5,$huruf,1,0,"L");
	$hi++;
}
for ($ul=$hi;$ul<16;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Pekerjaan ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pkjn=mysqli_fetch_array(mysqli_query($connect,"SELECT pekerjaan FROM pekerjaan WHERE JENIS_PKRJN='$dti[JENIS_PKRJN]'"));
$jpkjn=$pkjn['pekerjaan'];
$pdf->Cell(110,5,$jpkjn,0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Alamat Rumah",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(60,5,"Padukuhan : ".$dt['ALAMAT'],0,0,"L");
$pdf->Cell(10,5," RT ",0,0,"C");
$rt=sprintf('%02d',$dt['NO_RT']);
$prt=str_split($rt);
foreach ($prt as $krt) {
	$pdf->Cell(6,5,$krt,1,0,"L");	
}
$pdf->Cell(10,5," RW ",0,0,"C");
$rt=sprintf('%02d',$dt['NO_RW']);
$prt=str_split($rt);
foreach ($prt as $krt) {
	$pdf->Cell(6,5,$krt,1,0,"L");	
}
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(1);
$pdf->Cell(40,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");

$pdf->Cell(50,5,"Kalurahan: GARI [".$dt['NO_KEL']."]",0,0,"L");
$pdf->Cell(50,5,"Kecamatan: [".$dt['NO_KEC']."]",0,0,"L");
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(1);

$pdf->Cell(55,5,"Kawin syah di KUA/Gereja/Pure",0,0,"L");
$pdf->Cell(15,5,"    *) ",0,0,"L");
$pdf->Cell(20,5,"Tanggal: ",0,0,"L");
$tgl=substr($dt['TGL_KWN'], 0,10);
$dd=substr($tgl, 8,2);
$hdd=str_split($dd);
$mm=substr($tgl, 5,2);
$hmm=str_split($mm);
$yy=substr($tgl, 0,4);
$hyy=str_split($yy);
foreach ($hdd as $huruf) {
	$pdf->Cell(6,5,$huruf,1,0,"L");
} 
$pdf->Cell(5,5,"",0,0,"C");
foreach ($hmm as $huruf) {
	$pdf->Cell(6,5,$huruf,1,0,"L");
} 
$pdf->Cell(5,5,"",0,0,"C");
foreach ($hyy as $huruf) {
	$pdf->Cell(6,5,$huruf,1,0,"L");
} 
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(1);
$pdf->Cell(40,5,"Anak yang dilahirkan ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(30,5,$kelahiran['jenis_kelamin'],0,1,"L");
$pdf->ln(1);
//Data Anak
$pdf->Cell(40,5,"Nama Anak",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
$hnm=str_split($kelahiran['nama_anak']);
$il=1;
if (count($hnm)>23) {
	$str=substr($kelahiran['nama_anak'], 0,23);
	$hnm=str_split($str);
}
foreach ($hnm as $huruf) {
	$il==23 ? $pdf->Cell(6,5,$huruf,1,1,"L") : $pdf->Cell(6,5,$huruf,1,0,"L");
	$il++;
}
for ($ul=$il;$ul<=23;$ul++){
	$ul==23 ? $pdf->Cell(6,5,"",1,1,"L") : $pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(40,5,"",0,0,"L");
$pdf->Cell(5,5," ",0,0,"L");
if (count($hnm)>23) {
	$str=substr($kelahiran['nama_anak'], 23,23);
	$hnm=str_split($str);
	$il=1;
	foreach ($hnm as $huruf) {
		$il==23 ? $pdf->Cell(6,5,$huruf,1,1,"L") : $pdf->Cell(6,5,$huruf,1,0,"L");
		$il++;
	}
	for ($ul=$il;$ul<=23;$ul++){
		$ul==23 ? $pdf->Cell(6,5,"",1,1,"L") : $pdf->Cell(6,5,"",1,0,"L");	
	}
} else {
	for ($ul=1;$ul<=23;$ul++){
		$ul==23 ? $pdf->Cell(6,5,"",1,1,"L") : $pdf->Cell(6,5,"",1,0,"L");	
	}	
}

$pdf->ln(1);
$pdf->Cell(40,5,"NIK ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
for ($ul=1;$ul<=16;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(15,5,"",0,1,"L");
$pdf->ln(2);
$pdf->Cell(40,5,"Tempat lahir",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(50,5,$kelahiran['tempat_lahir'],0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Hari lahir",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$tanggal = $kelahiran['tanggal_lahir'];
$day = date('D', strtotime($tanggal));
$hari = array(
	'Sun' => 'Minggu',
	'Mon' => 'Senin',
	'Tue' => 'Selasa',
	'Wed' => 'Rabu',
	'Thu' => 'Kamis',
	'Fri' => 'Jumat',
	'Sat' => 'Sabtu'
);
$pdf->Cell(50,5,$hari[$day],0,0,"L");
$pdf->Cell(8,5,"",0,0,"C");
$pdf->Cell(15,5,"Tanggal ");
$pdf->Cell(5,5," : ",0,0,"C");
$tgl=substr($kelahiran['tanggal_lahir'], 0,10);
$dd=substr($tgl, 8,2);
$hdd=str_split($dd);
$mm=substr($tgl, 5,2);
$hmm=str_split($mm);
$yy=substr($tgl, 0,4);
$hyy=str_split($yy);
foreach ($hdd as $huruf) {
	$pdf->Cell(6,5,$huruf,1,0,"L");
} 
$pdf->Cell(5,5,"",0,0,"C");
foreach ($hmm as $huruf) {
	$pdf->Cell(6,5,$huruf,1,0,"L");
} 
$pdf->Cell(5,5,"",0,0,"C");
foreach ($hyy as $huruf) {
	$pdf->Cell(6,5,$huruf,1,0,"L");
} 
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(1);
$pdf->Cell(40,5,"Jam",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(50,5,$kelahiran['jam'],0,0,"L");
$pdf->Cell(8,5,"",0,0,"C");
$pdf->Cell(15,5,"Anak Ke ");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(45,5,$kelahiran['lahir_ke'],0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Yang melaporkan",0,0,"L");
$pdf->Cell(5,5," : ",0,1,"C");
$pdf->Cell(40,5,"Nama ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
$nik=$nik_pelapor;
$q=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NIK='$nik'");
$dtp=mysqli_fetch_array($q);
$hnm=str_split($dtp['NAMA_LGKP']);
$il=1;
if (count($hnm)>18) {
	$str=substr($dtp['NAMA_LGKP'], 0,18);
	$pecah=str_split($str);
	foreach ($pecah as $huruf) {
		$pdf->Cell(6,5,$huruf,1,0,"L");
		$hi++;
	}
	for ($ul=$hi;$ul<18;$ul++){
		$pdf->Cell(6,5,"",1,0,"L");	
	}
}
$hi=0;
foreach ($hnm as $huruf) {
	$pdf->Cell(6,5,$huruf,1,0,"L");
	$il++;
}
for ($ul=$il;$ul<=18;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(10,5,"",0,0,"L");
$pdf->Cell(15,5,"Umur  ",0,0,"R");
$qum=mysqli_query($connect,"SELECT YEAR(curdate()) - YEAR(TGL_LHR) AS usia FROM biodata_wni WHERE NIK='$nik'");
$umr=mysqli_fetch_array($qum);
$umur=sprintf("%02d",$umr['usia']);
$ar_umur=str_split($umur);
foreach ($ar_umur as $usia) {
	$pdf->Cell(5,5,$usia,1,0,"L");
} 
$pdf->Cell(5,5,"th",0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Nomer HP",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(50,5,$kelahiran['no_hp_pelapor'],0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"NIK ",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"L");
$pecah=str_split($dtp['NIK']);
$hi=0;
foreach ($pecah as $huruf) {
	$pdf->Cell(6,5,$huruf,1,0,"L");
	$hi++;
}
for ($ul=$hi;$ul<16;$ul++){
	$pdf->Cell(6,5,"",1,0,"L");	
}
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(1);
$pdf->Cell(40,5,"Pekerjaan",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pkjn=mysqli_fetch_array(mysqli_query($connect,"SELECT pekerjaan FROM pekerjaan WHERE JENIS_PKRJN='$dtp[JENIS_PKRJN]'"));
$jpkjn=$pkjn['pekerjaan'];
$pdf->Cell(110,5,$jpkjn,0,1,"L");
$pdf->ln(1);
$pdf->Cell(40,5,"Alamat Rumah",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(60,5,"Padukuhan : ".$dtp['ALAMAT'],0,0,"L");
$pdf->Cell(10,5," RT ",0,0,"C");
$rt=sprintf('%02d',$dtp['NO_RT']);
$prt=str_split($rt);
foreach ($prt as $krt) {
	$pdf->Cell(6,5,$krt,1,0,"L");	
}
$pdf->Cell(10,5," RW ",0,0,"C");
$rt=sprintf('%02d',$dtp['NO_RW']);
$prt=str_split($rt);
foreach ($prt as $krt) {
	$pdf->Cell(6,5,$krt,1,0,"L");	
}
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(1);
$pdf->Cell(40,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");

$pdf->Cell(50,5,"Kalurahan: ".$dtp['NO_KEL'],0,0,"L");
$pdf->Cell(50,5,"Kecamatan: ".$dtp['NO_KEC'],0,0,"L");
$pdf->Cell(5,5,"",0,1,"C");
$pdf->ln(4);

$tgl_now=date("d-M-Y");
$pdf->Cell(130,5,"",0,0,"C");
$pdf->Cell(65,5,"Gunungkidul, ".$tgl_now,0,1,"C");
$pdf->ln(13);
$pdf->Cell(130,5,"",0,0,"C");
$pdf->Cell(65,5,"(......................................)",0,1,"C");

$pdf->ln(1);
$pdf->SetFont("Times","BU",12);
$pdf->Cell(95,5,"Saksi I",0,0,"L");
$pdf->Cell(5,5,"",0,0,"0");
$pdf->Cell(95,5,"Saksi II",0,1,"L");
$pdf->SetFont("Times","",12);
$nik=$nik_saksi1;
$q=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NIK='$nik'");
$dts1=mysqli_fetch_array($q);
$pkjn1=mysqli_fetch_array(mysqli_query($connect,"SELECT pekerjaan FROM pekerjaan WHERE JENIS_PKRJN='$dts1[JENIS_PKRJN]'"));
$jpkjn1=$pkjn1['pekerjaan'];

$nik2=$nik_saksi2;
$q2=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NIK='$nik2'");
$dts2=mysqli_fetch_array($q2);
$pkjn2=mysqli_fetch_array(mysqli_query($connect,"SELECT pekerjaan FROM pekerjaan WHERE JENIS_PKRJN='$dts2[JENIS_PKRJN]'"));
$jpkjn2=$pkjn2['pekerjaan'];

$pdf->Cell(25,5,"Nama",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,$dts1['NAMA_LGKP'],0,0,"L");
$pdf->Cell(5,5,"",0,0,"0");
$pdf->Cell(25,5,"Nama",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,$dts2['NAMA_LGKP'],0,1,"L");
$pdf->Cell(25,5,"NIK",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,$dts1['NIK'],0,0,"L");
$pdf->Cell(5,5,"",0,0,"0");
$pdf->Cell(25,5,"NIK",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,$dts2['NIK'],0,1,"L");
$pdf->Cell(25,5,"Pekerjaan",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,$jpkjn1,0,0,"L");
$pdf->Cell(5,5,"",0,0,"0");
$pdf->Cell(25,5,"Pekerjaan",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,$jpkjn2,0,1,"L");
$pdf->Cell(25,5,"Alamat",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,$dts1['ALAMAT'],0,0,"L");
$pdf->Cell(5,5,"",0,0,"0");
$pdf->Cell(25,5,"Alamat",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,$dts1['ALAMAT'],0,1,"L");
$pdf->Cell(25,5,"Tanda Tangan",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,"",0,0,"C");
$pdf->Cell(5,5,"",0,0,"0");
$pdf->Cell(25,5,"Tanda Tangan",0,0,"L");
$pdf->Cell(5,5," : ",0,0,"C");
$pdf->Cell(65,5,"",0,1,"C");
$pdf->ln(3);
$pdf->SetFont("Times","U",12);
$pdf->Cell(25,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(65,5,"..........................................",0,0,"L");
$pdf->Cell(5,5,"",0,0,"0");
$pdf->Cell(25,5,"",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(65,5,"..........................................",0,1,"L");
$pdf->ln(2);
$pdf->SetFont("Times","BU",12);
$pdf->Cell(150,5,"PERSYARATAN",0,1,"L");
$pdf->SetFont("Times","",10);
$pdf->Cell(195,4,"1. Fotocopy Surat Kelahiran dari Bidan/Dokter/Penolong kelahiran",0,1,"L");
$pdf->Cell(195,4,"2. Formulir Surat Keterangan Kelahiran dari Kalurahan (F2.01)",0,1,"L");
$pdf->Cell(195,4,"3. Fotocopy kutipan Akta Nikah/Akta Perkawinan orang tua",0,1,"L");
$pdf->Cell(195,4,"4. Fotocopy Kartu Keluarga",0,1,"L");
$pdf->Cell(195,4,"5. Fotocopy KTP orang tua",0,1,"L");
$pdf->Cell(195,4,"6. Fotocopy Akta Kematian / Surat Kematina bagi orang tua yang sudah meninggal",0,1,"L");
$pdf->Cell(195,4,"7. Fotocopy KTP 2 orang Saksi",0,1,"L");
$pdf->Cell(195,4,"8. Surat Kuasa (Bila dikuasakan) bermaterai Rp. 6.000,- diketahui Kepala Kalurahan dan dilampiri fotocopy KTP yang diberi kuasa",0,1,"L");
$pdf->Cell(195,4,"9. Semua persyaratan dilegalisir oleh instansi yang berwenang",0,1,"L");

//Lembar 3
for ($i=0;$i<4;$i++){

	$pdf->AddPage();
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(164 ,6,'',0,0,'C');
	$pdf->Cell(25 ,6,' F2.01 ',1,1,'C');
	$pdf->SetFont("Times","",11);
	$pdf->Cell(50,4,"Pemerintah Kalurahan/Kelurahan",0,0,"L");
	$pdf->Cell(5,4," : ",0,0,"C");
	$pdf->Cell(125,4,"GARI",0,1,"L");
	$pdf->Cell(50,4,"Kecamatan",0,0,"L");
	$pdf->Cell(5,4," : ",0,0,"C");
	$pdf->Cell(125,4,"WONOSARI",0,1,"L");
	$pdf->Cell(50,4,"Kabupaten/Kota",0,0,"L");
	$pdf->Cell(5,4," : ",0,0,"C");
	$pdf->Cell(125,4,"GUNUNGKIDUL",0,1,"L");
	$pdf->ln(2);
	$pdf->Cell(50,4,"Kode Wilayah",0,0,"L");
	$pdf->Cell(5,4," : ",0,0,"C");
	for ($ul=1;$ul<=10;$ul++){
		$ul==10 ? $pdf->Cell(5,4,"  ",1,1,"L") : $pdf->Cell(5,4,"  ",1,0,"L");
	}
	$pdf->ln(3);
	$pdf->SetFont("Times","B",12);
	$pdf->Cell(195,5,"SURAT KETERANGAN KELAHIRAN",0,1,"C");
	$pdf->SetFont("Times","",11);
	$pdf->Cell(195,4,"No.: ..............................",0,1,"C");
	$pdf->ln(1);
	$pdf->Cell(5,4,"",0,0,"C");
	$pdf->Cell(45,4,"Nama Kepala Keluarga",0,0,"L");
	$pdf->Cell(5,4," : ",0,0,"C");
	$pecah=str_split($dt['NAMA_KEP']);
	$hi=0;
	foreach ($pecah as $huruf) {
		$pdf->Cell(5,4,$huruf,1,0,"C");
		$hi++;
	}
	for ($ul=$hi;$ul<=25;$ul++){
		$ul==25 ? $pdf->Cell(5,4,"",1,1,"C") : $pdf->Cell(5,4,"",1,0,"C");
	}
	$pdf->ln(1);
	$pdf->Cell(5,4,"",0,0,"C");
	$pdf->Cell(45,4,"Nomor Kartu Keluarga",0,0,"L");
	$pdf->Cell(5,4," : ",0,0,"C");
	$ar_nokk=str_split($dt['NO_KK']);
	$hi=0;
	foreach ($ar_nokk as $huruf) {
		$ul==25 ? $pdf->Cell(5,4,$huruf,1,1,"C") : $pdf->Cell(5,4,$huruf,1,0,"C");
		$hi++;
	}
	for ($ul=$hi;$ul<=25;$ul++){
		$ul==25 ? $pdf->Cell(5,4,"",1,1,"C") : $pdf->Cell(5,4,"",1,0,"C");
	}
	$pdf->ln(1);
	$fs=3.5;
	$pdf->SetFont("Times","B",11);
	$pdf->Cell(5,$fs,"","LT",0,"C");
	$pdf->Cell(180,4,"BAYI/ANAK","TR",1,"L");
	$pdf->SetFont("Times","",10);
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"1. Nama",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pecah=str_split($kelahiran['nama_anak']);
	$hi=1;
	foreach ($pecah as $huruf) {
		$pdf->Cell(5,$fs,$huruf,1,0,"C");
		$hi++;
	}
	for ($ul=$hi;$ul<=25;$ul++){
		$pdf->Cell(5,$fs,"",1,0,"C");
	}
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"2. Jenis Kelamin",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(5,$fs,$kelahiran['jenis_kelamin'],1,0,"C");
	$pdf->Cell(40,$fs,"1. Laki-laki",0,0,"L");
	$pdf->Cell(40,$fs,"2. Perempuan",0,0,"L");
	$pdf->Cell(40,$fs,"",0,0,"C");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"3. Tempat dilahirkan",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(5,$fs,$kelahiran['tempat_dilahirkan'],1,0,"C");
	$pdf->Cell(20,$fs,"1. RS/RB",0,0,"L");
	$pdf->Cell(25,$fs,"2. Puskesmas",0,0,"L");
	$pdf->Cell(25,$fs,"3. Polindes",0,0,"L");
	$pdf->Cell(20,$fs,"4. Rumah",0,0,"L");
	$pdf->Cell(25,$fs,"5. Lainnya",0,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"4. Tempat Kelahiran",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$arr_tmp_lahir=str_split($kelahiran['tempat_lahir']);
	$hi=1;
	foreach ($arr_tmp_lahir as $huruf) {
		$pdf->Cell(5,$fs,$huruf,1,0,"C");
		$hi++;
	}
	for ($ul=$hi;$ul<=15;$ul++){
		$pdf->Cell(5,$fs,"",1,0,"C");
	}
	$pdf->Cell(55,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"5. Hari dan tanggal lahir",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(10,$fs,"Hari",0,0,"L");
	$arr=str_split($hari[$day]);
	$hi=1;
	foreach ($arr as $huruf) {
		$pdf->Cell(5,$fs,$huruf,1,0,"C");
		$hi++;
	}
	for ($ul=$hi;$ul<=6;$ul++){
		$pdf->Cell(5,$fs,"",1,0,"C");
	}
	$pdf->Cell(10,$fs,"",0,0,"C");
	$pdf->Cell(10,$fs,"Tgl.",0,0,"L");
	for ($ul=0;$ul<2;$ul++){
		$pdf->Cell(5,$fs,$dd[$ul],1,0,"C");
	}
	$pdf->Cell(10,$fs,"Bln",0,0,"L");
	for ($ul=0;$ul<2;$ul++){
		$pdf->Cell(5,$fs,$mm[$ul],1,0,"C");
	}
	$pdf->Cell(10,$fs,"Thn",0,0,"L");
	for ($ul=0;$ul<4;$ul++){
		$pdf->Cell(5,$fs,$yy[$ul],1,0,"C");
	}
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"6. Pukul",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$jam=substr($kelahiran['jam'], 0,5);
	$pukul=str_split($jam);
	for ($ul=0;$ul<=4;$ul++){
		$pdf->Cell(5,$fs,$pukul[$ul],1,0,"C");
	}
	$pdf->Cell(105,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"7. Jenis Kelahiran",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(5,$fs,$kelahiran['jenis_kelahiran'],1,0,"C");
	$pdf->Cell(20,$fs,"1. Tunggal",0,0,"L");
	$pdf->Cell(25,$fs,"2. Kembar",0,0,"L");
	$pdf->Cell(25,$fs,"3. Kembar 3",0,0,"L");
	$pdf->Cell(25,$fs,"4. Kembar 4",0,0,"L");
	$pdf->Cell(25,$fs,"5. Lainnya....",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"8. Kelahiran ke",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(5,$fs,$kelahiran['lahir_ke'],1,0,"C");
	$pdf->Cell(25,$fs,"1 , 2 , 3 , 4 , ..........",0,0,"L");
	$pdf->Cell(95,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"9. Penolong Kelahiran",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(5,$fs,$kelahiran['persalinan'],1,0,"C");
	$pdf->Cell(20,$fs,"1. Dokter",0,0,"L");
	$pdf->Cell(30,$fs,"2. Bidan/Perawat",0,0,"L");
	$pdf->Cell(25,$fs,"3. Dukun",0,0,"L");
	$pdf->Cell(25,$fs,"4. Lainnya ....",0,0,"L");
	$pdf->Cell(20,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"10. Berat Bayi",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(20,$fs,$kelahiran['berat_bayi'],1,0,"C");
	$pdf->Cell(105,$fs," Kg",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"11. Panjang Bayi",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(20,$fs,$kelahiran['panjang_bayi'],1,0,"C");
	$pdf->Cell(105,$fs," cm",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");
	$pdf->Cell(185,2,"","LBR",1,"C");

	$pdf->SetFont("Times","B",11);
	$pdf->Cell(5,$fs,"","LT",0,"C");
	$pdf->Cell(180,4,"IBU","TR",1,"L");
	$pdf->SetFont("Times","",10);
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"1. NIK",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$arr=str_split($kelahiran['nik_ibu']);
	$hi=1;
	foreach ($arr as $huruf) {
		$pdf->Cell(5,$fs,$huruf,1,0,"C");
		$hi++;
	}
	for ($ul=$hi;$ul<=25;$ul++){
		$pdf->Cell(5,$fs,"",1,0,"C");
	}
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"2. Nama Lengkap",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$arr=str_split($dti['NAMA_LGKP']);
	$hi=1;
	foreach ($arr as $huruf) {
		$pdf->Cell(5,$fs,$huruf,1,0,"C");
		$hi++;
	}
	for ($ul=$hi;$ul<=25;$ul++){
		$pdf->Cell(5,$fs,"",1,0,"C");
	}
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"3. Tanggal Lahir/Umur",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$tgl=substr($dti['TGL_LHR'], 0,10);
	$dd=substr($tgl, 8,2);
	$hdd=str_split($dd);
	$mm=substr($tgl, 5,2);
	$hmm=str_split($mm);
	$yy=substr($tgl, 0,4);
	$hyy=str_split($yy);

	$pdf->Cell(10,$fs,"Tgl.",0,0,"L");
	for ($ul=0;$ul<2;$ul++){
		$pdf->Cell(5,$fs,$hdd[$ul],1,0,"C");
	}
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(10,$fs,"Bln",0,0,"L");
	for ($ul=0;$ul<2;$ul++){
		$pdf->Cell(5,$fs,$hmm[$ul],1,0,"C");
	}
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(10,$fs,"Thn",0,0,"L");
	for ($ul=0;$ul<4;$ul++){
		$pdf->Cell(5,$fs,$hyy[$ul],1,0,"C");
	}
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(15,$fs,"Umur",0,0,"L");
	$qum=mysqli_query($connect,"SELECT YEAR(curdate()) - YEAR(TGL_LHR) AS usia FROM biodata_wni WHERE NIK='$kelahiran[nik_ibu]'");
	$umr=mysqli_fetch_array($qum);
	$umur=sprintf("%03d",$umr['usia']);
	$ar_umur=str_split($umur);
	for ($ul=0;$ul<3;$ul++){
		$pdf->Cell(5,$fs,$ar_umur[$ul],1,0,"C");
	}
	$pdf->Cell(10,$fs,"",0,0,"C");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"4. Pekerjaan",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pkjn=mysqli_fetch_array(mysqli_query($connect,"SELECT pekerjaan FROM pekerjaan WHERE JENIS_PKRJN='$dti[JENIS_PKRJN]'"));

	$pdf->Cell(30,$fs,$pkjn['pekerjaan'],0,0,"L");
	$pdf->Cell(95,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"5. Alamat",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");

	$q=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NIK='$kelahiran[nik_ibu]'");

	$almt=mysqli_fetch_array($q);
	$pdf->Cell(125,$fs,$almt['ALAMAT'],1,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(35,$fs,"a. Kelurahan",0,0,"L");
	$pdf->Cell(25,$fs,$almt['NO_KEL'],1,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(35,$fs,"c. Kabupaten/Kota",0,0,"L");
	$pdf->Cell(25,$fs,$almt['NO_KAB'],1,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(35,$fs,"b. Kecamatan",0,0,"L");
	$pdf->Cell(25,$fs,$almt['NO_KEC'],1,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(35,$fs,"d. Propinsi",0,0,"L");
	$pdf->Cell(25,$fs,$almt['NO_PROP'],1,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"6. Kewarganegaraan",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(5,$fs,"1",1,0,"L");
	$pdf->Cell(25,$fs,"1. WNI",0,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(25,$fs,"2. WNA",0,0,"L");
	$pdf->Cell(65,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"7. Kebangsaan",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(50,$fs,"INDONESIA",1,0,"L");
	$pdf->Cell(75,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"8. Tgl pencatatan perkawinan",0,0,"L");
	$tgl=substr($dt['TGL_KWN'], 0,10);
	$dd=substr($tgl, 8,2);
	$hdd=str_split($dd);
	$mm=substr($tgl, 5,2);
	$hmm=str_split($mm);
	$yy=substr($tgl, 0,4);
	$hyy=str_split($yy);
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(10,$fs,"Tgl.",0,0,"L");
	for ($ul=0;$ul<2;$ul++){
		$pdf->Cell(5,$fs,$hdd[$ul],1,0,"C");
	}
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(10,$fs,"Bln",0,0,"L");
	for ($ul=0;$ul<2;$ul++){
		$pdf->Cell(5,$fs,$hmm[$ul],1,0,"C");
	}
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(10,$fs,"Thn",0,0,"L");
	for ($ul=0;$ul<4;$ul++){
		$pdf->Cell(5,$fs,$hyy[$ul],1,0,"C");
	}
	$pdf->Cell(50,$fs,"","R",1,"C");
	$pdf->Cell(185,2,"","LBR",1,"C");

	$pdf->SetFont("Times","B",11);
	$pdf->Cell(5,$fs,"","LT",0,"C");
	$pdf->Cell(180,4,"AYAH","TR",1,"L");
	$pdf->SetFont("Times","",10);
	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"1. NIK",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$arr=str_split($kelahiran['nik_ayah']);
	$hi=1;
	foreach ($arr as $huruf) {
		$pdf->Cell(5,$fs,$huruf,1,0,"C");
		$hi++;
	}
	for ($ul=$hi;$ul<=25;$ul++){
		$pdf->Cell(5,$fs,"",1,0,"C");
	}
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"2. Nama Lengkap",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$arr=str_split($dt['NAMA_LGKP']);
	$hi=1;
	foreach ($arr as $huruf) {
		$pdf->Cell(5,$fs,$huruf,1,0,"C");
		$hi++;
	}
	for ($ul=$hi;$ul<=25;$ul++){
		$pdf->Cell(5,$fs,"",1,0,"C");
	}
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"3. Tanggal Lahir/Umur",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$tgl=substr($dt['TGL_LHR'], 0,10);
	$dd=substr($tgl, 8,2);
	$hdd=str_split($dd);
	$mm=substr($tgl, 5,2);
	$hmm=str_split($mm);
	$yy=substr($tgl, 0,4);
	$hyy=str_split($yy);

	$pdf->Cell(10,$fs,"Tgl.",0,0,"L");
	for ($ul=0;$ul<2;$ul++){
		$pdf->Cell(5,$fs,$hdd[$ul],1,0,"C");
	}
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(10,$fs,"Bln",0,0,"L");
	for ($ul=0;$ul<2;$ul++){
		$pdf->Cell(5,$fs,$hmm[$ul],1,0,"C");
	}
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(10,$fs,"Thn",0,0,"L");
	for ($ul=0;$ul<4;$ul++){
		$pdf->Cell(5,$fs,$hyy[$ul],1,0,"C");
	}
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(15,$fs,"Umur",0,0,"L");
	$qum=mysqli_query($connect,"SELECT YEAR(curdate()) - YEAR(TGL_LHR) AS usia FROM biodata_wni WHERE NIK='$kelahiran[nik_ayah]'");
	$umr=mysqli_fetch_array($qum);
	$umur=sprintf("%03d",$umr['usia']);
	$ar_umur=str_split($umur);
	for ($ul=0;$ul<3;$ul++){
		$pdf->Cell(5,$fs,$ar_umur[$ul],1,0,"C");
	}
	$pdf->Cell(10,$fs,"",0,0,"C");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"4. Pekerjaan",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pkjn=mysqli_fetch_array(mysqli_query($connect,"SELECT pekerjaan FROM pekerjaan WHERE JENIS_PKRJN='$dt[JENIS_PKRJN]'"));

	$pdf->Cell(30,$fs,$pkjn['pekerjaan'],0,0,"L");
	$pdf->Cell(95,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"5. Alamat",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");

	$q=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NIK='$kelahiran[nik_ibu]'");

	$almt=mysqli_fetch_array($q);
	$pdf->Cell(125,$fs,$almt['ALAMAT'],1,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(35,$fs,"a. Kelurahan",0,0,"L");
	$pdf->Cell(25,$fs,$almt['NO_KEL'],1,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(35,$fs,"c. Kabupaten/Kota",0,0,"L");
	$pdf->Cell(25,$fs,$almt['NO_KAB'],1,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(35,$fs,"b. Kecamatan",0,0,"L");
	$pdf->Cell(25,$fs,$almt['NO_KEC'],1,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(35,$fs,"d. Propinsi",0,0,"L");
	$pdf->Cell(25,$fs,$almt['NO_PROP'],1,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"6. Kewarganegaraan",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(5,$fs,"1",1,0,"L");
	$pdf->Cell(25,$fs,"1. WNI",0,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(25,$fs,"2. WNA",0,0,"L");
	$pdf->Cell(65,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(5,$fs,"","L",0,"C");
	$pdf->Cell(45,$fs,"7. Kebangsaan",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"C");
	$pdf->Cell(50,$fs,"INDONESIA",1,0,"L");
	$pdf->Cell(75,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1,"C");

	$pdf->Cell(185,2,"","LBR",1,"C");

	$ar_dt=array("PELAPOR" => $nik_pelapor,
		"SAKSI I" => $nik_saksi1,
		"SAKSI II" => $nik_saksi1 );

	foreach ($ar_dt as $j => $nik){
		$pdf->SetFont("Times","B",11);
		$pdf->Cell(5,$fs,"","LT",0,"C");
		$pdf->Cell(180,4,$j,"TR",1,"L");
		$pdf->SetFont("Times","",10);
		$pdf->Cell(5,$fs,"","L",0,"C");

		$q=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NIK='$nik'");
		$dta=mysqli_fetch_array($q);
		$pkjn=mysqli_fetch_array(mysqli_query($connect,"SELECT pekerjaan FROM pekerjaan WHERE JENIS_PKRJN='$dta[JENIS_PKRJN]'"));
		$jpkjn=$pkjn['pekerjaan'];

		$pdf->Cell(45,$fs,"1. NIK",0,0,"L");
		$pdf->Cell(5,$fs," : ",0,0,"C");
		$arr=str_split($dta['NIK']);
		$li=1;
		foreach ($arr as $key) {
			$pdf->Cell(5,$fs,$key,1,0,"C");
			$li++;
		}
		for ($ul=$li;$ul<=25;$ul++){
			$pdf->Cell(5,$fs,"",1,0,"C");
		}
		$pdf->Cell(5,$fs,"","R",1,"C");

		$pdf->Cell(5,$fs,"","L",0,"C");
		$pdf->Cell(45,$fs,"2. Nama Lengkap",0,0,"L");
		$pdf->Cell(5,$fs," : ",0,0,"C");
		$arr=str_split($dta['NAMA_LGKP']);
		$li=1;
		foreach ($arr as $key) {
			$pdf->Cell(5,$fs,$key,1,0,"C");
			$li++;
		}
		for ($ul=$li;$ul<=25;$ul++){
			$pdf->Cell(5,$fs,"",1,0,"C");
		}
		$pdf->Cell(5,$fs,"","R",1,"C");

		$pdf->Cell(5,$fs,"","L",0,"C");
		$pdf->Cell(45,$fs,"3. Umur",0,0,"L");
		$pdf->Cell(5,$fs," : ",0,0,"C");
		$qum=mysqli_query($connect,"SELECT YEAR(curdate()) - YEAR(TGL_LHR) AS usia FROM biodata_wni WHERE NIK='$nik'");
		$umr=mysqli_fetch_array($qum);
		$umur=sprintf("%03d",$umr['usia']);
		$ar_umur=str_split($umur);
		for ($ul=0;$ul<3;$ul++){
			$pdf->Cell(5,$fs,$ar_umur[$ul],1,0,"C");
		}
		$pdf->Cell(30,$fs,"Tahun",0,0,"L");
		$pdf->Cell(80,$fs,"",0,0,"C");
		$pdf->Cell(5,$fs,"","R",1,"C");

		$pdf->Cell(5,$fs,"","L",0,"C");
		$pdf->Cell(45,$fs,"4. Jenis Kelamin",0,0,"L");
		$pdf->Cell(5,$fs," : ",0,0,"C");
		$pdf->Cell(15,$fs,"",0,0,"L");
		$pdf->Cell(35,$fs,"1. Laki-laki",0,0,"L");
		$pdf->Cell(5,$fs,"",0,0,"L");
		$pdf->Cell(35,$fs,"2. Perempuan",0,0,"L");
		$pdf->Cell(35,$fs,"",0,0,"L");
		$pdf->Cell(5,$fs,"","R",1,"C");

		$pdf->Cell(5,$fs,"","L",0,"C");
		$pdf->Cell(45,$fs,"5. Pekerjaan",0,0,"L");
		$pdf->Cell(5,$fs," : ",0,0,"C");
		$pdf->Cell(30,$fs,$jpkjn,0,0,"L");
		$pdf->Cell(95,$fs,"",0,0,"L");
		$pdf->Cell(5,$fs,"","R",1,"C");

		$pdf->Cell(5,$fs,"","L",0,"C");
		$pdf->Cell(45,$fs,"5. Alamat",0,0,"L");
		$pdf->Cell(5,$fs," : ",0,0,"C");
		$pdf->Cell(125,$fs,$dta['ALAMAT'],1,0,"L");
		$pdf->Cell(5,$fs,"","R",1,"C");

		$pdf->Cell(5,$fs,"","L",0,"C");
		$pdf->Cell(45,$fs,"",0,0,"L");
		$pdf->Cell(5,$fs,"",0,0,"C");
		$pdf->Cell(35,$fs,"a. Kelurahan",0,0,"L");
		$pdf->Cell(25,$fs,$dta['NO_KEL'],1,0,"L");
		$pdf->Cell(5,$fs,"",0,0,"L");
		$pdf->Cell(35,$fs,"c. Kabupaten/Kota",0,0,"L");
		$pdf->Cell(25,$fs,$dta['NO_KAB'],1,0,"L");
		$pdf->Cell(5,$fs,"","R",1,"C");

		$pdf->Cell(5,$fs,"","L",0,"C");
		$pdf->Cell(45,$fs,"",0,0,"L");
		$pdf->Cell(5,$fs,"",0,0,"C");
		$pdf->Cell(35,$fs,"b. Kecamatan",0,0,"L");
		$pdf->Cell(25,$fs,$dta['NO_KEC'],1,0,"L");
		$pdf->Cell(5,$fs,"",0,0,"L");
		$pdf->Cell(35,$fs,"d. Propinsi",0,0,"L");
		$pdf->Cell(25,$fs,$dta['NO_PROP'],1,0,"L");
		$pdf->Cell(5,$fs,"","R",1,"C");
		$pdf->Cell(185,2,"","LBR",1,"C");	
	}
	$pdf->ln(5);
	$pdf->SetFont("Times","",11);
	$fs=4;
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(45,$fs,"mengetahui,",0,0,"C");
	$pdf->Cell(80,$fs,"",0,0,"C");
	$pdf->Cell(50,$fs,"Gunungkidul, ".$tgl_now,0,0,"C");
	$pdf->Cell(5,$fs,"",0,1,"C");

	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(45,$fs,"Kepala Kalurahan/Lurah",0,0,"C");
	$pdf->Cell(80,$fs,"",0,0,"C");
	$pdf->Cell(50,$fs,"Pelapor",0,0,"C");
	$pdf->Cell(5,$fs,"",0,1,"C");

	$pdf->ln(10);
	$pdf->Cell(5,$fs,"",0,0,"C");
	$pdf->Cell(45,$fs,"(........................)",0,0,"C");
	$pdf->Cell(80,$fs,"",0,0,"C");
	$pdf->Cell(50,$fs,"(........................)",0,0,"C");
	$pdf->Cell(5,$fs,"",0,1,"C");

}

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
$prop=str_split("34");
for ($ul=0;$ul<2;$ul++){
	$pdf->Cell(5,$fs,$prop[$ul],1,0,"L");
}
$pdf->Cell(15,$fs,"",0,0,"L");
$pdf->Cell(70,$fs,"DAERAH ISTIMEWA YOGYAKARTA",1,0,"L");
$pdf->Cell(25,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(60,$fs,"PEMERINTAH KABUPATEN/KOTA",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"L");
$prop=str_split("03");
for ($ul=0;$ul<2;$ul++){
	$pdf->Cell(5,$fs,$prop[$ul],1,0,"L");
}
$pdf->Cell(15,$fs,"",0,0,"L");
$pdf->Cell(70,$fs,"GUNUNGKIDUL",1,0,"L");
$pdf->Cell(25,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(60,$fs,"KECAMATAN",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"L");
$prop=str_split("01");
for ($ul=0;$ul<2;$ul++){
	$pdf->Cell(5,$fs,$prop[$ul],1,0,"L");
}
$pdf->Cell(15,$fs,"",0,0,"L");
$pdf->Cell(70,$fs,"WONOSARI",1,0,"L");
$pdf->Cell(25,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);
$pdf->Cell(5,$fs,"","L");
$pdf->Cell(60,$fs,"KELURAHAN",0,0,"L");
$pdf->Cell(5,$fs," : ",0,0,"L");
$prop=str_split("2004");
for ($ul=0;$ul<4;$ul++){
	$pdf->Cell(5,$fs,$prop[$ul],1,0,"L");
}
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(70,$fs,"GARI",1,0,"L");
$pdf->Cell(25,$fs,"",0,0,"L");
$pdf->Cell(5,$fs,"","R",1);

$pdf->Cell(5,2,"","LB");
$pdf->Cell(185,2,"","B",0,"L");
$pdf->Cell(5,2,"","RB",1);
$pdf->Cell(5,2,"","LT");
$pdf->Cell(185,2,"","T",0,"L");
$pdf->Cell(5,2,"","RT",1);

$nik=$kelahiran['nik_ayah'];
$q=mysqli_query($connect,"SELECT NO_KK FROM biodata_wni WHERE NIK='$nik'");
$dt=mysqli_fetch_array($q);
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
$pdf->Cell(50,$fs,$dtkp['NO_KEL'],1,0,"C");
$pdf->Cell(15,$fs,"",0,0,"C");
$pdf->Cell(25,$fs,"b. Kecamatan",0,0,"L");
$pdf->Cell(50,$fs,$dtkp['NO_KEC'],1,0,"C");
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);

$pdf->Cell(23,$fs,"","L",0,"C");
$pdf->Cell(30,$fs,"c. Kabupaten/Kota",0,0,"L");
$pdf->Cell(50,$fs,$dtkp['NO_KAB'],1,0,"C");
$pdf->Cell(15,$fs,"",0,0,"C");
$pdf->Cell(25,$fs,"d. Propinsi",0,0,"L");
$pdf->Cell(50,$fs,$dtkp['NO_PROP'],1,0,"C");
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
$pdf->Cell(50,$fs,$kelahiran['no_hp_pelapor'],1,0,"C");
$pdf->Cell(2,$fs,"","R",1);
$pdf->Cell(195,1,"","LR",1);

$pdf->Cell(1,$fs,"","L");
$pdf->Cell(40,$fs,"Alasan Permohonan",1,0,"L");
$pdf->Cell(2,$fs,"");
$pdf->Cell(5,$fs,"1",1,0,"L");
$pdf->SetFont("Times","",7);
$pdf->Cell(147,2,"1. Karena penambahan anggota keluarga (Kelahiran, Kedatangan)     3. Lainnya","R",1,"L");
$pdf->Cell(48,2,"");
$pdf->Cell(147,2,"2. Karena pengurangan anggota (Kematian, Kepindahan)","R",1,"L");
$pdf->Cell(195,1,"","LR",1);

$pdf->SetFont("Times","",10);
$pdf->Cell(1,$fs,"","L");

$qkel=mysqli_query($connect,"SELECT * FROM data_keluarga,biodata_wni WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.STAT_HBKEL!='1' AND biodata_wni.NO_KK='$dtkp[NO_KK]' ORDER BY biodata_wni.STAT_HBKEL");
$jkel=mysqli_num_rows($qkel);
$pdf->Cell(40,$fs,"Jumlah Anggota Keluarga",1,0,"L");
$pdf->Cell(2,$fs,"");
$pdf->Cell(10,$fs,$jkel+1,1,0,"L");
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
$arr=str_split(sprintf("%02d",$jd));
for ($ul=0;$ul<2;$ul++){
	$pdf->Cell(5,$fs,$arr[$ul],1);
}
$pdf->Cell(5,$fs,"");
for ($ul=0;$ul<16;$ul++){
	$pdf->Cell(5,$fs,"0",1);
}
$pdf->Cell(5,$fs,"");
$pdf->Cell(95,$fs,$kelahiran['nama_anak'],1,1);
$jd++;
$pdf->ln(1);	
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
$pdf->Cell(45,$fs,"Gunungkidul, ".date("d-M-Y"),0,1,"C");
$pdf->Cell(55,$fs,"Pencatatan Sipil Kabupaten Gunungkidul",0,0,"C");
$pdf->Cell(45,$fs,"Camat Wonosari",0,0,"C");
$pdf->Cell(50,$fs,"Kepala Kalurahan/Lurah Gari",0,0,"C");
$pdf->Cell(45,$fs,"Pemohon",0,1,"C");
$pdf->ln(13);
$pdf->SetFont("Times","BU",9);
$pdf->Cell(55,$fs,".......................................................",0,0,"C");
$pdf->Cell(45,$fs,"..................................................",0,0,"C");
$pdf->Cell(50,$fs,"..............................................",0,0,"C");
$pdf->Cell(45,$fs,"..............................................",0,1,"C");
$pdf->SetFont("Times","B",9);
$pdf->Cell(55,$fs,"      NIP :",0,0,"L");
$pdf->Cell(45,$fs,"   NIP :",0,0,"L");
$pdf->Cell(55,$fs,"        NIP :",0,0,"L");
$pdf->Cell(45,$fs,"NIP :",0,1,"L");
$pdf->SetFont("Times","",9);
$pdf->ln(5);
$pdf->Cell(120,$fs,"");
$pdf->Cell(75,$fs,"Tanggal Pemasukkan Data",0,1,"L");

$tgl_masuk=date("d-m-Y");
$dd=str_split(substr($tgl_masuk,0,2));
$mm=str_split(substr($tgl_masuk,3,2));
$yy=str_split(substr($tgl_masuk,8,2));
$pdf->Cell(120,$fs,"");
$pdf->Cell(10,$fs,"Tgl",0,0,"L");
for ($i=0;$i<2;$i++){
	$pdf->Cell(5,$fs,$dd[$i],1,0,"L");	
}
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(10,$fs,"Bln",0,0,"L");
for ($i=0;$i<2;$i++){
	$pdf->Cell(5,$fs,$mm[$i],1,0,"L");	
}
$pdf->Cell(5,$fs,"",0,0,"L");
$pdf->Cell(10,$fs,"Thn",0,0,"L");
for ($i=0;$i<2;$i++){
	$i==1 ? $pdf->Cell(5,$fs,$yy[$i],1,1,"L") : $pdf->Cell(5,$fs,$yy[$i],1,0,"L");	
}
$pdf->ln(1);
$pdf->Cell(120,$fs,"");
$pdf->Cell(20,$fs,"Paraf",0,0,"L");
$pdf->Cell(10,$fs,"",0,0,"L");
$pdf->Cell(30,$fs,"",1,1,"L");

$pdf->AddPage('L');

$query=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NIK='$kelahiran[nik_ayah]' AND data_keluarga.NO_KK=biodata_wni.NO_KK");
$data=mysqli_fetch_array($query);

$pdf->Image('logo.jpg',100,10,15,15);
$pdf->SetFont('Times','B',12);
$pdf->ln(2);
$pdf->Cell(310,6,'PEMERINTAH KABUPATEN GUNUNG KIDUL',0,1,'C');
$pdf->Cell(310,6,'KECAMATAN WONOSARI',0,1,'C');
$pdf->ln(2);
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
$q=mysqli_query($connect,"SELECT * FROM data_keluarga,biodata_wni WHERE data_keluarga.NO_KK=biodata_wni.NO_KK AND data_keluarga.NO_KK='$data[NO_KK]' ORDER BY biodata_wni.STAT_HBKEL ");
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

$pdf->SetFont('Times','B',8);
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
	$pdf->Cell(50,3,$dt['NAMA_LGKP'],1,0,'L');
	$pdf->Cell(50,3,$dt['NIK'],1,0,'L');
	$pdf->Cell(70,3,$dt['TMPT_SBL'],1,0,'L');
	$pdf->Cell(50,3,$dt['NO_PASPOR'],1,0,'C');
	$pdf->Cell(65,3,$dt['TGL_AKH_PASPOR'],1,1,'C');
}
$u++;
$pdf->Cell(25,3,$u,1,0,'C');
$pdf->Cell(50,3,$kelahiran['nama_anak'],1,0,'L');
$pdf->Cell(50,3,'0000000000000000',1,0,'L');
$pdf->Cell(70,3,'-',1,0,'C');
$pdf->Cell(50,3,'-',1,0,'C');
$pdf->Cell(65,3,'-',1,1,'C');
$u++;
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
$pdf->Cell(12,3,'','LTR',0,'C'); //gol darah
$pdf->Cell(15,3,'','LTR',0,'C'); // Agama
$pdf->Cell(18,3,'','LTR',0,'C'); // status perkawinan
$pdf->Cell(25,3,'','LTR',0,'C'); // akta perkawinan
$pdf->Cell(25,3,'','LTR',0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'','LTR',0,'C'); // tgl kawin
$pdf->Cell(25,3,'','LTR',0,'C'); // akta cerai
$pdf->Cell(25,3,'','LTR',0,'C'); // no akta cerai
$pdf->Cell(20,3,'','LTR',1,'C'); // tgl cerai
//
$pdf->Cell(5,3,'','LR',0,'C'); //no
$pdf->Cell(20,3,'','LR',0,'C'); //jenis kelamin
$pdf->Cell(25,3,'','LR',0,'C'); // tmp lahir
$pdf->Cell(25,3,'TANGGAL/BULAN','LR',0,'C'); // tgl lahir
$pdf->Cell(10,3,'','LR',0,'C'); // umur
$pdf->Cell(15,3,'LAHIR/','LR',0,'C'); // akta lahir
$pdf->Cell(25,3,'NOMOR AKTA','LR',0,'C'); //no akta lahir
$pdf->Cell(12,3,'','LR',0,'C'); //gol darah
$pdf->Cell(15,3,'','LR',0,'C'); // Agama
$pdf->Cell(18,3,'','LR',0,'C'); // status perkawinan
$pdf->Cell(25,3,'AKTA','LR',0,'C'); // akta perkawinan
$pdf->Cell(25,3,'NOMOR AKTA','LR',0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'','LR',0,'C'); // tgl kawin
$pdf->Cell(25,3,'','LR',0,'C'); // akta cerai
$pdf->Cell(25,3,'NOMOR/AKTA','LR',0,'C'); // no akta cerai
$pdf->Cell(20,3,'','LR',1,'C'); // tgl cerai
//
$pdf->Cell(5,3,'NO','LR',0,'C'); //no
$pdf->Cell(20,3,'JENIS','LR',0,'C'); //jenis kelamin
$pdf->Cell(25,3,'TEMPAT LAHIR','LR',0,'C'); // tmp lahir
$pdf->Cell(25,3,'/TAHUN','LR',0,'C'); // tgl lahir
$pdf->Cell(10,3,'UMUR','LR',0,'C'); // umur
$pdf->Cell(15,3,'SURAT','LR',0,'C'); // akta lahir
$pdf->Cell(25,3,'KELAHIRAN/','LR',0,'C'); //no akta lahir
$pdf->Cell(12,3,'GOL','LR',0,'C'); //gol darah
$pdf->Cell(15,3,'AGAMA','LR',0,'C'); // Agama
$pdf->Cell(18,3,'STATUS','LR',0,'C'); // status perkawinan
$pdf->Cell(25,3,'PERKAWINAN','LR',0,'C'); // akta perkawinan
$pdf->Cell(25,3,'PERKAWINAN/','LR',0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'TANGGAL','LR',0,'C'); // tgl kawin
$pdf->Cell(25,3,'AKTA CERAI/SURAT','LR',0,'C'); // akta cerai
$pdf->Cell(25,3,'PERCERAIAN','LR',0,'C'); // no akta cerai
$pdf->Cell(20,3,'TANGGAL','LR',1,'C'); // tgl cerai
//
$pdf->Cell(5,3,'','LR',0,'C'); //no
$pdf->Cell(20,3,'KELAMIN','LR',0,'C'); //jenis kelamin
$pdf->Cell(25,3,'','LR',0,'C'); // tmp lahir
$pdf->Cell(25,3,'LAHIR','LR',0,'C'); // tgl lahir
$pdf->Cell(10,3,'','LR',0,'C'); // umur
$pdf->Cell(15,3,'LAHIR','LR',0,'C'); // akta lahir
$pdf->Cell(25,3,'SURAT KELAHIRAN','LR',0,'C'); //no akta lahir
$pdf->Cell(12,3,'DARAH','LR',0,'C'); //gol darah
$pdf->Cell(15,3,'','LR',0,'C'); // Agama
$pdf->Cell(18,3,'PERKAWINAN','LR',0,'C'); // status perkawinan
$pdf->Cell(25,3,'BUKU NIKAH*)','LR',0,'C'); // akta perkawinan
$pdf->Cell(25,3,'BUKU NIKAH','LR',0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'PERKAWINAN','LR',0,'C'); // tgl kawin
$pdf->Cell(25,3,'CERAI','LR',0,'C'); // akta cerai
$pdf->Cell(25,3,'SURAT CERAI*)','LR',0,'C'); // no akta cerai
$pdf->Cell(20,3,'PERCERAIAN*)','LR',1,'C'); // tgl cerai
$pdf->Cell(5,3,'','LBR',0,'C'); //no
$pdf->Cell(20,3,'','LBR',0,'C'); //jenis kelamin
$pdf->Cell(25,3,'','LBR',0,'C'); // tmp lahir
$pdf->Cell(25,3,'','LBR',0,'C'); // tgl lahir
$pdf->Cell(10,3,'','LBR',0,'C'); // umur
$pdf->Cell(15,3,'','LBR',0,'C'); // akta lahir
$pdf->Cell(25,3,'','LBR',0,'C'); //no akta lahir
$pdf->Cell(12,3,'','LBR',0,'C'); //gol darah
$pdf->Cell(15,3,'','LBR',0,'C'); // Agama
$pdf->Cell(18,3,'','LBR',0,'C'); // status perkawinan
$pdf->Cell(25,3,'','LBR',0,'C'); // akta perkawinan
$pdf->Cell(25,3,'','LBR',0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'','LBR',0,'C'); // tgl kawin
$pdf->Cell(25,3,'','LBR',0,'C'); // akta cerai
$pdf->Cell(25,3,'','LBR',0,'C'); // no akta cerai
$pdf->Cell(20,3,'','LBR',1,'C'); // tgl cerai
//DATA
$u=0;
$pdf->SetFont('Times','',6);
$q2=mysqli_query($connect,"SELECT * FROM data_keluarga,biodata_wni,jenis_kelamin,akte_kelahiran,golongan_darah,agama,status_perkawinan,akte_perkawinan,akte_perceraian WHERE akte_perceraian.AKTA_CRAI=biodata_wni.AKTA_CRAI AND akte_perkawinan.AKTA_KWN=biodata_wni.AKTA_KWN AND status_perkawinan.STAT_KWN=biodata_wni.STAT_KWN AND agama.AGAMA=biodata_wni.AGAMA AND golongan_darah.GOL_DRH=biodata_wni.GOL_DRH AND akte_kelahiran.AKTA_LHR=biodata_wni.AKTA_LHR AND jenis_kelamin.JENIS_KLMIN=biodata_wni.JENIS_KLMIN AND data_keluarga.NO_KK=biodata_wni.NO_KK AND data_keluarga.NO_KK='$data[NO_KK]' ORDER BY biodata_wni.STAT_HBKEL ");
while ($dt2=mysqli_fetch_array($q2)){
	$u++;
	$qum=mysqli_query($connect,"SELECT YEAR(curdate()) - YEAR(TGL_LHR) AS usia FROM biodata_wni WHERE NIK='$dt2[NIK]'");
	$umr=mysqli_fetch_array($qum);
	$pdf->Cell(5,3,$u,'LTR',0,'C'); //no
	$pdf->Cell(20,3,$dt2['jenis_kelamin'],'LTR',0,'C'); //jenis kelamin
	$pdf->Cell(25,3,$dt2['TMPT_LHR'],'LTR',0,'C'); // tmp lahir
	$pdf->Cell(25,3,date_format(date_create($dt2['TGL_LHR']),"d/m/Y"),'LTR',0,'C'); // tgl lahir
	$pdf->Cell(10,3,$umr['usia'],'LTR',0,'C'); // umur
	$pdf->Cell(15,3,$dt2['akte_kelahiran'],'LTR',0,'C'); // akta lahir
	$pdf->Cell(25,3,$dt2['NO_AKTA_LHR'],'LTR',0,'C'); //no akta lahir
	$pdf->Cell(12,3,$dt2['nama_golongan'],'LTR',0,'C'); //gol darah
	$pdf->Cell(15,3,$dt2['nama_agama'],'LTR',0,'C'); // Agama
	$pdf->Cell(18,3,$dt2['status_perkawinan'],'LTR',0,'C'); // status perkawinan
	$pdf->Cell(25,3,$dt2['akte_perkawinan'],'LTR',0,'C'); // akta perkawinan
	$pdf->Cell(25,3,$dt2['NO_AKTA_KWN'],'LTR',0,'C'); // no akta perkawinan
	$pdf->Cell(20,3,$dt2['TGL_KWN'],'LTR',0,'C'); // tgl kawin
	$pdf->Cell(25,3,$dt2['akte_perceraian'],'LTR',0,'C'); // akta cerai
	$pdf->Cell(25,3,$dt2['NO_AKTA_CRAI'],'LTR',0,'C'); // no akta cerai
	$pdf->Cell(20,3,$dt2['TGL_CRAI'],'LTR',1,'C'); // tgl cerai
}
$u++;
$pdf->Cell(5,3,$u,1,0,'C'); //no
$pdf->Cell(20,3,$kelahiran['jenis_kelamin']==1? "Laki-laki" : "Perempuan",1,0,'C'); //jenis kelamin
$pdf->Cell(25,3,strtoupper($kelahiran['tempat_lahir']),1,0,'C'); // tmp lahir
$pdf->Cell(25,3,date_format(date_create($kelahiran['tanggal_lahir']),"d/m/Y"),1,0,'C'); // tgl lahir
$pdf->Cell(10,3,'0',1,0,'C'); // umur
$pdf->Cell(15,3,'-',1,0,'C'); // akta lahir
$pdf->Cell(25,3,'-',1,0,'C'); //no akta lahir
$pdf->Cell(12,3,'-',1,0,'C'); //gol darah
$pdf->Cell(15,3,'-',1,0,'C'); // Agama
$pdf->Cell(18,3,'-',1,0,'C'); // status perkawinan
$pdf->Cell(25,3,'-',1,0,'C'); // akta perkawinan
$pdf->Cell(25,3,'-',1,0,'C'); // no akta perkawinan
$pdf->Cell(20,3,'-',1,0,'C'); // tgl kawin
$pdf->Cell(25,3,'-',1,0,'C'); // akta cerai
$pdf->Cell(25,3,'-',1,0,'C'); // no akta cerai
$pdf->Cell(20,3,'-',1,1,'C'); // tgl cerai

$u++;
for ($i=$u; $i <=10 ; $i++) {
	$pdf->Cell(5,3,$i,1,0,'C'); //no
	$pdf->Cell(20,3,'',1,0,'C'); //jenis kelamin
	$pdf->Cell(25,3,'',1,0,'C'); // tmp lahir
	$pdf->Cell(25,3,'',1,0,'C'); // tgl lahir
	$pdf->Cell(10,3,'',1,0,'C'); // umur
	$pdf->Cell(15,3,'',1,0,'C'); // akta lahir
	$pdf->Cell(25,3,'',1,0,'C'); //no akta lahir
	$pdf->Cell(12,3,'',1,0,'C'); //gol darah
	$pdf->Cell(15,3,'',1,0,'C'); // Agama
	$pdf->Cell(18,3,'',1,0,'C'); // status perkawinan
	$pdf->Cell(25,3,'',1,0,'C'); // akta perkawinan
	$pdf->Cell(25,3,'',1,0,'C'); // no akta perkawinan
	$pdf->Cell(20,3,'',1,0,'C'); // tgl kawin
	$pdf->Cell(25,3,'',1,0,'C'); // akta cerai
	$pdf->Cell(25,3,'',1,0,'C'); // no akta cerai
	$pdf->Cell(20,3,'',1,1,'C'); // tgl cerai
}
$pdf->ln(1);

//
$pdf->SetFont('Times','B',6);
$pdf->Cell(10,3,'','LTR',0,'C'); // no
$pdf->Cell(30,3,'STATUS HUB','LTR',0,'C'); // status hub
$pdf->Cell(20,3,'KELAINAN','LTR',0,'C'); // kelainan
$pdf->Cell(25,3,'PENYANDANG','LTR',0,'C'); // penyandang cacat
$pdf->Cell(35,3,'PENDIDIKAN','LTR',0,'C'); // pendidikan
$pdf->Cell(40,3,'','LTR',0,'C'); // pekerjaan
$pdf->Cell(35,3,'','LTR',0,'C'); // NIK ibu
$pdf->Cell(40,3,'','LTR',0,'C'); // Nama Ibu
$pdf->Cell(35,3,'','LTR',0,'C'); // NIK Ayah
$pdf->Cell(40,3,'','LTR',1,'C'); // Nama Ayah
$pdf->Cell(10,3,'NO','LBR',0,'C'); // no
$pdf->Cell(30,3,'DALAM KELUARGA','LBR',0,'C'); // status hub
$pdf->Cell(20,3,'FISIK & MENTAL','LBR',0,'C'); // kelainan
$pdf->Cell(25,3,'CACAT','LBR',0,'C'); // penyandang cacat
$pdf->Cell(35,3,'TERAKHIR','LBR',0,'C'); // pendidikan
$pdf->Cell(40,3,'PEKERJAAN','LBR',0,'C'); // pekerjaan
$pdf->Cell(35,3,'NIK IBU','LBR',0,'C'); // NIK ibu
$pdf->Cell(40,3,'NAMA LENGKAP IBU','LBR',0,'C'); // Nama Ibu
$pdf->Cell(35,3,'NIK AYAH','LBR',0,'C'); // NIK Ayah
$pdf->Cell(40,3,'NAMA LENKAP AYAH','LBR',1,'C'); // Nama Ayah
//data TABEL
$u=0;
$pdf->SetFont('Times','',6);
$q3=mysqli_query($connect,"SELECT * FROM data_keluarga,biodata_wni,status_hubungan,kelainan_fisik,penyandang_cacat,pendidikan_terakhir,pekerjaan WHERE pekerjaan.JENIS_PKRJN=biodata_wni.JENIS_PKRJN AND pendidikan_terakhir.PDDK_AKH=biodata_wni.PDDK_AKH AND penyandang_cacat.PNYDNG_CCT=biodata_wni.PNYDNG_CCT AND kelainan_fisik.KLAIN_FSK=biodata_wni.KLAIN_FSK AND status_hubungan.STAT_HBKEL=biodata_wni.STAT_HBKEL AND data_keluarga.NO_KK=biodata_wni.NO_KK AND data_keluarga.NO_KK='$data[NO_KK]' ORDER BY biodata_wni.STAT_HBKEL ");
while ($dt3=mysqli_fetch_array($q3)){
	$u++;
	$pdf->Cell(10,3,$u,1,0,'C'); // no
	$pdf->Cell(30,3,$dt3['status_hubungan'],1,0,'C'); // status hub
	$pdf->Cell(20,3,$dt3['kelainan_fisik'],1,0,'C'); // kelainan
	$pdf->Cell(25,3,$dt3['penyandang_cacat'],1,0,'C'); // penyandang cacat
	$pdf->Cell(35,3,$dt3['pendidikan'],1,0,'C'); // pendidikan
	$pdf->Cell(40,3,$dt3['pekerjaan'],1,0,'C'); // pekerjaan
	$pdf->Cell(35,3,$dt3['NIK_IBU'],1,0,'C'); // NIK ibu
	$pdf->Cell(40,3,$dt3['NAMA_LGKP_IBU'],1,0,'C'); // Nama Ibu
	$pdf->Cell(35,3,$dt3['NIK_AYAH'],1,0,'C'); // NIK Ayah
	$pdf->Cell(40,3,$dt3['NAMA_LGKP_AYAH'],1,1,'C'); // Nama Ayah
}
$u++;
$pdf->Cell(10,3,$u,1,0,'C'); // no
	$pdf->Cell(30,3,'Anak',1,0,'C'); // status hub
	$pdf->Cell(20,3,'-',1,0,'C'); // kelainan
	$pdf->Cell(25,3,'-',1,0,'C'); // penyandang cacat
	$pdf->Cell(35,3,'-',1,0,'C'); // pendidikan
	$pdf->Cell(40,3,'-',1,0,'C'); // pekerjaan
	$pdf->Cell(35,3,$kelahiran['nik_ibu'],1,0,'C'); // NIK ibu
	$pdf->Cell(40,3,$dti['NAMA_LGKP'],1,0,'C'); // Nama Ibu
	$pdf->Cell(35,3,$kelahiran['nik_ayah'],1,0,'C'); // NIK Ayah
	$pdf->Cell(40,3,$data['NAMA_LGKP'],1,1,'C'); // Nama Ayah
	$u++;
	for ($i=$u;$i<=10;$i++){
	$pdf->Cell(10,3,$i,1,0,'C'); // no
	$pdf->Cell(30,3,'',1,0,'C'); // status hub
	$pdf->Cell(20,3,'',1,0,'C'); // kelainan
	$pdf->Cell(25,3,'',1,0,'C'); // penyandang cacat
	$pdf->Cell(35,3,'',1,0,'C'); // pendidikan
	$pdf->Cell(40,3,'',1,0,'C'); // pekerjaan
	$pdf->Cell(35,3,'',1,0,'C'); // NIK ibu
	$pdf->Cell(40,3,'',1,0,'C'); // Nama Ibu
	$pdf->Cell(35,3,'',1,0,'C'); // NIK Ayah
	$pdf->Cell(40,3,'',1,1,'C'); // Nama Ayah
}
$pdf->ln(2);
$pdf->Cell(206,4,'',0,0,'C');
$pdf->Cell(104,4,'Gari, '.date("d-M-Y"),0,1,'C');
$pdf->Cell(103,4,'Kepala Kalurahan Gari',0,0,'C');
$pdf->Cell(103,4,'Kecamatan Wonosari',0,0,'C');
$pdf->Cell(103,4,'Kepala Keluarga',0,1,'C');
$pdf->ln(7);
$pdf->Cell(103,4,'Nama Lengkap : ............................................................',0,0,'C');
$pdf->Cell(103,4,'Nama Lengkap : ............................................................',0,0,'C');
$pdf->Cell(104,4,'Nama Lengkap : ............................................................',0,1,'C');

$pdf->Output("berkas_permohonan_ktp.pdf","D");

?>