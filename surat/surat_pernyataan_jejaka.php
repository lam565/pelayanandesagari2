<?php
session_start();
//koneksi ke database
include "../connect.php";
//akhir koneksi

#ambil data di tabel dan masukkan ke array
$query = "SELECT *FROM biodata_wni,data_keluarga,jejaka,staf,jabatan,
jenis_kelamin,status_perkawinan,pekerjaan ,pendidikan_terakhir,agama
where biodata_wni.NIK=jejaka.NIK and biodata_wni.NO_KK=data_keluarga.NO_KK 
and biodata_wni.JENIS_KLMIN=jenis_kelamin.JENIS_KLMIN
and biodata_wni.STAT_KWN=status_perkawinan.STAT_KWN
and biodata_wni.JENIS_PKRJN=pekerjaan.JENIS_PKRJN
and biodata_wni.PDDK_AKH=pendidikan_terakhir.PDDK_AKH
and biodata_wni.AGAMA=agama.AGAMA
and staf.id_staf=jabatan.id_staf and jejaka.id_staf=staf.id_staf and jejaka.NIK='$_GET[nik]' and jejaka.tanggal_permohonan='$_GET[tgl]'";
$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
$row = mysqli_fetch_array($results);
 
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
$pdf->Cell(15,-2, '                                              SURAT PERNYATAAN JEJAKA ', '0', 1, 'C'); 
$pdf->Cell(15,2, '                                             _______________________________ ', '0', 1, 'C');
$pdf->Ln(-0.5);
$pdf->SetFont('Arial','','12');
$pdf->Cell(15,0, '                                              Nomor : '.$row['no_surat']. ' ', '0', 1, 'C');  
$pdf->Ln(0.5);
$pdf->SetFont('Arial','','12');
$pdf->Cell(15,1, '               Yang  bertanada  tangan  dibawah  ini  saya :', '0', 1, 'L');
$pdf->Ln(0.5);
$pdf->Cell(5,0, '                Nama	                    :	'.$row['NAMA_LGKP']. '', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                Bin/Binti	                  : '.$row['NIK']. ' ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                Tempat tgl lahir	    :	'.$row['TMPT_LHR']. '/'.$row['TGL_LHR']. ' ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                Agama	                 :	'.$row['nama_agama']. ' ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                Pekerjaan	            :	'.$row['pekerjaan']. ' ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                Alamat	                 :	'.$row['ALAMAT']. ', Kecamatan ', '0', 1, 'L');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '                                                                   Wonosari, Kabupaten Gunungkidul ', '0', 1, 'L');
$pdf->Ln(1); 
$pdf->Cell(5,0, '              Dengan   ini   saya   bersumpah   "islam"   Bahwa   saya   saat   ini   masih   JEJAKA/  ', '0', 1, 'L'); 
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '      Belum   Kawin .  ', '0', 1, 'J');
$pdf->Ln(0.8); 
$pdf->Cell(5,0, '              Apabila    dikemudian   hari    terbukti    pernyataan   saya   ini   tidak   benar,  saya  ', '0', 1, 'J');
$pdf->Ln(0.5); 
$pdf->Cell(5,0, '      sanggup   dituntut   di   Pengadilan.  ', '0', 1, 'J');
$pdf->Ln(0.5); 
$pdf->Cell(16,0, '                                                                                                        Gari, '.date('d-m-Y',strtotime($row["tanggal_permohonan"])).'', '0', 1, 'L');   
$pdf->Ln(0.5);
$pdf->Cell(15,0, '                                                                                      '.$row['nama_jabatan']. ' ', '0', 1, 'L'); 
$pdf->Ln(2);
$pdf->Cell(15,0, '                                                                                                      '.$row['nama_staf']. '', '0', 1, 'L');
$pdf->Ln(2); 
$pdf->Cell(15,0, '                                 Saksi-saksi', '0', 1, 'L');
$pdf->Ln(1);  
$pdf->Cell(15,0, '                            No	     N a m a	                                                 Tanda Tangan', '0', 1, 'L'); 
$pdf->Ln(1); 
$pdf->Cell(15,0, '                            1.	        '.$row['saksi_1'].'                                                  (...................)', '0', 1, 'L');
$pdf->Ln(1); 
$pdf->Cell(15,0, '                            2.	       '.$row['saksi_2'].'                                                   (...................)', '0', 1, 'L'); 
 
#output file PDF
$pdf->Output();

?>