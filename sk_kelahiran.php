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
$judul6 = "SURAT KETERANGAN KELAHIRAN";

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
 
$query = "select * from kelahiran,kk,detail_kelahiran where 
		kelahiran.no_kk=kk.no_kk  and kelahiran.id_kelahiran=detail_kelahiran.id_kelahiran
		and detail_kelahiran.nama_anak='$_GET[by]' group by kelahiran.id_kelahiran";
			
$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
$data = array();
while ($row = mysqli_fetch_array($results)) {
$pdf->SetFont('Times');
$pdf->Cell(50,5, 'Nama Kepala Keluarga    : '.$row["kepala_keluarga"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'No.KK                              : '.$row["no_kk"].'', '0', 1, 'L'); 
$pdf->Ln(1);
$pdf->Cell(50,5, 'BAYI/ANAK:', '0', 1, 'L'); 
$pdf->Ln(1);
$pdf->Cell(50,5, 'Nama                                : '.$row["nama_anak"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Jenis Kelamin                   : '.$row["jenis_kelamin"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Tempat Dilahirkan           : '.$row["tempat_dilahirkan"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Tempat Kelahiran            : '.$row["tempat_lahir"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Tanggal Lahir                   : '.$row["tanggal_lahir"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Pukul                                : '.$row["jam"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Jenis Kelahiran                 : '.$row["jenis_kelahiran"].'', '0', 1, 'L'); 
$pdf->Cell(50,5, 'Kelahiran Ke                    : '.$row["lahir_ke"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Berat Bayi                        : '.$row["berat_bayi"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Panjang Bayi                    : '.$row["panjang_bayi"].'', '0', 1, 'L');  
$pdf->Ln(2);
$pdf->Cell(50,5, 'AYAH:', '0', 1, 'L'); 

$pdf->Cell(50,5, 'NIK                                 : '.$row["nik_pelapor"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Nama Lengkap                : '.$row["nama_pelapor"].'', '0', 1, 'L');
$pdf->Cell(50,5, 'Pekerjaan                         : '.$row["pekerjaan_pelapor"].'', '0', 1, 'L');	
$pdf->Cell(50,5, 'Alamat                             : '.$row["alamat_pelapor"].'', '0', 1, 'L'); 
$pdf->Ln(2);
$pdf->Cell(50,5, 'IBU:', '0', 1, 'L'); 

								
								
								$query5="SELECT * from kk,detail_kk 
								where kk.no_kk=detail_kk.no_kk 
								and detail_kk.nama='$_GET[ibu]'	";
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
$pdf->Cell(50,5, 'Pekerjaan                         : '.$row["pekerjaan_pelapor"].'', '0', 1, 'L');	
$pdf->Cell(50,5, 'Alamat                             : '.$row["alamat_pelapor"].'', '0', 1, 'L'); 

			
                          $g="SELECT * from pegawai where jabatan='sekda'";
								$h = mysqli_query($connect,$g) or die("Error: ".mysqli_error($connect));
                                $i = mysqli_fetch_array($h);      
$pdf->SetFont('Times'); 
$pdf->Cell(168,10, '                                                       Yogyakarta, '.$row["tanggal_lapor"].'', '0', 1, 'R');
$pdf->Cell(168,10, '                                                       Sekertaris Kalurahan Gari', '0', 1, 'R'); 

$pdf->Ln(-3);
$pdf->SetFont('Times'); 
$pdf->Cell(14,0,'	'.$i["nama_pegawai"].'', '0', 0, 'R');
$pdf->Ln(1);
 
}



	
#output file PDF
$pdf->Output();
?>