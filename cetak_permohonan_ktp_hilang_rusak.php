<?php
session_start();
require "fpdf/fpdf.php";
require "connect.php";

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$nik=$_GET['nik'];

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm',array(219,330));
$pdf->AddPage();

$query=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NIK='$nik' AND data_keluarga.NO_KK=biodata_wni.NO_KK");
$data=mysqli_fetch_array($query);
for ($ct=1;$ct<=2;$ct++){
	//set font to Times, bold, 12pt
	$pdf->SetFont('Times','B',12);
//Cell(width , height , text , border , end line , [align] )
	$pdf->Cell(164 ,6,'',0,0,'C');
	$pdf->Cell(25 ,6,' F-1.21 ',1,1,'C');
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(15 ,8,'',0,0,'C');
	$pdf->Cell(159 ,8,' FORMULIR PERMOHONAN KARTU TANDA PENDUDUK (KTP) WARGA NEGARA INDONESIA ',0,0,'C');
	$pdf->Cell(15 ,8,'',0,1,'C');
	$pdf->SetFont('Times','B',7);
	$pdf->Cell(15 ,3,'Perhatian:','LT',0,'C');
	$pdf->Cell(174 ,3,'','TR',1,'C');
	$pdf->SetFont('Times','',7);
	$pdf->Cell(189 ,3,'1. Harap diisi dengan huruf cetak dan menggunakan tinta hitam','LR',1,'L');
	$pdf->Cell(189 ,3,'2. Untuk kolom pilihan, harap memberi tanda silang (x) pada kotak pilihan','LR',1,'L');
	$pdf->Cell(189 ,3,'3. Setelah formulir ini diisi dan ditandatangani, harap diserahkan kembali ke kantor Kelurahan','LBR',1,'L');
	$pdf->ln(3);
	$pdf->SetFont('Times','B',8);
	$pdf->Cell(60 ,4,'PEMERINTAH PROPINSI',0,0,'L');
	$pdf->SetFont('Times','',8);
	$pdf->Cell(5 ,4,' : ',0,0,'C');
	//kode propinsi
	strlen($data['NO_PROP']) <2 ? $noprop="0".$data['NO_PROP'] : $noprop=$data['NO_PROP'];
	$kprop=str_split($noprop);
	for ($i=0;$i<2;$i++){
		$pdf->Cell(5 ,4,$kprop[$i],1,0,'C');	
	}	
	$pdf->Cell(15 ,4,'  ',0,0,'C');
	//kalu sudah ada tabel propinsi bisa dipanggil dengan no prop
	$pdf->Cell(80 ,4,' Daerah Istimewa Yogyakarta',1,0,'L');
	$pdf->Cell(19 ,4,'',0,1,'C');
	$pdf->SetFont('Times','B',8);
	$pdf->Cell(60 ,4,'PEMERINTAH KABUPATEN/KOTA',0,0,'L');
	$pdf->SetFont('Times','',8);
	$pdf->Cell(5 ,4,' : ',0,0,'C');
	//kode kabupaten
	strlen($data['NO_KAB'])<2 ? $nokab="0".$data['NO_KAB'] : $nokab=$data['NO_KAB'];
	$kkab=str_split($nokab);
	for ($i=0;$i<2;$i++){
		$pdf->Cell(5 ,4,$kprop[$i],1,0,'C');	
	}
	$pdf->Cell(15 ,4,'  ',0,0,'C');
	$pdf->Cell(80 ,4,' Gunung Kidul',1,0,'L');
	$pdf->Cell(19 ,4,'',0,1,'C');
	$pdf->SetFont('Times','B',8);
	$pdf->Cell(60 ,4,'KECAMATAN',0,0,'L');
	$pdf->SetFont('Times','',8);
	$pdf->Cell(5 ,4,' : ',0,0,'C');
	//kode kecamatan
	strlen($data['NO_KEC'])<2 ? $nokec="0".$data['NO_KEC'] : $nokec=$data['NO_KEC'];
	$kkec=str_split($nokec);
	for ($i=0;$i<2;$i++){
		$pdf->Cell(5 ,4,$kkec[$i],1,0,'C');	
	}
	$pdf->Cell(15 ,4,'  ',0,0,'C');
	$pdf->Cell(80 ,4,' Wonosari',1,0,'L');
	$pdf->Cell(19 ,4,'',0,1,'C');

	$pdf->SetFont('Times','B',8);
	$pdf->Cell(60 ,4,'KELURAHAN',0,0,'L');
	$pdf->SetFont('Times','',8);
	$pdf->Cell(5 ,4,' : ',0,0,'C');
	//kode kecamatan
	strlen($data['NO_KEL'])<2 ? $nokel="0".$data['NO_KEL'] : $nokel=$data['NO_KEL'];
	$kkel=str_split($nokel);
	for ($i=0;$i<4;$i++){
		$pdf->Cell(5 ,4,$kkel[$i],1,0,'C');	
	}
	
	$pdf->Cell(5 ,4,'  ',0,0,'C');
	$pdf->Cell(80 ,4,' Gari ',1,0,'L');
	$pdf->Cell(19 ,4,'',0,1,'C');
	$pdf->ln(2);

	$pdf->SetFont('Times','BIU',8);
	$pdf->Cell(40 ,4,'PERMOHONAN KTP',0,0,'L');
	$pdf->SetFont('Times','',8);
	$pdf->Cell(5 ,4,'',1,0,'L');
	$pdf->Cell(20 ,4,'A. Baru',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'',1,0,'L');
	$pdf->Cell(30 ,4,'B. Perpanjangan',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell(5 ,4,'v',1,0,'L');
	$pdf->Cell(30 ,4,'C. Penggantian',1,1,'L');
	$pdf->ln(3);

	$pdf->Cell(28 ,4,'1. Nama Lengkap',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	//Nama Lengkap
	$hurufke=0;
	$namalkp=str_split($data['NAMA_LGKP']);
	foreach ($namalkp as $huruf) {
		$hurufke++;
		$hurufke==31 ? $pdf->Cell(5,4,$huruf,1,1,'L') : $pdf->Cell(5,4,$huruf,1,0,'L');
	}
	if ($hurufke==31){

	} else {
		for ($ul=$hurufke;$ul<=31;$ul++){
			$ul==31 ? $pdf->Cell(5 ,4,'',1,1,'L'):$pdf->Cell(5 ,4,'',1,0,'L');
		}
		
	}
	$pdf->ln(1);

	$pdf->Cell(28 ,4,'2. No. KK',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	//No_KK
	$hurufke=0;
	$nokk=str_split($data['NO_KK']);
	foreach ($nokk as $huruf) {
		$hurufke++;
		$hurufke==16 ? $pdf->Cell(5,4,$huruf,1,1,'L') : $pdf->Cell(5,4,$huruf,1,0,'L');
	}
	if ($hurufke==16){

	} else {
		for ($ul=$hurufke;$ul<=16;$ul++){
			$ul==16 ? $pdf->Cell(5 ,4,'',1,1,'L'):$pdf->Cell(5 ,4,'',1,0,'L');
		}

	}
	$pdf->ln(1);
	$pdf->Cell(28 ,4,'3. NIK',1,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	//NIK
	$hurufke=0;
	$dtnik=str_split($data['NIK']);
	foreach ($dtnik as $huruf) {
		$hurufke++;
		$hurufke==16 ? $pdf->Cell(5,4,$huruf,1,1,'L') : $pdf->Cell(5,4,$huruf,1,0,'L');
	}
	if ($hurufke==16){

	} else {
		for ($ul=$hurufke;$ul<=16;$ul++){
			$ul==16 ? $pdf->Cell(5 ,4,'',1,1,'L'):$pdf->Cell(5 ,4,'',1,0,'L');
		}

	}
	$pdf->ln(1);

	$pdf->Cell(28 ,4,'4. Alamat',1,0,'L');
	//alamat 
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell(155 ,4,$data['ALAMAT'],1,1,'L');
	$pdf->ln(1);
	$pdf->Cell(28 ,4,'',0,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell(155 ,4,'',1,1,'L');
	$pdf->ln(1);

	$pdf->Cell(28 ,4,'',0,0,'L');
	$pdf->Cell(2 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'RT:',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	$RT=sprintf("%03d",$data['NO_RT']);
	$ar_RT=str_split($RT);
	foreach ($ar_RT as $huruf) {
		$hurufke++;
		$hurufke==3 ? $pdf->Cell(5,4,$huruf,1,1,'L') : $pdf->Cell(5,4,$huruf,1,0,'L');
	}
	
	$pdf->Cell(5 ,4,'',0,0,'L');
	$pdf->Cell(10 ,4,'RW:',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	$RW=sprintf("%03d",$data['NO_RW']);
	$ar_RW=str_split($RW);
	foreach ($ar_RW as $huruf) {
		$hurufke++;
		$hurufke==3 ? $pdf->Cell(5,4,$huruf,1,1,'L') : $pdf->Cell(5,4,$huruf,1,0,'L');
	}
	$pdf->Cell(15 ,4,'',0,0,'L');
	$pdf->Cell(20 ,4,'Kode Pos:',1,0,'L');
	$pdf->Cell(5 ,4,'',0,0,'L');
	$kd_pos=sprintf("%03d",$data['KODE_POS']);
	$ar_pos=str_split($kd_pos);
	foreach ($ar_pos as $huruf) {
		$hurufke++;
		$hurufke==5 ? $pdf->Cell(5,4,$huruf,1,1,'L') : $pdf->Cell(5,4,$huruf,1,0,'L');
	}
	$pdf->ln(7);

	$pdf->SetFont('Times','',6);
	$pdf->Cell(20,3,'Pas Photo (2x3)',1,0,'C');
	$pdf->Cell(20,3,'Cap Jempol',1,0,'C');
	$pdf->Cell(55,3,'Specimen Tanda Tangan',1,0,'C');
	$pdf->Cell(30,3,'',0,0,'C');
	$pdf->Cell(30,3,'Gari,',0,0,'C');
	$q=mysqli_query($connect,"SELECT * FROM biodata_wni,suket_ektp WHERE biodata_wni.NIK='$nik' AND suket_ektp.NIK=biodata_wni.NIK");
	$dat=mysqli_fetch_array($q);
	$pdf->Cell(3,3,date('d-m-Y',strtotime($dat['tanggal_permohonan'])),0,1,'C');
	
	$pdf->Cell(20,5,'','LR',0,'C');
	$pdf->Cell(20,5,'','LR',0,'C');
	$pdf->Cell(55,5,'','LR',0,'C');
	$pdf->Cell(30,5,'',0,0,'C');
	$pdf->Cell(55,5,'Pemohon,',0,1,'C');
	$pdf->Cell(20,3,'','LR',0,'C');
	$pdf->Cell(15,3,'','L',0,'C');
	$pdf->Cell(10,3,'Atau-->',0,0,'C');
	$pdf->Cell(50,3,'','R',1,'C');
	$pdf->Cell(5,5,'','L',0,'C');
	$pdf->Cell(10,5,'Bidang',0,0,'C');
	$pdf->Cell(5,5,'','R',0,'C');
	$pdf->Cell(20,5,'','LR',0,'C');
	$pdf->Cell(55,5,'','LR',1,'C');
	$pdf->Cell(5,4,'','L',0,'C');
	$pdf->Cell(10,4,'Lem',0,0,'C');
	$pdf->Cell(5,4,'','R',0,'C');
	$pdf->Cell(20,4,'','LR',0,'C');
	$pdf->Cell(55,4,'','LRB',0,'C');
	$pdf->Cell(30,4,'',0,0,'C');
	
	$pdf->Cell(55,4,($dat['NAMA_LGKP']),0,1,'C');
	$pdf->Cell(20,8,'','LRB',0,'C');
	$pdf->Cell(20,8,'','LRB',0,'C');
	$pdf->Cell(55,8,'Ket: Cap Jempol/Tanda Tangan','L',1,'L');
	$pdf->ln(1);

	$pdf->SetFont('Times','',8);
	$pdf->Cell(45,4,'',0,0,'C');
	$pdf->Cell(140,4,'Mengetahui,',0,1,'C');
	$pdf->Cell(45,6,'',0,0,'C');
	$pdf->Cell(55,6,'Camat...............................................................',0,0,'L');
	$pdf->Cell(30,6,'',0,0,'C');
	$pdf->Cell(55,6,'Kepala Kalurahan/Lurah Gari',0,1,'L');
	$pdf->ln(8);
	$pdf->Cell(45,6,'',0,0,'C');
	$pdf->Cell(55,6,'(...................................................................)',0,0,'L');
	$pdf->Cell(30,6,'',0,0,'C');
	$q1=mysqli_query($connect,"SELECT * FROM staf,jabatan WHERE staf.id_staf=jabatan.id_staf and jabatan.nama_jabatan='Kepala Kalurahan' ");
	$dat1=mysqli_fetch_array($q1);
	$pdf->Cell(25,6,                               ($dat1['nama_staf']),0,1,'C');
	$pdf->Cell(45,6,'',0,0,'C');
	$pdf->Cell(55,6,'NIP. ',0,0,'L');
	$pdf->Cell(30,6,'',0,0,'C');
	$pdf->Cell(55,6,'NIP.',0,1,'L');
	$pdf->ln(2);
	if ($ct<2){
		$pdf->SetFont('Times','',6);
		$pdf->Cell(10,3,'gunting disini',0,0,'L');
		$pdf->SetFont('Times','',9);
		$pdf->Cell(179,3,' ----------------------------------------------------------------------------------------------------------------------------------------------------------------',0,1,'R');
		$pdf->ln(2);	
	}
}

//next page atau page 2

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
$q=mysqli_query($connect,"SELECT * FROM data_keluarga,biodata_wni,jenis_kelamin,agama,status_perkawinan
 WHERE data_keluarga.NO_KK=biodata_wni.NO_KK 
 AND jenis_kelamin.JENIS_KLMIN=biodata_wni.JENIS_KLMIN 
 AND agama.AGAMA=biodata_wni.AGAMA 
 AND status_perkawinan.STAT_KWN=biodata_wni.STAT_KWN 
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
$qq=mysqli_query($connect,"SELECT * FROM data_keluarga,biodata_wni,
jenis_kelamin,agama,status_perkawinan,status_hubungan,golongan_darah,akte_kelahiran,akte_perceraian,akte_perkawinan
 WHERE data_keluarga.NO_KK=biodata_wni.NO_KK 
 AND jenis_kelamin.JENIS_KLMIN=biodata_wni.JENIS_KLMIN 
 AND agama.AGAMA=biodata_wni.AGAMA
  AND akte_perceraian.AKTA_CRAI=biodata_wni.AKTA_CRAI
  AND akte_kelahiran.AKTA_LHR=biodata_wni.AKTA_LHR
  AND akte_perkawinan.AKTA_KWN=biodata_wni.AKTA_KWN
AND golongan_darah.GOL_DRH=biodata_wni.GOL_DRH 
 AND status_perkawinan.STAT_KWN=biodata_wni.STAT_KWN 
 AND status_hubungan.STAT_HBKEL=biodata_wni.STAT_HBKEL AND
 data_keluarga.NO_KK='$data[NO_KK]' ORDER BY biodata_wni.STAT_HBKEL ");
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
	$pdf->Cell(15,3,$dtt['akte_kelahiran'],1,0,'C'); // akta lahir
	$pdf->Cell(25,3,$dtt['NO_AKTA_LHR'],1,0,'C'); //no akta lahir
	$pdf->Cell(10,3,$dtt['nama_golongan'],1,0,'C'); //gol darah
	if ($dtt['NIK']==$_GET['nik']) {
									$query12="select *
								   from suket_ektp,biodata_wni,data_keluarga
								   where suket_ektp.NIK=biodata_wni.NIK
								   and data_keluarga.NO_KK=biodata_wni.NO_KK
								   
								   and suket_ektp.NIK='$_GET[nik]'";
									$results12 = mysqli_query($connect,$query12) or die("Error: ".mysqli_error($connect));
									$data12 = mysqli_fetch_array($results12);
	if ($data12['agm']==0) {
		$pdf->Cell(15,3,$dtt['nama_agama'],1,0,'C'); // status perkawinan
	}else {
	$u2="select * from agama where AGAMA='$data12[agm]'";
	$v2 = mysqli_query($connect,$u2) or die("Error: ".mysqli_error($connect));
	$w2 = mysqli_fetch_array($v2);
	$pdf->Cell(15,3,$w2['nama_agama'],1,0,'C'); // status perkawinan
	}
	if ($data12['status_kawin']==0) {
		$pdf->Cell(18,3,$dtt['status_perkawinan'],1,0,'C'); // status perkawinan
	}else {
	$u2="select * from status_perkawinan where STAT_KWN='$data12[status_kawin]'";
	$v2 = mysqli_query($connect,$u2) or die("Error: ".mysqli_error($connect));
	$w2 = mysqli_fetch_array($v2);
	$pdf->Cell(18,3,$w2['status_perkawinan'],1,0,'C'); // status perkawinan
	}
	}else{
	$pdf->Cell(15,3,$dtt['nama_agama'],1,0,'C'); // Agama
	$pdf->Cell(18,3,$dtt['status_perkawinan'],1,0,'C'); // status perkawinan
	}
	$pdf->Cell(25,3,$dtt['akte_perkawinan'],1,0,'C'); // akta perkawinan
	$pdf->Cell(25,3,$dtt['NO_AKTA_KWN'],1,0,'C'); // no akta perkawinan
	$pdf->Cell(20,3,$dtt['TGL_KWN'],1,0,'C'); // tgl kawin
	$pdf->Cell(30,3,$dtt['akte_perceraian'],1,0,'C'); // akta cerai
	$pdf->Cell(25,3,$dtt['NO_AKTA_CRAI'],1,0,'C'); // no akta cerai
	$pdf->Cell(17,3,$dtt['TGL_CRAI'],1,1,'C'); // tgl cerai
	
}
for ($i=$u1; $i <=10 ; $i++) { 
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
$pdf->SetFont('Times','',6);
$q3=mysqli_query($connect,"SELECT * FROM data_keluarga,biodata_wni,pekerjaan,pendidikan_terakhir,status_hubungan,kelainan_fisik
 WHERE data_keluarga.NO_KK=biodata_wni.NO_KK AND
 biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN AND
 pendidikan_terakhir.PDDK_AKH=biodata_wni.PDDK_AKH AND
 status_hubungan.STAT_HBKEL=biodata_wni.STAT_HBKEL AND
 kelainan_fisik.KLAIN_FSK=biodata_wni.KLAIN_FSK AND
 data_keluarga.NO_KK='$data[NO_KK]' ORDER BY biodata_wni.STAT_HBKEL");
$u2=0;
while ($d=mysqli_fetch_array($q3)){
	$u2++;
	$pdf->Cell(10,3,$u2,1,0,'C');
	$pdf->Cell(30,3,$d['status_hubungan'],1,0,'C'); // status hub
	$pdf->Cell(30,3,$d['kelainan_fisik'],1,0,'C'); // kelainan
	$pdf->Cell(30,3,'',1,0,'C'); // penyandang cacat
	if ($d['NIK']==$_GET['nik']) {
									$query11="select *
								   from suket_ektp,biodata_wni,data_keluarga
								   where suket_ektp.NIK=biodata_wni.NIK
								   and data_keluarga.NO_KK=biodata_wni.NO_KK
								   
								   and suket_ektp.NIK='$_GET[nik]'";
									$results11 = mysqli_query($connect,$query11) or die("Error: ".mysqli_error($connect));
									$data11 = mysqli_fetch_array($results11);
	if ($data1['pddk']==0) {
		$pdf->Cell(20,3,$d['pendidikan'],1,0,'C'); // pendidikan
	}else {
	$u1="select * from pendidikan_terakhir where PDDK_AKH='$data11[pddk]'";
	$v1 = mysqli_query($connect,$u1) or die("Error: ".mysqli_error($connect));
	$w1 = mysqli_fetch_array($v1);
	$pdf->Cell(20,3,$w1['pendidikan'],1,0,'C'); // pendidikan
	}
	if ($data1['krj']==0) {
		$pdf->Cell(40,3,$d['pekerjaan'],1,0,'C'); // pendidikan
	}else {
	$u1="select * from pekerjaan where JENIS_PKRJN='$data11[krj]'";
	$v1 = mysqli_query($connect,$u1) or die("Error: ".mysqli_error($connect));
	$w1 = mysqli_fetch_array($v1);
	$pdf->Cell(40,3,$w1['pekerjaan'],1,0,'C'); // pendidikan
	}
	}else{
	$pdf->Cell(20,3,$d['pendidikan'],1,0,'C'); // pendidikan
	$pdf->Cell(40,3,$d['pekerjaan'],1,0,'C'); // pendidikan
	}
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
$judul7 = "Kalurahan GARI";
 
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
$qa=mysqli_query($connect,"SELECT * FROM data_keluarga,biodata_wni,jenis_kelamin,agama,pekerjaan,suket_ektp
 WHERE data_keluarga.NO_KK=biodata_wni.NO_KK AND jenis_kelamin.JENIS_KLMIN=biodata_wni.JENIS_KLMIN 
 AND agama.AGAMA=biodata_wni.AGAMA AND pekerjaan.JENIS_PKRJN=biodata_wni.JENIS_PKRJN 
 AND suket_ektp.NIK=biodata_wni.NIK AND
 biodata_wni.NIK='$_GET[nik]' ORDER BY biodata_wni.STAT_HBKEL ");
$ja=mysqli_fetch_array($qa);
$j= 'RT' .$ja['NO_RT'].'/ RW' .$ja['NO_RW'].' '.$ja['ALAMAT'].', GARI';
$jj= $ja['TMPT_LHR'].'/'.date('d-m-Y',strtotime($ja['TGL_LHR']));


$pdf->Cell(155,13, '                                              Nomor : '.$ja['id_ektp']. '', '0', 1, 'C'); 
$pdf->Ln(0.5);
$pdf->SetFont('Arial','','12');
$pdf->Cell(150,5, '                                             Yang bertanda tangan di bawah ini, Kepala Kalurahan Gari, Kecamatan Wonosari, Kabupaten ', '0', 1, 'C');
$pdf->Cell(150,8, '      Gunungkidul, Daerah Istimewa Yogyakarta, dengan ini menerangkan sebagai berikut : ', '0', 1, 'L'); 
$pdf->Ln(10);
$pdf->Cell(150,5, '              Nama	                                :	'.$ja['NAMA_LGKP']. '', '0', 1, 'L');
$pdf->Ln(2);  
$pdf->Cell(150,5, '              Tempat/tanggal lahir	         :	'.$jj. ' ', '0', 1, 'L'); 
$pdf->Ln(2); 
$pdf->Cell(150,5, '               Agama	                              :	'.$ja['nama_agama']. '', '0', 1, 'L'); 
$pdf->Ln(2);
$pdf->Cell(150,5, '              Pekerjaan	                         :	'.$ja['pekerjaan']. '', '0', 1, 'L'); 
$pdf->Ln(2); 
$pdf->Cell(150,5, '              Jenis Kelamin	                   :	'.$ja['jenis_kelamin']. '', '0', 1, 'L');
$pdf->Ln(2); 
$pdf->Cell(150,5, '             Alamat	                               :	'.$j. ' ', '0', 1, 'L');
$pdf->Ln(2);
$pdf->Cell(300,5, '             	                               	           Kecamatan Wonosari, Kabupaten Gunung Kidul ', '0', 1, 'L');
$pdf->Ln(2); 

$pdf->Ln(3); 
$pdf->Cell(150,5, '              Bahwa orang yang tersebut di atas telah '.$ja['alasan']. '  ', '0', 1, 'L'); 
$pdf->Ln(2); 
$pdf->Cell(150,5, '              Demikian  surat  keterangan  ini  kami  buat  dengan sebenarnya, untuk  dapat  dipergunakan   ', '0', 1, 'J'); 
$pdf->Ln(2); 
$pdf->Cell(150,5, '      sebagaimana mestinya. ', '0', 1, 'J');
$pdf->Ln(2);
$pdf->Cell(16,5, '                                                                                                         Gari, '.date('d-m-Y',strtotime($ja["tanggal_permohonan"])).'', '0', 1, 'L'); 
$pdf->Ln(2);
$pdf->Cell(15,5, '                                                                                                             Kepala Kalurahan ', '0', 1, 'L'); 
$pdf->Ln(20);
$pdf->Cell(15,5, '                                                                                                            WIDODO SIP', '0', 1, 'L'); 


#output file PDF
$pdf->Output();
?>