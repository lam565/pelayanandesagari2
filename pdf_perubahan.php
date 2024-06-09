<?php
session_start();
require "fpdf/fpdf.php";
require "connect.php";

if (isset($_GET['idr'])) {
	$idr=$_GET['idr'];
	$qcek = "SELECT * FROM riwayat_perubahan WHERE ID_RIWAYAT = '$idr'";
	$tot = mysqli_num_rows(mysqli_query($connect, $qcek));
	if ($tot > 0) {
		// echo "ada";
		$pdf = new FPDF('P', 'mm', 'A4'); //A4 = 210 mm x 297mm
		$pdf->SetMargins(10, 20);
		$pdf->AddPage();

		$t = 5;
		$tab = 10;

		$pdf->SetFont("Times", "BU", 11);
		$pdf->Cell(190, 5, "SURAT PERNYATAAN PERUBAHAN ELEMEN DATA KEPENDUDUKAN", 0, 1, "C");
		$pdf->ln(10);

		$pdf->SetFont("Times", "", 9);
		$pdf->Cell(190, $t, "Yang bertanda tangan di bawah ini: ", 0, 1, "L");
		$pdf->ln(3);

		$dtriw = mysqli_fetch_array(mysqli_query($connect, $qcek));
		$query = mysqli_query($connect, "SELECT * FROM biodata_wni, data_keluarga 
						WHERE biodata_wni.NO_KK=data_keluarga.NO_KK 
						AND biodata_wni.NIK='$dtriw[NIK_PMHN]'");
		$row = mysqli_fetch_array($query);

		$pdf->Cell($tab, $t, "",0,0,"L");
		$pdf->Cell(30, $t, "Nama ",0,0,"L");
		$pdf->Cell(5, $t, ":",0,0,"C");
		$pdf->Cell(0, $t, $row['NAMA_LGKP'],0,1,"L");

		$pdf->Cell($tab, $t, "",0,0,"L");
		$pdf->Cell(30, $t, "NIK ",0,0,"L");
		$pdf->Cell(5, $t, ":",0,0,"C");
		$pdf->Cell(0, $t, $row['NIK'],0,1,"L");

		$pdf->Cell($tab, $t, "",0,0,"L");
		$pdf->Cell(30, $t, "NO KK ",0,0,"L");
		$pdf->Cell(5, $t, ":",0,0,"C");
		$pdf->Cell(0, $t, $row['NO_KK'],0,1,"L");

		$pdf->Cell($tab, $t, "",0,0,"L");
		$pdf->Cell(30, $t, "Alamat Rumah ",0,0,"L");
		$pdf->Cell(5, $t, ":",0,0,"C");
		$pdf->Cell(0, $t, $row['ALAMAT'],0,1,"L");
		$pdf->ln(3);

		$pdf->Cell(0, $t, "dengan rincian KK sebagai berikut: ",0,1,"L");
		$pdf->ln(2);

		$pdf->Cell(10,$t,'No',1,0,'C');
		$pdf->Cell(80,$t,'Nama',1,0,'C');
		$pdf->Cell(35,$t,'NIK',1,0,'C');
		$pdf->Cell(35,$t,'SHDK',1,0,'C');
		$pdf->Cell(30,$t,'Keterangan',1,1,'C');

		$u = 0;
		$qkk = mysqli_query($connect, "SELECT biodata_wni.NAMA_LGKP, biodata_wni.NIK, status_hubungan.status_hubungan FROM biodata_wni, data_keluarga, status_hubungan 
								WHERE biodata_wni.NO_KK=data_keluarga.NO_KK  and biodata_wni.STAT_HBKEL=status_hubungan.STAT_HBKEL
								AND biodata_wni.NO_KK='$row[NO_KK]' ORDER BY biodata_wni.STAT_HBKEL ASC");
		while ($y = mysqli_fetch_array($qkk)) {
			$u++;
			$pdf->Cell(10,$t,$u,1,0,'C');
			$pdf->Cell(80,$t,$y['NAMA_LGKP'],1,0,'L');
			$pdf->Cell(35,$t,$y['NIK'],1,0,'C');
			$pdf->Cell(35,$t,$y['status_hubungan'],1,0,'C');
			$pdf->Cell(30,$t,'',1,1,'C');
		}
		$pdf->ln(2);

		$pdf->Cell(0,$t,"Menyatakan bahwa elemen data kependudukan saya dan atau anggota keluarga saya telah berubah, dengan rincian:",0,1,'L');
		$pdf->ln(2);

		function yangDiubah($nik,$idr,$connect){
			$q = mysqli_query($connect, "SELECT NIK FROM det_riwayat_perubahan WHERE NIK='$nik' AND ID_RIWAYAT='$idr'" );
			$ada = mysqli_num_rows($q);
			return $ada? 1 : 0;
		}

		function getKet($con,$tbl,$col,$kd,$ket){
			$q=mysqli_query($con,"SELECT * FROM $tbl WHERE $col='$kd'");
			$r=mysqli_fetch_array($q);
			return $r[$ket];
		}

		function tulisKolom($bag, $connect, $pdf, $nkk, $idr){
			// $kolom = array(
			// 	array("PDDK_AHR","JENIS_PKRJN"),
			// 	array("AGAMA","GOL_DRH","STAT_KWN"),
			// 	array("STAT_KWN","STAT_HBKEL"),
			// 	array("NAMA_LGKP","JENIS_KLMIN"),
			// 	array("TMPT_LHR","TGL_LHR")
			// );
			

			$qkk = mysqli_query($connect, "SELECT biodata_wni.NAMA_LGKP, biodata_wni.NIK, status_hubungan.status_hubungan FROM biodata_wni, data_keluarga, status_hubungan 
								WHERE biodata_wni.NO_KK=data_keluarga.NO_KK  and biodata_wni.STAT_HBKEL=status_hubungan.STAT_HBKEL
								AND biodata_wni.NO_KK='$nkk' ORDER BY biodata_wni.STAT_HBKEL ASC");

			$no = 1;
			while ($dtr=mysqli_fetch_array($qkk)){
				if (yangDiubah($dtr['NIK'],$idr,$connect)){
					
					$qriwayat = mysqli_query($connect,"SELECT * FROM det_riwayat_perubahan WHERE ID_RIWAYAT='$idr' AND NIK='$dtr[NIK]'");
					$r = mysqli_fetch_array($qriwayat); 
					switch ($bag) {
						case 1 :
							$pdf->Cell(10,5,$no,1,0,'C');
							$pdf->Cell(30,5,getKet($connect,'pendidikan_terakhir','PDDK_AKH',$r['PDDK_AKH_awal'],'pendidikan'),1,0,'C');
							$pdf->Cell(30,5,$r['PDDK_AKH_ahir']==0?"Tetap":getKet($connect,'pendidikan_terakhir','PDDK_AKH',$r['PDDK_AKH_ahir'],'pendidikan'),1,0,'C');
							$pdf->Cell(30,5,$r['PDDK_AKH_dasar'],1,0,'C');
							$pdf->Cell(30,5,getKet($connect,'pekerjaan','JENIS_PKRJN',$r['JENIS_PKRJN_awal'],'pekerjaan'),1,0,'C');
							$pdf->Cell(30,5,$r['JENIS_PKRJN_ahir']==0?"Tetap":getKet($connect,'pekerjaan','JENIS_PKRJN',$r['JENIS_PKRJN_ahir'],'pekerjaan'),1,0,'C');
							$pdf->Cell(30,5,$r['JENIS_PKRJN_dasar'],1,1,'C');
							break;
						case 2 :
							$pdf->Cell(10,5,$no,1,0,'C');
							$pdf->Cell(30,5,getKet($connect,'agama','AGAMA',$r['AGAMA_awal'],'nama_agama'),1,0,'C');
							$pdf->Cell(30,5,$r['AGAMA_ahir']==0?"Tetap":getKet($$connect,'agama','AGAMA',$r['AGAMA_ahir'],'nama_agama'),1,0,'C');
							$pdf->Cell(30,5,$r['AGAMA_dasar'],1,0,'C');
							$pdf->Cell(30,5,getKet($connect,'golongan_darah','GOL_DRH',$r['GOL_DRH_awal'],'nama_golongan'),1,0,'C');
							$pdf->Cell(30,5,$r['AGAMA_ahir']==0?"Tetap":getKet($connect,'golongan_darah','GOL_DRH',$r['GOL_DRH_awal'],'nama_golongan'),1,0,'C');
							$pdf->Cell(30,5,$r['AGAMA_dasar'],1,0,'C');
							$pdf->Cell(30,5,getKet($connect,'pekerjaan','JENIS_PKRJN',$r['JENIS_PKRJN_awal'],'pekerjaan'),1,0,'C');
							$pdf->Cell(30,5,$r['JENIS_PKRJN_ahir']==0?"Tetap":getKet($connect,'pekerjaan','JENIS_PKRJN',$r['JENIS_PKRJN_ahir'],'pekerjaan'),1,0,'C');
							$pdf->Cell(30,5,$r['JENIS_PKRJN_dasar'],1,1,'C');
						break;
						case 3 :
							
							$pdf->Cell(10,5,$no,1,0,'C');
							$pdf->Cell(30,5,$r['PDDK_AKH_awal'],1,0,'C');
							$pdf->Cell(30,5,$r['PDDK_AKH_ahir']==0?"Tetap":$r['PDDK_AKH_ahir'],1,0,'C');
							$pdf->Cell(30,5,$r['PDDK_AKH_dasar'],1,0,'C');
							$pdf->Cell(30,5,$r['JENIS_PKRJN_awal'],1,0,'C');
							$pdf->Cell(30,5,$r['JENIS_PKRJN_ahir']==0?"Tetap":$r['JENIS_PKRJN_ahir'],1,0,'C');
							$pdf->Cell(30,5,$r['JENIS_PKRJN_dasar'],1,1,'C');
						break;
						case 4 :
							$pdf->Cell(10,5,$no,1,0,'C');
							$pdf->Cell(30,5,$r['PDDK_AKH_awal'],1,0,'C');
							$pdf->Cell(30,5,$r['PDDK_AKH_ahir']==0?"Tetap":$r['PDDK_AKH_ahir'],1,0,'C');
							$pdf->Cell(30,5,$r['PDDK_AKH_dasar'],1,0,'C');
							$pdf->Cell(30,5,$r['JENIS_PKRJN_awal'],1,0,'C');
							$pdf->Cell(30,5,$r['JENIS_PKRJN_ahir']==0?"Tetap":$r['JENIS_PKRJN_ahir'],1,0,'C');
							$pdf->Cell(30,5,$r['JENIS_PKRJN_dasar'],1,1,'C');
						break;
						case 5 :
							$pdf->Cell(10,5,$no,1,0,'C');
							$pdf->Cell(30,5,$r['PDDK_AKH_awal'],1,0,'C');
							$pdf->Cell(30,5,$r['PDDK_AKH_ahir']==0?"Tetap":$r['PDDK_AKH_ahir'],1,0,'C');
							$pdf->Cell(30,5,$r['PDDK_AKH_dasar'],1,0,'C');
							$pdf->Cell(30,5,$r['JENIS_PKRJN_awal'],1,0,'C');
							$pdf->Cell(30,5,$r['JENIS_PKRJN_ahir']==0?"Tetap":$r['JENIS_PKRJN_ahir'],1,0,'C');
							$pdf->Cell(30,5,$r['JENIS_PKRJN_dasar'],1,1,'C');
						break;
							

					}

				} else {

				}
				$no++;
			}


		}
		
		$pdf->SetFont("Times", "", 9);
		$pdf->Cell(0,6,"A. Pendidikan dan Pekerjaan",0,1,'L');

		$pdf->Cell(10,$t,'','LTR',0,'C');
		$pdf->Cell(90,$t,'Pendidikan Akhir',1,0,'C');
		$pdf->Cell(90,$t,'Pekerjaan',1,1,'C');
		$pdf->Cell(10,$t,'No','LBR',0,'C');
		$pdf->Cell(30,$t,'Awal',1,0,'C');
		$pdf->Cell(30,$t,'Ahir',1,0,'C');
		$pdf->Cell(30,$t,'Dasar',1,0,'C');
		$pdf->Cell(30,$t,'Awal',1,0,'C');
		$pdf->Cell(30,$t,'Ahir',1,0,'C');
		$pdf->Cell(30,$t,'Dasar',1,1,'C');

		$pdf->SetFont("Times", "", 7);
		tulisKolom(1,$connect,$pdf,$row['NO_KK'],$idr);
		$pdf->ln(2);

		$pdf->SetFont("Times", "", 9);
		$pdf->Cell(0,6,"B. Agama dan Lainnya",0,1,'L');

		$pdf->Cell(10,$t,'','LTR',0,'C');
		$pdf->Cell(60,$t,'AGAMA',1,0,'C');
		$pdf->Cell(60,$t,'GOL. DARAH',1,0,'C');
		$pdf->Cell(60,$t,'STATUS',1,1,'C');
		$pdf->Cell(10,$t,'No','LBR',0,'C');
		$pdf->Cell(20,$t,'Awal',1,0,'C');
		$pdf->Cell(20,$t,'Ahir',1,0,'C');
		$pdf->Cell(20,$t,'Dasar',1,0,'C');
		$pdf->Cell(20,$t,'Awal',1,0,'C');
		$pdf->Cell(20,$t,'Ahir',1,0,'C');
		$pdf->Cell(20,$t,'Dasar',1,0,'C');
		$pdf->Cell(20,$t,'Awal',1,0,'C');
		$pdf->Cell(20,$t,'Ahir',1,0,'C');
		$pdf->Cell(20,$t,'Dasar',1,1,'C');

		tulisKolom(2,$connect,$pdf,$row['NO_KK'],$idr);
		tulisKolom(3,$connect,$pdf,$row['NO_KK'],$idr);
		tulisKolom(4,$connect,$pdf,$row['NO_KK'],$idr);
		tulisKolom(5,$connect,$pdf,$row['NO_KK'],$idr);

		


		$pdf->Output('I', 'surat.pdf');
	} else {
		echo "data tidak ditemukan";
	}
} else {
	echo "data tidak ditemukan";
}

// $pdf->ln(5);
// $pdf->SetFont('Times', 'BU', 12);
// $pdf->Cell(
// 	195,
// 	6,
// 	'SURAT PERNYATAAN PERUBAHAN ELEMEN DATA KEPENDUDUKAN',
// 	0,
// 	1,
// 	'C'
// );
// $pdf->SetFont('Times', '', 11);
// $pdf->Cell(50, 5, '', 0, 0, 'C');

// $pdf->ln(6);
// $text = "Yang bertanda tangan di bawah ini:";
// $pdf->Cell(2, 5, '', 0, 0, 'L');
// $pdf->MultiCell(160, 5, $text);
// $pdf->ln(3);

// $pdf->Cell(
// 	5,
// 	5,
// 	'',
// 	0,
// 	0,
// 	'C'
// );
// $pdf->Cell(
// 	5,
// 	5,
// 	'Nama Lengkap ',
// 	0,
// 	0,
// 	'L'
// );
// $pdf->Cell(
// 	100,
// 	5,
// 	' : ',
// 	0,
// 	0,
// 	'C'
// );
// $pdf->Cell(
// 	1,
// 	5,
// 	$row['NAMA_LGKP'],
// 	0,
// 	1,
// 	'C'
// );
// $pdf->Cell(
// 	5,
// 	5,
// 	'',
// 	0,
// 	0,
// 	'C'
// );
// $pdf->Cell(
// 	5,
// 	5,
// 	'NIK ',
// 	0,
// 	0,
// 	'L'
// );
// $pdf->Cell(
// 	100,
// 	5,
// 	' : ',
// 	0,
// 	0,
// 	'C'
// );
// $pdf->Cell(
// 	1,
// 	5,
// 	$row['NIK'],
// 	0,
// 	1,
// 	'L'
// );
// $pdf->Cell(
// 	5,
// 	5,
// 	'',
// 	0,
// 	0,
// 	'C'
// );
// $pdf->Cell(
// 	5,
// 	5,
// 	'Nomor KK ',
// 	0,
// 	0,
// 	'L'
// );
// $pdf->Cell(
// 	100,
// 	5,
// 	' : ',
// 	0,
// 	0,
// 	'C'
// );
// $pdf->Cell(
// 	1,
// 	5,
// 	$row['NO_KK'],
// 	0,
// 	1,
// 	'L'
// );
// $pdf->Cell(
// 	5,
// 	5,
// 	'',
// 	0,
// 	0,
// 	'C'
// );
// $pdf->Cell(
// 	5,
// 	5,
// 	'Alamat Rumah ',
// 	0,
// 	0,
// 	'L'
// );
// $pdf->Cell(
// 	100,
// 	5,
// 	' : ',
// 	0,
// 	0,
// 	'C'
// );
// $pdf->Cell(
// 	1,
// 	5,
// 	$row['DUSUN'],
// 	0,
// 	1,
// 	'L'
// );
// $pdf->Cell(
// 	5,
// 	5,
// 	'',
// 	0,
// 	0,
// 	'C'
// );
// $pdf->ln(3);
// $text = "dengan rincian KK sebagai berikut:";
// $pdf->Cell(2, 5, '', 0, 0, 'L');
// $pdf->MultiCell(160, 5, $text);
// $pdf->ln(3);

// $pdf->SetFont('Times', '', 10);
// $pdf->Cell(15, 6, 'No', 1, 0, 'C');
// $pdf->Cell(55, 6, 'Nama', 1, 0, 'C');
// $pdf->Cell(45, 6, 'NIK', 1, 0, 'C');
// $pdf->Cell(40, 6, 'SHDK', 1, 0, 'C');
// $pdf->Cell(45, 6, 'Keterangan', 1, 0, 'C');
// 

// $pdf->ln(8);
// $text = ;
// $pdf->Cell(2, 5, '', 0, 0, 'L');
// $pdf->MultiCell(160, 5, $text);
// $pdf->ln(2);
// $text = "A. Pendidikan dan Pekerjaan:";

// $pdf->Cell(
// 	10,
// 	0,
// 	"Pendidikan Terahir",
// 	1,
// 	0,
// 	'c'
// );
// $pdf->Cell(10, 0, "Pekerjaan", 1, 1, 'c');

// $text = "Terlampir disampaikan fotokopi berkas-berkas yang terikat dengan perubahan elemen data tersebut.";
// $pdf->Cell(2, 5, '', 0, 0, 'L');
// $pdf->MultiCell(160, 5, $text);
// $pdf->Cell(5, 5, '', 0, 0, 'C');
// $pdf->Cell(5, 5, 'Demikian surat pernyataan ini saya buat dengan sebenarnya, apabila dalam keterangan yang saya berikan terdapat hal-hal yang tidak', 0, 0, 'L');
// $pdf->ln(5);
// $pdf->Cell(10, 5, 'berdasarkan keadaan yang sebenarnya, saya bersedia dikenakan sanksi sesuai ketentuan perundang undangan yang berlaku.', 0, 0, 'L');
// $pdf->ln(20);

// $pdf->Cell(
// 	120,
// 	4,
// 	'',
// 	0,
// 	0,
// 	'C'
// );
// $pdf->Cell(70, 4, 'Gari, ' . date("d-M-Y"), 0, 1, 'C');
// $pdf->ln(3);
// $pdf->Cell(
// 	103,
// 	4,
// 	'',
// 	0,
// 	0,
// 	'C'
// );
// $pdf->Cell(
// 	103,
// 	4,
// 	'Yang membuat pernyataan',
// 	0,
// 	0,
// 	'C'
// );
// $pdf->ln(25);
// $pdf->Cell(
// 	103,
// 	4,
// 	'',
// 	0,
// 	0,
// 	'C'
// );
// $pdf->Cell(
// 	103,
// 	4,
// 	'(............................................................)',
// 	0,
// 	0,
// 	'C'
// );

// $pdf->ln(5);
// $text = "Keterangan :";
// $pdf->Cell(2, 5, '', 0, 0, 'L');
// $pdf->Cell(0, 5, $text, 0, 'L');
// $text = "Perubahan lainnya ini, juga dapat digunakan untuk merubah data kependudukan yang diakibatkan adanya kesalahan pada waktu pengisian formulir biodata maupun kesalahan pada saat entry-an biodata penduduk dimaksud  ";
// $pdf->Cell(2, 5, '', 0, 0, 'L');
// $pdf->MultiCell(200, 5, $text, 0, 'L');

// $pdf->Cell(2, 5, '', 0, 0, 'L');
// $pdf->MultiCell(160, 5, $text);

// $pdf->SetFont('Times', '', 10);
// $pdf->Cell(8, 6, 'No', 1, 0, 'C');
// $pdf->Cell(45, 6, 'Pendidikan Terakhir (Semula)', 1, 0, 'C');
// $pdf->Cell(45, 6, 'Pendidikan Terakhir (Menjadi)', 1, 0, 'C');
// $pdf->Cell(25, 6, 'Dasar Perubahan', 1, 0, 'C');
// $pdf->Cell(30, 6, 'Pekerjaan (Semula)', 1, 0, 'C');
// $pdf->Cell(30, 6, 'Pekerjaan (Menjadi)', 1, 0, 'C');
// $pdf->Cell(25, 6, 'Dasar Perubahan', 1, 0, 'C');
// $pdf->ln(8);

// $text = "B. Agama dan Perubahan Lainnya:";
// $pdf->Cell(2, 5, '', 0, 0, 'L');
// $pdf->MultiCell(160, 5, $text);

// $pdf->SetFont('Times', '', 10);
// $pdf->Cell(8, 6, 'No', 1, 0, 'C');
// $pdf->Cell(40, 6, 'Agama (Semula)', 1, 0, 'C');
// $pdf->Cell(40, 6, 'Agama (Menjadi)', 1, 0, 'C');
// $pdf->Cell(26, 6, 'Dasar Perubahan', 1, 0, 'C');
// $pdf->Cell(30, 6, 'Lainnya (Semula)', 1, 0, 'C');
// $pdf->Cell(30, 6, 'Lainnya (Menjadi)', 1, 0, 'C');
// $pdf->Cell(26, 6, 'Dasar Perubahan', 1, 0, 'C');
// $pdf->ln(8);
