<?php
session_start();
//koneksi ke database
include "../connect.php";
//akhir koneksi

#ambil data di tabel dan masukkan ke array

 
#setting judul laporan dan header tabelt
$judul = "PEMERINTAH KABUPATEN GUNUNGKIDUL";
$judul1 = "KECAMATAN WONOSARI";
$judul7 = "KALURAHAN GARI";
$judul8 = "Jl.Alternatif Karangmojo Gatak Gari Wonosari Pos : 55851";
$header = array(
		array("label"=>"NIK", "length"=>2, "align"=>"C"),
		array("label"=>"Nama Warga", "length"=>3, "align"=>"C"),
		array("label"=>"Tempat Lahir", "length"=>2, "align"=>"C"),
		array("label"=>"Tanggal Lahir", "length"=>2, "align"=>"C"),
		array("label"=>"Jenis Kelamin", "length"=>2, "align"=>"C"),
		array("label"=>"Gol. Darah", "length"=>2, "align"=>"C"),
		array("label"=>"Agama", "length"=>2, "align"=>"C"),
		array("label"=>"Status Perkawinan", "length"=>2, "align"=>"C"),
		array("label"=>"Pekerjaan", "length"=>2, "align"=>"C")
	);
 
#sertakan library FPDF dan bentuk objek
require_once ("../fpdf/fpdf.php");
$pdf = new FPDF('P','cm','A4');
$pdf->Open();
$pdf->AddPage();
 
#tampilkan judul laporan
$pdf -> Image('../logo.jpg',1.5,1,3);
$pdf->SetFont('Arial','','11');
$pdf->Cell(20,1.5, $judul, '0',1, 'C');
$pdf->SetFont('Arial','','11');
$pdf->Cell(20,0, $judul1, '0', 1, 'C');
$pdf->SetFont('Arial','B','18');
$pdf->Ln(1);
$pdf->Cell(20,0, $judul7, '0', 1, 'C');
$pdf->SetFont('Arial','','10');
$pdf->Cell(20,1.2, $judul8, '0', 1, 'C');
$pdf->Ln(1.9);
$pdf->SetFont('Arial','B','14');
$pdf->Line(2,4.5,20,4.5);
$pdf->SetLineWidth(0.2);
$pdf->Cell(15,-2, '                                             SURAT KETERANGAN BELUM PERNAH MENIKAH ', '0', 1, 'C'); 
$pdf->Cell(15,2, '                                             __________________________________________ ', '0', 1, 'C');
$pdf->Ln(-0.5);
$pdf->SetFont('Arial','','12');
$pdf->Line(2,4.5,20,4.5);
$pdf->SetLineWidth(0);

$query = "SELECT *FROM biodata_wni,data_keluarga,belum_menikah,staf,jabatan,jenis_kelamin,status_perkawinan,pekerjaan ,pendidikan_terakhir,agama
where biodata_wni.NIK=belum_menikah.NIK and biodata_wni.NO_KK=data_keluarga.NO_KK 
and biodata_wni.JENIS_KLMIN=jenis_kelamin.JENIS_KLMIN
and biodata_wni.STAT_KWN=status_perkawinan.STAT_KWN
and biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN
and biodata_wni.PDDK_AKH=pendidikan_terakhir.PDDK_AKH
and biodata_wni.AGAMA=agama.AGAMA
and staf.id_staf=jabatan.id_staf and belum_menikah.id_staf=staf.id_staf and belum_menikah.NIK='$_GET[nik]' and belum_menikah.tanggal_permohonan='$_GET[tgl]'";
$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
$row = mysqli_fetch_array($results);



$pdf->Cell(15,0, '                                              Nomor : '.$row['no_surat']. '', '0', 1, 'C'); 
$pdf->Ln(0.5);
$pdf->SetFont('Arial','','12');
$pdf->Cell(15,1, '                                             Yang bertanda tangan di bawah ini, Kepala Kalurahan Gari, Kecamatan Wonosari, Kabupaten ', '0', 1, 'C');
$pdf->Cell(9,0, '      Gunungkidul, menerangkan bahwa : ', '0', 1, 'L'); 
$pdf->Ln(0.5);
$pdf->Cell(5,0, '              1.	     Nama	                                :	'.$row['NAMA_LGKP']. '', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              2.	     KTP 	                                  : '.$row['NIK']. ' ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              3.	     KK	                                     : 	'.$row['NO_KK']. ' ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              4.	     Tempat/tanggal lahir	         :	'.$row['TMPT_LHR']. '/'.$row['TGL_LHR']. ' ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              5.	     Jenis Kelamin	                   :	'.$row['jenis_kelamin']. ' ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              6.	     Setatus Perkawinan	         :	'.$row['status_perkawinan']. ' ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              7.	     Pekerjaan	                         :	'.$row['pekerjaan']. ' ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              8.	     Pendidikan Terakhir	         :	'.$row['pendidikan']. ' ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              9.	     Agama	                              :	'.$row['nama_agama']. ' ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '            10.	    Alamat	                               :	'.$row['ALAMAT']. ', Kecamatan ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                                                                   Wonosari, Kabupaten Gunungkidul ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '            11.	    Keperluan	                          :	'.$row['keperluan']. '   ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Ln(1); 
$pdf->Cell(5,0, '              Nama tersebut diatas adalah benar-benar warga Kalurahan Gari,  Kecamatan Wonosari,  ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '      Kabupaten Gunungkidul,  sesuai dengan data yang ada bahwa nama tersebut diatas belum  ', '0', 1, 'J');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '      pernah menikah / Status jejaka ', '0', 1, 'J');
$pdf->Ln(1); 
$pdf->Cell(5,0, '             Surat keterangan ini dibuat atas kehendak yang bersangkutan dan akan dipergunakan  ', '0', 1, 'J');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '      Untuk  ', '0', 1, 'J');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                                             PERSYARATAN NUMPANG NIKAH  ', '0', 1, 'J');
$pdf->Ln(1);
$pdf->Cell(5,0, '              Demikian  surat  keterangan  ini  di  buat  untuk  dapat  di  pergunakan  sebagaimana ', '0', 1, 'J'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '      mestinya oleh yang bersangkutan. ', '0', 1, 'J');
$pdf->Ln(2);
$pdf->Cell(11.5,0.04,'', 0,0,'L'); 
$pdf->Cell(8,0.04,'Gari, '.date('d-M-Y',strtotime($row["tanggal_permohonan"])),0, 1, 'C'); 
$pdf->Ln(0.5);
$pdf->Cell(11.5,0.04,'', 0,0,'L'); 
$pdf->Cell(8,0.04,$row['nama_jabatan'],0, 1, 'C'); 

$pdf->Ln(3);
$pdf->Cell(11.5,0.04,'', 0,0,'L'); 
$pdf->Cell(8,0.04,$row['nama_staf'],0, 1, 'C'); 


#output file PDF
$pdf->Output();

?>