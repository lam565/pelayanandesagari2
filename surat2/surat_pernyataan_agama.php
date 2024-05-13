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

$pdf->Ln(3);
$pdf->SetFont('Arial','B','14');
$pdf->Cell(15,-2, '                                              SURAT PERNYATAAN ', '0', 1, 'C'); 
$pdf->Cell(15,2, '                                             _______________________________ ', '0', 1, 'C');
$pdf->Ln(-0.5);
$pdf->SetFont('Arial','','12');
$pdf->Cell(15,0, '                                              Nomor : 1 /2014 /2019 ', '0', 1, 'C'); 
$pdf->Ln(0.5);
$pdf->SetFont('Arial','','11');
$pdf->Cell(15,1, '               Yang  bertanada  tangan  dibawah  ini  saya :', '0', 1, 'L');
$pdf->Ln(0);
$pdf->Cell(5,0, '                Nama	                              :	LILIK RAHMAD PURNOMO ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                KTP 	                               :	3403012101770002 ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                Tempat/tanggal lahir	       :	GUNUNGKIDUL/21 JANUARI 1977 ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                Agama	                            :	ISLAM ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                Pekerjaan	                       :	WIRASWASTA ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                Tempat  tinggal	               :	RT 04 / RW 04 KALIDADAP Kalurahan Gari, Kecamatan Wonosari,  ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                                                           Kabupaten Gunungkidul ', '0', 1, 'L'); 
$pdf->Ln(0.5);
$pdf->Cell(15,1, '               Merupakan Suami/Istri/Anak/Orang Tua/Mertua/Menantu/Wali dari', '0', 1, 'L');
$pdf->Ln(0);
$pdf->Cell(5,0, '                Nama	                              :	YULI SETYANINGSIH ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                NIK	                                 :	3403015607810004 ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                Alamat	                            :	KALIDADAP RT 04 / RW 04 Kalurahan Gari, Kecamatan Wonosari,  ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                                                          Kabupaten Gunungkidul ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                Agama	                            :	ISLAM ', '0', 1, 'L'); 

$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                Tempat/Tgl. Lahir	           :	GUNUNGKIDUL/16 JULI 1981', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                Pekerjaan	                       :	WIRASWASTA  ', '0', 1, 'L'); 

$pdf->Ln(1); 
$pdf->Cell(5,0, '              Dengan ini menyatakan bahwa :  ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '              1.	Jawaban dan Keterangan yang saya berikan adalah benar dan sesuai dengan kondisi yang   ', '0', 1, 'J');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                 sebenarnya.  ', '0', 1, 'J');
$pdf->Ln(0.5);
$pdf->Cell(5,0, '             2.	Dalam memberikan jawaban dan keterangan tersebut saya tidak dalam pengaruh dari pihak    ', '0', 1, 'J');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                 manapun.  ', '0', 1, 'J');
$pdf->Ln(0.5);
$pdf->Cell(5,0, '             3.	Saya bersumpah, apabila jawaban dan keterangan yang saya berikan tidak benar, saya siap     ', '0', 1, 'J');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                 mempertanggungjawabkan di hadapan TUHAN dan Manusia.  ', '0', 1, 'J');
$pdf->Ln(0.8); 
$pdf->Cell(5,0, '             Demikian surat pernyataan ini saya buat dengan sesungguhnya, dan apabila dikemudian hari   ', '0', 1, 'J');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '             ternyata tidak benar, saya siap menerima sanksi sesuai dengan agama dan/atau keyakinan    ', '0', 1, 'J');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '             serta ketentuan peraturan perundang-undangan yang berlaku.    ', '0', 1, 'J');
$pdf->Ln(1); 
$pdf->Cell(16,0, '                                                                                                         Gari, 26 Desember 2019', '0', 1, 'L'); 
$pdf->Ln(0.5);
$pdf->Cell(15,0, '                                                                                                          Yang membuat Pernyataan, ', '0', 1, 'L'); 
$pdf->Ln(2);
$pdf->Cell(15,0, '                                                                                                      LILIK RAHMAD PURNOMO', '0', 1, 'L'); 
$pdf->Ln(2); 


#output file PDF
$pdf->Output();

?>