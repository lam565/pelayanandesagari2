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
$pdf->Cell(0,1.5, $judul, '0',1, 'C');
$pdf->SetFont('Arial','','11');
$pdf->Cell(0,0, $judul1, '0', 1, 'C');
$pdf->SetFont('Arial','B','18');
$pdf->Ln(1);
$pdf->Cell(0,0, $judul7, '0', 1, 'C');
$pdf->SetFont('Arial','','10');
$pdf->Cell(0,1.2, $judul8, '0', 1, 'C');
$pdf->Ln(1.9);
$pdf->SetFont('Arial','B','14');
$pdf->Line(2,4.5,20,4.5);
$pdf->SetLineWidth(0.2);
$pdf->Cell(15,-2, '                                              SURAT KETERANGAN TIDAK MAMPU ', '0', 1, 'C'); 
$pdf->Cell(15,2, '                                             _______________________________ ', '0', 1, 'C');
$pdf->Ln(-0.5);
$pdf->SetFont('Arial','','12');
$pdf->Line(2,4.5,20,4.5);
$pdf->SetLineWidth(0);
$pdf->Cell(15,0, '                                              Nomor : 1 /2014 /2019 ', '0', 1, 'C'); 
$pdf->Ln(0.5);
$pdf->SetFont('Arial','','12');
$pdf->Cell(15,1, '                                             Yang bertanda tangan di bawah ini, Kepala Kalurahan Gari, Kecamatan Wonosari, Kabupaten ', '0', 1, 'C');
$pdf->Cell(9,0, '      Gunungkidul, menerangkan dengan sebenarnya bahwa : ', '0', 1, 'L'); 
$pdf->Ln(1);
$pdf->Cell(5,0, '              1.	     Nama	                                :	LILIK RAHMAD PURNOMO ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              2.	     KTP 	                                  : 3403012101770002 ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              3.	     KK	                                     : 	3403011407110012 ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              4.	     Tempat/tanggal lahir	         :	GUNUNGKIDUL/21 JANUARI 1977 ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              5.	     Jenis Kelamin	                   :	LAKI-LAKI ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              6.	     Setatus Perkawinan	         :	KAWIN ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              7.	     Pekerjaan	                         :	WIRASWASTA ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              8.	     Pendidikan Terakhir	         :	DIPLOMA IV/ STRATA I ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              9.	     Agama	                              :	ISLAM ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '             10.	     Alamat	                             :	RT 04 / RW 04 KALIDADAP Kalurahan Gari, Kecamatan ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                                                                   Wonosari, Kabupaten Gunungkidul ', '0', 1, 'L');
$pdf->Ln(1); 
$pdf->Cell(5,0, '              Orang  tersebut  diatas  adalah  benar-benar  warga  Kalurahan  Gari, Kecamatan Wonosari, ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '      Kabupaten   Gunungkidul,  sesuai  dengan   pengamatan   kami   warga   tersebut  keadaan, ', '0', 1, 'J');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '      perekonomiannya KURANG MAMPU dan termasuk dalam kriteria KELUARGA MISKIN. ', '0', 1, 'J'); 
$pdf->Ln(1);
$pdf->Cell(5,0, '              Demikian  Surat   Keterangan  Tidak   Mampu  ini   kami   buat  dengan  keadaan  yang  ', '0', 1, 'J'); 
$pdf->Ln(0.5);
$pdf->Cell(5,0, '      sebenarnya agar dapat dipergunakan dengan sebagaimana mestinya.  ', '0', 1, 'J'); 
$pdf->Ln(2);
	$pdf->Cell(16,0, '                                                                                                         Gari, 26 Desember 2019', '0', 1, 'L'); 
$pdf->Ln(0.5);
$pdf->Cell(15,0, '    Camat Wonosari,                                                                               Kepala Kalurahan Gari ', '0', 1, 'L'); 
$pdf->Ln(3);
$pdf->Cell(15,0, '    (........................)                                                                                    WIDODO SIP', '0', 1, 'L'); 
$pdf->Ln(3);
$pdf->Cell(15,0, '                                                       ', '0', 1, 'R'); 

$pdf->Ln(0.6);

#output file PDF
$pdf->Output();

?>