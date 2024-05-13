<?php
session_start();
require "fpdf/fpdf.php";
require "connect.php";
require "assets/fwilayah.php";

$qdatpindah=mysqli_query($connect,"SELECT * FROM pindah_datang WHERE id_datang='$_GET[id]'");
$datang=mysqli_fetch_array($qdatpindah);

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 215-(10*2)=195mm

$pdf = new FPDF('P','mm',array(215,330));
for ($l=1;$l<4;$l++){
	$pdf->AddPage();

	$pdf->SetFont("Times","B",11);
	$t=4;
	$pdf->Cell(170 ,$t,'',0,0,'C');
	$pdf->Cell(25 ,$t,' F-1.38 ',1,1,'C');
	$pdf->ln(5);

	$pdf->SetFont("Times","",11);
	$pdf->Cell(30,$t,"PROPINSI",0,0,"L");
	$pdf->Cell(5,$t," : ",0,0,"L");
	$pdf->Cell(20,$t,"34",1,0,"L");
	$pdf->Cell(10,$t,"*)  ",0,0,"L");
	$pdf->Cell(130,$t,"DAERAH ISTIMEWA YOGYAKARTA",1,1,"L");
	$pdf->ln(1);
	$pdf->Cell(30,$t,"KABUPATEN",0,0,"L");
	$pdf->Cell(5,$t," : ",0,0,"L");
	$pdf->Cell(20,$t,"03",1,0,"L");
	$pdf->Cell(10,$t,"*)  ",0,0,"L");
	$pdf->Cell(130,$t,"GUNUNGKIDUL",1,1,"L");
	$pdf->ln(1);
	$pdf->Cell(30,$t,"KECAMATAN",0,0,"L");
	$pdf->Cell(5,$t," : ",0,0,"L");
	$pdf->Cell(20,$t,"01",1,0,"L");
	$pdf->Cell(10,$t,"*)  ",0,0,"L");
	$pdf->Cell(130,$t,"WONOSARI ",1,1,"L");
	$pdf->ln(1);
	$pdf->Cell(30,$t,"KELURAHAN",0,0,"L");
	$pdf->Cell(5,$t," : ",0,0,"L");
	$pdf->Cell(20,$t,"2004",1,0,"L");
	$pdf->Cell(10,$t,"*)  ",0,0,"L");
	$pdf->Cell(130,$t,"GARI ",1,1,"L");
	$pdf->ln(4);

	$pdf->SetFont("Times","B",12);
	$pdf->Cell(195,5,"FORMULIR PERMOHONAN PINDAH DATANG WNI",0,1,"C");
	$pdf->SetFont("Times","",11);
	$pdf->Cell(195,$t,$datang['kategori_surat'],0,1,"C");
	$pdf->Cell(195,$t,"No.: ".$datang['id_datang'],0,1,"C");
	$pdf->ln(3);

	$pdf->SetFont("Times","B",12);
	$pdf->Cell(195,$t,"DAERAH ASAL",0,1,"L");

	$pdf->SetFont("Times","",11);
	$pdf->Cell(55,$t,"No Kartu Keluarga",0,0,"L");
	$pdf->Cell(10,$t,"",0,0,"L");
	$pdf->Cell(130,$t,$datang['no_kk_asal'],1,1,"L");
	$pdf->ln(1);
	$pdf->Cell(55,$t,"Nama Kepala Keluarga",0,0,"L");
	$pdf->Cell(10,$t,"",0,0,"L");
	$pdf->Cell(130,$t,$datang['nama_kep_asal'],1,1,"L");
	$pdf->ln(1);
	$pdf->Cell(55,$t,"Alamat",0,0,"L");
	$pdf->Cell(10,$t,"",0,0,"L");
	$pdf->Cell(60,$t,$datang['alamat_asal'],1,0,"L");
	$pdf->Cell(10,$t,"RT",0,0,"L");
	$pdf->Cell(15,$t,sprintf("%03d",$datang['RT_asal']),1,0,"L");
	$pdf->Cell(10,$t,"RW",0,0,"L");
	$pdf->Cell(15,$t,sprintf("%03d",$datang['RW_asal']),1,1,"L");
	$pdf->ln(1);
	$pdf->Cell(55,$t,"",0,0,"L");
	$pdf->Cell(10,$t,"",0,0,"L");
	$pdf->Cell(45,$t,"Dusun/Dukuh/Kampung",0,0,"L");
	$pdf->Cell(65,$t,$datang['dusun_asal'],1,1,"L");
	$pdf->ln(1);
	$pdf->Cell(40,$t,"",0,0,"L");
	$pdf->Cell(25,$t,"a. Kalurahan",0,0,"L");
	$pdf->Cell(50,$t,getDesa($connect,$datang['desa_asal']),1,0,"L");
	$pdf->Cell(30,$t,"c. Kabupaten",0,0,"L");
	$pdf->Cell(50,$t,getKab($connect,$datang['kabupaten_asal']),1,1,"L");
	$pdf->ln(1);
	$pdf->Cell(40,$t,"",0,0,"L");
	$pdf->Cell(25,$t,"b. Kecamatan",0,0,"L");
	$pdf->Cell(50,$t,getKec($connect,$datang['kecamatan_asal']),1,0,"L");
	$pdf->Cell(30,$t,"d. Propinsi",0,0,"L");
	$pdf->Cell(50,$t,getProv($connect,$datang['propinsi_asal']),1,1,"L");
	$pdf->ln(1);
	$pdf->Cell(55,$t,"",0,0,"L");
	$pdf->Cell(10,$t,"",0,0,"L");
	$pdf->Cell(20,$t,"Kode Pos",0,0,"L");
	$pdf->Cell(30,$t,$datang['kode_pos_asal'],1,0,"L");
	$pdf->Cell(30,$t,"Telepon",0,0,"C");
	$pdf->Cell(40,$t,$datang['telp_pemohon'],1,1,"L");
	$pdf->ln(1);

	$pdf->Cell(55,$t,"NIK Pemohon",0,0,"L");
	$pdf->Cell(10,$t,"",0,0,"L");
	$pdf->Cell(130,$t,$datang['nik_pemohon'],1,1,"L");
	$pdf->ln(1);
	$pdf->Cell(55,$t,"Nama Lengkap",0,0,"L");
	$pdf->Cell(10,$t,"",0,0,"L");
	$pdf->Cell(130,$t,$datang['nama_pemohon'],1,1,"L");
	$pdf->ln(3);

	$pdf->SetFont("Times","B",12);
	$pdf->Cell(195,$t,"DATA TUJUAN",0,1,"L");
	$pdf->ln(1);
	$t=4;
	$pdf->SetFont("Times","",11);

	$pdf->Cell(55,$t,"Status KK bagi yang pindah",0,0,"L");
	$pdf->Cell(10,$t,"",0,0,"L");
	$pdf->Cell(10,$t,$datang['stat_kk_pindah'],1,0,"L");
	$pdf->Cell(40,$t,"1. Numpang KK",0,0,"L");
	$pdf->Cell(40,$t,"2. Membuat KK Baru",0,0,"L");
	$pdf->Cell(40,$t,"3. No. KK tetap",0,1,"L");
	$pdf->ln(1);

	$pdf->Cell(55,$t,"No Kartu Keluarga",0,0,"L");
	$pdf->Cell(10,$t,"",0,0,"L");
	$pdf->Cell(130,$t,$datang['no_kk_tujuan'],1,1,"L");
	$pdf->ln(1);

	$qkk=mysqli_query($connect,"SELECT * FROM data_keluarga WHERE NO_KK='$datang[no_kk_tujuan]'");
	$rkk=mysqli_fetch_array($qkk);
	$pdf->Cell(55,$t,"Nama Kepala Keluarga",0,0,"L");
	$pdf->Cell(10,$t,"",0,0,"L");
	$pdf->Cell(130,$t,$rkk['NAMA_KEP'],1,1,"L");
	$pdf->ln(1);

	$pdf->Cell(55,$t,"NIK Kepala Keluarga",0,0,"L");
	$pdf->Cell(10,$t,"",0,0,"L");
	$pdf->Cell(130,$t,$rkk['NIK_KK'],1,1,"L");
	$pdf->ln(1);

	$pdf->Cell(55,$t,"Tanggal Datang",0,0,"L");
	$pdf->Cell(10,$t,"",0,0,"L");
	$pdf->Cell(130,$t,$datang['tgl_datang'],1,1,"L");
	$pdf->ln(1);

	$pdf->Cell(55,$t,"Alamat",0,0,"L");
	$pdf->Cell(10,$t,"",0,0,"L");
	$pdf->Cell(60,$t,$datang['alamat_tujuan'],1,0,"L");
	$pdf->Cell(10,$t,"RT",0,0,"L");
	$pdf->Cell(15,$t,sprintf("%03d",$datang['RT_tujuan']),1,0,"L");
	$pdf->Cell(10,$t,"RW",0,0,"L");
	$pdf->Cell(15,$t,sprintf("%03d",$datang['RW_Tujuan']),1,1,"L");
	$pdf->ln(1);
	$pdf->Cell(55,$t,"",0,0,"L");
	$pdf->Cell(10,$t,"",0,0,"L");
	$pdf->Cell(45,$t,"Dusun/Dukuh/Kampung",0,0,"L");
	$pdf->Cell(65,$t,$datang['dusun_tujuan'],1,1,"L");
	$pdf->ln(1);
	$pdf->Cell(40,$t,"",0,0,"L");
	$pdf->Cell(25,$t,"a. Kalurahan",0,0,"L");
	$pdf->Cell(50,$t,getDesa($connect,"340301".$datang['desa_tujuan']),1,0,"L");
	$pdf->Cell(30,$t,"c. Kabupaten",0,0,"L");
	$pdf->Cell(50,$t,getKab($connect,"340".$datang['kabupaten_tujuan']),1,1,"L");
	$pdf->ln(1);
	$pdf->Cell(40,$t,"",0,0,"L");
	$pdf->Cell(25,$t,"b. Kecamatan",0,0,"L");
	$pdf->Cell(50,$t,getKec($connect,"34030".$datang['kecamatan_tujuan']),1,0,"L");
	$pdf->Cell(30,$t,"d. Propinsi",0,0,"L");
	$pdf->Cell(50,$t,getProv($connect,$datang['propinsi_tujuan']),1,1,"L");
	$pdf->ln(1);
	$pdf->Cell(55,$t,"",0,0,"L");
	$pdf->Cell(10,$t,"",0,0,"L");
	$pdf->Cell(20,$t,"Kode Pos",0,0,"L");
	$pdf->Cell(30,$t,$datang['kode_pos_tujuan'],1,0,"L");
	$pdf->Cell(30,$t,"Telepon",0,0,"C");
	$pdf->Cell(40,$t,"0",1,1,"L");
	$pdf->ln(1);

	$pdf->Cell(55,$t,"Keluarga yang datang",0,0,"L");
	$pdf->Cell(10,$t,"",0,1,"L");
	$pdf->ln(2);

	$pdf->SetFont("Times","B",11);
	$pdf->Cell(10,$t,"NO",1,0,"C");
	$pdf->Cell(35,$t,"NIK",1,0,"C");
	$pdf->Cell(85,$t,"Nama Lengkap",1,0,"C");
	$pdf->Cell(35,$t,"Masa berlaku KTP ",1,0,"C");
	$pdf->Cell(30,$t,"SHDK",1,1,"C");

	$pdf->SetFont("Times","",11);
	$pdf->Cell(10,$t,"1",1,0,"L");
	$pdf->Cell(35,$t,$datang['nik_pemohon'],1,0,"L");
	$pdf->Cell(85,$t,$datang['nama_pemohon'],1,0,"L");
	$pdf->Cell(35,$t,"",1,0,"L");
	$pdf->Cell(30,$t,"Lainnya",1,1,"L");

	if (!empty($datang['nik_anggota'])) {
		$ang=explode(",", $datang['nik_anggota']);
		$nmang=explode(",", $datang['nama_anggota']);
		$arranggota=array();
		foreach ($ang as $key => $val) {
			$arranggota[$val]=$nmang[$key];
		}

		$n=1;
		foreach ($arranggota as $nik => $nama ) {
			$n++;
			$pdf->SetFont("Times","",11);
			$pdf->Cell(10,$t,$n,1,0,"L");
			$pdf->Cell(35,$t,$nik,1,0,"L");
			$pdf->Cell(85,$t,$nama,1,0,"L");
			$pdf->Cell(35,$t,"",1,0,"L");
			$pdf->Cell(30,$t,"Lainnya",1,1,"L");

		}
	}
	

	$pdf->ln(2);
	$date_now= date("d M Y");
	$pdf->Cell(140,$t,"",0,0,"C");
	$pdf->Cell(55,$t,"Gunungkidul, ".$date_now,0,1,"C");
	$pdf->ln(1);
	$pdf->Cell(55,$t,"Petugas Registrasi,",0,0,"C");
	$pdf->Cell(85,$t,"",0,0,"C");
	$pdf->Cell(55,$t,"Pemohon,",0,1,"C");
	$pdf->ln(10);
	$pdf->Cell(55,$t,"(....................................)",0,0,"C");
	$pdf->Cell(85,$t,"",0,0,"C");
	$pdf->Cell(55,$t,"(....................................)",0,1,"C");
}

/* ===========================================================================================================*/
switch ($datang['stat_kk_pindah']) {
	case '1':
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
	$pdf->Cell(20,$fs,"34",1,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(60,$fs,"DAERAH ISTIMEWA YOGYAKARTA",1,0,"L");
	$pdf->Cell(35,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1);
	$pdf->Cell(5,$fs,"","L");
	$pdf->Cell(60,$fs,"PEMERINTAH KABUPATEN/KOTA",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"L");
	$pdf->Cell(20,$fs,"03",1,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(60,$fs,"GUNUNGKIDUL",1,0,"L");
	$pdf->Cell(35,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1);
	$pdf->Cell(5,$fs,"","L");
	$pdf->Cell(60,$fs,"KECAMATAN",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"L");
	$pdf->Cell(20,$fs,"01",1,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(60,$fs,"WONOSARI",1,0,"L");
	$pdf->Cell(35,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1);
	$pdf->Cell(5,$fs,"","L");
	$pdf->Cell(60,$fs,"KELURAHAN",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"L");
	$pdf->Cell(20,$fs,"2004",1,0,"L");
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

	$no_kk=$datang['no_kk_tujuan'];
	$q=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NO_KK='$no_kk' AND biodata_wni.STAT_HBKEL='1'");
	$dtkp=mysqli_fetch_array($q);

	$pdf->SetFont("Times","",10);
	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(50,$fs,"1. Nama Lengkap Pemohon",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(140,$fs,$dtkp['NAMA_LGKP'],1,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(50,$fs,"2. NIK Pemohon",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(70,$fs,$dtkp['NIK'],1,0,"L");
	$pdf->Cell(70,$fs,"",0);
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(50,$fs,"3. Nama Kepala Keluarga",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(140,$fs,$dtkp['NAMA_LGKP'],1,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(50,$fs,"4. NO KK",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(70,$fs,$dtkp['NO_KK'],1,0,"L");
	$pdf->Cell(70,$fs,"",0);
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(50,$fs,"5. Alamat",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(90,$fs,$dtkp['ALAMAT'],1,0,"L");
	$pdf->Cell(10,$fs,"RT",0,0,"C");
	$pdf->Cell(15,$fs,sprintf("%03d",$dtkp['NO_RT']),1,0,"L");
	$pdf->Cell(10,$fs,"RW",0,0,"C");
	$pdf->Cell(15,$fs,sprintf("%03d",$dtkp['NO_RT']),1,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(23,$fs,"","L",0,"C");
	$pdf->Cell(30,$fs,"a. Kelurahan",0,0,"L");
	$pdf->Cell(50,$fs,getDesa($connect,"340301".$dtkp['NO_KEL']),1,0,"L");
	$pdf->Cell(15,$fs,"",0,0,"C");
	$pdf->Cell(25,$fs,"b. Kecamatan",0,0,"L");
	$pdf->Cell(50,$fs,getKec($connect,"34030".$dtkp['NO_KEC']),1,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(23,$fs,"","L",0,"C");
	$pdf->Cell(30,$fs,"c. Kabupaten/Kota",0,0,"L");
	$pdf->Cell(50,$fs,getKab($connect,"340".$dtkp['NO_KAB']),1,0,"L");
	$pdf->Cell(15,$fs,"",0,0,"C");
	$pdf->Cell(25,$fs,"d. Propinsi",0,0,"L");
	$pdf->Cell(50,$fs,getProv($connect,$dtkp['NO_PROP']),1,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(23,$fs,"","L",0,"C");
	$pdf->Cell(30,$fs,"Kode Pos",0,0,"L");
	$pdf->Cell(25,$fs,$dtkp['KODE_POS'],1,0,"L");
	$pdf->Cell(40,$fs,"",0,0,"C");
	$pdf->Cell(25,$fs,"Telepon",0,0,"L");
	$pdf->Cell(50,$fs,"",1,0,"C");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(50,$fs,"6. Nama Kepala Keluarga Lama",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(140,$fs,$dtkp['NAMA_KEP'],1,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(50,$fs,"7. NO KK Lama",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(70,$fs,$dtkp['NO_KK'],1,0,"L");
	$pdf->Cell(70,$fs,"",0);
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(50,$fs,"5. Alamat",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(90,$fs,$dtkp['ALAMAT'],1,0,"L");
	$pdf->Cell(10,$fs,"RT",0,0,"C");
	$pdf->Cell(15,$fs,sprintf("%03d",$dtkp['NO_RT']),1,0,"L");
	$pdf->Cell(10,$fs,"RW",0,0,"C");
	$pdf->Cell(15,$fs,sprintf("%03d",$dtkp['NO_RT']),1,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(23,$fs,"","L",0,"C");
	$pdf->Cell(30,$fs,"a. Kelurahan",0,0,"L");
	$pdf->Cell(50,$fs,getDesa($connect,"340301".$dtkp['NO_KEL']),1,0,"L");
	$pdf->Cell(15,$fs,"",0,0,"C");
	$pdf->Cell(25,$fs,"b. Kecamatan",0,0,"L");
	$pdf->Cell(50,$fs,getKec($connect,"34030".$dtkp['NO_KEC']),1,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(23,$fs,"","L",0,"C");
	$pdf->Cell(30,$fs,"c. Kabupaten/Kota",0,0,"L");
	$pdf->Cell(50,$fs,getKab($connect,"340".$dtkp['NO_KAB']),1,0,"L");
	$pdf->Cell(15,$fs,"",0,0,"C");
	$pdf->Cell(25,$fs,"d. Propinsi",0,0,"L");
	$pdf->Cell(50,$fs,getProv($connect,$dtkp['NO_PROP']),1,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(23,$fs,"","L",0,"C");
	$pdf->Cell(30,$fs,"Kode Pos",0,0,"L");
	$pdf->Cell(25,$fs,$dtkp['KODE_POS'],1,0,"L");
	$pdf->Cell(40,$fs,"",0,0,"C");
	$pdf->Cell(25,$fs,"Telepon",0,0,"L");
	$pdf->Cell(50,$fs,"",1,0,"C");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(40,$fs,"Alasan Permohonan",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(5,$fs,"1",1,0,"L");
	$pdf->SetFont("Times","",7);
	$pdf->Cell(147,2,"1. Penambahan Anggota (Kelahiran, Kedatangan)        3. Lainnya","R",1,"L");
	$pdf->Cell(48,2,"");
	$pdf->Cell(147,2,"2. Karena Pengurangan Anggota (Kematian, Kepindahan)","R",1,"L");
	$pdf->Cell(195,1,"","LR",1);

	$pdf->SetFont("Times","",10);
	$pdf->Cell(1,$fs,"","L");

	$qkel=mysqli_query($connect,"SELECT * FROM data_keluarga,biodata_wni WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NIK!='$dtkp[NIK_KK]' AND biodata_wni.NO_KK='$dtkp[NO_KK]' ORDER BY biodata_wni.STAT_HBKEL");
	$jkel=mysqli_num_rows($qkel);
	$ang=explode(",", $datang['nik_anggota']);
	$jpindah=COUNT($ang);
	$jkel=$jkel+$jpindah+1;

	$pdf->Cell(40,$fs,"Jumlah Anggota Keluarga",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(10,$fs,$jkel,1,0,"L");
	$pdf->Cell(142,$fs,"Orang","R",1,"L");

	$pdf->Cell(5,2,"","LB");
	$pdf->Cell(185,2,"","B",0,"L");
	$pdf->Cell(5,2,"","RB",1);
	$pdf->SetFont("Times","B",11);

	$pdf->Cell(195,3,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(192,$fs,"DAFTAR ANGGOTA KELUARGA PEMOHON ",0,0,"L");
	$pdf->Cell(2,$fs,"","R",1);

	$pdf->Cell(195,3,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(10,$fs,"NO",1,0,"C");
	$pdf->Cell(50,$fs,"NIK",1,0,"C");
	$pdf->Cell(87,$fs,"NAMA LENGKAP",1,0,"C");
	$pdf->Cell(45,$fs,"SHBK",1,0,"C");
	$pdf->Cell(2,$fs,"","R",1);

	$pdf->SetFont("Times","",11);
	$jd=1;
	while ($angkel=mysqli_fetch_array($qkel)) {
		$qang=mysqli_query($connect,"SELECT * FROM biodata_wni WHERE NIK='$angkel[NIK]'");
		$ang=mysqli_fetch_array($qang);

		$pdf->Cell(1,$fs,"","L");
		$pdf->Cell(10,$fs,sprintf("%02d",$jd),1,0,"C");
		$pdf->Cell(50,$fs,$ang['NIK'],1,0,"L");
		$pdf->Cell(87,$fs,$ang['NAMA_LGKP'],1,0,"L");
		$qhbk=mysqli_query($connect,"SELECT * FROM status_hubungan WHERE STAT_HBKEL='$ang[STAT_HBKEL]'");
		$rhbk=mysqli_fetch_array($qhbk);
		$pdf->Cell(45,$fs,$rhbk['status_hubungan'],1,0,"L");
		$pdf->Cell(2,$fs,"","R",1);
		$jd++;
	}

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(10,$fs,sprintf("%02d",$jd),1,0,"C");
	$pdf->Cell(50,$fs,$datang['nik_pemohon'],1,0,"L");
	$pdf->Cell(87,$fs,$datang['nama_pemohon'],1,0,"L");
	$pdf->Cell(45,$fs,"Lainnya",1,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$jd++;

	if (!empty($datang['nik_anggota'])) {
		$ang=explode(",", $datang['nik_anggota']);
		$nmang=explode(",", $datang['nama_anggota']);
		$arranggota=array();
		foreach ($ang as $key => $val) {
			$arranggota[$val]=$nmang[$key];
		}

		foreach ($arranggota as $nik => $nama ) {	
			$pdf->Cell(1,$fs,"","L");
			$pdf->Cell(10,$fs,sprintf("%02d",$jd),1,0,"C");
			$pdf->Cell(50,$fs,$nik,1,0,"L");
			$pdf->Cell(87,$fs,$nama,1,0,"L");
			$pdf->Cell(45,$fs,"Lainnya",1,0,"L");
			$pdf->Cell(2,$fs,"","R",1);
			$jd++;
		}
	}
	

	$pdf->SetFont("Times","",9);
	$pdf->Cell(195,5,"","LR",1);
	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(55,$fs,"Kepala Dinas Kependudukan dan",0,0,"C");
	$pdf->Cell(45,$fs,"mengetahui,",0,0,"C");
	$pdf->Cell(47,$fs,"",0,0,"C");
	$pdf->Cell(45,$fs,"Gunungkidul, ".$date_now,0,0,"C");
	$pdf->Cell(2,$fs,"","R",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(55,$fs,"Pencatatan Sipil Kabupaten Gunungkidul",0,0,"C");
	$pdf->Cell(45,$fs,"Camat Wonosari",0,0,"C");
	$pdf->Cell(50,$fs,"Kepala Kalurahan Gari",0,0,"C");
	$pdf->Cell(42,$fs,"Pemohon",0,0,"C");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,13,"","LR",1);
	$pdf->SetFont("Times","BU",9);
	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(55,$fs,".......................................................",0,0,"C");
	$pdf->Cell(44,$fs,"..................................................",0,0,"C");
	$pdf->Cell(49,$fs,"..............................................",0,0,"C");
	$pdf->Cell(44,$fs,"($dtkp[NAMA_KEP])",0,0,"C");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->SetFont("Times","B",9);
	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(55,$fs,"      NIP :",0,0,"L");
	$pdf->Cell(44,$fs,"   NIP :",0,0,"L");
	$pdf->Cell(49,$fs,"        NIP :",0,0,"L");
	$pdf->Cell(44,$fs,"",0,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->SetFont("Times","",9);
	$pdf->Cell(195,5,"","LR",1);
	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(117,$fs,"");
	$pdf->Cell(75,$fs,"Tanggal Pemasukkan Data",0,0,"L");
	$pdf->Cell(2,$fs,"","R",1);

	$tgl_masuk=date("d-m-Y");
	$dd=str_split(substr($tgl_masuk,0,2));
	$mm=str_split(substr($tgl_masuk,3,2));
	$thn=str_split(substr($tgl_masuk,8,2));
	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(117,$fs,"");
	$pdf->Cell(10,$fs,"Tgl",0,0,"L");
	for ($i=0; $i < 2; $i++) { 
		$pdf->Cell(5,$fs,$dd[$i],1,0,"C");
	}
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(10,$fs,"Bln",0,0,"L");
	for ($i=0; $i < 2; $i++) { 
		$pdf->Cell(5,$fs,$mm[$i],1,0,"C");
	}
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(10,$fs,"Thn",0,0,"L");
	$Thn=str_split("20");
	for ($i=0; $i < 2; $i++) { 
		$pdf->Cell(5,$fs,$thn[$i],1,0,"C");
	}
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1,"L");

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(117,$fs,"");
	$pdf->Cell(20,$fs,"Paraf",0,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(45,$fs,"",1,0,"L");
	$pdf->Cell(7,$fs,"","R",1);

	$pdf->Cell(195,5,"","LBR",0,"L");
	break;
	case '2':
		/*
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
	$pdf->Cell(185,$fs,"2. Setelah formulir diisi dan ditandatangani, harap diserahkan kembali ke Kantor Desa/Kelurahan ",0,0,"L");
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
	$pdf->Cell(20,$fs,"34",1,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(60,$fs,"DAERAH ISTIMEWA YOGYAKARTA",1,0,"L");
	$pdf->Cell(35,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1);
	$pdf->Cell(5,$fs,"","L");
	$pdf->Cell(60,$fs,"PEMERINTAH KABUPATEN/KOTA",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"L");
	$pdf->Cell(20,$fs,"03",1,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(60,$fs,"GUNUNGKIDUL",1,0,"L");
	$pdf->Cell(35,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1);
	$pdf->Cell(5,$fs,"","L");
	$pdf->Cell(60,$fs,"KECAMATAN",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"L");
	$pdf->Cell(20,$fs,"01",1,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(60,$fs,"WONOSARI",1,0,"L");
	$pdf->Cell(35,$fs,"",0,0,"L");
	$pdf->Cell(5,$fs,"","R",1);
	$pdf->Cell(5,$fs,"","L");
	$pdf->Cell(60,$fs,"KELURAHAN/DESA",0,0,"L");
	$pdf->Cell(5,$fs," : ",0,0,"L");
	$pdf->Cell(20,$fs,"2004",1,0,"L");
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

	$no_kk=$datang['no_kk_tujuan'];
	$q=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NO_KK='$dt[NO_KK]' AND biodata_wni.STAT_HBKEL='1'");
	$dtkp=mysqli_fetch_array($q);

	$pdf->SetFont("Times","",10);
	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(50,$fs,"1. Nama Lengkap Pemohon",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(140,$fs,$dtkp['NAMA_LGKP'],1,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(50,$fs,"2. NIK Pemohon",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(70,$fs,$dtkp['NIK'],1,0,"L");
	$pdf->Cell(70,$fs,"",0);
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(50,$fs,"3. No. KK Semula",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(70,$fs,$dtkp['NO_KK'],1,0,"L");
	$pdf->Cell(70,$fs,"",0);
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(50,$fs,"4. Alamat",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(90,$fs,$dtkp['ALAMAT'],1,0,"L");
	$pdf->Cell(10,$fs,"RT",0,0,"C");
	$pdf->Cell(15,$fs,sprintf("%03d",$dtkp['NO_RT']),1,0,"L");
	$pdf->Cell(10,$fs,"RW",0,0,"C");
	$pdf->Cell(15,$fs,sprintf("%03d",$dtkp['NO_RT']),1,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(23,$fs,"","L",0,"C");
	$pdf->Cell(30,$fs,"a. Desa/Kelurahan",0,0,"L");
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
	$pdf->Cell(25,$fs,$dtkp['KODE_POS'],1,0,"C");
	$pdf->Cell(40,$fs,"",0,0,"C");
	$pdf->Cell(25,$fs,"Telepon",0,0,"L");
	$pdf->Cell(50,$fs,$datang['no_telp_pemohon'],1,0,"C");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(40,$fs,"Alasan Permohonan",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(5,$fs,"1",1,0,"L");
	$pdf->SetFont("Times","",7);
	$pdf->Cell(147,2,"1. Karena Membentuk Rumah Tangga Baru     3. Lainnya","R",1,"L");
	$pdf->Cell(48,2,"");
	$pdf->Cell(147,2,"2. Karena Kartu Keluarga Hilang/Rusak","R",1,"L");
	$pdf->Cell(195,1,"","LR",1);

	$pdf->SetFont("Times","",10);
	$pdf->Cell(1,$fs,"","L");

	$qkel=mysqli_query($connect,"SELECT * FROM data_keluarga,biodata_wni WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NIK!='$nik' AND biodata_wni.NO_KK='$dtkp[NO_KK]' ORDER BY biodata_wni.STAT_HBKEL");
	$jkel=mysqli_num_rows($qkel);

	$pdf->Cell(40,$fs,"Jumlah Anggota Keluarga",1,0,"L");
	$pdf->Cell(2,$fs,"");
	$pdf->Cell(10,$fs,$jkel,1,0,"L");
	$pdf->Cell(142,$fs,"Orang","R",1,"L");

	$pdf->Cell(5,2,"","LB");
	$pdf->Cell(185,2,"","B",0,"L");
	$pdf->Cell(5,2,"","RB",1);
	$pdf->SetFont("Times","B",11);

	$pdf->Cell(195,3,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(192,$fs,"DAFTAR ANGGOTA KELUARGA PEMOHON ",0,0,"L");
	$pdf->Cell(2,$fs,"","R",1);

	$pdf->Cell(195,3,"","LR",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(10,$fs,"NO",1,0,"C");
	$pdf->Cell(50,$fs,"NIK",1,0,"C");
	$pdf->Cell(87,$fs,"NAMA LENGKAP",1,0,"C");
	$pdf->Cell(45,$fs,"SHBK",1,0,"C");
	$pdf->Cell(2,$fs,"","R",1);

	$pdf->SetFont("Times","",11);
	$jd=1;
	while ($angkel=mysqli_fetch_array($qkel)) {
		$qang=mysqli_query($connect,"SELECT * FROM biodata_wni WHERE NIK='$angkel[NIK]'");
		$ang=mysqli_fetch_array($qang);

		$pdf->Cell(1,$fs,"","L");
		$pdf->Cell(10,$fs,sprintf("%02d",$jd),1,0,"C");
		$pdf->Cell(50,$fs,$ang['NIK'],1,0,"L");
		$pdf->Cell(87,$fs,$ang['NAMA_LGKP'],1,0,"L");
		$qhbk=mysqli_query($connect,"SELECT * FROM status_hubungan WHERE STAT_HBKEL='$ang[STAT_HBKEL]'");
		$rhbk=mysqli_fetch_array($qhbk);
		$pdf->Cell(45,$fs,$rhbk['status_hubungan'],1,0,"L");
		$pdf->Cell(2,$fs,"","R",1);
		$jd++;
	}
	for ($i=$jd;$i<8;$i++){
		$pdf->Cell(1,$fs,"","L");
		$pdf->Cell(10,$fs,"",1,0,"C");
		$pdf->Cell(50,$fs,"",1,0,"C");
		$pdf->Cell(87,$fs,"",1,0,"C");
		$pdf->Cell(45,$fs,"",1,0,"C");
		$pdf->Cell(2,$fs,"","R",1);
	}

	$pdf->SetFont("Times","",9);
	$pdf->Cell(195,5,"","LR",1);
	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(55,$fs,"Kepala Dinas Kependudukan dan",0,0,"C");
	$pdf->Cell(45,$fs,"mengetahui,",0,0,"C");
	$pdf->Cell(47,$fs,"",0,0,"C");
	$pdf->Cell(45,$fs,"Gunungkidul, ".$date_now,0,0,"C");
	$pdf->Cell(2,$fs,"","R",1);

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(55,$fs,"Pencatatan Sipil Kabupaten Gunungkidul",0,0,"C");
	$pdf->Cell(45,$fs,"Camat Wonosari",0,0,"C");
	$pdf->Cell(50,$fs,"Kepala Desa Gari",0,0,"C");
	$pdf->Cell(42,$fs,"Pemohon",0,0,"C");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,13,"","LR",1);
	$pdf->SetFont("Times","BU",9);
	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(55,$fs,".......................................................",0,0,"C");
	$pdf->Cell(44,$fs,"..................................................",0,0,"C");
	$pdf->Cell(49,$fs,"..............................................",0,0,"C");
	$pdf->Cell(44,$fs,"..............................................",0,0,"C");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->SetFont("Times","B",9);
	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(55,$fs,"      NIP :",0,0,"L");
	$pdf->Cell(44,$fs,"   NIP :",0,0,"L");
	$pdf->Cell(49,$fs,"        NIP :",0,0,"L");
	$pdf->Cell(44,$fs,"NIP :",0,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->SetFont("Times","",9);
	$pdf->Cell(195,5,"","LR",1);
	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(117,$fs,"");
	$pdf->Cell(75,$fs,"Tanggal Pemasukkan Data",0,0,"L");
	$pdf->Cell(2,$fs,"","R",1);

	$tgl_masuk=date("d-m-Y");
	$dd=str_split(substr($tgl_masuk,0,2));
	$mm=str_split(substr($tgl_masuk,3,2));
	$mm=str_split(substr($tgl_masuk,8,2));
	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(117,$fs,"");
	$pdf->Cell(10,$fs,"Tgl",0,0,"L");
	for ($i=0; $i < 2; $i++) { 
		$pdf->Cell(5,$fs,$dd[$i],1,0,"C");
	}
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(10,$fs,"Bln",0,0,"L");
	for ($i=0; $i < 2; $i++) { 
		$pdf->Cell(5,$fs,$mm[$i],1,0,"C");
	}
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(10,$fs,"Thn",0,0,"L");
	$Thn=str_split("20");
	for ($i=0; $i < 2; $i++) { 
		$pdf->Cell(5,$fs,$Thn[$i],1,0,"C");
	}
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(2,$fs,"","R",1);
	$pdf->Cell(195,1,"","LR",1,"L");

	$pdf->Cell(1,$fs,"","L");
	$pdf->Cell(117,$fs,"");
	$pdf->Cell(20,$fs,"Paraf",0,0,"L");
	$pdf->Cell(5,$fs,"",0,0,"L");
	$pdf->Cell(45,$fs,"",1,0,"L");
	$pdf->Cell(7,$fs,"","R",1);

	$pdf->Cell(195,5,"","LBR",0,"L");

		*/
	break;
	
	default:
		# code...
	break;
}

/*

$pdf->AddPage('L');

$query=mysqli_query($connect,"SELECT * FROM biodata_wni,data_keluarga WHERE biodata_wni.NIK='$datang[nik_pemohon]' AND data_keluarga.NO_KK=biodata_wni.NO_KK");
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
$q2=mysqli_query($connect,"SELECT * FROM data_keluarga,biodata_wni,jenis_kelamin,akte_kelahiran,golongan_darah,agama,status_perkawinan,akte_perkawinan,akte_perceraian WHERE akte_perceraian.id_akte_perceraian=biodata_wni.AKTA_CRAI AND akte_perkawinan.id_akte_perkawinan=biodata_wni.AKTA_KWN AND status_perkawinan.STAT_KWN=biodata_wni.STAT_KWN AND agama.AGAMA=biodata_wni.AGAMA AND golongan_darah.GOL_DRH=biodata_wni.GOL_DRH AND akte_kelahiran.id_akte=biodata_wni.AKTA_LHR AND jenis_kelamin.JENIS_KLMIN=biodata_wni.JENIS_KLMIN AND data_keluarga.NO_KK=biodata_wni.NO_KK AND data_keluarga.NO_KK='$data[NO_KK]' ORDER BY biodata_wni.STAT_HBKEL ");
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
$pdf->Cell(20,3,'PENYANDANG','LTR',0,'C'); // penyandang cacat
$pdf->Cell(35,3,'PENDIDIKAN','LTR',0,'C'); // pendidikan
$pdf->Cell(40,3,'','LTR',0,'C'); // pekerjaan
$pdf->Cell(35,3,'','LTR',0,'C'); // NIK ibu
$pdf->Cell(40,3,'','LTR',0,'C'); // Nama Ibu
$pdf->Cell(35,3,'','LTR',0,'C'); // NIK Ayah
$pdf->Cell(40,3,'','LTR',1,'C'); // Nama Ayah
$pdf->Cell(10,3,'NO','LBR',0,'C'); // no
$pdf->Cell(30,3,'DALAM KELUARGA','LBR',0,'C'); // status hub
$pdf->Cell(20,3,'FISIK & MENTAL','LBR',0,'C'); // kelainan
$pdf->Cell(20,3,'CACAT','LBR',0,'C'); // penyandang cacat
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
	$pdf->Cell(20,3,$dt3['penyandang_cacat'],1,0,'C'); // penyandang cacat
	$pdf->Cell(35,3,$dt3['pendidikan'],1,0,'C'); // pendidikan
	$pdf->Cell(40,3,$dt3['pekerjaan'],1,0,'C'); // pekerjaan
	$pdf->Cell(35,3,$dt3['NIK_IBU'],1,0,'C'); // NIK ibu
	$pdf->Cell(40,3,$dt3['NAMA_LGKP_IBU'],1,0,'C'); // Nama Ibu
	$pdf->Cell(35,3,$dt3['NIK_AYAH'],1,0,'C'); // NIK Ayah
	$pdf->Cell(40,3,$dt3['NAMA_LGKP_AYAH'],1,1,'C'); // Nama Ayah
}
$u++;
for ($i=$u;$i<=10;$i++){
	$pdf->Cell(10,3,$i,1,0,'C'); // no
	$pdf->Cell(30,3,'',1,0,'C'); // status hub
	$pdf->Cell(20,3,'',1,0,'C'); // kelainan
	$pdf->Cell(20,3,'',1,0,'C'); // penyandang cacat
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
$pdf->Cell(103,4,'Kepala Desa Gari',0,0,'C');
$pdf->Cell(103,4,'Kecamatan Wonosari',0,0,'C');
$pdf->Cell(103,4,'Kepala Keluarga',0,1,'C');
$pdf->ln(7);
$pdf->Cell(103,4,'Nama Lengkap : ............................................................',0,0,'C');
$pdf->Cell(103,4,'Nama Lengkap : ............................................................',0,0,'C');
$pdf->Cell(104,4,'Nama Lengkap : ............................................................',0,1,'C');
*/

$pdf->Output("berkas_permohonan_ktp.pdf","I");

?>