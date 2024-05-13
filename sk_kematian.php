<?php
//koneksi ke database
$dbHost = "localhost";    
$dbUser = "root";    
$dbPass = "";    
$dbName = "kependudukan"; 
 
$connect = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$connect) die("Koneksi Gagal: " . mysqli_connect_error());
//akhir koneksi
  
#setting judul laporan dan header tabelt
$judul6 = "SURAT KETERANGAN KEMATIAN";

#sertakan library FPDF dan bentuk objek
require_once ("fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
 
#tampilkan judul laporan
$pdf->SetFont('Times','B','12');
$pdf->Cell(0,3, $judul6, '0', 1, 'C');
$pdf->Ln(3); 
 
$pdf->SetFont('Times','B','12');
$pdf->SetFont('Times');
$pdf->Cell(0,10, 'NOMOR : '.$_GET["id"].'', '0', 1, 'C');
$pdf->Ln(2); 
 
$query = "select * from kematian,kk,detail_kk where 
		kematian.nik=detail_kk.nik and kk.no_kk=detail_kk.no_kk 
		and id_kematian='$_GET[id]'";
			
$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
$data = array();
while ($row = mysqli_fetch_array($results)) {
$pdf->SetFont('Times');
$pdf->Cell(50,5, 'Nama Kepala Keluarga    : '.$row["kepala_keluarga"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'No.KK                              : '.$row["no_kk"].'', '0', 1, 'L'); 
$pdf->Ln(1);
$pdf->Cell(50,5, 'JENAZAH:', '0', 1, 'L'); 
$pdf->Ln(1);
$pdf->Cell(50,5, 'NIK                                  : '.$row["nik"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Nama                                : '.$row["nama"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Jenis Kelamin                   : '.$row["jenis_kelamin"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Tanggal Lahir                   : '.$row["tanggal_lahir"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Tempat Lahir                    : '.$row["tempat_lahir"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Agama                              : '.$row["agama"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Pekerjaan                          : '.$row["jenis_pekerjaan"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Alamat                              : '.$row["detail_alamat"].','.$row["rt"].'/'.$row["rw"].','.$row["kelurahan"].','.$row["kecamatan"].','.$row["kabkot"].','.$row["provinsi"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Anak Ke                           : '.$row["anak_ke"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Tanggal Kematian            : '.$row["tanggal_kematian"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Pukul                                : '.$row["jam"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Sebab Kematian               : '.$row["sebab"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Tempat Kematian            : '.$row["tempat_kematian"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Yang Menerangkan         : '.$row["yang_menerangkan"].'', '0', 1, 'L');  
$pdf->Ln(2);
$pdf->Cell(50,5, 'AYAH:', '0', 1, 'L'); 

								$query2="SELECT detail_kk.nama_ayah from kk,detail_kk 
								where kk.no_kk=detail_kk.no_kk and detail_kk.nik='$_GET[nik]'";
								$results2 = mysqli_query($connect,$query2) or die("Error: ".mysqli_error($connect));
                                $data2 = mysqli_fetch_array($results2);
								
								
								$query1="SELECT * from kk,detail_kk 
								where kk.no_kk=detail_kk.no_kk 
								and detail_kk.nama='$data2[nama_ayah]'	";
								$results1 = mysqli_query($connect,$query1) or die("Error: ".mysqli_error($connect));
                                $data1 = mysqli_fetch_array($results1);	
								
$pdf->Cell(50,5, 'NIK                                 : '.$data1["nik"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Nama Lengkap                : '.$data1["nama"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Tanggal Lahir                  : '.$data1["tanggal_lahir"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Pekerjaan                         : '.$data1["jenis_pekerjaan"].'', '0', 1, 'L');	
$pdf->Cell(50,5, 'Alamat                             : '.$data1["detail_alamat"].','.$data1["rt"].'/'.$data1["rw"].','.$data1["kelurahan"].','.$data1["kecamatan"].','.$data1["kabkot"].','.$data1["provinsi"].'', '0', 1, 'L'); 

$pdf->Ln(2);
$pdf->Cell(50,5, 'IBU:', '0', 1, 'L'); 

								$query3="SELECT detail_kk.nama_ibu from kk,detail_kk 
								where kk.no_kk=detail_kk.no_kk and detail_kk.nik='$_GET[nik]'";
								$results3 = mysqli_query($connect,$query3) or die("Error: ".mysqli_error($connect));
                                $data3 = mysqli_fetch_array($results3);
								
								
								$query5="SELECT * from kk,detail_kk 
								where kk.no_kk=detail_kk.no_kk 
								and detail_kk.nama='$data3[nama_ibu]'	";
								$results5 = mysqli_query($connect,$query5) or die("Error: ".mysqli_error($connect));
                                $data5 = mysqli_fetch_array($results5);	
								
$pdf->Cell(50,5, 'NIK                                 : '.$data5["nik"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Nama Lengkap                : '.$data5["nama"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Tanggal Lahir                  : '.$data5["tanggal_lahir"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Pekerjaan                         : '.$data5["jenis_pekerjaan"].'', '0', 1, 'L');	
$pdf->Cell(50,5, 'Alamat                             : '.$data5["detail_alamat"].','.$data5["rt"].'/'.$data5["rw"].','.$data5["kelurahan"].','.$data5["kecamatan"].','.$data5["kabkot"].','.$data5["provinsi"].'', '0', 1, 'L'); 

$pdf->Ln(2);
$pdf->Cell(50,5, 'PELAPOR:', '0', 1, 'L'); 
$pdf->Cell(50,5, 'NIK                                 : '.$row["nik_pelapor"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Nama Lengkap                : '.$row["nama_pelapor"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Tanggal Lahir                  : '.$row["tangal_lahir_pelapor"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Pekerjaan                         : '.$row["pekerjaan_pelapor"].'', '0', 1, 'L');	
$pdf->Cell(50,5, 'Alamat                             : '.$row["alamat_pelapor"].'', '0', 1, 'L'); 

$pdf->Ln(2);
$pdf->Cell(50,5, 'SAKSI 1:', '0', 1, 'L'); 
$pdf->Cell(50,5, 'NIK                                 : '.$row["nik_saksi1"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Nama Lengkap                : '.$row["nama_saksi1"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Tanggal Lahir                  : '.$row["tanggal_lahir_saksi1"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Pekerjaan                         : '.$row["pekerjaan_saksi1"].'', '0', 1, 'L');	
$pdf->Cell(50,5, 'Alamat                             : '.$row["alamat_saksi1"].'', '0', 1, 'L'); 

$pdf->Ln(2);
$pdf->Cell(50,5, 'SAKSI 2:', '0', 1, 'L'); 
$pdf->Cell(50,5, 'NIK                                 : '.$row["nik_saksi2"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Nama Lengkap                : '.$row["nama_saksi2"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Tanggal Lahir                  : '.$row["tanggal_lahir_saksi2"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Pekerjaan                         : '.$row["pekerjaan_saksi2"].'', '0', 1, 'L');	
$pdf->Cell(50,5, 'Alamat                             : '.$row["alamat_saksi2"].'', '0', 1, 'L'); 
							
                                $g="SELECT * from pegawai where jabatan='sekda'";
								$h = mysqli_query($connect,$g) or die("Error: ".mysqli_error($connect));
                                $i = mysqli_fetch_array($h);  
$pdf->SetFont('Times'); 
$pdf->Cell(168,10, '                                                       BATURSARI, '.$row["tanggal_lapor"].'', '0', 1, 'R');
$pdf->Cell(168,10, '                                                       Sekertaris Kalurahan Batursari', '0', 1, 'R'); 

$pdf->Ln(-3);
$pdf->SetFont('Times'); 
$pdf->Cell(14,0,'	'.$i["nama_pegawai"].'', '0', 0, 'R');
$pdf->Ln(1);
 
}



	
#output file PDF
$pdf->Output();
?>