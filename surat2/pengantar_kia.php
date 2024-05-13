<?php
session_start();
//koneksi ke database
include "../connect.php";
//akhir koneksi

#ambil data di tabel dan masukkan ke array
$query = "SELECT warga.nik,warga.nama_warga,warga.tempat_lahir,warga.tanggal_lahir,
warga.jenis_kelamin,warga.gol_darah,warga.agama,warga.status_perkawinan,warga.pekerjaan
FROM warga,detail_kk,kk where warga.nik=detail_kk.nik and detail_kk.keterangan=''
and detail_kk.no_kk=kk.no_kk and kk.padukuhan='gari'
ORDER BY warga.nik DESC";
$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
$data = array();
while ($row = mysqli_fetch_assoc($results)) {
	array_push($data, $row);
}
 
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
$pdf->Cell(0,1.2, $judul8, '0', 1, 'C');
$pdf->Ln(1.9);
$pdf->SetFont('Arial','B','14');
$pdf->Line(2,4.5,20,4.5);
$pdf->SetLineWidth(0.2);
$pdf->Cell(15,-2, '                                              SURAT KETERANGAN ', '0', 1, 'C'); 
$pdf->Cell(15,2, '                                             _____________________ ', '0', 1, 'C');
$pdf->Ln(-0.5);
$pdf->SetFont('Arial','','12');
$pdf->Line(2,4.5,20,4.5);
$pdf->SetLineWidth(0);
$query = "SELECT *FROM biodata_wni,data_keluarga,kia,staf,jabatan,jenis_kelamin,status_perkawinan,pekerjaan ,pendidikan_terakhir,agama
where biodata_wni.NIK=kia.NIK and biodata_wni.NO_KK=data_keluarga.NO_KK 
and biodata_wni.JENIS_KLMIN=jenis_kelamin.JENIS_KLMIN
and biodata_wni.STAT_KWN=status_perkawinan.STAT_KWN
and biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN
and biodata_wni.PDDK_AKH=pendidikan_terakhir.PDDK_AKH
and biodata_wni.AGAMA=agama.AGAMA
and staf.id_staf=jabatan.id_staf and kia.id_staf=staf.id_staf and kia.NIK='$_GET[nik]' and kia.tanggal_permohonan='$_GET[tgl]'";
$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
$row = mysqli_fetch_array($results);


$pdf->Cell(15,0, '                                                    Nomor : '.$row['no_surat']. ' ', '0', 1, 'C'); 
$pdf->Ln(0.5);
$pdf->SetFont('Arial','','12');
$pdf->Cell(15,1, '                                             Yang bertanda tangan di bawah ini, Kepala Kalurahan Gari, Kecamatan Wonosari, Kabupaten ', '0', 1, 'C');
$pdf->Cell(9,0, '      Gunungkidul, menerangkan bahwa : ', '0', 1, 'L'); 
$pdf->Ln(0.5);
$pdf->Cell(5,0, '              	     	  Nama	                         :	'.$row['NAMA_LGKP']. ' ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              	        NIK 	                           : '.$row['NIK']. ' ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              	        Nomor KK	                  : '.$row['NO_KK']. ' ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              	        Tempat, Tgl Lahir	      :	'.$row['TMPT_LHR']. '/'.$row['TGL_LHR']. ' ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              	        Jenis Kelamin	            :	'.$row['jenis_kelamin']. ' ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              	        Alamat	                       :	'.$row['ALAMAT']. ' ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              	        Agama	                       :	'.$row['nama_agama']. ' ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '             	         Nama Ayah	                :	'.$row['NAMA_LGKP_AYAH']. ' ', '0', 1, 'L');
$pdf->Ln(0.5);
$pdf->Cell(5,0, '             	         Nama Ibu	                   :	'.$row['NAMA_LGKP_IBU']. ' ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Ln(1); 
$pdf->Cell(5,0, '              Orang    tersebut    di    atas   adalah   benar- benar   Penduduk   Padukuhan   RT '.$row['NO_RT'].' /  ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '      RW '.$row['NO_RW']. '    '.$row['DUSUN'].',   Kalurahan   Gari,   Kecamatan    Wonosari,   Kabupaten   Gunungkidul ', '0', 1, 'J');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '      dan  orang  tersebut  diatas  Belum  mempunyai  Kartu  Identitas  Anak  ( K.I.A ). ', '0', 1, 'J');
$pdf->Ln(1); 
$pdf->Cell(5,0, '              Surat   keterangan   ini   diberikan   untuk   Mengajukan/Mencari   KIA. ', '0', 1, 'J');
$pdf->Ln(1);
$pdf->Cell(5,0, '              Demikian   surat   rekomendasi  ini  dibuat  untuk  digunakan   sebagaimana  mestinya ', '0', 1, 'J'); 
$pdf->Ln(2);
$pdf->Cell(11.5,0.04,'', 0,0,'L'); 
$pdf->Cell(8,0.04,'Gari, '.date('d-M-Y',strtotime($row["tanggal_permohonan"])),0, 1, 'C'); 
$pdf->Ln(0.5);
$pdf->Cell(11.5,0.04,'', 0,0,'L'); 
$pdf->Cell(8,0.04,$row['nama_jabatan'],0, 1, 'C'); 

$pdf->Ln(3);
$pdf->Cell(11.5,0.04,'', 0,0,'L'); 
$pdf->Cell(8,0.04,$row['nama_staf'],0, 1, 'C'); 

$pdf->Ln(0.6);

#output file PDF
$pdf->Output();

?>